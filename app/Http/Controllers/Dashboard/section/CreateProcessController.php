<?php

namespace App\Http\Controllers\Dashboard\section;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectUsers;
use App\Models\User;
use Illuminate\Http\Request;

class CreateProcessController extends Controller
{
    public function process()
    {
        $users = User::all();

        return view('pages.dashboard.section.process', [
            'users' => $users,
        ]);
    }

    public function companyStore(Request $request)
    {
        if (Company::where('name', '=', $request['company_name'])->exists()) {
            return ['error' => 'company exist'];
        }

        // COMPANY create
        if ($request->company_file) {
            $company = new Company([
                'name' => $request['company_name'],
                'cover_path' => null,
                'company_color' => $request['company_color'],
            ]);

            $file = $request->company_file;

            $coverName = $file->getClientOriginalName();

            $file->move(\storage_path('app/public/companies/'), $coverName);

            $company->cover_path = '/storage/companies/'.$coverName;

            $company->save();

            // PROJECT create
            if (Project::where('name', '=', $request->input('name'))->exists()) {
                return ['success' => 'project exist'];
            } else {
                $project = Project::create([
                    'name' => $request['project_name'],
                    'type_of_job' => $request['project_type_of_job'],
                    'company_id' => $company->id,
                    'street_address' => $request['project_street_address'],
                ]);

                // ProjectUsers create

                $users_string = $request->user_id;

                $users = explode(',', $users_string);

                foreach ($users as $user) {
                    ProjectUsers::create([
                        'user_id' => $user,
                        'project_id' => $project->id,
                    ]);
                }

                return ['success' => true];
            }
        }

        return 'test';
    }
}
