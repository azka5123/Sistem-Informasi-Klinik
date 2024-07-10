<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $roles = Role::whereIn('name', ['Pasien', 'Apoteker'])->get();
    $dataRoles = [
        'labels' => $roles->pluck('name'),
        'data' => $roles->map(function ($role) {
            return User::role($role->name)->count();
        }),
    ];

    $labelsTransactions = [];
    $dataTransactions = [];

    for ($i = 6; $i >= 0; $i--) {
        $date = Carbon::now()->subDays($i)->toDateString();
        $labelsTransactions[] = $date;

        $count = Transaction::whereDate('created_at', $date)->count();
        $dataTransactions[] = $count;
    }

    return view('dashboard', compact('dataRoles', 'labelsTransactions', 'dataTransactions'));
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('medicines', MedicineController::class);
    Route::resource('tindakans', TindakanController::class);
    Route::resource('transactions', TransactionController::class);
});

require __DIR__ . '/auth.php';
