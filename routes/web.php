<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group Projectwhich
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function(){
    if (auth()->check()){
        return redirect()->route('home');
    }else{
        return redirect('login');
    }
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register','RegisterController@register')->name('register');
Route::post('/postRegister','RegisterController@postRegister')->name('postRegister');

Route::get('/project','ProjectController@Project')->name('project');
Route::get('/project/getReportProject','ProjectController@getReportProject')->name('report.getReportProject');
Route::get('/project/report','ProjectController@ProjectReport')->name('ProjectReport');
Route::post('/postProject','ProjectController@postProject')->name('postProject');

Route::get('/select-project/{id}','ProjectController@selectProject')->name('selectProject');
Route::get('/select-module/{id}','ProjectController@selectModul')->name('selectModul');

Route::get('/project/show/{id}','ReportController@show')->name('module.show');

Route::get('/module','ModuleController@Module')->name('module');
Route::get('/module/delete/{id}','ReportController@delete')->name('module.delete');
Route::post('/postModule','ModuleController@postModule')->name('postModule');

Route::get('/report','ReportController@Report')->name('report');
Route::get('/report/trash','ReportController@trashModule')->name('trashModule');
Route::get('/report/getReport','ReportController@getReport')->name('report.getReport');
Route::get('/report/getTrash','ReportController@getTrash')->name('report.getTrash');
Route::get('/report/restore/{id}','ReportController@restore')->name('report.restore');
Route::get('/report/deleted/{id}','ReportController@deleted')->name('report.deleted');
Route::post('/postReport','ReportController@postReport')->name('postReport');
Route::get('/report/show/{id}','ReportController@show')->name('report.show');
Route::post('/postCase','ReportController@Case')->name('postCase');


Route::get('/case','CaseController@Case')->name('case');
Route::get('/case/report','CaseController@reportcase')->name('case.reportcase');
Route::get('/report/getReportCase','CaseController@getReportCase')->name('report.getReportCase');
Route::get('/case/show/{id}','CaseController@show')->name('case.show');
Route::post('/postCase','CaseController@postCase')->name('postCase');
Route::get('/Case/delete/{id}','CaseController@delete')->name('Case.delete');
Route::get('/case/trash','CaseController@trash')->name('trashCase');
Route::get('/Case/getTrash','CaseController@getTrashCase')->name('Case.getTrash');
Route::get('/Case/restore/{id}','CaseController@restore')->name('Case.restore');
Route::get('/Case/deleted/{id}','CaseController@deleted')->name('Case.deleted');
Route::get('/Case/edit/{id}','CaseController@edit')->name('Case.edit');
Route::post('/Case/update/{id}','CaseController@update')->name('Case.update');









