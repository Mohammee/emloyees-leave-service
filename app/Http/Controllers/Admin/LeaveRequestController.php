<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LeaveRequestController extends Controller
{


    public function index()
    {
        $leaveRequests = EmployeeLeave::with(['employee:id,name', 'leave:id,name'])->latest()->paginate(1);

        return view('backend.leave-request.index', compact('leaveRequests'));
    }

    public function show($employee, $leave)
    {
        $leaveRequest = $this->findRequest($employee, $leave);

        return view('backend.leave-request.show', compact('leaveRequest'));
    }

    public function update(Request $request, $employee, $leave)
    {
        $this->findRequest($employee, $leave);

        $data = $request->validate(['status' => 'required|in:approved,deny', 'deny_reason' => 'nullable|string|max:255']);
        DB::table('employee_leave')->where([
            'employee_id' => $employee,
            'leave_id' => $leave
        ])->update($data);

        return Redirect::back()->with('success' , 'Request Updated Successfully.');
    }

    private function findRequest($employee, $leave)
    {
        $leaveRequest = EmployeeLeave::query()->where([
            'employee_id' => $employee,
            'leave_id' => $leave
        ])->first();

        abort_if(!$leaveRequest, 404);

        return $leaveRequest;
    }
}
