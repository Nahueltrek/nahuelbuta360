<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\BusinessController as AdminBusinessController;
use App\Http\Controllers\Admin\ClaimController as AdminClaimController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Owner\BusinessEditController;
use App\Http\Controllers\Owner\ClaimController as OwnerClaimController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Public\AttractionShowController;
use App\Http\Controllers\Public\BlogIndexController;
use App\Http\Controllers\Public\BlogShowController;
use App\Http\Controllers\Public\BusinessShowController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\RouteShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/emprendimientos/{slug}', BusinessShowController::class)->name('businesses.show');
Route::get('/atractivos/{slug}', AttractionShowController::class)->name('attractions.show');
Route::get('/rutas/{slug}', RouteShowController::class)->name('routes.show');
Route::get('/blog', BlogIndexController::class)->name('blog.index');
Route::get('/blog/{slug}', BlogShowController::class)->name('blog.show');

Route::get('/login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::post('/emprendimientos/{slug}/reclamar', [OwnerClaimController::class, 'store'])->name('businesses.claim');

    Route::get('/dashboard', OwnerDashboardController::class)->name('dashboard');
    Route::get('/dashboard/negocios/{slug}/editar', [BusinessEditController::class, 'edit'])->name('dashboard.businesses.edit');
    Route::put('/dashboard/negocios/{slug}', [BusinessEditController::class, 'update'])->name('dashboard.businesses.update');
});

Route::middleware(['auth', 'role:admin,super_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('dashboard');

    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('reviews.approve');
    Route::post('/reviews/{review}/reject', [AdminReviewController::class, 'reject'])->name('reviews.reject');

    Route::get('/claims', [AdminClaimController::class, 'index'])->name('claims.index');
    Route::post('/claims/{claim}/approve', [AdminClaimController::class, 'approve'])->name('claims.approve');
    Route::post('/claims/{claim}/reject', [AdminClaimController::class, 'reject'])->name('claims.reject');

    Route::get('/businesses', [AdminBusinessController::class, 'index'])->name('businesses.index');
});

// Grupo aparte: el rol 'editor' puede crear/editar artículos (pero no
// publicar por sí solo — eso lo valida ArticlePolicy::publish), así que
// esta sección permite un rol más que el resto de /admin.
Route::middleware(['auth', 'role:admin,super_admin,editor'])->prefix('admin/articles')->name('admin.articles.')->group(function () {
    Route::get('/', [AdminArticleController::class, 'index'])->name('index');
    Route::get('/nuevo', [AdminArticleController::class, 'create'])->name('create');
    Route::post('/', [AdminArticleController::class, 'store'])->name('store');
    Route::get('/{article}/editar', [AdminArticleController::class, 'edit'])->name('edit');
    Route::put('/{article}', [AdminArticleController::class, 'update'])->name('update');
});
