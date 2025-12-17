<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\FormsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/home/fetch', [ApiController::class, 'homepage']);
Route::get('/about/fetch', [ApiController::class, 'aboutpage']);
Route::get('/bod/fetch', [ApiController::class, 'bod']);
Route::get('/pns/fetch', [ApiController::class, 'pns']);
Route::get('/motor/individual/fetch', [ApiController::class, 'individualMotorInsurance']);

Route::get('/travel/individual/fetch', [ApiController::class, 'individualTravelInsurance']);

Route::get('/home/individual/fetch', [ApiController::class, 'individualHomeInsurance']);

Route::get('/published-blogs', [ApiController::class, 'fetchPublishedBlogs']);
Route::get('/published-blogs/cards', [ApiController::class, 'fetchPublishedBlogsCards']);
Route::get('/published-blogs/cards/latest-two', [ApiController::class, 'fetchPublishedBlogsCardsLatestTwo']);
Route::get('/blog/{id}/details', [ApiController::class, 'fetchBlogDetail']);
Route::get('/blog-categories', [ApiController::class, 'getBlogCategories']);
Route::get('/careerspage/fetch', [ApiController::class, 'getCareersPage']);
Route::get('/contactpage/fetch', [ApiController::class, 'getContactPage']);
Route::get('/institute/pns/fetch', [ApiController::class, 'institutePnS']);
Route::get('/institute/motor/fetch', [ApiController::class, 'instituteMotorInsurance']);
Route::get('/institute/engineering/fetch', [ApiController::class, 'instituteEngInsurance']);
Route::get('/institute/marine/fetch', [ApiController::class, 'instituteMarineInsurance']);

Route::get('/aboutus/executive-members/fetch', [ApiController::class, 'fetchExecutiveMembers']);






// Contact Form Message Save
Route::post('/contact/form', [FormsController::class, 'saveContactFormMessage']);
// Feedback Form
Route::post('/feedback/form', [FormsController::class, 'saveFeedbackMessage']);

Route::get('/article/{id}', [ApiController::class, 'downloadPDP']);
