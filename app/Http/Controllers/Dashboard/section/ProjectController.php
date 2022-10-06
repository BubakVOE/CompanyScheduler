<?php

namespace App\Http\Controllers\Dashboard\section;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class ProjectController extends Controller
{
    public function projects()
    {
        $companies = Company::with('projects')
            ->orderBy('id', 'DESC')
            ->get();

        $projects = Project::with('users')->get();

        foreach ($projects as $project) {
            $test[] = [
                'id' => $project->id,
            ];
        }

        $users = User::all();

        return view('pages.dashboard.section.projects', [
            'companies' => $companies,
            'projects' => $projects,
            'users' => $users,
        ]);
    }

    public function createNewProject(CreateProjectRequest $request)
    {
        if (Project::where('name', '=', $request->input('name'))->exists()) {
            return ['success' => 'exist'];
        } else {
            Project::create([
                'company_id' => $request->input('company_id'),

                'name' => $request->input('name'),
                'type_of_job' => $request->input('type_of_job'),
                'street_address' => $request->input('street_address'),
            ]);

            return ['success' => true];
        }
    }

    public function projectCompleted($projectId)
    {
        $project = Project::find($projectId);

        if ($project->is_done == 0) {
            $project->is_done = 1;
            $project->save();

            return ['is_done' => 1];
        } else {
            $project->is_done = 0;
            $project->save();

            return ['is_done' => 0];
        }
    }

    public function updateProject(CreateProjectRequest $request)
    {
        try {
            $project = Project::findOrFail($request->input('id'));

            $project->update([
                'name' => $request->input('name'),
                'type_of_job' => $request->input('type_of_job'),
                'company_id' => $request->input('company_id'),
                'street_address' => $request->input('street_address'),
                'address_latitude' => $request->input('address_latitude'),
                'address_longitude' => $request->input('address_longitude'),
            ]);

            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function deleteProject($projectId)
    {
        try {
            $project = Project::find($projectId);

            $project->delete();

            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
