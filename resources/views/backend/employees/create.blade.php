<x-main-layout title="Employees Control">

    <x-slot name="header">
        <x-sub-header header-title="Employees"></x-sub-header>
    </x-slot>

    <x-alert message="success"/>
    <x-errors/>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.employees.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                       @include('backend.employees._form', ['btn_name' => 'Create'])

                    </form>

                </div>
            </div>
        </div>
    </div>


</x-main-layout>

