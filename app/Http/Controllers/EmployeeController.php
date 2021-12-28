<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $companies;
    protected $departments;

    public function __construct()
    {
        $this->companies = Company::get();
        $this->departments = Department::get();
    }

    public function index()
    {
        //
        $employees = Employee::get();
        return view('employee/employees', [
            'employees' => $employees,
            'companies' => $this->companies,
            'departments' => $this->departments,
        ]);
    }

    public function create()
    {
        return view('employee/employee-form', [
            'companies' => $this->companies,
            'departments' => $this->departments,
        ]);
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            "employee_name" => "required",
            "employee_email" => "required",
            "employee_contact" => "required",
            "employee_company_id" => "required",
            "employee_department_id" => "required",
        ]);

        $employee = new Employee();
        $employee->name = $request->employee_name;
        $employee->email = $request->employee_email;
        $employee->contact = $request->employee_contact;
        $employee->company_id = $request->employee_company_id;
        $employee->department_id = $request->employee_department_id;

        $employee->save();
        $request->session()->flash("success", "Employee Created Successfully");

        return redirect()->to("employees");
    }

    public function show(Request $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        //
    }


    public function update(Request $request, Employee $employee)
    {
        //
    }

    public function destroy(Employee $employee)
    {
        //
    }
}