<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'employee_master';

    protected $fillable = [
        'emp_full_name',
        'emp_email',
        'emp_phone',
        'emp_gender',
        'emp_username',
        'emp_password',
    ];

    protected $hidden = [
        'emp_password',
    ];
}
