@extends('app.layouts.app')

@section('content')
    @can('appointment-read')
        <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title">Appointments</h5>
                            @can('appointment-create')
                                <a href="{{ route('appointments.create') }}" class="btn btn-primary ms-auto">Book Appointment</a>
                            @endcan
                        </div>
                        <div class="card-body">

                            <!-- Table starts -->
                            <div class="table-responsive">
                                <table id="basicExample" class="table truncate m-0 align-middle">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Doctor</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Status</th>
                                            {{-- <th>Phone</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $appointment->withDoctor->name }}</td>
                                                <td>{{ date('d M Y', strtotime($appointment->appointment_date)) }}</td>
                                                {{-- <td>{{ $appointment->date }}</td> --}}
                                                <td>{{ date('H:i a', strtotime($appointment->appointment_time)) }}</td>
                                                {{-- <td>{{ $appointment->time }}</td> --}}
                                                <td>{{ $appointment->status }}</td>
                                                {{-- <td>{{ $appointment->phone }}</td> --}}
                                                <td>
                                                    <div class="d-inline-flex gap-1">
                                                        @can('appointment-delete')
                                                            <form method="POST"
                                                                action="{{ route('appointments.destroy', $appointment->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Delete appointment">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                            </form>
                                                            @endcan
                                                            @can('appointment-update')
                                                            <a href="{{ route('appointments.edit', $appointment->id) }}"
                                                                class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" data-bs-title="Edit Appointment">
                                                                <i class="ri-edit-box-line"></i>
                                                            </a>
                                                            @endcan
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
    @endcan

@endsection
