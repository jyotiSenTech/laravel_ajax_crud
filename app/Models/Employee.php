<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
   protected $table='employee_master';

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
