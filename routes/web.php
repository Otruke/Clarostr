<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\RegpaymentController;
use App\Http\Controllers\UsernameCheckController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ErrorController;
use APP\Http\Controllers\RegErrorPaymentConroller;
use App\Http\Controllers\UpgradeController;
use App\Http\Controllers\SubpaymentController;
use App\Http\Controllers\WithdrawalController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/regpayment', [App\Http\Controllers\RegpaymentController::class, 'index'])->name('regpayment');
Route::get('/subPayment', [App\Http\Controllers\SubpaymentController::class, 'index'])->name('subPayment');

// The route that the button calls to initialize payment
Route::any('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');

// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/check-username', [UsernameCheckController::class, 'check'])->name('check-username');


Route::get('/ref/{username}', [ReferralController::class, 'redirectToWelcome'])->name('referral.link');

Route::get('/error', [App\Http\Controllers\ErrorController::class, 'index'])->name('error');

Route::get('/regErrorPayment', [App\Http\Controllers\RegErrorPaymentConroller::class, 'index'])->name('regErrorPayment');

Route::middleware(['auth'])->group(function () {
    Route::get('/showdirect/{username}', [App\Http\Controllers\ReferralController::class, 'showReferrals'])->name('showdirect');
    Route::get('/downliners/{username}', [App\Http\Controllers\ReferralController::class, 'showDownliners'])->name('downliners');
    Route::get('/generation-tree/{username}', [App\Http\Controllers\ReferralController::class, 'showGenerationTree'])->name('generationTree');
    Route::get('/membership', [App\Http\Controllers\HomeController::class, 'membership'])->name('membership');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/editPersonal', [App\Http\Controllers\HomeController::class, 'editPersonal'])->name('editPersonal');
    Route::post('/editPersonal2', [App\Http\Controllers\HomeController::class, 'editPersonal2'])->name('editPersonal2');
    Route::post('/editBank2', [App\Http\Controllers\HomeController::class, 'editBank2'])->name('editBank2');
    Route::get('/foodVest', [App\Http\Controllers\HomeController::class, 'foodVest'])->name('foodVest');
    Route::get('/editBank', [App\Http\Controllers\HomeController::class, 'editBank'])->name('editBank');
    Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');
    Route::get('/upline', [App\Http\Controllers\HomeController::class, 'upline'])->name('upline');
    Route::get('/upgrade/{package}', [App\Http\Controllers\UpgradeController::class, 'upgrade'])->name('upgrade');
    Route::any('/withdraw', [WithdrawalController::class, 'withdrawal'])->name('withdraw');
    Route::any('/transfer', [WithdrawalController::class, 'initialize'])->name('transfer');
    Route::get('/earnings', [App\Http\Controllers\HomeController::class, 'earnings'])->name('earnings');
    Route::get('/withdrawalHistory', [App\Http\Controllers\HomeController::class, 'withdrawalHistory'])->name('withdrawalHistory');
    Route::get('/historyReadMore', [App\Http\Controllers\HomeController::class, 'historyReadMore'])->name('historyReadMore');
    Route::get('/withdrawal/{transaction_id}', [App\Http\Controllers\HomeController::class, 'showWithdrawalDetails'])->name('withdrawalDetails');

});