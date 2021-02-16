<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('MainComponent/formPage');
});

Route::get('/listing',[App\Http\Controllers\MainController::class ,'dropDownInfo']);

Route::get('/getAllPeoples',[App\Http\Controllers\MainController::class ,'allPeoples']);

Route::post('/submitPeoplesInformation',[App\Http\Controllers\MainController::class ,'peopleInfo']); // submit people infor
Route::post('/submitFilmsInformation',[App\Http\Controllers\MainController::class ,'filmInfo']); // submit film info
// Route::post('submitForm/',[App\Http\Controllers\RegistrationForm::class ,'submitForm']);