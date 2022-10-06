<?php

namespace App\Http\Controllers\Dashboard\section;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Project;
use App\Models\User;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class JobController extends Controller
{
    public function jobs()
    {
        $projects = Project::all();

        $users = User::all();

        return view('pages.dashboard.section.jobs', [
            'projects' => $projects,
            'users' => $users,
        ]);
    }

    public function createJob(CreateJobRequest $request)
    {
        $user = User::find($request->input('user_id'));

        $employee = $user->first_name.' '.$user->last_name;

        $project = Project::find($request->input('project_id'));

        $project_name = $project->name;

        $job = WorkTime::create([
            'project_id' => $request->input('project_id'),
            'user_id' => $request->input('user_id'),

            'job' => $request->input('job'),
            'hours' => $request->input('hours'),
            'money_per_hour' => $request->input('money_per_hour'),
            'date' => $request->input('date'),

            'employee' => $employee,
            'project_name' => $project_name,
        ]);

        return ['success' => true];
    }

    public function updateJob(UpdateJobRequest $request)
    {


        try {
            $user = User::find($request->input('user_id'));

            $employee = $user->first_name.' '.$user->last_name;

            $project = Project::find($request->input('project_id'));

            $project_name = $project->name;

            $work = WorkTime::findOrFail($request->input('id'));

            $work->update([
                'project_id' => $request->input('project_id'),
                'user_id' => $request->input('user_id'),

                'job' => $request->input('job'),
                'hours' => $request->input('hours'),
                'money_per_hour' => $request->input('money_per_hour'),
                'date' => $request->input('date'),

                'employee' => $employee,
                'project_name' => $project_name,
            ]);

            return ['success' => true];
        } catch (Exception $e) {
            return [
                'success' => false, 
                'message' => $e->getMessage()
                ];
        }
    }

    public function deleteJob($jobId)
    {
        try {
            $job = WorkTime::find($jobId);

            $job->delete();

            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
