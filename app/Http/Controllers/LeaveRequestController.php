<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LeaveRequestController extends Controller
{

    public function index()
    {
        $employee = auth()->user();
        return view('front.index', compact('employee'));
    }

    public function create(){
        $leaves = Leave::all();

        return view('front.leave-request', compact('leaves'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'leave_type' => 'required|exists:leaves,id',
            'start_date' => ['required', 'date'],
            'days' => 'required|integer'
        ]);


        $employee = auth()->user();

        DB::table('employee_leave')->insert([
            'employee_id' => $employee->id,
            'leave_id' => $data['leave_type'],
            'start_date' => $data['start_date'],
            'days' => $data['days'],
            'created_at' => now()
        ]);

        return Redirect::route('employee.index')->with('success' , 'Request Created Successfully.');
    }
}
