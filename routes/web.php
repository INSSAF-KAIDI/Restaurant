<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\ExpenseReportsController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainersController;
use App\Http\Controllers\TrainingTypeController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Ligne_AchatController;
use App\Http\Controllers\AlimentaireController;
use App\Http\Controllers\SizeAlimentaireController;
use App\Http\Controllers\PersonalInformationController;


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

/** for side bar menu active */
use App\Models\MenuItem;

function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    // Récupérez les éléments de menu
    $menuItems = MenuItem::all();

    // Passez les éléments de menu à la vue 'welcome'
    return view('homepage', compact('menuItems'));
});




Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });

});

Auth::routes();
use App\Http\Controllers\FoodDetailController;

Route::get('/food-detail', [FoodDetailController::class, 'show'])->name('food_detail');
Route::post('/add-to-cart', [FoodDetailController::class, 'addToCart'])->name('add_to_cart');

// ----------------------------- main dashboard ------------------------------//
    Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('em/dashboard','emDashboard')->name('em/dashboard');
});

// -----------------------------settings----------------------------------------//
    Route::controller(SettingController::class)->group(function () {
    Route::get('company/settings/page', 'companySettings')->middleware('auth')->name('company/settings/page');
    Route::get('roles/permissions/page', 'rolesPermissions')->middleware('auth')->name('roles/permissions/page');
    Route::post('roles/permissions/save', 'addRecord')->middleware('auth')->name('roles/permissions/save');
    Route::post('roles/permissions/update', 'editRolesPermissions')->middleware('auth')->name('roles/permissions/update');
    Route::post('roles/permissions/delete', 'deleteRolesPermissions')->middleware('auth')->name('roles/permissions/delete');
});

// -----------------------------login----------------------------------------//
    Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->name('logout');

Route::get('logout', [LoginController::class,'logout']);
});

// ----------------------------- lock screen --------------------------------//
    Route::controller(LockScreen::class)->group(function () {
    Route::get('lock_screen','lockScreen')->middleware('auth')->name('lock_screen');
    Route::post('unlock', 'unlock')->name('unlock');
});

// ------------------------------ register ---------------------------------//
    Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');
});

// ----------------------------- forget password ----------------------------//
    Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'getEmail')->name('forget-password');
    Route::post('forget-password', 'postEmail')->name('forget-password');
});

// ----------------------------- reset password -----------------------------//
    Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'getPassword');
    Route::post('reset-password', 'updatePassword');
});

// ----------------------------- user profile ------------------------------//
    Route::controller(UserManagementController::class)->group(function () {
    Route::get('profile_user', 'profile')->middleware('auth')->name('profile_user');
    Route::post('profile/information/save', 'profileInformation')->name('profile/information/save');
});

// ----------------------------- user userManagement -----------------------//
    Route::controller(UserManagementController::class)->group(function () {
    Route::get('userManagement', 'index')->middleware('auth')->name('userManagement');
    Route::post('user/add/save', 'addNewUserSave')->name('user/add/save');
    Route::post('search/user/list', 'searchUser')->name('search/user/list');
    Route::post('update', 'update')->name('update');
    Route::post('user/delete', 'delete')->middleware('auth')->name('user/delete');
    Route::get('activity/log', 'activityLog')->middleware('auth')->name('activity/log');
    Route::get('activity/login/logout', 'activityLogInLogOut')->middleware('auth')->name('activity/login/logout');
});

// ----------------------------- search user management ------------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::post('search/user/list', 'searchUser')->name('search/user/list');
});

// ----------------------------- form change password ------------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('change/password', 'changePasswordView')->middleware('auth')->name('change/password');
    Route::post('change/password/db', 'changePasswordDB')->name('change/password/db');
});

