<?php

namespace App\Http\Controllers\Dashboard\section;

use App\Models\User;
use App\Models\ProjectUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserToProjectRequest;

class ProjectUserController extends Controller
{
    public function newUserToProject($projectId, CreateUserToProjectRequest $request)
    {
        $user_id = $request->user_id;
        $project_id = $request->project_id;

        if (
            ProjectUsers::where('project_id', $project_id)
            ->where('user_id', $user_id)
            ->exists() == true
        ) {
            return ['success' => 'exist'];
        } else {
            $test = ProjectUsers::create([
                'user_id' => $user_id,
                'project_id' => $project_id,
            ]);

            $user = User::find($user_id);

            // return ['success' => true];
            return [
                'success' => true,
                'user' => $user,
            ];
        }
    }

    public function removeUserFromProject($projectId, $userId, Request $request)
    {
        try {
            $test = ProjectUsers::where('project_id', $projectId)
                ->where('user_id', $userId)
                ->delete();

            return ['success' => true];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
