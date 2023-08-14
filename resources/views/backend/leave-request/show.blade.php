<x-main-layout title="Leave Requests Control">


    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('dist/css/switchery.css') }}">
    @endpush


    <x-slot name="header">
        <x-sub-header header-title="Leave Requests"></x-sub-header>
    </x-slot>

    <x-alert message="success"/>
        <x-errors />

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <form method="post"
                          action="{{ route('admin.leaveRequests.update', [$leaveRequest->employee->id, $leaveRequest->leave->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="status" class="col-form-label col-md-2">Status</label>
                            <div class="col-md-10">

                                @if($leaveRequest->status->value == 'pending')
                                    <select name="status" id="status" class="form-control">
                                        @foreach(\App\Enums\LeaveRequestStatus::cases() as $case)
                                            <option
                                                value="{{ $case->value }}" @selected($case->value === $leaveRequest->status->value)>{{ ucfirst($case->value) }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="hidden" name="status" value="deny" >
                                    <input @checked($leaveRequest->status->value == 'approved') id="status"
                                           type="checkbox" name="status" class="js-switch">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row deny {{ $leaveRequest->status->value == 'deny' ? '': 'd-none' }}" >
                            <label for="deny_reason" class="col-form-label col-md-2">Deny Reason</label>
                            <div class="col-md-10">
                                <input id="deny_reason" type="text" class="form-control" name="deny_reason" value="{{ old('deny_reason', $leaveRequest->deny_reason) }}">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-lg-5 py-3">Update</button>
                        </div>
                    </form>

                </div>
            </div>


            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">
                            <label class="col-form-label d-block">Employee Name: <strong
                                    style="color: blue;">{{ $leaveRequest->employee->name }}</strong></label>
                            <label class="col-form-label d-block">Leave Type: <strong
                                    style="color: blue;">{{ $leaveRequest->leave->name  }}</strong></label>
                            <label class="col-form-label d-block">Start Date: <strong
                                    style="color: blue;">{{ $leaveRequest->start_date->format('Y-m-d') }}</strong></label>
                            <label class="col-form-label d-block">Number of Days: <strong
                                    style="color: blue;">${{ $leaveRequest->days }}</strong></label>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label d-block">Created At: <strong
                                    style="color: blue;">{{ $leaveRequest->created_at?->format('Y-m-d h:i a') }}</strong></label>
                            <label class="col-form-label d-block">Status: <strong
                                    style="color: {{ $leaveRequest->status->getColor() }};">{{ $leaveRequest->status->value }}</strong></label>
                            @if($leaveRequest->status->value == 'deny')
                                <label class="col-form-label d-block">Deny Reason: <strong
                                        style="color: blue;">{{ $leaveRequest->deny_reason }}</strong></label>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('extra-js')
        <script src="{{ asset('dist/js/switchery.js') }}"></script>

        <script>
            $(window).ready(function () {

                @if($leaveRequest->status->value != 'pending')
                var elem = document.querySelector('.js-switch');
                var switchery = new Switchery(elem, {size: 'medium'})
                @endif

                $('.js-switch').on('change', function () {
                    if ($(this).is(":checked")) {
                        $('.deny').addClass('d-none');
                    } else {
                        $('.deny').removeClass('d-none');
                    }
                });

                $('select').on('change', function () {
                    if ($(this).val() === 'deny') {
                        $('.deny').removeClass('d-none');
                    } else {
                        $('.deny').addClass('d-none');
                    }
                });

            })
        </script>
    @endpush

</x-main-layout>

