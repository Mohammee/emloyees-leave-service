
<x-form.group>
    <x-form.label id="name" label="Name"/>
    <x-form.input name="name" :value="old('name', $leave->name)"/>
</x-form.group>


<div class="text-center">
    <button type="submit" class="btn btn-primary">{{ $btn_name }}</button>
</div>
