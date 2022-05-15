<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::get('/announcement/{announcement}/detail', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::get('/announcement/all', [AnnouncementController::class, 'showAnnunci'])->name('announcements.all');
Route::get('/category/{category}/detail', [CategoryController::class, 'show'])->name('showbycategory');
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
Route::get('/revisor/show/{announcement}', [RevisorController::class, 'show'])->name('revisor.show');
Route::get('/revisor/check', [RevisorController::class, 'checkAnnouncements'])->name('revisor.check');

Route::patch('/accetta/annuncio/{announcement}/{value}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}/{value}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
Route::patch('/undo/annuncio/{announcement}', [RevisorController::class, 'undoAnnouncement'])->name('revisor.undo_announcement');

Route::get('/askToBe/revisor', [RevisorController::class, 'becomeRevisor'])->name('become.revisor')->middleware('auth');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/search', [AnnouncementController::class, 'searchAnnouncements'])->name('announcements.search');

Route::get('/revisor/continue-show', [RevisorController::class, 'continueShow'])->name('continue.show');

Route::post('/language/{lang}', [HomeController::class, 'setLanguages'])->name('set_language_locale');
