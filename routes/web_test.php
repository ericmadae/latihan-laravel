<?php

use App\Mail\SendMail;

use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;


use App\Models\MasterKelas;
use App\Mail\TestKirimEmail;
use Illuminate\Http\Request;
use App\Http\Middleware\FilterUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Process;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JalankanJobController;
use App\Http\Controllers\MasterKelasController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class Web
{
    public $nama = "ahmad";
    public $usia = 24;
}

Route::get('/', function () {
    $type_string = "string harus pake kutip";
    $type_integer = 1;
    $type_array = ["a", 1, 2, false];
    $type_object_array = ["nama" => "andi", "kelas" => "10"];
    $web = new Web();
    $type_object_class = $web->nama;
    dd($type_string, $type_integer, $type_array, $type_object_array, $type_object_class);
});
Route::get('web-class', function (Web $web) {
    $result = Process::run('ls -la');
    return $result->output();
});
Route::controller(FileUploadController::class)->group(function () {
    Route::get('/file-upload', 'index')->name('fileupload.index');
    Route::post('/file-upload', 'store')->name('fileupload.store');
    Route::delete('/file-upload/{gallery}', 'delete')->name('fileupload.delete');
});

Route::get('/tests', JalankanJobController::class);

Route::get('/tests/event', function () {
    $data = [
        "test" => "hello",
        "123" => "test"
    ];
    event('test.event', $data);
    return "success";
});

Route::get('/sendemail', function () {
    Mail::send(new SendMail());
    // return "success";
    // return new SendMail()->render();
    return "success";
});


Route::get('/kirim-email', function () {
    Mail::raw('Ini email test dari Laravel via Gmail SMTP', function ($message) {
        $message
            ->from('ericelhuda.dev@email.com', "Laravel")
            ->to('ericelhuda@email.com')
            ->subject('Saya Coba Hubungi');
    });

    return 'Email dikirim!';
});

Route::get('/email/verify', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware('auth')->name('verification.notice');



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');

    Route::get('/registrasi', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/registrasi', [RegisterController::class, 'store'])->name('register.store');

});

Route::get('dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('auth');


Route::middleware('auth')->group(function () {

    Route::controller(FirstController::class)->group(function () {
        Route::get('/first', 'index');
    });

    Route::controller(SecondController::class)->group(function () {
        Route::get('/second', 'index');
    });

    Route::resource('post', PostController::class)->except('update');
    Route::middleware('can:update,post')->resource('post', PostController::class)->only('update');
});


Route::get('logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/guru-siswa', function () {
    return "hello guru";
})->middleware([FilterUser::class]);



Route::get('siswa/{id}', function ($id) {
    return "siswa id $id";

})->name('siswa.detail');

Route::get('/sapa/{nama}', function ($siswa) { // nama="andi, $siswa = "andi"
    return "hello $siswa";
});

Route::get('sekolah', function () {
    return view('sekolah', ["name" => "eric"]);
});


Route::get('/siswa', function () {
    $list_siswa = [
        [
            "id" => 1,
            "name" => "eric",
            "kelas" => "10",
        ],
        [
            "id" => 1,
            "name" => "andi",
            "kelas" => "10",
        ],
        [
            "id" => 1,
            "name" => "santos",
            "kelas" => "10",
        ],
    ];

    return view('siswa', ["list_siswa_aktif" => $list_siswa]);
})->name('siswa');


Route::controller(SiswaController::class)->group(function () {
    Route::get('siswa-controller', 'index')->name('siswa.index');
    Route::post('siswa-controller', 'store')->name('siswa.store');
    Route::get('siswa-controller/create', 'formAdd');
    Route::get('siswa-controller/{id}', 'edit')->name('edit.siswa');
    Route::put('edit-siswa/{id}', 'update')->name('edit.siswa');
    Route::delete('siswa/{id}', 'destroy')->name('delete.siswa');
});

Route::resource('kelas', MasterKelasController::class);

Route::get('blade-templating/{id}', function ($id) {
    return view('blade-templating', ['data' => "hello world", 'id' => $id]);
});

Route::resource('guru', GuruController::class);

Route::get('home', function () {
    return view('pages.home.index');
})->name('home.index');
Route::get('profile', function () {
    return view('pages.profile.index');
})->name('profile.index');

Route::get('about', function () {
    return view('pages.about.index');
})->name('about.index');

Route::get('about', function () {
    return view('component.layout');
})->name('about.index');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware(['auth'])->get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->name('verification.send');

Route::get('kirim-email-saya', function () {
    Mail::mailer('smtpbrevo')->send(new TestKirimEmail());
    return "success";
});

Route::get('kirim-email-invoice', function () {
    Mail::send(new InvoiceMail());
    return "success";
});