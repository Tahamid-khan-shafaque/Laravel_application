<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\FormController;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\DisplayController;
 use App\Http\Controllers\DataController;

use Illuminate\Support\Facades\DB;

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
    return view('auth.login');
});

route::get('/home',[HomeController::class,'index'])->name('home');


#form
Route::get('/form', function () {
    return view('form');
});

// Route to handle form submission
Route::post('/submit-form', [FormController::class, 'submit'])->name('submit-form');
#11.09.2023 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
#11.09.2023 

// Route to handle form submission
Route::post('/submit-form', [FormController::class, 'submit'])->name('submit-form');

// Route for success page
Route::get('/success', function () {
    return view('success');
})->name('success');
#seee

#anther route for anchortag
Route::get('display-data', function () {
    return view('data-display');
})->name('display');
#anther route for anchortag
#----------------------today task

Route::get('/view/{id}', [FormController::class, 'viewForm'])->name('view-form');

Route::get('/download-pdf/{id}', function ($id) {
    // Retrieve the form data based on the provided ID
    $formData = DB::table('form_data')->where('id', $id)->first();

    // Generate the PDF using the retrieved data
    $pdf = PDF::loadView('view', compact('formData'));

    // Set the file name for the downloaded PDF
    $fileName = 'user_details.pdf';

    // Return the PDF file as a download
    return $pdf->download($fileName);
})->name('download-pdf');
//demo
Route::get('/forms/download/{id}', [FormController::class, 'download'])->name('forms.download');
#----------------------today task
Route::get('form', [UserController::class, 'addUser'])->name('form');
#display data

Route::get('/display-data', [FormController::class, 'displayData'])->name('display-data');
#---------part 2 : display data



// Route for displaying the insert form
Route::get('/insert', function () {
    return view('insert');
});

// Route for handling the form submission
Route::post('/insert', [DataController::class, 'insertData'])->name('insertData');

// Route for displaying the data
Route::get('/show', [DataController::class, 'showData'])->name('showData');

#__________________________________________________needed
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';






