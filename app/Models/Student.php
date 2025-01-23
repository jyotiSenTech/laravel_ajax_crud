<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table='student_master';

    protected $fillable = [
     'student_name',
     'student_email',
     'student_phone',
     'student_dob',
     'student_address',
     'student_course_name',
     'student_profile',
 ];
 
 
}
