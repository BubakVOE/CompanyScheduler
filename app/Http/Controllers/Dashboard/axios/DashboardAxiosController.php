<?php

namespace App\Http\Controllers\Dashboard\axios;


use File;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Models\Project;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProjectUsers;
use Spatie\Activitylog\Models\Activity;


class DashboardAxiosController extends Controller
{

    // DASHBOARD --  Doughnut chart 
    public function getCompaniesData(Request $request)
    {
        if ($request->input('companies') != null) {
            $selected_names = $request->input('companies');
        } else {
            $selected_names = Company::all()->pluck('name');
        }

        $companies_array = Company::whereIn('name', $selected_names)
            ->with('works')
            ->get();

        $backgroundColor = [];

        foreach ($companies_array as $company_array) {
            $color = $company_array->company_color;

            $hex = str_replace('#', '', $color);

            if (strlen($hex) == 3) {
                $rgbArray['r'] = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));

                $rgbArray['g'] = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));

                $rgbArray['b'] = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
            } else {
                $rgbArray['r'] = hexdec(substr($hex, 0, 2));

                $rgbArray['g'] = hexdec(substr($hex, 2, 2));

                $rgbArray['b'] = hexdec(substr($hex, 4, 2));
            }

            $rgb_color = $rgbArray['r'] . ' ,' . $rgbArray['g'] . ' ,' . $rgbArray['b'];

            $backgroundColor[] = 'rgba(' . $rgb_color . ', 0.2' . ')';

            $borderColor[] = 'rgba(' . $rgb_color . ')';

            $value = 0;

            foreach ($company_array->works as $work) {
                $value += $work->hours * $work->money_per_hour;
            }

            //$data[$company_array->id] = $value;
            $data[] = $value;
        }

        $doughnut_data['labels'] = $selected_names;

        $doughnut_data['datasets'][] = [
            'backgroundColor' => $backgroundColor,
            'borderColor' => $borderColor,
            'data' => $data,
        ];

        return $doughnut_data;
    }

    // DASHBOARD - Bar Chart
    public function week()
    {
        $users = User::all();

        $last_week_start = Carbon::now()
            ->subWeek()
            ->startOfWeek()
            ->toDateString();

        $last_week_end = Carbon::now()
            ->subWeek()
            ->endOfWeek()
            ->toDateString();

        $graph_data = [
            'labels' => [],
            'datasets' => [],
        ];

        //LABELS
        $graph_data['labels'] = ['Pondělí', 'Úterý', 'Středa', 'Čtvrtek', 'Pátek', 'Sobota', 'Něděle'];

        //DATASETS
        foreach ($users as $key => $user) {
            $data = [0, 0, 0, 0, 0, 0, 0];

            $work_times = WorkTime::whereIn('user_id', [$user->id])
                ->where('date', '>=', $last_week_start)
                ->where('date', '<=', $last_week_end)
                ->get();

            foreach ($work_times as $work_time) {
                $key = Carbon::make($work_time->date)->dayOfWeekIso - 1;

                $data[$key] += $work_time->hours;
            }

            $dataset = [
                'label' => $user->first_name . ' ' . $user->last_name,
                'backgroundColor' => $user->user_color,
                'borderColor' => $user->user_color,
                'borderWidth' => 1.5,
                'data' => $data,
            ];

            $graph_data['datasets'][] = $dataset;
        }

        return $graph_data;
    }

    // DASHBOARD - Bar Chart
    public function month()
    {
        $users = User::all();

        $last_month_start = Carbon::now()
            ->startOfMonth()
            ->toDateString();

        $last_month_end = Carbon::now()
            ->endOfMonth()
            ->toDateString();

        $graph_data = [
            'labels' => [],
            'datasets' => [],
        ];

        $first_itteration = 1;

        foreach ($users as $key => $user) {
            // LABELS
            $last_month_number = Carbon::now()->subMonth()->daysInMonth;

            $data = [];

            for ($number_of_days = 0; $number_of_days < $last_month_number; $number_of_days++) {
                $data[$number_of_days] = 0;

                if ($first_itteration == 1) {
                    $graph_data['labels'][] = $number_of_days + 1;
                }
            }

            $first_itteration = 0;

            //DATASETS
            $work_times = WorkTime::whereIn('user_id', [$user->id])
                ->where('date', '>=', $last_month_start)
                ->where('date', '<=', $last_month_end)
                ->get();

            foreach ($work_times as $work_time) {
                $key = Carbon::make($work_time->date)->format('d') - 1;
                $data[$key] += $work_time->hours;
            }

            $graph_data['datasets'][] = [
                'label' => $user->first_name . ' ' . $user->last_name,
                'backgroundColor' => $user->user_color,
                'borderColor' => $user->user_color,
                'borderWidth' => 1.5,
                'data' => $data,
            ];
        }

        return $graph_data;
    }

    // DASHBOARD - Bar Chart
    public function year()
    {
        $users = User::all();

        // ROK - aktuální rok
        $last_year_start = Carbon::now()
            ->startOfYear()
            ->toDateString();

        $last_year_end = Carbon::now()
            ->endOfYear()
            ->toDateString();

        $graph_data = [
            'labels' => [],
            'datasets' => [],
        ];

        //LABELS
        $graph_data['labels'] = ['Leden', 'Únor', 'Březen', 'Duben', 'Květen', 'Červen', 'Červenec', 'Srpen', 'Září', 'Říjen', 'Listopad', 'Prosinec'];

        //DATASETS
        foreach ($users as $key => $user) {
            $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

            $work_times = WorkTime::whereIn('user_id', [$user->id])
                ->where('date', '>=', $last_year_start)
                ->where('date', '<=', $last_year_end)
                ->get();

            foreach ($work_times as $work_time) {
                $key = (Carbon::make($work_time->date)->format('m') * 10) / 10;

                $data[$key] += $work_time->hours;
            }

            $dataset = [
                'label' => $user->first_name . ' ' . $user->last_name,
                'backgroundColor' => $user->user_color,
                'borderColor' => $user->user_color,
                'borderWidth' => 1.5,
                'data' => $data,
            ];

            $graph_data['datasets'][] = $dataset;
        }

        return $graph_data;
    }

    // Dashboard - Companies 
    public function getCompanies()
    {
        $companies = Company::all();
        $companies_and_projects = Company::with('projects')->get();

        return [
            'companies' => $companies,
            'companies_and_projects' => $companies_and_projects,
        ];
    }

    // Dashboard - Projects
    public function getProjects($name, Request $request)
    {
        if ($name == 'all') {
            $projects = Project::with('users')->get();

            foreach ($projects as $project) {
                $projects_data['data'][] = [
                    'id' => $project->id,
                    'company_id' => $project->company_id,
                    'name' => $project->name,
                    'type_of_job' => $project->type_of_job,
                    'is_done' => $project->is_done,

                    'color' => Company::where('id', $project->company_id)->value('company_color'),

                    'street_address' => $project->street_address,
                    'address_latitude' => $project->address_latitude,
                    'address_longitude' => $project->address_longitude,
                    'created_at' => $project->created_at,
                    'updated_at' => $project->updated_at,
                    'users' => $project->users,
                ];
            }

            return $projects_data;
        } else {
            $projects_obj = Company::whereName($name)->with('projects')->get();

            $projects_count = count($projects_obj[0]->projects);

            if ($projects_count == 0) {
                $projects_data['data'] = 'test';

                return $projects_data;
            } else {
                $company_id = Company::whereName($name)->value('id');

                $projects = Project::whereCompanyId($company_id)->with('users')->get();

                foreach ($projects as $project) {
                    $projects_data['data'][] = [
                        'id' => $project->id,
                        'company_id' => $project->company_id,
                        'name' => $project->name,
                        'type_of_job' => $project->type_of_job,
                        'is_done' => $project->is_done,

                        'color' => Company::where('id', $project->company_id)->value('company_color'),

                        'street_address' => $project->street_address,
                        'address_latitude' => $project->address_latitude,
                        'address_longitude' => $project->address_longitude,
                        'created_at' => $project->created_at,
                        'updated_at' => $project->updated_at,
                        'users' => $project->users,
                    ];
                }

                return $projects_data;
            }
        }
    }

    //Dashboard - Employees
    public function getEmployees(Request $request)
    {
        $company_name = $request->company_name;

        $project_name = $request->project_name;

        if ($company_name == 'all') {

            $companies = Company::all();

            $employees = User::with('projects')->get();

            return [
                'companies' => $companies,
                'employees' => $employees,
            ];
        }

        if (Company::where('name', $company_name)->exists() && $project_name == 'all') {

            $company = Company::where('name', $company_name)->with('projects.users')->get();

            $employees = $company[0]['projects'];

            $companies = Company::all();

            $company_id = Company::where('name', $company_name)->pluck('id');

            $company_projects = Project::where('company_id', $company_id)->get();

            return [
                'companies' => $companies,
                'company_projects' => $company_projects,

                'project_employees' => $employees,
            ];
        }

        if ($company_name !== 'all' && $project_name !== 'all') {

            $companies = Company::all();

            $company_id = Company::where('name', $company_name)->with('projects')->get();

            $projects = $company_id[0]['projects'];

            $company_projects = $projects;

            foreach ($projects as $project) {
                $employees_from_project = $project::where('name', $project_name)->with('users.projects')->get();
            }

            $employees = $employees_from_project[0]['users'];

            return [
                'companies' => $companies,
                'company_projects' => $company_projects,

                'employees' => $employees,
            ];
        }
    }

    //Dashboard - Jobs
    public function getJobs(Request $request)
    {
        $company_id = $request->company_id;

        $project_id = $request->project_id;

        $user_id = $request->employee_id;

        // company select == všechno
        if ($company_id == 'all') {

            $companies = Company::all();  // hodit do JobsControlleru

            $jobs = WorkTime::all();

            return [
                'companies' => $companies,

                'jobs' => $jobs,
            ];
        }

        // company select == id && project == všechno
        if (Company::where('id', $company_id)->exists() && $project_id == 'all') {

            $companies = Company::all(); // hodit do JobsControlleru

            $jobs = Company::where('id', $company_id)->with('works')->get();

            $projects = Project::where('company_id', $company_id)->with('users')->get();


            return [
                'companies' => $companies,
                'projects_for_company' => $projects,

                'jobs' => $jobs[0]['works'],
                'employees' => $projects[0]['users'],
            ];
        }

        //company select -> id ZÁROVEŇ project == všechno
        if (Company::where('id', $company_id)->exists() && $project_id !== 'all' && $user_id == 'all') {

            $companies = Company::all(); // hodit do JobsControlleru

            $projects = Project::where('company_id', $company_id)->get();

            $jobs = WorkTime::where('project_id', $project_id)->with('user')->get();

            $employees = [];

            foreach ($jobs as $job) {
                // $employees[] = [
                //     'id' => $job['user']->id,
                //     'employee' => $job['user']->first_name .' '. $job['user']->last_name,
                // ];

                //$employee = $job['user']->first_name .' '. $job['user']->last_name;

                // if (array_key_exists($employee, $data)) {
                //     if (!in_array('test', $data[$employee])) {
                //         $data[$employee][] = 'test';
                //     }
                // } else {
                //     $data[$employee] = ['test'];
                // }

                //$employees[] = $job['user']->first_name . ' ' . $job['user']->last_name;


                // $employees[] = [
                //     'employee_id' => $job['user']->id,
                //     'employee' => $job['user']->first_name . ' ' . $job['user']->last_name,
                // ];
                $employees[] = $job['user'];
            }

            dd($employees);

            return [
                'companies' => $companies,
                'projects_for_company' => $projects,

                'jobs' => $jobs,
                'employees' => $employees,

            ];
        }

        if (Company::where('id', $company_id)->exists() && $project_id !== 'all' && $user_id !== 'all') {

            $companies = Company::all(); // hodit do JobsControlleru

            $projects = Project::where('company_id', $company_id)->get();

            $workers = WorkTime::where('project_id', $project_id)->with('user')->get();

            $jobs = WorkTime::where('user_id', $user_id)->where('project_id', $project_id)->get();


            foreach ($workers as $worker) {

                $employees[] = $worker['user'];
            }

            return [
                'companies' => $companies,
                'projects_for_company' => $projects,

                'jobs' => $jobs,
                'employees' => $employees,

            ];
        }
    }

    //Dashboard - záznam aktivit

    public function getModels()
    {
        $path = app_path() . "/Models";

        $results = scandir($path);

        foreach ($results as $result) {

            if ($result == '.' || $result == '..') {

                $pointless[] = 0;
            } else {

                $models[] = substr($result, 0, -4);
            }
        };

        return [
            'models' => $models,
        ];
    }

    public function activityLog(Request $request, $name)
    {
        $subject_name = $request->subject_name;
        $causer_name = $request->causer_name;

    //     $lastActivity = Activity::all()->last(); //returns the last logged activity
        
    //     $lastActivity->causer; //returns the model that was passed to `causedBy`;



    // //     dd("App\Models"."\" );

    // //    // dd("App\Models\$subject_name);

    //    // $test = Activity::where('subject_type', 'App\Models\'.$subject_type)->get();

    //     $test = Activity::where("subject_type", "App/Models/Company")->get();
    //     dd($test);
    

    //     dd(activity()->log('Look, I logged something'));

    //     dD(Activity()->causedBy('User'));

    //     $test = activity()
    //     ->performedOn($subject_name)
    //     ->causedBy($causer_name);
    //     // ->withProperties(['customProperty' => 'customValue'])
    //     // ->log('Look, I logged something');


    //     dd($test);


        if ($subject_name == 'all' && $causer_name == 'all') {



            $activities = Activity::all();

            return [
                'activities' => $activities,
            ];
        } else {
            return 'test';
        }
    


        //$activities = Activity::all();
        //dd($activities->properties);

        // $model = $request->name;

        // dd('App/Models/User');

        // $test = $model::all();

        // dd($test);

        // return [
        //     'success' => true,
        //     'user_data' => $users_data,
        // ];



        $activities = Activity::first();

        $test = [];

        foreach ($activities->properties as $key => $value) {
            $test[] = [$key, $value];
        }
        $keys = array_keys($test[0][1]);

        return [
            'activities' => $activities,
            'keys' => $keys,
        ];
    }

    //Dashboard - záznam přihlášení
    public function authenticationLog($id)
    {
        if ($id == 'all') {

            $user_ids = User::pluck('id');

            foreach ($user_ids as $user_id) {
                $users_data[] = User::find($user_id)->authentications;
            }

            return [
                'success' => true,
                'multiple_users' => $users_data,
            ];
        } elseif (User::where('id', $id)->exists() == true) {
            $users_data = User::find($id)->authentications;

            return [
                'success' => true,
                'single_user' => $users_data,
            ];
        } else {
            return [
                'success' => false,
                'user_data' => null,
                'multiple_users' => null,
            ];
        }
    }

    //Dashboard - Database
    public function getDatabase()
    {
        $files_info = [];

        foreach (File::allFiles(storage_path() . '/app/public/db_backup') as $file) {
            $files_info[] = [
                'filename' => $file->getFilename(),
                'filesize' => $file->getSize(), // returns size in bytes
                'fileext' => $file->getExtension(),
            ];
        }

        return $files_info;
    }

    //Dashboard - PDF
    public function employeeGetDate(Request $request)
    {
        $id = $request->input('user_id');

        $user = User::findOrFail($id);

        $works = $user->work_times->sortByDesc('date');

        $employee_date = [];

        foreach ($works as $work) {
            $month = Carbon::make($work->date)->month;

            $year = Carbon::make($work->date)->format('Y');

            if (array_key_exists($year, $employee_date)) {

                if (!in_array($month, $employee_date[$year])) {

                    $employee_date[$year][] = $month;
                }
            } else {
                $employee_date[$year] = [$month];
            }
        }

        // foreach ($works as $work) {
        //     $month = Carbon::make($work->date)->month;

        //     $year = Carbon::make($work->date)->format('Y');

        //     foreach ($works as $work) {
        //         $month = Carbon::make($work->date)->month;

        //         $year = Carbon::make($work->date)->format('Y');

        //         if (array_key_exists($year, $employee_date)) {
        //             if (! in_array($month, $employee_date[$year])) {
        //                 $employee_date[$year][] = $month;
        //             }
        //         } else {
        //             $employee_date[$year] = [$month];
        //         }
        //     }
        // }

        return $employee_date;
    }

    //Dashboard - PDF
    public function companyGetDate(Request $request)
    {

                // foreach ($works as $work) {
        //     $month = Carbon::make($work->date)->month;

        //     $year = Carbon::make($work->date)->format('Y');

        //     foreach ($works as $work) {
        //         $month = Carbon::make($work->date)->month;

        //         $year = Carbon::make($work->date)->format('Y');

        //         if (array_key_exists($year, $employee_date)) {
        //             if (! in_array($month, $employee_date[$year])) {
        //                 $employee_date[$year][] = $month;
        //             }
        //         } else {
        //             $employee_date[$year] = [$month];
        //         }
        //     }
        // }
        
        $id = $request->input('company_id');

        $company = Company::findOrFail($id);

        $works = $company->works->sortByDesc('date');

        $company_date = [];

        foreach ($works as $work) {
            $month = Carbon::make($work->date)->month;

            $year = Carbon::make($work->date)->format('Y');

            foreach ($works as $work) {
                $month = Carbon::make($work->date)->month;

                $year = Carbon::make($work->date)->format('Y');

                if (array_key_exists($year, $company_date)) {
                    if (!in_array($month, $company_date[$year])) {
                        $company_date[$year][] = $month;
                    }
                } else {
                    $company_date[$year] = [$month];
                }
            }
        }

        return $company_date;
    }




    public function test()
    {
        $users = User::paginate(10);

        return response()->json($users);
    }
}
