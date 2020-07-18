<?php

use Illuminate\Support\Facades\Route;

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

# REVIEW ROTES
Route::get('/', 'ReviewController@show')->name('review.show');
Route::get('/revisoes/listar/concluidas', 'ReviewController@listCompletedSchedules')->name('review.schedule.completed');
Route::get('/agendar', 'ReviewController@viewSchedule')->name('review.schedule');
Route::post('/agendar/executar', 'ReviewController@store')->name('review.schedule.store');
Route::post('/revisao/completar', 'ReviewController@completeReview')->name('review.complete');

#DISCIPLINES ROTES
Route::get('/disciplinas', 'DisciplineController@viewDiscipline')->name('disciplines');
Route::post('/disciplinas/executar', 'DisciplineController@store')->name('disciplines.store');
