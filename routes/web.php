<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SmsController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web','auth:sanctum', 'verified','admin'])->prefix('admin')->as('admin.')->group(function () {
    
    Route::get('/', [DashboardController::class,'home'])->name('home');
    // Route::get('/roles', [DashboardController::class,'roles'])->name('roles');
    
    // Company
    Route::get('/company/company-list', [CompanyController::class,'allCompany'])->name('company.all');
    Route::get('/company/create-company', [CompanyController::class,'companyCreate'])->name('company.create');
    
    // SMS
    Route::get('/sms/send', [SmsController::class,'sendSms'])->name('sms.send');
    Route::get('/sms/campaign', [SmsController::class,'campaign'])->name('sms.campaign');
    Route::get('/sms/sender_id', [SmsController::class,'senderId'])->name('sms.sender_id');
    Route::get('/sms/templates', [SmsController::class,'templates'])->name('sms.templates');
    
    // Price
    Route::get('/price', [SmsController::class,'sendSms'])->name('price');

    // PhoneBook
    Route::get('/phonebook', [SmsController::class,'sendSms'])->name('phonebook');
    

});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
