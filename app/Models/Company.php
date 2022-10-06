<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

use function Symfony\Component\String\b;

// // // // // // // // // // // // // // // // // // // // // // // // 


class Company extends Model
{
    use HasFactory, LogsActivity;

    protected $primaryKey = 'id';

    protected $fillable = [
        'cover_path',
        'name',
        'company_color',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function test()
    {
        return $this->hasManyThrough(User::class, [ProjectUsers::class, Project::class]);
    }

    public function works()
    {
        return $this->hasManyThrough(WorkTime::class, Project::class);
    }



    public function employees()
    {
        return $this->hasManyThrough(
            User::class,
            ProjectUsers::class,
        );
    }

    // public function employees()
    // {
    //     return $this->hasManyThrough(
    //         User::class,
    //         Project::class,
    //         'company_id',     // project table
    //         'id',           //user table
    //         // 'id',
    //         // 'id',
    //     );
    // }

}
