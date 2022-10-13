<?php

use App\Http\Controllers\ApiController\ProController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\DueController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/customer_details/{id}', [CustomerController::class, 'customerDetailsApi'])->name('customer.details');

Route::prefix('property')->group(function()
{
    //::::::::::::::::::::::::::::::::::::::::::: L a n d  A p i s ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/lands', [ProController::class, 'landViewApi'])->name('api.land.view');

    Route::post('/store_land', [ProController::class, 'storeLandApi'])->name('api.land.store');

    Route::delete('/delete_land/{id}', [ProController::class, 'deleteLandApi'])->name('api.land.delete');

    Route::get('/edit_land/{id}', [ProController::class, 'editLandApi'])->name('api.land.edit');

    Route::post('/update_land/{id}', [ProController::class, 'updateLandApi'])->name('api.land.update');

    //::::::::::::::::::::::::::::::::::::::::::: Building Apis ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/buildings', [ProController::class, 'buildingView'])->name('api.building.view');

    Route::post('/store_building', [ProController::class, 'storeBuilding'])->name('api.building.store');

    Route::delete('/delete_building/{id}', [ProController::class, 'deleteBuilding'])->name('api.building.delete');

    Route::get('/edit_building/{id}', [ProController::class, 'editBuilding'])->name('api.building.edit');

    Route::post('/update_building/{id}', [ProController::class, 'updateBuilding'])->name('api.building.update');

    //::::::::::::::::::::::::::::::::::::::::::: Flat Apis ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    Route::get('/flats', [ProController::class, 'flatView'])->name('api.flat.view');

    Route::post('/store_flat', [ProController::class, 'storeFlat'])->name('api.flat.store');

    Route::delete('/delete_flat/{id}', [ProController::class, 'deleteFlat'])->name('api.flat.delete');

    Route::get('/edit_flat/{id}', [ProController::class, 'editFlat'])->name('api.flat.edit');

    Route::post('/update_flat/{id}', [ProController::class, 'updateFlat'])->name('api.flat.update');

});

//:::::::::::::::::::::::::::::::::::::::::::::: Customer Apis :::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::post('/store_customer', [CustomerController::class, 'storeCustomer'])->name('api.customer.store');

Route::get('/fetch_all_customers', [CustomerController::class, 'fetchAllCustomers'])->name('api.customer.fetchall');

Route::delete('/delete_customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('api.customer.delete');

Route::get('/edit_customer/{id}', [CustomerController::class, 'editCustomer'])->name('api.customer.edit');

Route::post('/update_customer/{id}', [CustomerController::class, 'updateCustomer'])->name('api.customer.update');

Route::prefix('customer')->group(function ()
{
    Route::get('/get_flats/{building_id}', [CustomerController::class, 'getFlats'])->name('api.customer.getflats');

    Route::get('/get_flat_size/{flat_id}', [CustomerController::class, 'getFlatSize'])->name('api.customer.getflatsize');


});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::: Price Apis :::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/fetch_all_flatprices', [PriceController::class, 'fetchAllFlatPrices'])->name('price.reg.fetchall');

Route::get('/fetch_all_regprices', [PriceController::class, 'fetchAllRegPrices'])->name('price.reg.fetchall');

Route::post('/store_price', [PriceController::class, 'storePrice'])->name('price.store');

Route::get('/edit_price/{id}', [PriceController::class, 'editPrice'])->name('price.edit');

Route::post('/update_price/{id}', [PriceController::class, 'updatePrice'])->name('price.update');

Route::delete('/delete_price/{id}', [PriceController::class, 'deletePrice'])->name('price.delete');

// ::::::::::::::::::::::::::::::::::::::::::::::: Payment Apis ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/fetch_all_regpayments', [PaymentController::class, 'fetchAllRegPayments'])->name('payment.reg.fetchall');

Route::get('/fetch_all_flatpayments', [PaymentController::class, 'fetchAllFlatPayments'])->name('payment.reg.fetchall');

Route::post('/store_payment', [PaymentController::class, 'storePayment'])->name('payment.store');

Route::get('/edit_payment/{id}', [PaymentController::class, 'editPayment'])->name('payment.edit');

Route::post('/update_payment/{id}', [PaymentController::class, 'updatePayment'])->name('payment.update');

Route::delete('/delete_payment/{id}', [PaymentController::class, 'deletePayment'])->name('payment.delete');

//:::::::::::::::::::::::::::::::::::::::::::::: Due Apis :::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/fetch_all_regdues', [DueController::class, 'fetchAllRegDues'])->name('due.reg.fetchall');

Route::get('/fetch_all_flatdues', [DueController::class, 'fetchAllFlatDues'])->name('payment.reg.fetchall');

//::::::::::::::::::::::::::::::::::::::::::::::::: bnf Details Apis :::::::::::::::::::::::::::::::::::::::::::::::::
Route::prefix('property')->group(function () {
    Route::get('/bnf_details', [ProController::class, 'bnfDetails'])->name('bnf.view');
});

//:::::::::::::::::::::::::::::::::::::::::::::::: Registration Apis :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::prefix('registration')->group(function()
{
    //--------------------------------------------------- Flat ------------------------------------------------------------------
    Route::get('/flat_details', [RegistrationController::class, 'flatDetails'])->name('api.registration.flat.details');

    Route::post('/store_flat_details', [RegistrationController::class, 'storeFlatDetails'])->name('api.registration.flat.store');

    //--------------------------------------------------- Land ------------------------------------------------------------------
    Route::get('/land_details', [RegistrationController::class, 'landDetails'])->name('api.registration.land.details');

    Route::post('/store_land_details', [RegistrationController::class, 'storeLandDetails'])->name('api.registration.land.store');

    //--------------------------------------------------- Mutation ------------------------------------------------------------------
    Route::get('/mutation_details', [RegistrationController::class, 'mutationDetails'])->name('api.registration.mutation.details');

    Route::post('/store_mutation_details', [RegistrationController::class, 'storeMutationDetails'])->name('api.registration.mutation.store');

    //--------------------------------------------------- Power of Attorney ------------------------------------------------------------------
    Route::get('/poa_details', [RegistrationController::class, 'poaDetails'])->name('api.registration.poa.details');

    Route::post('/store_poa_details', [RegistrationController::class, 'storePoaDetails'])->name('api.registration.poa.store');
});






