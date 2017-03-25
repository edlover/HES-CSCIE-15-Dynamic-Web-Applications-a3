<?php

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

# Route for Laravel 5 Log Viewer (https://github.com/rap2hpoutre/laravel-log-viewer)
if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

# Route to display the Bill Splitter view
Route::get('/', 'BillSplitterController@show');

# Route to retrieve the data from the form and perform the calculations
Route::get('/calculate', 'BillSplitterController@calculate');
