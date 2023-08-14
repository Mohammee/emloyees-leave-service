<x-main-layout title="Leaves Control">

    <x-slot name="header">
        <x-sub-header header-title="Leaves"></x-sub-header>
    </x-slot>

    <x-alert message="success"/>
    <x-errors/>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.leaves.update', $leave->id) }}" method="post">
                        @csrf
                        @method('PUT')

                       @include('backend.leaves._form', ['btn_name' => 'Update'])

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-main-layout>

