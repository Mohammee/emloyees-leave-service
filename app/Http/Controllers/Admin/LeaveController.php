<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LeaveController extends Controller
{


    public function index()
    {
        $leaves = Leave::latest()->paginate(1);
        return view('backend.leaves.index', compact('leaves'));
    }

    public function create()
    {
        $leave = new Leave();
        return view('backend.leaves.create', compact('leave'));
    }

    public function edit(Leave $leave)
    {
        return view('backend.leaves.edit', compact('leave'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);

        $leave = Leave::query()->create($data);

        return Redirect::route('admin.leaves.index')->with('success', "{$leave->name} created.");
    }


    public function update(Request $request, Leave $leave)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        $leave->update($data);

        return Redirect::back()->with('success', "{$leave->name} updated.");
    }
}
