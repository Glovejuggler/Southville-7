<?php

use App\Models\Loan;
use Inertia\Inertia;
use App\Models\Member;
use App\Models\Saving;
use App\Models\Payment;
use App\Models\Loanable;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ShareCapital;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoanableController;
use App\Http\Controllers\SubsidiaryController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\ShareCapitalController;

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

Route::get('/history', [PagesController::class, 'history'])->name('about.history');

Route::get('/board_of_directors', [PagesController::class, 'bod'])->name('about.bod');

Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');

Route::get('/coop_events', [PagesController::class, 'events'])->name('events');
Route::get('/event/view/{event}', [PagesController::class, 'event'])->name('viewevent');
Route::get('/event/archive', [PagesController::class, 'events_archive'])->name('archive');

Route::get('/stories', [PagesController::class, 'stories'])->name('stories');
Route::get('/story/{post}', [PagesController::class, 'post'])->name('story');

Route::get('/dashboard', function () {
    if (Gate::allows('isAdmin')) {
        return Inertia::render('Dashboard/Admin', [
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
        return Inertia::render('Dashboard/User', [
            'self' => Member::find(Auth::user()->member_id),
            'overdue_payments' => Payment::whereDate('month','<',now())
                                            ->where('payment','=',null)
                                            ->whereHas('loan', function($q) {
                                                $q->where('member_id',Auth::user()->member_id);
                                            })
                                            ->count(),
            'due_payments' => Payment::whereDate('month','=',now())
                                        ->where('payment','=', null)
                                        ->whereHas('loan', function($q) {
                                                $q->where('member_id',Auth::user()->member_id);
                                            })
                                        ->count(),
            'savings_transactions' => Saving::where('member_id', Auth::user()->member_id)->latest()->paginate(10),
            'share_transactions' => ShareCapital::where('member_id', Auth::user()->member_id)->latest()->paginate(10),
            'loan' => Loan::where('member_id','=',Auth::user()->member_id)->with('payments')->latest()->first(),
            'bal' => Loan::where('member_id','=',Auth::user()->member_id)->with('payments')->latest()->first()?->receivable - Loan::where('member_id','=',Auth::user()->member_id)->with('payments')->latest()->first()?->total_payments(),
            'history' => Loan::onlyTrashed()
                                ->where('member_id', Auth::user()->member_id)
                                ->get(),
            'loanables' => Loanable::where('requirement','<=',Auth()->user()->member->share_capital)->get(),
        ]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/settings', [UserController::class, 'settings'])->name('user.settings')->middleware(['auth']);

Route::get('/pass/check', [UserController::class, 'checkpass'])->name('pass.check')->middleware('auth');

Route::put('/settings/password/update', [UserController::class, 'changepassword'])->name('settings.update.password')->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::resource('members', MemberController::class);
    Route::get('member/view/{member}', [MemberController::class, 'view'])->name('member.view');
    Route::get('members/pdf/download/', [MemberController::class, 'download'])->name('members.pdf');

    Route::resource('roles', RoleController::class);

    Route::resource('loans', LoanController::class);
    Route::get('/loans/create/{member}', [LoanController::class, 'create'])->name('loans.create');
    Route::get('/loan/{id}/download/pdf', function($id) {
        $loan = Loan::onlyTrashed()->find($id);
        $data = [
            'member' => $loan->member,
            'loan' => $loan
        ];
        $pdf = Pdf::loadView('pdf.loan', $data);

        return $pdf->download('loan.pdf');
    })->name('pdf.download');

    Route::get('/share/{member}', [ShareCapitalController::class, 'create'])->name('share.capital');
    Route::post('/share/store', [ShareCapitalController::class, 'store'])->name('share_capital.store');

    Route::resource('loanables', LoanableController::class);

    Route::resource('savings', SavingController::class);
    Route::get('savings/create/{member}', [SavingController::class, 'create'])->name('savings.create');

    Route::resource('events', EventController::class);

    Route::resource('payment', PaymentController::class);

    Route::resource('files', FileController::class);
    Route::get('/download/{id}', [FileController::class, 'download'])->name('file.download');

    Route::post('/user/store/', [UserController::class, 'store'])->name('user.store');

    // Posts
    Route::get('/archive/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/archive/post/create/{id?}', [PostController::class, 'create'])->name('post.create');
    Route::post('/archive/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/archive/post/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/archive/post/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/archive/post/{post}/delete', [PostController::class, 'destroy'])->name('post.destroy');

    Route::resource('photo', PhotoController::class);

    // Beneficiary
    Route::post('/beneficiary/store', [BeneficiaryController::class, 'store'])->name('beneficiaries.store');
    Route::get('/member/{member}/beneficiaries', [BeneficiaryController::class, 'edit'])->name('beneficiaries.edit');
    Route::put('/beneficiary/{beneficiary}/update', [BeneficiaryController::class, 'update'])->name('beneficiaries.update');
    Route::delete('/beneficiary/{beneficiary}/delete', [BeneficiaryController::class, 'destroy'])->name('beneficiaries.destroy');
});

require __DIR__.'/auth.php';