// ----------------------------- job ------------------------------//
Route::controller(JobController::class)->group(function () {
    Route::get('form/job/list','jobList')->name('form/job/list');
    Route::get('form/job/view/{id}', 'jobView');
    Route::get('user/dashboard/index', 'userDashboard')->middleware('auth')->name('user/dashboard/index');
    Route::get('jobs/dashboard/index', 'jobsDashboard')->middleware('auth')->name('jobs/dashboard/index');
    Route::get('user/dashboard/all', 'userDashboardAll')->middleware('auth')->name('user/dashboard/all');
    Route::get('user/dashboard/save', 'userDashboardSave')->middleware('auth')->name('user/dashboard/save');
    Route::get('user/dashboard/applied/jobs', 'userDashboardApplied')->middleware('auth')->name('user/dashboard/applied/jobs');
    Route::get('user/dashboard/interviewing', 'userDashboardInterviewing')->middleware('auth')->name('user/dashboard/interviewing');
    Route::get('user/dashboard/offered/jobs', 'userDashboardOffered')->middleware('auth')->name('user/dashboard/offered/jobs');
    Route::get('user/dashboard/visited/jobs', 'userDashboardVisited')->middleware('auth')->name('user/dashboard/visited/jobs');
    Route::get('user/dashboard/archived/jobs', 'userDashboardArchived')->middleware('auth')->name('user/dashboard/archived/jobs');
    Route::get('jobs', 'Jobs')->middleware('auth')->name('jobs');
    Route::get('job/applicants/{job_title}', 'jobApplicants')->middleware('auth');
    Route::get('job/details/{id}', 'jobDetails')->middleware('auth');
    Route::get('cv/download/{id}', 'downloadCV')->middleware('auth');

    Route::post('form/jobs/save', 'JobsSaveRecord')->name('form/jobs/save');
    Route::post('form/apply/job/save', 'applyJobSaveRecord')->name('form/apply/job/save');
    Route::post('form/apply/job/update', 'applyJobUpdateRecord')->name('form/apply/job/update');

    Route::get('page/manage/resumes', 'manageResumesIndex')->middleware('auth')->name('page/manage/resumes');
    Route::get('page/shortlist/candidates', 'shortlistCandidatesIndex')->middleware('auth')->name('page/shortlist/candidates');
    Route::get('page/interview/questions', 'interviewQuestionsIndex')->middleware('auth')->name('page/interview/questions'); // view page
    Route::post('save/category', 'categorySave')->name('save/category'); // save record category
    Route::post('save/questions', 'questionSave')->name('save/questions'); // save record questions
    Route::post('questions/update', 'questionsUpdate')->name('questions/update'); // update question
    Route::post('questions/delete', 'questionsDelete')->middleware('auth')->name('questions/delete'); // delete question
    Route::get('page/offer/approvals', 'offerApprovalsIndex')->middleware('auth')->name('page/offer/approvals');
    Route::get('page/experience/level', 'experienceLevelIndex')->middleware('auth')->name('page/experience/level');
    Route::get('page/candidates', 'candidatesIndex')->middleware('auth')->name('page/candidates');
    Route::get('page/schedule/timing', 'scheduleTimingIndex')->middleware('auth')->name('page/schedule/timing');
    Route::get('page/aptitude/result', 'aptituderesultIndex')->middleware('auth')->name('page/aptitude/result');

});

// ----------------------------- form employee ------------------------------//
Route::controller(EmployeeController::class)->group(function () {
    Route::get('all/employee/card', 'cardAllEmployee')->middleware('auth')->name('all/employee/card');
    Route::get('all/employee/list', 'listAllEmployee')->middleware('auth')->name('all/employee/list');
    Route::post('all/employee/save', 'saveRecord')->middleware('auth')->name('all/employee/save');
    Route::get('all/employee/view/edit/{employee_id}', 'viewRecord');
    Route::post('all/employee/update', 'updateRecord')->middleware('auth')->name('all/employee/update');
    Route::get('all/employee/delete/{employee_id}', 'deleteRecord')->middleware('auth');
    Route::post('all/employee/search', 'employeeSearch')->name('all/employee/search');
    Route::post('all/employee/list/search', 'employeeListSearch')->name('all/employee/list/search');

    Route::get('form/departments/page', 'index')->middleware('auth')->name('form/departments/page');
    Route::post('form/departments/save', 'saveRecordDepartment')->middleware('auth')->name('form/departments/save');
    Route::post('form/department/update', 'updateRecordDepartment')->middleware('auth')->name('form/department/update');
    Route::post('form/department/delete', 'deleteRecordDepartment')->middleware('auth')->name('form/department/delete');

    Route::get('form/designations/page', 'designationsIndex')->middleware('auth')->name('form/designations/page');
    Route::post('form/designations/save', 'saveRecordDesignations')->middleware('auth')->name('form/designations/save');
    Route::post('form/designations/update', 'updateRecordDesignations')->middleware('auth')->name('form/designations/update');
    Route::post('form/designations/delete', 'deleteRecordDesignations')->middleware('auth')->name('form/designations/delete');

    Route::get('form/timesheet/page', 'timeSheetIndex')->middleware('auth')->name('form/timesheet/page');
    Route::post('form/timesheet/save', 'saveRecordTimeSheets')->middleware('auth')->name('form/timesheet/save');
    Route::post('form/timesheet/update', 'updateRecordTimeSheets')->middleware('auth')->name('form/timesheet/update');
    Route::post('form/timesheet/delete', 'deleteRecordTimeSheets')->middleware('auth')->name('form/timesheet/delete');

    Route::get('form/overtime/page', 'overTimeIndex')->middleware('auth')->name('form/overtime/page');
    Route::post('form/overtime/save', 'saveRecordOverTime')->middleware('auth')->name('form/overtime/save');
    Route::post('form/overtime/update', 'updateRecordOverTime')->middleware('auth')->name('form/overtime/update');
    Route::post('form/overtime/delete', 'deleteRecordOverTime')->middleware('auth')->name('form/overtime/delete');
});

