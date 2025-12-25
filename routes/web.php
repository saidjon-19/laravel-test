<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('variants', \App\Http\Controllers\VariantController::class);
    Route::resource('questions', \App\Http\Controllers\QuestionController::class);
    Route::resource('test_types', \App\Http\Controllers\Test_TypeController::class);
    Route::resource('short_answer_questions', \App\Http\Controllers\ShortAnswerQuestionController::class);
    Route::resource('true_false_questions', \App\Http\Controllers\TrueFalseQuestionController::class);
});

Route::get('auth/{provider}', [SocialController::class,
    'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialController::class,
    'handleProviderCallback']);

Route::get('/home',
    [\App\Http\Controllers\MainController::class, 'index'],
)->name('home');

Route::get('/auth/github', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    dd($githubUser);
});

require __DIR__.'/auth.php';
