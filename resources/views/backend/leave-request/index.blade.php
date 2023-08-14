<x-main-layout title="Leaves Request Control">

    <x-slot name="header">
        <x-sub-header header-title="Leaves Request"></x-sub-header>
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
                                <th>Employee Name</th>
                                <th>leave Name</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>Days</th>
                                <th>Actions</th>
                            </tr>

                            </thead>

                            <tbody>

                            @forelse($leaveRequests as $leaveRequest)
                                <tr>
                                    <td>{{ $leaveRequest->employee->name }}</td>
                                    <td>{{ $leaveRequest->leave->name }}</td>
                                    <td style="color: {{ $leaveRequest->status->getColor() }};">{{ $leaveRequest->status->value }}</td>
                                    <td>{{ $leaveRequest->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $leaveRequest->days }}</td>
                                    <td>
                                        <a href="{{ route('admin.leaveRequests.show', [$leaveRequest->employee->id, $leaveRequest->leave->id])  }}"  class="btn btn-secondary">Show</a>
                                    </td>
                                </tr>
                            @empty

                            @endforelse

                            </tbody>

                        </table>
                    </div>

                    <div>
                        {{ $leaveRequests->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>


