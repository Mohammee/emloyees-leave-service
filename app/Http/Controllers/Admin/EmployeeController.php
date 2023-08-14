<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{

    public function __construct(private UploadFile $uploadFile)
    {
    }

    public function index()
    {
        $employees = Employee::latest()->paginate(1);
        return view('backend.employees.index', compact('employees'));
    }

    public function create()
    {
        $employee = new Employee();
        return view('backend.employees.create', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('backend.employees.edit', compact('employee'));
    }

    public function show(Employee $employee)
    {
        return view('backend.employees.show', compact('employee'));
    }

    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile->upload($request->file('image'));
        }

        $employee = Employee::query()->create($data);

        return Redirect::route('admin.employees.index')->with('success', "{$employee->name} joined our team.");
    }


    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile->upload($request->file('image'), $employee->image);
        }

        $employee->update($data);

        return Redirect::back()->with('success', "{$employee->name} updated.");
    }
}
