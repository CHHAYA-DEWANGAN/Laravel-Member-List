<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MemberController::class, 'index']);
Route::post('/members', [MemberController::class, 'store'])->name('members.store');


Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Database connection is successful!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});







