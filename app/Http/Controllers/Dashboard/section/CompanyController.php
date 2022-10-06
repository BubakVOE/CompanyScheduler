<?php

namespace App\Http\Controllers\Dashboard\section;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function companies()
    {
        return view('pages.dashboard.section.companies');
    }

    //public function createNewCompany(CreateCompanyRequest Request $request)
    public function createNewCompany(CreateCompanyRequest $request)
    {
        if (Company::where('name', '=', $request->input('name'))->exists()) {
            return ['error' => 'exist'];
        }

        if ($request->file) {
            $post = new Company([
                'name' => $request->input('name'),
                'cover_path' => null,
                'company_color' => $request->input('color'),
            ]);

            $file = $request->file;

            $coverName = $file->getClientOriginalName();

            $file->move(\storage_path('app/public/companies/'), $coverName);

            $post->cover_path = '/storage/companies/' . $coverName;

            $post->save();

            return ['success' => true];
        }
    }

    public function updateCompany(Company $company, UpdateCompanyRequest $request)
    {

        if ($company->name != $request->input('name')) {
            if (Company::where('name', '=', $request->input('name'))->exists()) {
                return ['error' => 'exist'];
            }
        }

        $company->name = $request->input('name');

        $company->company_color = $request->input('company_color');

        $company->save();

        if ($request->hasFile('file')) {

            $file = $request->file;

            $coverName = $file->getClientOriginalName();

            Storage::delete('/public' . str_replace('/storage', '', $company->cover_path));

            //$file->move(\storage_path('app/public/companies/'.$company->id.'/'), $coverName);
            $file->move(\storage_path('app/public/companies/'), $coverName);

            $company->cover_path = '/storage/companies/' . $coverName;

            $company->save();
        }

        return ['success' => true];
    }

    public function deleteCompany($companyId, Request $request)
    {
        $company = Company::find($companyId);

        Storage::delete('/public' . str_replace('/storage', '', $company->cover_path));

        $company->delete();

        return ['success' => true];
    }

    public function projectsOfCompany($companyId, Request $request)
    {
        $company = Company::with('projects.users')->find($companyId);

        $projects = $company->projects->all();

        return view('pages.dashboard.section.projectsOfCompany', [
            'company_realations' => $company,
            'projects' => $projects,
        ]);
    }
}
