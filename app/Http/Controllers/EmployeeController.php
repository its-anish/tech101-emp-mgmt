<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create($department_id)
    {
        $_department = Department::findOrFail($department_id);
        return view('employee/employee-form', compact('_department'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "employee_name" => "required",
            "employee_email" => "required",
            "employee_contact" => "required",
            "employee_company_id" => "required",
        ]);

        $employee = new Employee();
        $employee->name = $request->employee_name;
        $employee->email = $request->employee_email;
        $employee->contact = $request->employee_contact;
        $employee->company_id = $request->employee_company_id;

        $employee->save();

        $_departments = $request->input('employee_department');
        $employee->departments()->sync($_departments);

        $request->session()->flash("success", "Employee Created Successfully");

        return redirect()->route('company-department', [$request->employee_department_id]);
    }
}
