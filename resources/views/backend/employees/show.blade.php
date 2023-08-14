<x-main-layout title="Employees Control">

    <x-slot name="header">
        <x-sub-header header-title="Employees"></x-sub-header>
    </x-slot>

    <x-alert message="success"/>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <img src="{{ $employee->image_url }}" alt="Image" style="width:190px;object-fit: cover;">
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label d-block">Name: <strong style="color: blue;">{{ $employee->name }}</strong></label>
                            <label class="col-form-label d-block">Email: <strong style="color: blue;">{{ $employee->email }}</strong></label>
                            <label class="col-form-label d-block">Job: <strong style="color: blue;">{{ $employee->job }}</strong></label>
                            <label class="col-form-label d-block">Salary: <strong style="color: blue;">${{ $employee->salary }}</strong></label>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label d-block">Birthday: <strong style="color: blue;">{{ $employee->birthday }}</strong></label>
                            <label class="col-form-label d-block">Joined At: <strong style="color: blue;">{{ $employee->joined_at?->diffForHumans() }}</strong></label>
                            <label class="col-form-label d-block">Status: <strong style="color: {{ $employee->status->getColor() }};">{{ $employee->status->value }}</strong></label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-main-layout>

