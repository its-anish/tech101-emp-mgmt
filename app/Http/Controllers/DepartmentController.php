<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "department_name" => "required",
        ]);

        $department = new Department();

        $department->name = $request->department_name;
        $department->company_id = $request->company_id;

        $department->save();
        $request->session()->flash("success", "Designation Created Successfully");

        return redirect()->route("company-show", $request->company_id);
    }

    public function show($department_id)
    {
        $department = Department::findOrFail($department_id);
        return view('department/department-info', compact('department'));
    }
}
