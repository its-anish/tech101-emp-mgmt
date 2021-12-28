<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function getAllCompany()
    {
        $companies = Company::get();

        return response()
            ->json($companies)
            ->setStatusCode(Response::HTTP_OK);
    }

    public function getCompanyDepartments($company_id)
    {
        $departments = Department::where("company_id", $company_id)->get();
        return response()
            ->json($departments)
            ->setStatusCode(Response::HTTP_OK);;
    }

    public function getCompanyEmployees($company_id)
    {
        $employees = Employee::where("company_id", $company_id)->get();
        return response()
            ->json($employees)
            ->setStatusCode(Response::HTTP_OK);;
    }

    public function getCompanyDeparmentEmployees($company_id, $department_id)
    {
        $employees = Employee::where("company_id", $company_id)
            ->where("department_id", $department_id)
            ->get();

        return response()
            ->json($employees)
            ->setStatusCode(Response::HTTP_OK);;
    }

    public function getEmployees()
    {
        $employees = Employee::get();

        foreach ($employees as $employee) {
            $employee->departments;
            $employee["company"] = $employee->company;
            unset($employee->company_id);
            unset($employee->department_id);
        }

        return response()
            ->json($employees)
            ->setStatusCode(Response::HTTP_OK);;
    }
}
