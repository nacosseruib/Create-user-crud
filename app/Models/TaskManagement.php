<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'status',
        'priority',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [];

    public $timestamps = true;
}
