<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Member;
use App\Http\Livewire\Branch;
use App\Http\Livewire\Package;
use App\Http\Livewire\Tracking;
// use App\Http\Livewire\Convert;

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

// Route::group(['middleware' =>
//     'verified',
//     'accessrole',
// ]);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/member', Member::class);

Route::get('/branch', Branch::class);

Route::get('/package', Package::class);

Route::get('/tracking', Tracking::class);

Route::get('/livewire.converter', function () {
    return view('livewire.converter');
});

// Route::get('//user', User::class);

