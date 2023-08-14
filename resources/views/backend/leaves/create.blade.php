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

                    <form action="{{ route('admin.leaves.store') }}" method="post">
                        @csrf

                       @include('backend.leaves._form', ['btn_name' => 'Create'])

                    </form>

                </div>
            </div>
        </div>
    </div>


</x-main-layout>

