<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function getAllCompany()
    {
        try {
            $companies = Company::get();
            $response = $this->createApiResponse(false, "", $companies);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->createApiResponse(true, $e->getMessage(), null);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        }
    }

    public function getCompanyDepartments($company_id)
    {
        try {
            $departments = Department::where("company_id", $company_id)->get();
            $response = $this->createApiResponse(false, "", $departments);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->createApiResponse(true, $e->getMessage(), null);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        }
    }

    public function getCompanyEmployees($company_id)
    {
        try {
            $employees = Employee::where("company_id", $company_id)->get();
            $response = $this->createApiResponse(false, "", $employees);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->createApiResponse(true, $e->getMessage(), null);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        }
    }

    public function getCompanyDeparmentEmployees($company_id, $department_id)
    {
        try {
            $employees = Employee::where("company_id", $company_id)
                ->where("department_id", $department_id)
                ->get();

            $response = $this->createApiResponse(false, "", $employees);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->createApiResponse(true, $e->getMessage(), null);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        }
    }

    public function getEmployees()
    {
        try {
            $employees = Employee::get();
            foreach ($employees as $employee) {
                $employee->departments;
                $employee["company"] = $employee->company;
                unset($employee->company_id);
                unset($employee->department_id);
            }

            $response = $this->createApiResponse(false, "", $employees);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        } catch (Exception $e) {
            $response = $this->createApiResponse(true, $e->getMessage(), null);
            return response()
                ->json($response)
                ->setStatusCode(Response::HTTP_OK);
        }
    }

    public function createApiResponse($isError, $message, $data)
    {
        $result = [];

        if ($isError) {
            $result["success"] = false;
            $result["message"] = $message;
        } else {
            $result["success"] = true;
            if ($data == null) {
                $result["message"] = $message;
            } else {
                if (count($data) == 0) {
                    $result["message"] = "No Record Found";
                }
                $result["data"] = $data;
            }
        }

        return $result;
    }
}
