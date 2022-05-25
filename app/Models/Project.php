<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [];

    public $timestamps = true;
}
