<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

// == ## Redirect Employee Register ===================================================================================
    public function index()
    {
        return view('employee_register');
    }




    // == ## Employee Create ===================================================================================
    public function employee_create(Request $request)
    {
        $validatedData = $request->validate([

            'emp_full_name' => 'required|string|max:255',
            'emp_email' => 'required|string|max:255|email|unique:employee_master,emp_email',
            'emp_phone' => 'required|string|max:20',
            'emp_gender' => 'required|string|max:10',
            'emp_username' => 'required|string|max:255|unique:employee_master,emp_username',
            'emp_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:emp_password',
        ]);
        
        dd($validatedData);

        $employees = Employee::create([

            'emp_full_name' => $validatedData['emp_full_name'],
            'emp_email' => $validatedData['emp_email'],
            'emp_phone' => $validatedData['emp_phone'],
            'emp_gender' => $validatedData['emp_gender'],
            'emp_username' => $validatedData['emp_username'],
            'emp_password' => Hash::make($validatedData['emp_password']),
        ]);
        $employees->save();

        // return response()->json(['message'=>'Employee Created Successfully', 'employees'=>$employees],201);
        return redirect()->route('employee_list');
    }




    // == ## Employee Details ===================================================================================
    public function employee_show()
    {
        $employees = Employee::all();

        return view('employee_details', compact('employees'));
    }




    // == ## Redirect Employee Update ===================================================================================
    public function employee_edit($id)
    {
        $employee = Employee::find($id);
        return view('employee_edit', compact('employee'));
    }




    // == ## Update Employee ===================================================================================
    public function employee_update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {

            return redirect()->back()->withErrors(['message' => 'Employee Not Found']);
        } else {

            $validateData = $request->validate([

                'emp_full_name' => 'required|string|max:255',
                'emp_username' => 'required|string|max:255',
                'emp_email' => 'required|string|max:255|unique:employee_master,emp_email,' . $employee->id,
                'emp_phone' => 'required|string|max:20',
                'emp_gender' => 'required|string|max:10',

            ]);

            $employee->update($validateData);
            return redirect()->route('employee_list')->with('success', 'Employee Updated Successfully');
        }
    }



    // == ## Delete Employee ==================================================================================
    public function employee_delete($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {

            return redirect()->back()->withErrors(['message' => 'Employee Not Found']);
        } else {

            $employee->delete();
            return redirect()->route('employee_list')->with('success', 'Employee Updated Successfully');
        }
    }
}
