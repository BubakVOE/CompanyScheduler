<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
// // // // // // // // // // // // // // // // // // // // // // // // 

class WorkTime extends Model
{
    use HasFactory, LogsActivity;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',

        'project_id',

        'employee',
        'hours',
        'money_per_hour',
        'project_name',
        'job',
        'date',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }

    public function test()
    {
        return $this->belongsToThrough('Company', 'Project');
    }
}
