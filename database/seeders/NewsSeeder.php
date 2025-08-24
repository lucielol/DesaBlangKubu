<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('thumbnails');

        for ($i = 1; $i <= 12; $i++) {
            $title = "Berita Desa Ke-$i";
            $slug = Str::slug($title) . '-' . Str::random(5);
            $content = "Ini adalah konten dari berita desa yang ke-$i. Berisi informasi penting dan menarik seputar kegiatan desa.";

            $fakeImage = UploadedFile::fake()->image("thumb-$i.jpg", 800, 600);
            $filename = $fakeImage->hashName();
            $path = $fakeImage->storeAs('thumbnails', $filename, 'public');

            News::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'status' => 'published',
                'published_at' => now()->subDays(12 - $i),
                'thumbnail' => $path,
            ]);
        }
    }
}
