<?php

// admini
    //header
        use App\Http\Controllers\Dashboard\header\DashboardController;

    //sections
        use App\Http\Controllers\Dashboard\section\CompanyController;
        use App\Http\Controllers\Dashboard\section\ProcessController;
        use App\Http\Controllers\Dashboard\section\JobController;
        use App\Http\Controllers\Dashboard\section\ProjectController;
        use App\Http\Controllers\Dashboard\section\ProjectUserController;

    //others
        use App\Http\Controllers\Dashboard\other\LogsController;
        use App\Http\Controllers\Dashboard\other\MailController;
        use App\Http\Controllers\Dashboard\other\PDFController;    
        use App\Http\Controllers\Dashboard\other\ActivityController;
        use App\Http\Controllers\Dashboard\other\AuthenticationController;
        use App\Http\Controllers\Dashboard\other\BackupController;    
    
    //axios
        use App\Http\Controllers\Dashboard\axios\DashboardAxiosController;
// Employee
    use App\Http\Controllers\Employee\EmployeeController;
    use App\Http\Controllers\Employee\WorkTimeController;
    use App\Http\Controllers\HomeController;


use App\Http\Controllers\Employee\axios\EmployeeAxiosController;
use App\Http\Controllers\Employee\UserController;
// odpad
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

//DASHBOARD


// [is_admin == 1]  DASHBOARD
Route::group(['middleware' => ['auth', 'admin']], function () {
// OVERALL
    //dashboard -> home(company grapg - doughnut)
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index');

    route::get('/axios/dashboard/companies/data', [DashboardAxiosController::class, 'getCompaniesData']);

    route::get('/axios/dashboard/selectdate/week', [DashboardAxiosController::class, 'week']);
    route::get('/axios/dashboard/selectdate/month', [DashboardAxiosController::class, 'month']);
    route::get('/axios/dashboard/selectdate/year', [DashboardAxiosController::class, 'year']);

//VYTVOŘIT / EDIT / DELETE
    //dashboard -> process
    route::get('/dashboard/process', [ProcessController::class, 'process']);
    route::post('/dashboard/process/processStore', [ProcessController::class, 'processStore']);
    //dashboard -> company
    route::get('/dashboard/companies', [CompanyController::class, 'companies']);
    route::post('/dashboard/companies/createNewCompany', [CompanyController::class, 'createNewCompany']);
    route::post('/dashboard/companies/{company}/update', [CompanyController::class, 'updateCompany']);
    route::post('/dashboard/companies/{companyId}/delete', [CompanyController::class, 'deleteCompany']);
    route::get('/dashboard/companies/{companyId}/projects', [CompanyController::class, 'projectsOfCompany']);

    route::post('/axios/dashboard/companies/get_companies', [DashboardAxiosController::class, 'getCompanies']);
    //dashboard -> projects
    route::get('/dashboard/projects', [ProjectController::class, 'projects']);
    route::post('/dashboard/projects/createNewProject', [ProjectController::class, 'createNewProject']);
    route::post('/dashboard/projects/{projectId}/update', [ProjectController::class, 'updateProject']);
    route::post('/dashboard/projects/{projectId}/delete', [ProjectController::class, 'deleteProject']);
    route::post('/dashboard/projects/{projectId}/projectCompleted', [ProjectController::class, 'projectCompleted']);

    route::post('/dashboard/projects/{projectId}/newUserToProject', [ProjectUserController::class, 'newUserToProject']);
    route::post('/dashboard/projects/{projectId}/user/{userId}/removeUserFromProject', [ProjectUserController::class, 'removeUserFromProject']);

    route::post('/axios/dashboard/projects/company/{name}/get_projects', [DashboardAxiosController::class, 'getProjects']);
    //dashboard -> employee
    route::get('/dashboard/employees', [EmployeeController::class, 'employees']);
    route::post('/dashboard/employees/createEmployee', [EmployeeController::class, 'createNewEmployee']);
    route::post('/dashboard/employees/{employeeId}/deleteEmployee', [EmployeeController::class, 'deleteEmployee']);
    route::post('/dashboard/employee/{employeeId}/updateEmployee', [EmployeeController::class, 'updateEmployee']);


    route::post('/axios/dashboard/employees/get_employees', [DashboardAxiosController::class, 'getEmployees']);
    //dashboard -> jobs
    route::get('/dashboard/jobs', [JobController::class, 'jobs']);
    route::post('/dashboard/jobs/createJob', [JobController::class, 'createJob']);
    route::post('/dashboard/jobs/{jobId}/update', [JobController::class, 'updateJob']);
    route::post('/dashboard/jobs/{jobId}/delete', [JobController::class, 'deleteJob']);

    route::post('/axios/dashboard/jobs/get_jobs', [DashboardAxiosController::class, 'getJobs']);

// OSTATNÍ
    //dashboard -> logs
    route::get('/dashboard/activity', [ActivityController::class, 'activity']);

    route::post('/axios/dashboard/activity/getModels', [DashboardAxiosController::class, 'getModels']);
    route::post('/axios/dashboard/activity/{name}', [DashboardAxiosController::class, 'activityLog']);
    //dashboard -> authentication
    route::get('/dashboard/authentication', [AuthenticationController::class, 'index']);

    route::post('/axios/dashboard/authentication/{name}', [DashboardAxiosController::class, 'authenticationLog']);

    //dashboard -> laravel.log

    //dashboard -> PDF
    route::get('/dashboard/pdf', [PDFController::class, 'index']);
    route::get('/dashboard/employee/{user_id}/{year}/{month}', [PDFController::class, 'employeePDF']);
    route::get('/dashboard/company/{company_id}/{year}/{month}', [PDFController::class, 'companyPDF']);

    route::post('/axios/dashboard/employee/date', [DashboardAxiosController::class, 'employeeGetDate']);
    route::post('/axios/dashboard/company/date', [DashboardAxiosController::class, 'companyGetDate']);

    //dashboard -> backups
    route::get('/dashboard/back_ups', [BackupController::class, 'index']);
    route::post('/dashboard/backup/store', [BackupController::class, 'backupDB']);
    route::post('/dashboard/backup/{name}/delete', [BackupController::class, 'removeDB']);

    route::post('/axios/dashboard/backup', [DashboardAxiosController::class, 'getDatabase']);

    //dashboard -> test
    route::get('/dashboard/test', [TestController::class, 'index']);
    route::post('/axios/dashboard/test', [DashboardAxiosController::class, 'test']);
});



