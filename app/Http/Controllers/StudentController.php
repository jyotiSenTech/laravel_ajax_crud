<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{


    // == ## Redirect Student Register ===================================================================================
    public function index()
    {
        return view('student_register');
    }




    // == ## Student Create Using Ajax ===================================================================================

    public function student_create(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|string|max:255|email|unique:student_master,student_email',
            'student_phone' => 'required|string|max:20',
            'student_dob' => 'required|date',
            'student_address' => 'required|string|max:255',
            'student_course_name' => 'required|string|max:255',
            'student_profile' => 'required|file|image|mimes:jpg,jpeg,png|max:2048', // Ensure file is an image
        ]);

        // Check if the file exists in the request
        if ($request->hasFile('student_profile')) {
            // Store the file and get its path
            $profilePath = $request->file('student_profile')->store('assets/uploads/students_profile/', 'public');
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Profile image upload failed.',
            ], 422);
        }

        // Create a new student record
        $student = Student::create([
            'student_name' => $validatedData['student_name'],
            'student_email' => $validatedData['student_email'],
            'student_phone' => $validatedData['student_phone'],
            'student_dob' => $validatedData['student_dob'],
            'student_address' => $validatedData['student_address'],
            'student_course_name' => $validatedData['student_course_name'],
            'student_profile' => $profilePath,
        ]);

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Student Created Successfully',
            'data' => $student,
        ]);
    }






    // == ## Student Details fetch Using Ajax ===================================================================================


    public function student_show(Request $request)
    {
        if ($request->ajax()) {

            // $students = (new Student())->getAllStudents();
            // $students = Student::getAllStudents(); //for use this mention static after public in model 

            $students = Student::all();
            return response()->json([
                'status' => 'success',
                'data' => $students,
            ]);
        }
        return view('student_details');
    }




    // == ## Redirect Student Update  Using Ajax ===================================================================================
    public function student_edit(Request $request, $id)
    {
        $student = Student::find($id);
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'data' => $student,
            ]);
        }
        return view('student_edit', compact('student'));
    }





    public function student_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|string|email|max:255|unique:student_master,student_email,' . $id,
            'student_phone' => 'required|string|max:20',
            'student_dob' => 'required|date',
            'student_address' => 'required|string|max:255',
            'student_course_name' => 'required|string|max:255',
            'student_profile' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found',
            ], 404);
        }

        $student->student_name = $validatedData['student_name'];
        $student->student_email = $validatedData['student_email'];
        $student->student_phone = $validatedData['student_phone'];
        $student->student_dob = $validatedData['student_dob'];
        $student->student_address = $validatedData['student_address'];
        $student->student_course_name = $validatedData['student_course_name'];

        // Handle file upload
        if ($request->hasFile('student_profile')) {
            $fileName = time() . '.' . $request->student_profile->extension();
            $request->student_profile->move(public_path('assets/uploads/students_profile/'), $fileName);
            $student->student_profile = $fileName;
        }

        $student->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Student updated successfully',
        ]);
    }




    // == ## Delete Student ==================================================================================
    public function student_delete($id)
    {
        $student = Student::find($id);
        if (!$student) {

            return response()->json([
                'status' => 'error',
                'message' => 'Student Not Found',
            ]);
        } else {

            $student->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Student Deleted Successfully',
            ]);
        }
    }
}
