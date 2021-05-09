 <?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\EventController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('full-calendar', [FullCalendarController::class, 'index']);
Route::get('load-events', [EventController::class, 'loadEvents'])->name('routeLoadEvents');
Route::put('/event-update',[EventController::class, 'update'])->name('routeEventUpdate');
Route::post('/event-store',[EventController::class, 'store'])->name('routeEventStore');
Route::delete('/event-delete',[EventController::class, 'destroy'])->name('routeEventDelete');
Route::delete('/fast-event-delete',[FastEventController::class, 'destroy'])->name('routeFastEventDelete');




