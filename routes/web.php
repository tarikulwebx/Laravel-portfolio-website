<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminServicesController;
use App\Http\Controllers\AdminSkillsController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminWidgetsController;
use App\Http\Controllers\CommentRepliesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SitePostsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [SitePostsController::class, 'index']);
Route::get('/posts/{slug}', [SitePostsController::class, 'show'])->name('single-post');
Route::get('/category/{slug}', [SitePostsController::class, 'postsByCategory']);

Route::post('/contact-submit', [ContactsController::class, 'store'])->name('contact-submit');




Auth::routes();

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('/admin/users', UsersController::class);

    Route::resource('admin/posts', AdminPostsController::class);
    Route::resource('admin/categories', AdminCategoriesController::class);

    Route::resource('admin/comments', PostCommentsController::class);
    Route::resource('admin/comment/replies', CommentRepliesController::class);

    Route::get('admin/contacts/unread', [ContactsController::class, 'unreadContacts'])->name('unreadContacts');
    Route::resource('admin/contacts', ContactsController::class);

    Route::resource('/admin/projects', ProjectsController::class);

    Route::resource('/admin/services', AdminServicesController::class);

    Route::resource('/admin/skills', AdminSkillsController::class);

    Route::resource('/admin/about', AdminAboutController::class);

    Route::resource('/admin/sliders', AdminSliderController::class);

    Route::resource('/admin/widgets', AdminWidgetsController::class);
   

});





Route::middleware(['auth', 'web'])->group(function () {
    Route::post('/comment-submit', [PostCommentsController::class, 'store']);
    Route::post('/reply-submit', [CommentRepliesController::class, 'store']);
    Route::get('/profile/{slug}', [UserProfileController::class, 'show'])->name('show-profile');
    Route::get('/profile/{slug}/edit', [UserProfileController::class, 'edit'])->name('edit-profile');
    Route::post('/profile/{id}', [UserProfileController::class, 'update'])->name('update-profile');
});



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::middleware(['auth', 'web'])->group(function () {
    Route::get('media/images', function () {
        return view('admin.medias.images');
    });
    Route::get('media/files', function () {
        return view('admin.medias.files');
    });
});

