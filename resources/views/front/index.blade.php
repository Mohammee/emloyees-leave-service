<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Leave Requests') }}
        </h2>
    </x-slot>

    <div class="py-12 row">

        <x-alert message="success"/>

        <div class="table-responsive">


                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Leave Type</th>
                                <th>Number of Days</th>
                                <th>Start Date</th>
                                <th>Status</th>
                            </tr>

                            </thead>

                            <tbody>
                            @php
                                $i = 1;
                                @endphp
                            @forelse($employee->leaves as $leave)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $leave->name }}</td>
                                    <td>{{ $leave->pivot->days }}</td>
                                    <td>{{ $leave->pivot->start_date->format('Y-m-d g:i a') }}</td>
                                    <td style="color: {{ $leave->pivot->status->getColor() }};">{{ $leave->pivot->status->value }}</td>
                                </tr>
                            @empty
{{----}}
                            @endforelse

                            </tbody>

                        </table>

        </div>
    </div>
</x-app-layout>