//EMPLOYEE
    //OVERALL
        // EMPLOYEE - EmployeeController
        route::get('/employee/{id}/show', [EmployeeController::class, 'show'])->name('employee-info');
        //route::post('/employee/{id}/updateEmployeeCard', [EmployeeController::class, 'updateEmployeeCard']);
        route::post('/employee/{id}/updateUserData', [EmployeeController::class, 'updateUserData']);


        route::get('/employee/{id}/profile', [UserController::class, 'profile']);

        route::get('/employee/{id}/records', [UserController::class, 'records']);

        route::get('/employee/{id}/settings', [UserController::class, 'settings']);

        
        route::get('/employee/{id}/show', [UserController::class, 'show'])->name('employee-info');
        
        route::post('/employee/{id}/updateEmployee', [UserController::class, 'updateEmployee']);
        
        route::post('/axios/employee/{id}/getEmployee', [EmployeeAxiosController::class, 'getEmployee']);



        // WorkTimeController
        route::post('/employee/worktime/{id}/store', [WorkTimeController::class, 'store']);
        route::post('/employee/worktime/{id}/update', [WorkTimeController::class, 'update']);
        route::post('/employee/worktime/{id}/delete', [WorkTimeController::class, 'delete']);

        //PDF
        route::get('/employee/{id}/info/year={year}/month={month}.pdf', [PDFController::class, 'generatePDF']);

        route::post('/axios/employee/worktime/{id}/get_works', [EmployeeAxiosController::class, 'getWorks']);




// TESTS

route::get('/dashboard/test', [TestController::class, 'index']);
route::get('/authentication', [TestController::class, 'authentication']);


route::get('/dashboard/mails', [MailController::class, 'index']);

Route::get('send-mail', function () {
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp',
    ];

    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd('Test test test.');
});




// Route::group(['middleware' => ['auth', 'admin']], function () {
// });
