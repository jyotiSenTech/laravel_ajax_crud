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




    // ##### Employee Create ===================================================================================

    //with all validation and fillable column
    // public function employee_create(Request $request)
    // {
    //     $validatedData = $request->validate([

    //         'emp_full_name' => 'required|string|max:255',
    //         'emp_email' => 'required|string|max:255|email|unique:employee_master,emp_email',
    //         'emp_phone' => 'required|string|max:20',
    //         'emp_gender' => 'required|string|max:10',
    //         'emp_username' => 'required|string|max:255|unique:employee_master,emp_username',
    //         'emp_password' => 'required|string|min:8',
    //         'confirm_password' => 'required|string|same:emp_password',
    //     ]);

    //     // dd($validatedData);
    //     // echo '<pre>';
    //     // print_r($validatedData);
    //     // echo '</pre>';

    //     $employees = Employee::create([

    //         'emp_full_name' => $validatedData['emp_full_name'],
    //         'emp_email' => $validatedData['emp_email'],
    //         'emp_phone' => $validatedData['emp_phone'],
    //         'emp_gender' => $validatedData['emp_gender'],
    //         'emp_username' => $validatedData['emp_username'],
    //         'emp_password' => Hash::make($validatedData['emp_password']),
    //     ]);
    //     $employees->save();

    //     //return response()->json(['message' => 'Employee Created Successfully', 'employees' => $employees], 201);
    //     return redirect()->route('employee_list');
    // }


    // ###### Direct insert data on db without any Validation
    // public function employee_create(Request $request)
    // {
    //     Employee::create($request->all());
    //     return redirect()->route('employee_list');
    // }


    //##### with all validation and direct fillabe on db
    // public function employee_create(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'emp_full_name' => 'required|string|max:255',
    //         'emp_email' => 'required|string|max:255|email|unique:employee_master,emp_email',
    //         'emp_phone' => 'required|string|max:20',
    //         'emp_gender' => 'required|string|max:10',
    //         'emp_username' => 'required|string|max:255|unique:employee_master,emp_username',
    //         'emp_password' => 'required|string|min:8',
    //         'confirm_password' => 'required|string|same:emp_password',
    //     ]);
    //     Employee::create(array_merge($validatedData, [
    //         'emp_password' => Hash::make($validatedData['emp_password']),
    //     ]));
    //     return redirect()->route('employee_list');
    // }



    // == #### Employee Details ===================================================================================
    // public function employee_show()
    // {
    //     $employees = Employee::all();
    //     return view('employee_details', compact('employees'));
    // }




    // == #### Redirect Employee Update ===================================================================================
    // public function employee_edit($id)
    // {
    //     $employee = Employee::find($id);
    //     return view('employee_edit', compact('employee'));
    // }




    // == #### Update Employee ===================================================================================
    // public function employee_update(Request $request, $id)
    // {
    //     $employee = Employee::find($id);
    //     if (!$employee) {

    //         return redirect()->back()->withErrors(['message' => 'Employee Not Found']);
    //     } else {

    //         $validateData = $request->validate([
    //             'emp_full_name' => 'required|string|max:255',
    //             'emp_username' => 'required|string|max:255',
    //             'emp_email' => 'required|string|max:255|unique:employee_master,emp_email,' . $employee->id,
    //             'emp_phone' => 'required|string|max:20',
    //             'emp_gender' => 'required|string|max:10',
    //         ]);

    //         $employee->update($validateData);
    //         return redirect()->route('employee_list')->with('success', 'Employee Updated Successfully');
    //     }
    // }



    // == #### Delete Employee ==================================================================================
    // public function employee_delete($id)
    // {
    //     $employee = Employee::find($id);
    //     if (!$employee) {

    //         return redirect()->back()->withErrors(['message' => 'Employee Not Found']);
    //     } else {

    //         $employee->delete();
    //         return redirect()->route('employee_list')->with('success', 'Employee Updated Successfully');
    //     }
    // }





    public function employee_crud(Request $request, $action, $id = null)
    {

        switch ($action) {

                // Case Employee Create 
            case 'employee_create':
                $validatedData = $request->validate([
                    'emp_full_name' => 'required|string|max:255',
                    'emp_email' => 'required|string|max:255|email|unique:employee_master,emp_email',
                    'emp_phone' => 'required|string|max:20',
                    'emp_gender' => 'required|string|max:10',
                    'emp_username' => 'required|string|max:255|unique:employee_master,emp_username',
                    'emp_password' => 'required|string|min:8',
                    'confirm_password' => 'required|string|same:emp_password',
                ]);
                Employee::create(array_merge($validatedData, [
                    'emp_password' => Hash::make($validatedData['emp_password']),
                ]));
                return redirect()->route('employee_crud', ['action' => 'employee_show']);




                // Case Employee Show 
            case 'employee_show':
                $employees = Employee::withTrashed()->get();
                // $employees = Employee::all();
                return view('employee_details', compact('employees'));



                // Case Employee Find for Edit 
            case 'employee_edit':
                $employee = Employee::find($id);
                return view('employee_edit', compact('employee'));




                // Case Employee Update 
            case 'employee_update':
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
                    return redirect()->route('employee_crud', ['action' => 'employee_show'])->with('success', 'Employee Updated Successfully');
                }



                // Case Employee find & Delete 
            case 'employee_delete':
                $employee = Employee::find($id);
                if (!$employee) {
                    return redirect()->back()->withErrors(['message' => 'Employee Not Found']);
                } else {
                    $employee->delete();
                    return redirect()->route('employee_crud', ['action' => 'employee_show'])->with('success', 'Employee Updated Successfully');
                }



            default:
                return response()->json(['error' => 'Invalid Action'], 400);
        }
    }
}
