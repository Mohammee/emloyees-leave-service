<x-main-layout title="Leaves Control">

    <x-slot name="header">
        <x-sub-header header-title="Leaves"></x-sub-header>
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
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>

                            </thead>

                            <tbody>

                            @forelse($leaves as $leave)
                               <tr>
                                   <td>{{ $leave->id }}</td>
                                    <td>{{ $leave->name }}</td>
                                   <td>
                                       <a href="{{ url()->route('admin.leaves.edit', $leave->id)  }}"  class="btn btn-secondary">Edit</a>
                                       <a class="btn btn-danger">Delete</a>
                                   </td>
                               </tr>
                            @empty

                            @endforelse

                            </tbody>

                        </table>
                    </div>

                    <div>
                        {{ $leaves->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>

