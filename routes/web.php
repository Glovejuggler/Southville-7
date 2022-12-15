<?php

use App\Models\Loan;
use Inertia\Inertia;
use App\Models\Member;
use App\Models\Payment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoanableController;
use App\Http\Controllers\SubsidiaryController;

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

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/policy', function () {
    return view('pages.privacy_policy');
})->name('policy');

Route::get('/terms', function () {
    return view('pages.tac');
})->name('tac');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/about/vm', [PagesController::class, 'vm'])->name('about.vm');

Route::get('/board_of_directors', [PagesController::class, 'bod'])->name('about.bod');

Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');

Route::get('/coop_events', [PagesController::class, 'events'])->name('events');
Route::get('/event/archive/{post}', [PagesController::class, 'post'])->name('archive');

Route::get('/dashboard', function () {
    if (Gate::allows('isAdmin')) {
        return Inertia::render('Dashboard', [
            'members' => Member::all()->count(),
            'active_loans' => Loan::all()->count(),
            'overdue_payments' => Payment::whereDate('month','<',now())
                                            ->where('payment','=',null)
                                            ->count(),
            'due_payments' => Payment::whereDate('month','=',now())
                                        ->where('payment','=', null)
                                        ->count()
        ]);
    } else {
        dd('pepega lmao');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('clients', ClientController::class);
Route::get('client/view/{client}', [ClientController::class, 'view'])->name('client.view');

Route::resource('members', MemberController::class);
Route::get('member/view/{member}', [MemberController::class, 'view'])->name('member.view');

Route::resource('loans', LoanController::class);
Route::get('/loans/create/{id}', [LoanController::class, 'create'])->name('loans.create');

Route::resource('loanables', LoanableController::class);

Route::resource('savings', SavingController::class);
Route::get('savings/create/{id}', [SavingController::class, 'create'])->name('savings.create');

Route::resource('events', EventController::class);

Route::resource('payment', PaymentController::class);

Route::resource('files', FileController::class);

Route::get('/download/{id}', [FileController::class, 'download'])->name('file.download');

Route::post('/user/store/{member}', [UserController::class, 'store'])->name('user.store');

Route::get('/archive/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/archive/post/create/{id?}', [PostController::class, 'create'])->name('post.create');
Route::post('/archive/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/archive/post/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/archive/post/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('/archive/post/{post}/delete', [PostController::class, 'destroy'])->name('post.destroy');

Route::resource('photo', PhotoController::class);

require __DIR__.'/auth.php';

