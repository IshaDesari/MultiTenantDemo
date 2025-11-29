@extends('app.layouts.app')
@section('content')
    @can('appointment-update')
        <!-- App body starts -->
        <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
                <div class="col-xl-8">
                    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">

                                <!-- Custom tabs starts -->
                                <div class="custom-tabs-container">

                                    <!-- Nav tabs starts -->
                                    <ul class="nav nav-tabs" id="customTab2" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA"
                                                role="tab" aria-controls="oneA" aria-selected="true"><i
                                                    class="ri-briefcase-4-line"></i> Appointment Details</a>
                                        </li>
                                    </ul>
                                    <!-- Nav tabs ends -->

                                    <!-- Tab content starts -->
                                    <div class="tab-content h-350">
                                        <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                            <!-- Row starts -->
                                            <div class="row gx-3">

                                                <!-- Patient -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="patient_id">Patient <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-account-circle-line"></i>
                                                            </span>
                                                            <select name="patient_id" id="patient_id" class="form-select" @disabled(Auth::user()->roles[0]->name == 'doctor')>
                                                                <option value="">Select Patient</option>
                                                                @foreach ($patients as $patient)
                                                                    <option value="{{ $patient->id }}"
                                                                        @selected($appointment->patient_id == $patient->id) >
                                                                        {{ $patient->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Doctor -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="doctor_id">Doctor <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-stethoscope-line"></i>
                                                            </span>
                                                            <select name="doctor_id" id="doctor_id" class="form-select" @disabled(Auth::user()->roles[0]->name == 'doctor')>
                                                                <option value="">Select Doctor</option>
                                                                @foreach ($doctors as $doctor)
                                                                    <option value="{{ $doctor->id }}"
                                                                        @selected($appointment->doctor_id == $doctor->id)>
                                                                        {{ $doctor->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Appointment Date -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="appointment_date">Appointment Date <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-calendar-line"></i>
                                                            </span>
                                                            <input type="date" name="appointment_date" id="appointment_date"
                                                                value="{{ $appointment->appointment_date }}"
                                                                class="form-control" @readonly(Auth::user()->roles[0]->name == 'doctor')>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Appointment Time -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="appointment_time">Appointment Time <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-time-line"></i>
                                                            </span>
                                                            <input type="time" name="appointment_time" id="appointment_time"
                                                                value="{{ $appointment->appointment_time }}"
                                                                class="form-control" @readonly(Auth::user()->roles[0]->name == 'doctor')>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Notes -->
                                                <div class="col-xxl-12 col-lg-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="notes">Notes</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-file-list-line"></i>
                                                            </span>
                                                            <textarea name="notes" id="notes" rows="2" class="form-control" placeholder="Enter any notes" @readonly(Auth::user()->roles[0]->name == 'doctor')>{{ $appointment->notes }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Status -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="status">Status <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                            </span>
                                                            <select name="status" id="status" class="form-select">
                                                                <option value="">Select Status</option>
                                                                <option value="pending" @selected($appointment->status == 'pending')>Pending
                                                                </option>
                                                                <option value="confirmed" @selected($appointment->status == 'confirmed')>Confirmed
                                                                </option>
                                                                <option value="completed" @selected($appointment->status == 'completed')>Completed
                                                                </option>
                                                                <option value="cancelled" @selected($appointment->status == 'cancelled')>Cancelled
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                            </div>


                                            <!-- Row ends -->
                                        </div>
                                    </div>

                                    <!-- Tab content ends -->

                                </div>
                                <!-- Custom tabs ends -->

                                <!-- Card acrions starts -->
                                <div class="d-flex gap-2 justify-content-center mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save</button>
                                    <a href="{{ route('appointments.index') }}" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                </div>
                                <!-- Card acrions ends -->

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Row ends -->

        </div>
        <!-- App body ends -->
    @endcan

@endsection
