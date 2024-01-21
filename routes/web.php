<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ProjectsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('members', MembersController::class);

Route::resource('teams', TeamsController::class);

Route::resource('projects', ProjectsController::class);

Route::put('/members/{member}/update-team', [MembersController::class, 'updateTeam']);

Route::get('/teams/{team}/members', [TeamsController::class, 'getMembers']);

Route::get('/projects/{project}/members', [ProjectsController::class, 'getMembers'])->name('projects.members');;

Route::post('/projects/{project}/add-member', [ProjectsController::class, 'addMember'])->name('projects.add-member');



