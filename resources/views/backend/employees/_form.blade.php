@push('extra-css')
    <link rel="stylesheet" href="{{ asset('dist/css/switchery.css') }}">
@endpush

<x-form.group>
    <x-form.label id="name" label="Name"/>
    <x-form.input name="name" :value="old('name', $employee->name)"/>
</x-form.group>

<x-form.group>
    <x-form.label id="email" label="Email"/>
    <x-form.input type="email" name="email" :value="old('email', $employee->email)"/>
</x-form.group>

<x-form.group>
    <x-form.label id="job" label="job Title"/>
    <x-form.input name="job" :value="old('job', $employee->job)"/>
</x-form.group>


<x-form.group>
    <x-form.label id="salary" label="Salary"/>
    <x-form.input name="salary" :value="old('salary', $employee->salary)"/>
</x-form.group>


<x-form.group>
    <x-form.label id="password" label="Password"/>
    <x-form.input type="password" name="password" />
</x-form.group>


<x-form.group>
    <x-form.label id="password" label="Password Confirmation"/>
    <x-form.input type="password" name="password_confirmation"/>
</x-form.group>


<x-form.group>
    <x-form.label id="joined_at" label="Joined At"/>
    <x-form.input name="joined_at" type="datetime-local"
                  :value="old('joined_at', $employee->joined_at?->format('Y-m-d\TH:i'))"/>
</x-form.group>

<x-form.group>
    <x-form.label id="birthday" label="Birthday"/>
    <x-form.input type="date" name="birthday" :value="old('birthday', $employee->birthday)"/>
</x-form.group>

<x-form.group>
    <x-form.label id="status" label="Status"/>
    <input type="hidden" value="inactive" name="status">
    <input type="checkbox" name="status"  class="js-switch" @checked(old('status', $employee->status?->value) == 'active') value="active"/>
</x-form.group>

<x-form.input-group>

    <div>
        <x-form.label id="image" label="Image"/>
        <x-form.input type="file" name="image"/>
    </div>

    @if($employee->image_url)
        <div class="input-group-prepend">
            <img src="{{ $employee->image_url }}" alt="Image" class="w-25">
        </div>
    @endif

</x-form.input-group>

<div class="text-center">
    <button type="submit" class="btn btn-primary">{{ $btn_name }}</button>
</div>

@push('extra-js')
    <script src="{{ asset('dist/js/switchery.js') }}"></script>

    <script>
        $(window).ready(function(){

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { size: 'medium' });
        })
    </script>
@endpush
