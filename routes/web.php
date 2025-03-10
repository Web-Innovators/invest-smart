<?php

use App\Events\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\PagesController;
use App\Http\Controllers\User\QueryController;
use App\Http\Controllers\Admin\ViewsController;
use App\Http\Controllers\Models\ModelController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('users.pages.index');
})->name('index.get');

Route::post('/chat-post', function (Request $request) {
    event(new SMS($request->message));
    return null;
});

Route::post('/extract-cropped-text', [PagesController::class, 'extractCroppedText'])->name('extract.cropped.text');

Route::post('/switch-language', [PagesController::class, 'switchLang'])->name('switchLang');

Route::get('/about', [PagesController::class, 'aboutPage'])->name('about.get');
Route::get('/contact', [PagesController::class, 'contactPage'])->name('contact.get');
Route::get('/packages', [PagesController::class, 'packagesPage'])->name('packages.get');
Route::get('/teams', [PagesController::class, 'teamPage'])->name('team.get');
Route::get('/faq', [PagesController::class, 'faqPage'])->name('faq.get');
Route::get('/gallery', [PagesController::class, 'galleryPage'])->name('gallery.get');



//post query
Route::post('/contact', [QueryController::class, 'storeQuery'])->name('contact.post');
// profile info store
Route::post('/profile-info', [QueryController::class, 'profileInfoStore'])->name('profile-info.post');

// dashboard
Route::get('/dashboard', [PagesController::class, 'dashboardPage'])->name('dashboard.get');

// payment pkg SS post
Route::post('/pkg-post', [QueryController::class, 'pkgPaymentPost'])->name('payment.pkg-post');
// withdrawl request
Route::get('/withdraw/{id?}/request', [QueryController::class, 'shareWithdrawRequest'])->name('share.withdraw.request');




// user auth
Route::get('/register', [AuthController::class, 'registerPage'])->name('register.get');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login.get');
Route::get('/forgot-password', [AuthController::class, 'forgotPage'])->name('forgot.get');
Route::get('/reset/{token?}/password', [AuthController::class, 'resetPage'])->name('reset.get');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/forgot-password', [AuthController::class, 'forgot'])->name('forgot.post');
Route::post('/reset-password', [AuthController::class, 'reset'])->name('reset.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //admin auth
    Route::get('/login', [AdminAuthController::class, 'adminLoginPage'])->name('admin.login.get');
    Route::post('/login', [AdminAuthController::class, 'adminLoginPost'])->name('admin.login.post');
    Route::get('/forgot-password', [AdminAuthController::class, 'adminForgotPage'])->name('admin.forgot.get');
    Route::get('/reset/{token?}/password', [AdminAuthController::class, 'adminResetPage'])->name('admin.reset.get');
    Route::post('/forgot-password', [AdminAuthController::class, 'adminForgotPost'])->name('admin.forgot.post');
    Route::post('/reset-password', [AdminAuthController::class, 'adminResetPost'])->name('admin.reset.post');
    Route::get('/logout', [AdminAuthController::class, 'adminlogout'])->name('admin.logout');

    // admin views
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', [ViewsController::class, 'adminDashboard'])->name('admin.index.get');
        Route::get('/users', [ViewsController::class, 'adminUsers'])->name('admin.users.get');
        // update user status
        Route::post('/user-ban', [PackagesController::class, 'banUser'])->name('admin.user.ban');

        // models
        Route::get('/deposits', [ViewsController::class, 'depositsPage'])->name('admin.deposits.get');
        Route::get('/withdraws', [ViewsController::class, 'withdrawsPage'])->name('admin.withdraws.get');
        // status update on shares
        Route::post('/update-withdraw-status', [PackagesController::class, 'updateStatusWithdraws'])->name('update.withdraw.status');
        // deposits status update
        Route::post('/update-deposit-status', [PackagesController::class, 'updateStatusDeposits'])->name('update.deposit.status');

        // packages
        Route::get('/packages', [ViewsController::class, 'packagesPage'])->name('admin.packages.get');
        Route::post('/package', [PackagesController::class, 'packagePost'])->name('admin.package.post');
        Route::post('/package-update', [PackagesController::class, 'packageUpdate'])->name('admin.package.update');
        Route::post('/share-update', [PackagesController::class, 'shareUpdate'])->name('admin.share.update');
        // pkg delete
        Route::post('/package-delete', [PackagesController::class, 'deletePackage'])->name('admin.package.delete');

        //queries 
        Route::get('/queries', [ViewsController::class, 'adminQueries'])->name('admin.queries.get');

        // upload video via queue
        Route::get('/upload-video', [ViewsController::class, 'adminQueueVideo'])->name('admin.upload-video.post');

    });
});
