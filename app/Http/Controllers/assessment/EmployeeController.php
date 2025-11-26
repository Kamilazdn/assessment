<?php

namespace App\Http\Controllers\assessment;

use App\Http\Controllers\Controller;
use App\Models\assessment\Employee;
use App\Models\assessment\Company;
use App\Http\Requests\assessment\employee\StoreEmployeeRequest;
use App\Http\Requests\assessment\employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::with('company')->paginate(10);
        return view('employee.index', compact('employee'));
    }

    public function create()
    {
        $company = Company::all();
        return view('employee.create', compact('company'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        Employee::create($data);

        return redirect()->route('employee.index')
            ->with('success', 'Employee created successfully!');
    }

    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $company = Company::all();
        return view('employee.edit', compact('employee', 'company'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();
        $employee->update($data);

        return redirect()->route('employee.index')
            ->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->with('success', 'Employee deleted successfully!');
    }
}