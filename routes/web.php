<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () { return view('welcome');});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ------LocationController ------
Route::get('location/getdistrict/{id}', 'App\Http\Controllers\LocationController@getDistrict');
Route::get('location/getTumbol/{id}', 'App\Http\Controllers\LocationController@getTumbol');
Route::get('location/getVillage/{amp}/{tambol}', 'App\Http\Controllers\LocationController@getVillage');

// form
// Route::get('/form', function () { return view('form.form');});
// ------Forms ------
Route::get('form','App\Http\Controllers\FormsController@locationCR');
Route::POST('form/formsubmit', 'App\Http\Controllers\FormsController@formSubmit')->name('form.formsubmit');
Route::get('/edit/{weir_code}', 'App\Http\Controllers\DataSurveyController@formEdit');
Route::POST('form/formupdate', 'App\Http\Controllers\FormsController@formUpdate')->name('form.formupdata');
Route::POST('form/photosubmit', 'App\Http\Controllers\FormsController@photoSubmit')->name('form.photosubmit');
Route::POST('form/formexpert', 'App\Http\Controllers\FormsController@formexpert')->name('form.formexpert');


Route::get('/getdistrict/{id}', 'App\Http\Controllers\FormsController@getDistrict');
Route::get('/getTumbol/{id}', 'App\Http\Controllers\FormsController@getTumbol');
Route::get('/getVillage/{amp}/{tambol}', 'App\Http\Controllers\FormsController@getVillage');
Route::get('/expert/{weir_code}', 'App\Http\Controllers\DataSurveyController@getDatabyExpert')->name('expert');
// Route::get('/expert', function () {return view('form.expert');});


Route::get('/remove/{id}', 'App\Http\Controllers\FormsController@formDelete');


// Route::get('/', function () { return view('guest.index');})->name('form');
Route::get('/', 'App\Http\Controllers\DataSurveyController@getDataHomeTable');
Route::get('/test', 'App\Http\Controllers\DataSurveyController@getDataHomeTabletest')->name('data');
// Route::get('/list', function () { return view('form.list');})->name('list');
Route::get('/list', 'App\Http\Controllers\DataSurveyController@getDatatoTable')->name('list');
Route::get('/list/expert', 'App\Http\Controllers\DataSurveyController@getDatatoTableExpert')->name('expert.list');

// Map each Location 
Route::get('map/{id}', 'App\Http\Controllers\DataSurveyController@getDatabyWeir')->name('form.getDatabyWeir');

// data to Display
Route::get('form/getDataSurvey/{amp}', 'App\Http\Controllers\DataSurveyController@getDataSurvey')->name('form.getDataSurvey');
// data to Display Map Rid 
Route::get('form/getDataRidtranfer', 'App\Http\Controllers\OtherweirsController@getRid');
Route::get('form/getDataRidtranferNo', 'App\Http\Controllers\OtherweirsController@getRidNo');
Route::get('form/getDataDwr', 'App\Http\Controllers\OtherweirsController@getDwr');
Route::get('form/getDataLoyal', 'App\Http\Controllers\OtherweirsController@getloyal');
// Map each Location 
Route::get('map/{id}', 'App\Http\Controllers\DataSurveyController@getDatabyWeir')->name('form.getDatabyWeir');


// Photo in Home page 
Route::get('/photo/{id}', 'App\Http\Controllers\PhotoController@photoHome')->name('photo');
Route::get('/test/{id}', 'App\Http\Controllers\PhotoController@photoHometest')->name('phototest');

// report
Route::get('/pdf/{id}', 'App\Http\Controllers\ReportPDFController@pdf_index');
Route::get('/report/pdf/{id}', 'App\Http\Controllers\ReportPDFController@reportpdf_index');
Route::get('/report/amp/{amp}', 'App\Http\Controllers\ReportPDFController@reportOne_amp');

Route::POST('/report/scoreComposition/pdf', 'App\Http\Controllers\ReportPDFController@compositionWeir')->name('report.pdf');
Route::POST('/report/problemAmp/pdf', 'App\Http\Controllers\ReportPDFController@reportOne_amp')->name('reportOne_amp.pdf');
Route::POST('/report/sediment_upconcrete/pdf', 'App\Http\Controllers\ReportPDFController@sedimentUpconcrete')->name('sediment.pdf');

// Report Home 
// Route::get('/report/map', 'App\Http\Controllers\ReportPDFController@reportpdf_warning'); 
Route::get('/report/chart', 'App\Http\Controllers\ReportPDFController@reportpdf_warning');
Route::get('/report/scoreComposition', 'App\Http\Controllers\ReportPDFController@reportpdf_warning');
Route::get('/report/problem', 'App\Http\Controllers\ReportPDFController@reportpdf_warning');
Route::get('/report/sedimentTable', 'App\Http\Controllers\ReportPDFController@reportpdf_warning');

Route::get('/report/sediment', 'App\Http\Controllers\MapScoreController@sedimentscore');
Route::get('/report/sedimentTable', function () {return view('pages.sediment_table');});
Route::get('/report/map', 'App\Http\Controllers\MapScoreController@scoretable');
// Route::get('/report/chart', 'App\Http\Controllers\ChartReportController@score');
// Route::get('/report/scoreComposition', function () {return view('pages.scorelist');});
// Route::get('/report/problem', function () {return view('pages.problemlist');});


// add image
Route::get('addphoto/{id}', 'App\Http\Controllers\PhotoController@photoadd')->name('addphoto');
Route::get('photoremove/{id}', 'App\Http\Controllers\PhotoController@photoremove')->name('photoremove');
Route::get('photoremovemap/{id}', 'App\Http\Controllers\PhotoController@photoremovemap')->name('photoremovemap');

// Expert 
// Route::get('/expert/list', 'App\Http\Controllers\ListexpertController@getDatatoTable')->name('list');

// Table
Route::get('/tablescore', 'App\Http\Controllers\MapScoreController@compositionWeir');
Route::get('/score/{amp}/{class}', 'App\Http\Controllers\MapScoreController@score');
Route::get('/sedimentscore/{amp}/{class}', 'App\Http\Controllers\MapScoreController@sedimentscoreOnMap');


// score Map 

// Route::get('/report/map', function () {return view('scorereport.mapscore');});
// Route::get('/report/chart', function () {return view('scorereport.chart');});

Route::get('/report/chart_test', 'App\Http\Controllers\ChartReportController@score_test');



Route::get('/about', function () {return view('pages.about');});
Route::get('/contact', function () {return view('pages.contact');});
Route::get('/manual', function () {return view('pages.manual');});
Route::get('/project', function () {return view('pages.project');});
// Route::get('/project/1', function () {return view('pages.project_detail');});
Route::get('/project/{id} ', 'App\Http\Controllers\ProjectCaseController@case');



///// admin
Route::get('/admin/list', 'App\Http\Controllers\UsersController@getUser')->name('admin.list');
Route::get('/admin/register', function () {return view('admin.register');});
Route::get('/admin/edit/{id}', 'App\Http\Controllers\UsersController@getdetailUser');
Route::get('/admin/delete/{id}', 'App\Http\Controllers\UsersController@deleteUser');
Route::post('/admin/update', 'App\Http\Controllers\UsersController@updateUser')->name('users.updatedata');


// test
Route::get('/testpdf', 'App\Http\Controllers\ReportPDFController@testPDF');
Route::get('/testpdf/{id}', 'App\Http\Controllers\ReportPDFController@testPDF');

Route::get('/data', 'App\Http\Controllers\DataSurveyController@getData');