// ----------------------------- profile employee ------------------------------//
Route::controller(EmployeeController::class)->group(function () {
    Route::get('employee/profile/{user_id}', 'profileEmployee')->middleware('auth');
});

// ----------------------------- form holiday ------------------------------//
Route::controller(HolidayController::class)->group(function () {
    Route::get('form/holidays/new', 'holiday')->middleware('auth')->name('form/holidays/new');
    Route::post('form/holidays/save', 'saveRecord')->middleware('auth')->name('form/holidays/save');
    Route::post('form/holidays/update', 'updateRecord')->middleware('auth')->name('form/holidays/update');
});

// ----------------------------- form leaves ------------------------------//
Route::controller(LeavesController::class)->group(function () {
    Route::get('form/leaves/new', 'leaves')->middleware('auth')->name('form/leaves/new');
    Route::get('form/leavesemployee/new', 'leavesEmployee')->middleware('auth')->name('form/leavesemployee/new');
    Route::post('form/leaves/save', 'saveRecord')->middleware('auth')->name('form/leaves/save');
    Route::post('form/leaves/edit', 'editRecordLeave')->middleware('auth')->name('form/leaves/edit');
    Route::post('form/leaves/edit/delete','deleteLeave')->middleware('auth')->name('form/leaves/edit/delete');
});

// ----------------------------- form attendance  ------------------------------//
Route::controller(LeavesController::class)->group(function () {
    Route::get('form/leavesettings/page', 'leaveSettings')->middleware('auth')->name('form/leavesettings/page');
    Route::get('attendance/page', 'attendanceIndex')->middleware('auth')->name('attendance/page');
    Route::get('attendance/employee/page', 'AttendanceEmployee')->middleware('auth')->name('attendance/employee/page');
    Route::get('form/shiftscheduling/page', 'shiftScheduLing')->middleware('auth')->name('form/shiftscheduling/page');
    Route::get('form/shiftlist/page', 'shiftList')->middleware('auth')->name('form/shiftlist/page');
});

// ----------------------------- form payroll  ------------------------------//
Route::controller(PayrollController::class)->group(function () {
    Route::get('form/salary/page', 'salary')->middleware('auth')->name('form/salary/page');
    Route::post('form/salary/save','saveRecord')->middleware('auth')->name('form/salary/save');
    Route::post('form/salary/update', 'updateRecord')->middleware('auth')->name('form/salary/update');
    Route::post('form/salary/delete', 'deleteRecord')->middleware('auth')->name('form/salary/delete');
    Route::get('form/salary/view/{user_id}', 'salaryView')->middleware('auth');
    Route::get('form/payroll/items', 'payrollItems')->middleware('auth')->name('form/payroll/items');
});

// ----------------------------- reports  ------------------------------//
Route::controller(ExpenseReportsController::class)->group(function () {
    Route::get('form/expense/reports/page', 'index')->middleware('auth')->name('form/expense/reports/page');
    Route::get('form/invoice/reports/page', 'invoiceReports')->middleware('auth')->name('form/invoice/reports/page');
    Route::get('form/daily/reports/page', 'dailyReport')->middleware('auth')->name('form/daily/reports/page');
    Route::get('form/leave/reports/page','leaveReport')->middleware('auth')->name('form/leave/reports/page');
});

// ----------------------------- performance  ------------------------------//
Route::controller(PerformanceController::class)->group(function () {
    Route::get('form/performance/indicator/page','index')->middleware('auth')->name('form/performance/indicator/page');
    Route::get('form/performance/page', 'performance')->middleware('auth')->name('form/performance/page');
    Route::get('form/performance/appraisal/page', 'performanceAppraisal')->middleware('auth')->name('form/performance/appraisal/page');
    Route::post('form/performance/indicator/save','saveRecordIndicator')->middleware('auth')->name('form/performance/indicator/save');
    Route::post('form/performance/indicator/delete','deleteIndicator')->middleware('auth')->name('form/performance/indicator/delete');
    Route::post('form/performance/indicator/update', 'updateIndicator')->middleware('auth')->name('form/performance/indicator/update');
    Route::post('form/performance/appraisal/save', 'saveRecordAppraisal')->middleware('auth')->name('form/performance/appraisal/save');
    Route::post('form/performance/appraisal/update', 'updateAppraisal')->middleware('auth')->name('form/performance/appraisal/update');
    Route::post('form/performance/appraisal/delete', 'deleteAppraisal')->middleware('auth')->name('form/performance/appraisal/delete');
});

