
@extends('app.layouts.app')

@section('content')
    <div class="app-body">

        <!-- Row starts -->
        <div class="row gx-3">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Roles List</h5>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary ms-auto">Add Role</a>
                    </div>
                    <div class="card-body">

                        <!-- Table starts -->
                        <div class="table-responsive">
                            <table id="basicExample" class="table truncate m-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Str::ucfirst($role->name) }}</td>
                                           
                                            <td>
                                                <div class="d-inline-flex gap-1">
                                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-title="Edit">
                                                        <i class="ri-edit-box-line"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table ends -->

                        <!-- Modal Delete Row -->
                        <div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="delRowLabel">
                                            Confirm
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the doctor from list?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                                aria-label="Close">No</button>
                                            <button class="btn btn-danger" data-bs-dismiss="modal"
                                                aria-label="Close">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Row ends -->

    </div>
@endsection
