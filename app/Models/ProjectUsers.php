<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
// // // // // // // // // // // // // // // // // // // // // // // // 

class ProjectUsers extends Model
{
    use HasFactory, LogsActivity;

    public $fillable = [
        'user_id',
        'project_id',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }

}