// ----------------------------- training  ------------------------------//
Route::controller(TrainingController::class)->group(function () {
    Route::get('form/training/list/page','index')->middleware('auth')->name('form/training/list/page');
    Route::post('form/training/save', 'addNewTraining')->middleware('auth')->name('form/training/save');
    Route::post('form/training/delete', 'deleteTraining')->middleware('auth')->name('form/training/delete');
    Route::post('form/training/update', 'updateTraining')->middleware('auth')->name('form/training/update');
});

// ----------------------------- trainers  ------------------------------//
Route::controller(TrainersController::class)->group(function () {
    Route::get('form/trainers/list/page', 'index')->middleware('auth')->name('form/trainers/list/page');
    Route::post('form/trainers/save', 'saveRecord')->middleware('auth')->name('form/trainers/save');
    Route::post('form/trainers/update', 'updateRecord')->middleware('auth')->name('form/trainers/update');
    Route::post('form/trainers/delete', 'deleteRecord')->middleware('auth')->name('form/trainers/delete');
});

// ----------------------------- training type  ------------------------------//
Route::controller(TrainingTypeController::class)->group(function () {
    Route::get('form/training/type/list/page', 'index')->middleware('auth')->name('form/training/type/list/page');
    Route::post('form/training/type/save', 'saveRecord')->middleware('auth')->name('form/training/type/save');
    Route::post('form//training/type/update', 'updateRecord')->middleware('auth')->name('form//training/type/update');
    Route::post('form//training/type/delete', 'deleteTrainingType')->middleware('auth')->name('form//training/type/delete');
});

// ----------------------------- sales  ------------------------------//
// Route::controller(SalesController::class)->group(function () {

//     // -------------------- estimate  -------------------//
//     Route::get('form/estimates/page', 'estimatesIndex')->middleware('auth')->name('form/estimates/page');
//     Route::get('create/estimate/page', 'createEstimateIndex')->middleware('auth')->name('create/estimate/page');
//     Route::get('edit/estimate/{estimate_number}', 'editEstimateIndex')->middleware('auth');
//     Route::get('estimate/view/{estimate_number}', 'viewEstimateIndex')->middleware('auth');

