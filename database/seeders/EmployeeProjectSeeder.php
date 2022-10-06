<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeProject;
use App\Models\Project;
use Illuminate\Database\Seeder;

class EmployeeProjectSeeder extends Seeder
{
    public function run()
    {
        /*$employees = Employee::paginate(5);
        $projects = Project::paginate(5);

        foreach ($projects as $project){
            foreach ($employees as $employee){
                EmployeeProject::firstOrCreate([
                    'project_id' => $project->id,
                    'employee_id' => $employee->id,
                ]);
            }
        }*/
    }
}
