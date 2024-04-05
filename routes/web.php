<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocusignController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('docusign',[DocusignController::class, 'index'])->name('docusign');
Route::get('connect-docusign',[DocusignController::class, 'connectDocusign'])->name('connect.docusign');
Route::get('docusign/callback',[DocusignController::class,'callback'])->name('docusign.callback');
Route::get('sign-document/{userId}',[DocusignController::class,'signDocument'])->name('docusign.sign');
