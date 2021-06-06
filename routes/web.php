<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ConnexionController;

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
Route::get('/deconnection',[ConnexionController :: class ,'Deconnecter'])->name('deconnection');


Route::get('/seconnecter', function () {return view('login');})->name('seconnecter');
Route::post('/seconnecter',[ConnexionController :: class ,'Confirmeconnexion']);


Route::get('/categories',[CategorieController :: class ,'index'])->name('categories')->middleware('psession');
Route::post('/categories',[CategorieController :: class ,'store']);
Route::delete('/categories/{id}',[CategorieController :: class ,'destroy'])->name('categorieDestoy');
Route::get('/categories/{id}/edit',[CategorieController :: class ,'show'])->name('categorieShow');
Route::put('/categories/{id}',[CategorieController :: class ,'update'])->name('categorieupdate');


Route::get('/utilisateurs',[UtilisateurController :: class ,'index'])->name('utilisateurs')->middleware('psession');
Route::get('/utilisateurs/create',[UtilisateurController :: class ,'create'])->name('utilisateurCreate');
Route::post('/utilisateurs',[UtilisateurController :: class ,'store']);

Route::get('/utilisateurs/{id}/edit',[UtilisateurController :: class ,'edit'])->name('utilisateurShow');
Route::put('/utilisateurs/{id}',[UtilisateurController :: class ,'update'])->name('utilisateurupdate');
Route::put('/utilisateurs/{id}',[UtilisateurController :: class ,'updateActivate'])->name('utilisateurupdateactivate');

