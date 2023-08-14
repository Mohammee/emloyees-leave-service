<x-main-layout title="Employees Control">

    <x-slot name="header">
        <x-sub-header header-title="Employees"></x-sub-header>
    </x-slot>

    <x-alert message="success"/>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive p-0">

                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Job</th>
                                <th>Salary</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>

                            </thead>

                            <tbody>

                            @forelse($employees as $employee)
                               <tr>
                                   <td>{{ $employee->id }}</td>
                                   <td><img src="{{ $employee->image_url }}" alt="Image" class="w-75"></td>
                                   <td>{{ $employee->name }}</td>
                                   <td>{{ $employee->email }}</td>
                                   <td>{{ $employee->job }}</td>
                                   <td>{{ '$' . number_format($employee->salary,2) }}</td>
                                   <td style="color: {{ $employee->status->getColor() }};">{{ $employee->status->value }}</td>
                                   <td>
                                       <a href="{{ url()->route('admin.employees.show', $employee->id)  }}" class="btn btn-primary">Show</a>
                                       <a href="{{ url()->route('admin.employees.edit', $employee->id)  }}"  class="btn btn-secondary">Edit</a>
                                       <a class="btn btn-danger">Delete</a>
                                   </td>
                               </tr>
                            @empty

                            @endforelse

                            </tbody>

                        </table>
                    </div>

                    <div>
                        {{ $employees->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>

