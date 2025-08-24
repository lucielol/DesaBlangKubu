<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'published')
            ->latest()
            ->paginate(6);
            
        return view('pages.home.index', compact('news'));
    }
}