//     Route::post('create/estimate/save', 'createEstimateSaveRecord')->middleware('auth')->name('create/estimate/save');
//     Route::post('create/estimate/update', 'EstimateUpdateRecord')->middleware('auth')->name('create/estimate/update');
//     Route::post('estimate_add/delete', 'EstimateAddDeleteRecord')->middleware('auth')->name('estimate_add/delete');
//     Route::post('estimate/delete', 'EstimateDeleteRecord')->middleware('auth')->name('estimate/delete');
    // ---------------------- payments  ---------------//
    Route::controller(CommandeController::class)->group(function () {
        Route::get('commande', 'index')->name('commande.index');
        Route::get('commande/create', 'create')->name('commande.create');
        Route::post('commande/store', 'store')->name('commande.store');
        Route::get('commande/{commande}/edit', 'edit')->name('commande.edit');
        Route::put('commande/{commande}', 'update')->name('commande.update');
        Route::delete('commande/{commande}', 'destroy')->name('commande.destroy');

    });

    Route::controller(ReservationController::class)->group(function () {
        Route::get('reservation', 'index')->name('reservation.index');
        Route::get('reservation/create', 'create')->name('reservation.create');
        Route::post('reservation/store', 'store')->name('reservation.store');
        Route::get('reservation/{reservation}/edit', 'edit')->name('reservation.edit');
        Route::put('reservation/{reservation}', 'update')->name('reservation.update');
        Route::delete('reservation/{reservation}', 'destroy')->name('reservation.destroy');
    });

    Route::controller(TableController::class)->group(function () {
        Route::get('tables', 'index')->name('tables.index');
        Route::get('tables/create', 'create')->name('tables.create');
        Route::post('tables/store', 'store')->name('tables.store');
        Route::get('tables/{table}/edit', 'edit')->name('tables.edit');
        Route::put('tables/{table}', 'update')->name('tables.update');
        Route::delete('tables/{table}', 'destroy')->name('tables.destroy');
    });

    Route::controller(ServeurController::class)->group(function () {
        Route::get('serveurs', 'index')->name('serveurs.index');
        Route::get('serveurs/create', 'create')->name('serveurs.create');
        Route::post('serveurs/store', 'store')->name('serveurs.store');
        Route::get('serveurs/{table}/edit', 'edit')->name('serveurs.edit');
        Route::put('serveurs/{table}', 'update')->name('serveurs.update');
        Route::delete('serveurs/{table}', 'destroy')->name('serveurs.destroy');
    });
    Route::get('clients/export', [ClientController::class, 'export']);
    Route::controller(ClientController::class)->group(function () {
        Route::get('clients', 'index')->name('clients.index');
        Route::get('clients/create', 'create')->name('clients.create');
        Route::post('clients/store', 'store')->name('clients.store');
        Route::get('clients/{client}/edit', 'edit')->name('clients.edit');
        Route::put('clients/{client}', 'update')->name('clients.update');
        Route::delete('clients/{client}', 'destroy')->name('clients.destroy');
    });

            // ---------------------- search clients  ---------------//
        // Route::get('clients/search', 'searchRecord')->middleware('auth')->name('clients/search');
        // Route::post('clients/search', 'searchRecord')->middleware('auth')->name('clients/search');
        // });

        Route::controller(SizeController::class)->group(function () {
            Route::get('sizes', 'index')->name('sizes.index');
            Route::get('sizes/create', 'create')->name('sizes.create');
            Route::post('sizes/store', 'store')->name('sizes.store');
            Route::get('sizes/{sizes}/edit', 'edit')->name('sizes.edit');
            Route::put('sizes/{sizes}', 'update')->name('sizes.update');
            Route::delete('sizes/{client}', 'destroy')->name('sizes.destroy');
        });


        Route::controller(CategoryController::class)->group(function () {
            Route::get('categories', 'index')->name('categories.index');
            Route::get('categories/create', 'create')->name('categories.create');
            Route::post('categories/store', 'store')->name('categories.store');
            Route::get('categories/{category}/edit', 'edit')->name('categories.edit');
            Route::put('categories/{category}', 'update')->name('categories.update');
            Route::delete('categories/{client}', 'destroy')->name('categories.destroy');
        });


        Route::controller(AlimentaireController::class)->group(function () {
            Route::get('alimentaire', 'index')->name('alimentaire.index');
            Route::get('alimentaire/create', 'create')->name('alimentaire.create');
            Route::post('alimentaire/store', 'store')->name('alimentaire.store');
            Route::get('alimentaire/{alimentaire}/edit', 'edit')->name('alimentaire.edit');
            Route::put('alimentaire/{alimentaire}', 'update')->name('alimentaire.update');
            Route::delete('alimentaire/{client}', 'destroy')->name('alimentaire.destroy');
        });



        Route::controller(SizeAlimentaireController::class)->group(function () {
            Route::get('sizealimentaire', 'index')->name('sizealimentaire.index');
            Route::get('sizealimentaire/create', 'create')->name('sizealimentaire.create');
            Route::post('sizealimentaire/store', 'store')->name('sizealimentaire.store');
            Route::get('sizealimentaire/{sizealimentaire}/edit', 'edit')->name('sizealimentaire.edit');
            Route::put('sizealimentaire/{sizealimentaire}', 'update')->name('sizealimentaire.update');
            Route::delete('sizealimentaire/{client}', 'destroy')->name('sizealimentaire.destroy');
        });




        Route::controller(Ligne_AchatController::class)->group(function () {
            Route::get('Ligne_Achats', 'index')->name('Ligne_Achats.index');
            Route::get('Ligne_Achats/create', 'create')->name('Ligne_Achats.create');
            Route::post('Ligne_Achats/store', 'store')->name('Ligne_Achats.store');
            Route::get('Ligne_Achats/{Ligne_Achats}/edit', 'edit')->name('Ligne_Achats.edit');
            Route::put('Ligne_Achats/{Ligne_Achats}', 'update')->name('Ligne_Achats.update');
            Route::delete('Ligne_Achats/{Ligne_Achats}', 'destroy')->name('Ligne_Achats.destroy');
        });

// ----------------------------- training type  ------------------------------//
Route::controller(PersonalInformationController::class)->group(function () {
    Route::post('user/information/save', 'saveRecord')->middleware('auth')->name('user/information/save');
});

