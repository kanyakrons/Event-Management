<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CertificateController;
use App\Models\Application;
use App\Http\Controllers\OrganizerController;
use App\Models\Certificate;
use Illuminate\Support\Facades\Route;


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
    if (auth()->check()) {
        if (auth()->user()->role === 'OFFICER') {
            return redirect('/budgets');
        }
        return redirect('/events');
    } else {
        return redirect('/events');
    }
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'uploadImage'])->name('profile.uploadImage');
    });

Route::middleware(['can:viewRegistered,App\Models\Event'])->group(function () {
    Route::get('/registered', [HistoryController::class, 'register'])->name("historys.register");
    Route::get('/registered/{event}', [HistoryController::class, 'registerDetail'])->name("historys.registerDetail");
});

Route::middleware(['can:viewAny,App\Models\Certificate'])->group(function () {
    Route::get('/certificate', [HistoryController::class, 'certificate'])->name("historys.certificate");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/events', [EventController::class, 'index'])->name("event");
Route::get('/myevents/{event}/details', [EventController::class, 'getDetails'])->name("myevents.details");
Route::get('/myevents/{event}/applicants', [EventController::class, 'applicants'])->name('myevents.applicants');

Route::get('/myevents', [EventController::class, 'myEvent'])->name("myevents");
Route::get('/myevents/create-event', [EventController::class, 'createEvent'])->name("myevents.create-event");
Route::get('/myevents/edit-event', [EventController::class, 'editEvent'])->name("myevents.edit-event");
Route::post('/myevents/getDistrict', [EventController::class, 'getDistrict'])->name("myevents.getDistrict");
Route::post('/myevents/getSubdistrict', [EventController::class, 'getSubdistrict'])->name("myevents.getSubdistrict");
Route::post('/myevents/storeEvent', [EventController::class, 'storeEvent'])->name("myevents.storeEvent");
Route::post('/myevents/updateEvent', [EventController::class, 'updateEvent'])->name("myevents.updateEvent");
Route::delete('/myevents/deleteEvent', [EventController::class, 'removeEvent'])->name("myevents.deleteEvent");

Route::get('/myevents/{event}/boards',[EventController::class, 'boards'])->name("myevents.boards");


Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::middleware(['can:apply,event'])->group(function () {
    Route::get('/events/{event}/application', [ApplicationController::class, 'form'])->name('application.form');
    Route::post('/events/{event}/application', [ApplicationController::class, 'store'])->name('application.store');
});

Route::get('/myorgs', [OrganizerController::class, 'myOrg'])->name("myorgs.myorgs");
Route::get('/myorgs/create-orgs', [OrganizerController::class, 'createOrgs'])->name("myorgs.create-orgs");
Route::post('/myorgs/storeOrgs', [OrganizerController::class, 'storeOrg'])->name("myorgs.storeOrgs");
Route::get('/myorgs/edit-orgs', [OrganizerController::class, 'editOrgs'])->name("myorgs.edit-orgs");
Route::post('/myorgs/updateOrgs', [OrganizerController::class, 'updateOrg'])->name("myorgs.updateOrgs");
Route::post('/myorgs/addmember', [OrganizerController::class, 'addMember'])->name("myorgs.orgs-member");

Route::middleware(['can:manageEvent,App\Models\Organizer'])->group(function () {
    Route::get('/myevents', [EventController::class, 'myEvent'])->name("myevents");

    Route::get('/myevents/create-event', [EventController::class, 'createEvent'])->name("myevents.create-event");
    Route::post('/myevents/getDistrict', [EventController::class, 'getDistrict'])->name("myevents.getDistrict");
    Route::post('/myevents/getSubdistrict', [EventController::class, 'getSubdistrict'])->name("myevents.getSubdistrict");
    Route::post('/myevents/storeEvent', [EventController::class, 'storeEvent'])->name("myevents.storeEvent");

    Route::get('/myevents/{event}/details', [EventController::class, 'getDetails'])->name("myevents.details");
    Route::get('/myevents/{event}/applicants', [EventController::class, 'applicants'])->name('myevents.applicants');
    Route::get('/myevents/{event}/applicants/{applicant}/verify', [ApplicationController::class, 'verify'])->name("application.verify");
    Route::post('/applicants/{applicant}/update', [ApplicationController::class, 'update'])->name("application.update");

    Route::get('/myevents/{event}/boards',[EventController::class, 'boards'])->name("myevents.boards");
    Route::get('/myevents/{event}/boards/create-postit',[EventController::class, 'addPostit'])->name("myevents.create-postit");
    Route::post('/myevents/{event}/boards/storePostit', [EventController::class, 'storePostit'])->name("myevents.storePostit");
    Route::put('/myevents//{event}/boards/update-postit', [EventController::class, 'updatePostit'])->name("myevents.updatePostit");
    Route::delete('/myevents/{event}/boards/destroy', [EventController::class, 'delete_postit'])->name("myevents.delete_postit");

    Route::get('/myevents/certificate', [CertificateController::class, 'index'])->name('myevents.certificate');
    Route::post('/myevents/certificate', [CertificateController::class, 'uploadImage'])->name('myevents.uploadImage');
});

//Route::get('/boards', [BoardController::class,'index'])->name("board");
// Route::get('/teams', [TeamController::class, 'index'])->name("team");
Route::get('/boards/teams', [BoardController::class, 'viewTeamBoard'])->name("board.team");

Route::middleware(['can:viewAny,App\Models\Budget'])->group(function () {
    Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/budgets/{budget}', [BudgetController::class, 'show'])->name('budgets.show');
    Route::put('/budgets/{budget}/update-status', [BudgetController::class, 'updateStatus'])->name('budgets.update-status');
});

;
require __DIR__.'/auth.php';
