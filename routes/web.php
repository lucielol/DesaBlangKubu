<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LettersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LetterBirthController;
use App\Http\Controllers\LetterDeathController;
use App\Http\Controllers\InfografisController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/infografis', [InfografisController::class, 'index'])->name('infografis.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

Route::resource('complaint', ComplaintController::class)->only('store')->names('complaint');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Route of residents
        Route::resource('resident', ResidentController::class);
        Route::post('/resident/search', [ResidentController::class, 'search'])->name('resident.search');

        // Route of news
        Route::resource('news', NewsController::class)->except(['show', 'index']);
        Route::get('/news', [NewsController::class, 'list'])->name('news.list');
        // Auto-save draft news (AJAX)
        Route::post('/news/autosave', [NewsController::class, 'autosave'])->name('news.autosave');

        // Route of complaints
        Route::resource('complaint', ComplaintController::class)->except('store');

        // Route of village profile
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('dashboard.profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('dashboard.profile.update');

        // redirect to dashboard when access url /dashboard/letter
        Route::get('letter', function () {
            return redirect()->to('/dashboard');
        });

        Route::prefix('letter')->group(function () {
            Route::get('/', [LettersController::class, 'index'])->name('letter.index');
            // Route of letter birth
            Route::resource('birth', LetterBirthController::class)->names('letter.birth');

            // Route of letter death
            Route::resource('death', LetterDeathController::class)->names('letter.death');

            // Route of downloading letter
            Route::get('download/{type}/{id}', [LettersController::class, 'download'])->name('letter.download');
        });
    });
});


require __DIR__ . '/auth.php';
