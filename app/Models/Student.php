<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'student_master';

    protected $fillable = [
        'student_name',
        'student_email',
        'student_phone',
        'student_dob',
        'student_address',
        'student_course_name',
        'student_profile',
    ];


    // public function getAllStudents()
    // {
    //     $students = DB::select("SELECT * FROM student_master WHERE deleted_at IS NULL");
    //     //return view('employee-details', compact('students'));
    // }
    // public function AllStudents()
    // {
    //     return self::whereNull('deleted_at')->get();
    // }
}
