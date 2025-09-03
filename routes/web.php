<?php


use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;




Route::get('/cmd',function(){
    Artisan::call('storage:link');
    Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Done';
});



Route::get('/', [WebsiteController::class, 'home'])->name('index');



// Auth::routes(['verify' => true]);




// Route::middleware(['auth', 'no.admin', 'verified'])->group(function () {
//     Route::get('/home', function () {
//         return view('home');
//     })->name('home');

//     Route::get('settings', [HomeController::class, 'settings'])->name('user.settings');
//     Route::get('profile', [HomeController::class, 'profile'])->name('user.profile');
//     Route::get('profile/edit', [HomeController::class, 'profileEdit'])->name('user.profile.edit');
//     Route::put('/profile/update', [HomeController::class, 'update'])->name('user.profile.update');
//     Route::get('password/edit', [HomeController::class, 'passwordEdit'])->name('user.password.edit');
//     Route::post('/password-update', [HomeController::class, 'updatePassword'])->name('user.password.update');
// });



// Admin Auth
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')
    // ->middleware(['auth:admin', 'admin.only', 'role:super-admin'])
    ->middleware(['auth:admin', 'admin.only', 'admin.has.role'])
    ->name('admin.')
    ->group(function () {


        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/profile/settings', [AdminProfileController::class, 'settings'])->name('profile.settings');
        Route::put('/profile/settings', [AdminProfileController::class, 'updateSettings'])->name('profile.settings.update');

        Route::get('/change-password', [AdminProfileController::class, 'changePassword'])->name('change.password');
        Route::put('/change-password', [AdminProfileController::class, 'updatePassword'])->name('change.password.update');


        Route::resource('settings', SettingController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);


        // Package
        Route::resource('packages',PackageController::class);

        // Teacher
        Route::resource('teachers',TeacherController::class);

        // Student
        Route::resource('students',StudentController::class);

        // expense
        Route::resource('expenses',ExpenseController::class);

        // Admission
        Route::resource('admissions',AdmissionController::class);


        // Schedule
        Route::resource('schedule',ScheduleController::class);


        // Attendance
        Route::resource('attendance',AttendanceController::class);


        // Course
        Route::resource('course-complete',CourseController::class);

        // Report
        Route::resource('reports',ReportController::class);



    });


// php artisan migrate:refresh --path=database/migrations/2025_05_12_061213_create_dps_members_table.php
