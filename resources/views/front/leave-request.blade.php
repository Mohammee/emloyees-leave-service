<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Leave Requests') }}
        </h2>
    </x-slot>

    <div class="container row ">
        <form method="post" action="{{ route('employee.requests.store') }}" class="mt-6 space-y-6">
            @csrf

            <div>
                <x-input-label for="leave_type" :value="__('Leave Type')" />

                <select name="leave_type" id="leave_type" class="form-control">
                    @foreach($leaves as $leave)
                        <option value="{{ $leave->id }}">{{ $leave->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('leave_type')" class="mt-2" />
            </div>


            <div>
                <x-input-label for="start_date" :value="__('Start Date')" />
                <x-text-input id="start_date" name="start_date" type="datetime-local" class="mt-1 block w-full"/>
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="days" :value="__('Number Of Days')" />
                <x-text-input id="days" name="days" type="text" class="mt-1 block w-full"  />
                <x-input-error :messages="$errors->get('days')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
