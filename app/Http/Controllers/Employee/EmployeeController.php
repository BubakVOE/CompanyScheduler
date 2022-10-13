<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\dashboard\CreateNewEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectUsers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Avatar;

class EmployeeController extends Controller
{
    public function employees()
    {
        $projects = Project::all();
        
        return view('pages.dashboard.section.employee', [
            'projects' => $projects,
        ]);
    }

    public function createEmployee(CreateEmployeeRequest $request)
    {
        try {
            $password = $request->input('password');

            $test = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'mobile' => $request->input('mobile'),

                'is_admin' => $request->input('is_admin'),

                'address' => $request->input('address'),
                'apartment' => $request->input('apartment'),

                'money_per_hour' => $request->input('money_per_hour'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'password' => Hash::make($password),

            ]);

            return ['success' => true];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function updateEmployee(UpdateEmployeeRequest $request)
    {

        try {
            $employee = User::findOrfail($request->id);

            $employee->first_name = $request->input('first_name');
            $employee->last_name = $request->input('last_name');
            $employee->mobile = $request->input('mobile');
            $employee->is_admin = $request->input('is_admin');
            $employee->username = $request->input('username');
            $employee->money_per_hour = $request->input('money_per_hour');
            $employee->address = $request->input('address');
            $employee->apartment = $request->input('apartment');

            $employee->password = Hash::make($request->input('password'));

            $employee->save();

            return ['success' => true];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function deleteEmployee($employeeId, Request $request)
    {
        $user = User::findOrFail($employeeId);

        $user->delete();

        return ['success' => true];
    }
}
