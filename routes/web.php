<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Individual\AboutUsController;
use App\Http\Controllers\Individual\CareerController;
use App\Http\Controllers\Individual\ContactController;
use App\Http\Controllers\Individual\HomeInsuranceController;
use App\Http\Controllers\Individual\HomepageController;
use App\Http\Controllers\Individual\InsightsController;
use App\Http\Controllers\Individual\MotorInsuranceController;
use App\Http\Controllers\Individual\PnSController;
use App\Http\Controllers\Individual\TravelInsuranceController;
use App\Http\Controllers\Institute\EngineeringInsuranceController;
use App\Http\Controllers\Institute\MarineInsuranceController;
use App\Http\Controllers\Institute\MotorInsuranceController as InstituteMotorInsuranceController;
use App\Http\Controllers\Institute\PnSController as InstitutePnSController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Route::get('/dashboard', function () {
//     return view('pages.homepage.header');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Homepage
    // Route::resource('home-header', HomepageController::class)->only(['index']);
    Route::get('/', [HomepageController::class, 'index'])->name('home-header');
    Route::post('home-header/update', [HomepageController::class, 'updateHomeHeader'])->name('home-header-update');

    Route::get('home/section1', [HomepageController::class, 'homeSec1'])->name('home-sec1');
    Route::post('home/section1/update', [HomepageController::class, 'updateSection1'])->name('home-sec1-update');

    Route::get('home/section2', [HomepageController::class, 'homeSec2'])->name('home-sec2');
    Route::post('home/section2/update', [HomepageController::class, 'updateSection2'])->name('home-sec2-update');



    // About Us Page
    Route::prefix('about')->group(function () {
        Route::get('/header', [AboutUsController::class, 'index'])->name('about-header');
        Route::post('/header/update', [AboutUsController::class, 'updateAboutHeader'])->name('about-header-update');

        Route::get('/section1', [AboutUsController::class, 'aboutSec1'])->name('about-sec1');
        Route::post('/section1/update', [AboutUsController::class, 'updateSection1'])->name('about-sec1-update');

        Route::get('/section2', [AboutUsController::class, 'aboutSec2'])->name('about-sec2');
        Route::post('/section2/update', [AboutUsController::class, 'updateSection2'])->name('about-sec2-update');

        Route::get('/section3', [AboutUsController::class, 'aboutSec3'])->name('about-sec3');
        Route::post('/section3/update', [AboutUsController::class, 'updateSection3'])->name('about-sec3-update');

        Route::get('/section4', [AboutUsController::class, 'aboutSec4'])->name('about-sec4');
        Route::post('/section4/update', [AboutUsController::class, 'updateSection4'])->name('about-sec4-update');

        Route::get('/section5', [AboutUsController::class, 'aboutSec5'])->name('about-sec5');
        Route::get('/section5/create/bod', [AboutUsController::class, 'createBoD'])->name('about-create-bod');
        Route::post('/section5/add/bod', [AboutUsController::class, 'storeBoD'])->name('about-sec5-store');
        Route::get('/section5/{id}/edit', [AboutUsController::class, 'editBoD'])->name('about-sec5-edit');
        Route::post('/section5/{id}/update', [AboutUsController::class, 'updateBoD'])->name('about-sec5-update');
        Route::get('/section5/{id}/delete', [AboutUsController::class, 'deleteBoD'])->name('about-sec5-delete');


        Route::get('/executive-members', [AboutUsController::class, 'executiveMembersTable'])->name('executive-table');
        Route::get('/executive-members/create', [AboutUsController::class, 'createExecutiveMember'])->name('create-executive-member');
        Route::post('/executive-members/store', [AboutUsController::class, 'storeExecutiveMember'])->name('store-executive-member');
        Route::get('/executive-members/{id}/edit', [AboutUsController::class, 'editExecutiveMember'])->name('edit-executive-member');
        Route::post('/executive-members/{id}/update', [AboutUsController::class, 'updateExecutiveMember'])->name('update-executive-member');
        Route::get('/executive-members/{id}/delete', [AboutUsController::class, 'deleteExecutiveMember'])->name('delete-executive-member');
    });


    // Products and Solutions Page
    Route::prefix('pns')->group(function () {
        Route::get('/header', [PnSController::class, 'index'])->name('pns-header');
        Route::post('/header/update', [PnSController::class, 'updatePnSHeader'])->name('pns-header-update');


        Route::get('/section1', [PnSController::class, 'PnsSec1'])->name('pns-sec1');
        Route::post('/section1/update', [PnSController::class, 'updateSection1'])->name('pns-section1-update');


        Route::get('/section2', [PnSController::class, 'PnsSec2'])->name('pns-sec2');
        Route::post('/section2/update', [PnSController::class, 'updateSection2'])->name('pns-section2-update');
    });


    // Motor Insurance Page
    Route::prefix('motor')->group(function () {
        Route::get('/', [MotorInsuranceController::class, 'index'])->name('pns-motor');
        Route::get('/show/header', [MotorInsuranceController::class, 'showMotorHeader'])->name('pns-motor-header');
        Route::post('/header/update', [MotorInsuranceController::class, 'updateMotorInsuranceHeader'])->name('motor-header-update');
        Route::post('/update', [MotorInsuranceController::class, 'updateMotorInsurance'])->name('motor-update');
        Route::get('/show/benefits', [MotorInsuranceController::class, 'showMotorBenefits'])->name('pns-motor-benefits');
        Route::post('/update-benefits', [MotorInsuranceController::class, 'updateMotorBenfits'])->name('motor-update-benefits');
    });


    // Travel Insurance Page
    Route::prefix('travel')->group(function () {
        Route::get('/', [TravelInsuranceController::class, 'index'])->name('pns-travel');
        Route::get('/show/header', [TravelInsuranceController::class, 'showTravelHeader'])->name('pns-travel-header');
        Route::post('/header/update', [TravelInsuranceController::class, 'updateTravelInsuranceHeader'])->name('travel-header-update');
        Route::get('/show/travel-insurance', [TravelInsuranceController::class, 'showTravelHeader'])->name('pns-travel-insurance');
        Route::post('/update', [TravelInsuranceController::class, 'updateTravelInsurance'])->name('travel-update');
        Route::get('/show/benefits', [TravelInsuranceController::class, 'showTravelBenefits'])->name('pns-travel-benefits');
        Route::post('/update-benefits', [TravelInsuranceController::class, 'updateTravelBenfits'])->name('travel-update-benefits');
    });


    // Home Insurance Page
    Route::prefix('home')->group(function () {
        Route::get('/', [HomeInsuranceController::class, 'index'])->name('pns-house-insurance');
        Route::get('/show/header', [HomeInsuranceController::class, 'showHomeHeader'])->name('pns-house-header');
        Route::post('/header/update', [HomeInsuranceController::class, 'updateHomeInsuranceHeader'])->name('house-header-update');
        Route::post('/update', [HomeInsuranceController::class, 'updateHomeInsurance'])->name('house-update');
        Route::get('/show/benefits', [HomeInsuranceController::class, 'showHomeBenefits'])->name('pns-home-benefits');
        Route::post('/update-benefits', [HomeInsuranceController::class, 'updateHomeBenfits'])->name('home-update-benefits');
    });



    // Insights Page
    Route::prefix('insights')->group(function () {
        Route::get('/all-blogs', [InsightsController::class, 'allBlogPage'])->name('blogs-all');
        Route::get('/add-blog', [InsightsController::class, 'showAddBlogPage'])->name('add-blog');
        Route::post('/submit-blog', [InsightsController::class, 'addBlog'])->name('submit-blog');
        Route::get('/blog/{id}/delete', [InsightsController::class, 'deleteBlog'])->name('delete-blog');
        Route::get('/blog/{id}/publish', [InsightsController::class, 'publishBlog'])->name('publish-blog');
        Route::get('/blog/{id}/edit', [InsightsController::class, 'editBlog'])->name('edit-blog');
        Route::post('/blog/{id}/update', [InsightsController::class, 'updateBlog'])->name('update-blog');
    });



    // Careers Page
    Route::prefix('careers')->group(function () {
        Route::get('/show/header', [CareerController::class, 'showCareersHeader'])->name('careers-header');
        Route::post('/header/update', [CareerController::class, 'updateCareersHeader'])->name('careers-header-update');
        Route::get('/show/section1', [CareerController::class, 'showCareersSection1'])->name('careers-section1');
        Route::post('/section1/update', [CareerController::class, 'updateCareersSection1'])->name('careers-section1-update');
        Route::get('/show/section2', [CareerController::class, 'showCareersSection2'])->name('careers-section2');
        Route::post('/section2/update', [CareerController::class, 'updateCareersSection2'])->name('careers-section2-update');
        Route::get('/show/section3', [CareerController::class, 'showCareersSection3'])->name('careers-section3');
        Route::post('/section3/update', [CareerController::class, 'updateCareersSection3'])->name('careers-section3-update');
    });



    // contact Page
    Route::prefix('contact')->group(function () {
        Route::get('/show/header', [ContactController::class, 'showContactHeader'])->name('contact-header');
        Route::post('/header/update', [ContactController::class, 'updateContactHeader'])->name('contact-header-update');
        Route::get('/show/contacts', [ContactController::class, 'showContacts'])->name('contact-details');
        Route::post('/contacts/update', [ContactController::class, 'updateContacts'])->name('contact-update');
    });



    // Institute
    Route::prefix('institute')->group(function () {


        // PNS Page
        Route::prefix('pns')->group(function () {
            Route::get('/show/header', [InstitutePnSController::class, 'showPnSHeader'])->name('institute-pns-header');
            Route::post('/header/update', [InstitutePnSController::class, 'updatePnSHeader'])->name('institute-pns-header-update');
            Route::get('/show/section1', [InstitutePnSController::class, 'PnsSec1'])->name('institute-pns-section1');
            Route::post('/section1/update', [InstitutePnSController::class, 'updateSection1'])->name('institute-pns-section1-update');


            Route::get('/show/section2', [InstitutePnSController::class, 'PnsSec2'])->name('institute-pns-section2');
            Route::post('/section2/update', [InstitutePnSController::class, 'updateSection2'])->name('institute-pns-section2-update');
        });


        // Motor Insurance Page
        Route::prefix('motor')->group(function () {
            Route::get('/show/header', [InstituteMotorInsuranceController::class, 'showHeader'])->name('institute-pns-motor-header');
            Route::post('/header/update', [InstituteMotorInsuranceController::class, 'updateMotorInsuranceHeader'])->name('institute-motor-header-update');
            Route::get('/show/motor', [InstituteMotorInsuranceController::class, 'showMotorPage'])->name('institute-pns-motor-page');
            Route::post('/section1/update', [InstituteMotorInsuranceController::class, 'updateMotorInsurance'])->name('institute-motor-section1-update');
            Route::get('/show/benefits', [InstituteMotorInsuranceController::class, 'showMotorBenefits'])->name('institute-pns-motor-benefits');
            Route::post('/benefits/update', [InstituteMotorInsuranceController::class, 'updateMotorBenfits'])->name('institute-motor-benefits-update');
        });


        // Engineering Insurance Page
        Route::prefix('engineering')->group(function () {
            Route::get('/show/header', [EngineeringInsuranceController::class, 'showHeader'])->name('institute-pns-engineering-header');
            Route::post('/header/update', [EngineeringInsuranceController::class, 'updateEngineeringInsuranceHeader'])->name('institute-eng-header-update');
            Route::get('/show/engineering', [EngineeringInsuranceController::class, 'showEngineeringPage'])->name('institute-pns-engineering-page');
            Route::post('/engineering/update', [EngineeringInsuranceController::class, 'updateEngInsurance'])->name('institute-engineering-update');
            Route::get('/show/benefits', [EngineeringInsuranceController::class, 'showEngBenefits'])->name('institute-pns-engineering-benefits');
            Route::post('/benefits/update', [EngineeringInsuranceController::class, 'updateEngBenfits'])->name('institute-engineering-benefits-update');
        });


        // Marine Insurance Page
        Route::prefix('marine')->group(function () {
            Route::get('/show/header', [MarineInsuranceController::class, 'showHeader'])->name('institute-pns-marine-header');
            Route::post('/header/update', [MarineInsuranceController::class, 'updateMarineInsuranceHeader'])->name('institute-marine-header-update');
            Route::get('/show/marine', [MarineInsuranceController::class, 'showMarinePage'])->name('institute-pns-marine-page');
            Route::post('/marine/update', [MarineInsuranceController::class, 'updateMarineInsurance'])->name('institute-marine-update');
            Route::get('/show/benefits', [MarineInsuranceController::class, 'showMarineBenefits'])->name('institute-pns-marine-benefits');
            Route::post('/benefits/update', [MarineInsuranceController::class, 'updateMarineBenfits'])->name('institute-marine-benefits-update');
        });
    });



});

require __DIR__.'/auth.php';





Route::get('/pdf-view/{id}', [ApiController::class, 'viewPDFPage']);


// Route::get('/', function () {
//     return view('auth.login');
// })->name('login');








