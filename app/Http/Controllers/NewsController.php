<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('pages.news.index', compact('news'));
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $news = News::latest()->paginate(20);

        return view('pages.news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image',
            'status' => 'required|in:draft,published',
        ]);

        $slug = $validated['status'] === 'published'
            ? Str::slug($validated['title'])
            : '';

        $data = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'slug' => $slug,
            'published_at' => $slug ? now() : null,
            'session_id' => null,
        ];

        $news = News::updateOrCreate(
            ['slug' => $slug],
            $data
        );

        if ($request->hasFile('thumbnail')) {
            $dir = 'thumbnails';

            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }

            $filename = $request->file('thumbnail')->hashName();
            $path = $request->file('thumbnail')->storeAs($dir, $filename, 'public');

            $news->thumbnail = $path;
            $news->save();
        }

        return redirect()->route('news.list')->with('success', 'Berita berhasil disimpan.');
    }

    /**
     * Auto-save a draft news entry (AJAX endpoint)
     */
    public function autosave(Request $request)
    {
        $sessionId = Session::getId();

        // Find existing draft for this session only
        $draft = News::where('status', 'draft')
            ->where('session_id', $sessionId)
            ->first();

        if (!$draft) {
            $draft = new News();
            $draft->session_id = $sessionId;
            $draft->status = 'draft';
        }

        $draft->title = $request->input('title', $draft->title);
        $draft->content = $request->input('content', $draft->content);
        $draft->save();

        return response()->json([
            'success' => true,
            'draft_id' => $draft->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        // Only allow viewing published news
        if ($news->status !== 'published') {
            abort(404);
        }
        $latestNews = News::where('id', '!=', $news->id)
            ->where('status', 'published')
            ->latest()
            ->limit(10)
            ->get();
        return view('pages.news.show', compact('news', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image',
            'status' => 'required|in:draft,published',
        ]);

        $news->title = $validated['title'];
        $news->content = $validated['content'];
        $news->status = $validated['status'];
        $news->session_id = null;

        if ($validated['status'] === 'published') {
            if (!$news->slug) {
                $news->slug = Str::slug($validated['title']) . '-' . uniqid();
            }
            if (!$news->published_at) {
                $news->published_at = now();
            }
        }

        if ($request->hasFile('thumbnail')) {
            $dir = 'thumbnails';

            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }

            if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
                Storage::disk('public')->delete($news->thumbnail);
            }

            $filename = $request->file('thumbnail')->hashName();
            $path = $request->file('thumbnail')->storeAs($dir, $filename, 'public');

            $news->thumbnail = $path;
        }

        $news->save();

        return redirect()->route('news.list')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.list')->with('success', 'Berita berhasil dihapus.');
    }
}
