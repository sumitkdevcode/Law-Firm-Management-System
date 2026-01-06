<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PracticeAreaController;
use App\Http\Controllers\Admin\CaseController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'serviceDetail'])->name('services.show');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [PageController::class, 'caseDetail'])->name('portfolio.show');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/team/{slug}', [PageController::class, 'teamMember'])->name('team.show');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Practice Areas
        Route::resource('practice-areas', PracticeAreaController::class);

        // Cases/Portfolio
        Route::resource('cases', CaseController::class);

        // Testimonials
        Route::resource('testimonials', TestimonialController::class);

        // Blog
        Route::prefix('blog')->name('blog.')->group(function () {
            Route::resource('posts', BlogPostController::class);
            Route::resource('categories', BlogCategoryController::class);
        });

        // Team Members
        Route::resource('team', TeamMemberController::class);

        // Contacts
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.status');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

        // FAQs
        Route::resource('faqs', FaqController::class);

        // SEO Management
        Route::resource('seo', SeoController::class);

        // User Management
        Route::resource('users', UserController::class)->except(['show']);

        // Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    });
});


