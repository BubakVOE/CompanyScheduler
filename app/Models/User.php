<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Yadahan\AuthenticationLog\AuthenticationLogable;

// // // // // // // // // // // // // // // // // // // // // // // // 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticationLogable, LogsActivity, \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',

        'password',
        'mobile',
        'username',
        'is_admin',
        'money_per_hour',
        'user_color',
        'address',
        'apartment',

        //  'project_id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function work_times()
    {
        return $this->hasMany(WorkTime::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,
            'project_users',
            'user_id',
            'project_id');
    }

    public function company()
    {
        return $this->belongsToThrough(Company::class, Project::class);
    }
}
