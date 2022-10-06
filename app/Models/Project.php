<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
// // // // // // // // // // // // // // // // // // // // // // // // 


class Project extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'type_of_job',
        'company_id',

        'project_done',
        'street_address',
        'address_latitude',
        'address_longitude',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,
            'project_users',
            'project_id',
            'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function works()
    {
        return $this->hasMany(WorkTime::class);
    }
    


}
