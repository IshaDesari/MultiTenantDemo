@extends('app.layouts.app')
@section('content')
    @can('user-create')
        <!-- App body starts -->
        <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
                <div class="col-xl-8">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
                                                    class="ri-briefcase-4-line"></i> User Details</a>
                                        </li>
                                    </ul>
                                    <!-- Nav tabs ends -->

                                    <!-- Tab content starts -->
                                    <div class="tab-content h-350">
                                        <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                            <!-- Row starts -->
                                            <div class="row gx-3">

                                                <!-- Name -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">Name <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-account-circle-line"></i></span>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ old('name') }}"
                                                                placeholder="Enter Name">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-mail-open-line"></i></span>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="{{ old('email') }}"
                                                                placeholder="Enter Email">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Role (Only Admins Can Assign) -->
                                                @hasanyrole('admin')
                                                    <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                        <label for="roles" class="form-label">Assigned Role</label>
                                                        {!! Form::select('roles[]', $roles, null, ['class' => 'form-select', 'id' => 'roleSelect']) !!}
                                                        @error('roles')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                @endhasanyrole

                                                <!-- Password -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="password">Password <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-lock-line"></i></span>
                                                            <input type="password" class="form-control" id="password"
                                                                name="password" value="{{ old('password') }}"
                                                                placeholder="Enter Password">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Phone -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phone">Phone <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-phone-line"></i></span>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" value="{{ old('phone') }}"
                                                                placeholder="Enter Phone Number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Gender -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="gender">Gender <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="ri-user-line"></i></span>
                                                            <select class="form-select" id="gender" name="gender">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male" @selected(old('gender') == 'Male')>Male
                                                                </option>
                                                                <option value="Female" @selected(old('gender') == 'Female')>Female
                                                                </option>
                                                                <option value="Other" @selected(old('gender') == 'Other')>Other
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Date of Birth -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="dob">Date of Birth <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-calendar-line"></i></span>
                                                            <input type="date" class="form-control" id="dob"
                                                                name="dob" value="{{ old('dob') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Status -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="status">Status <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-checkbox-circle-line"></i></span>
                                                            <select class="form-select" id="status" name="status">
                                                                <option value="">Select Status</option>
                                                                <option value="1" @selected(old('status') == '1')>Active
                                                                </option>
                                                                <option value="0" @selected(old('status') == '0')>Inactive
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="col-xxl-8 col-lg-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="address">Address <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i
                                                                    class="ri-map-pin-line"></i></span>
                                                            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter Address">{{ old('address') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Doctor Availability Section (supports multiple rows) -->
                                                <div class="col-12" id="doctorAvailability" style="display:none;">
                                                    <hr>
                                                    <h5 class="mb-3">Doctor Availability</h5>

                                                    <div id="availabilityList">
                                                        {{-- Render old input first (validation errors), otherwise render $doctorAvailabilities if provided --}}
                                                        @php
                                                            $old_days = old('day_of_week', []);
                                                            $old_starts = old('start_time', []);
                                                            $old_ends = old('end_time', []);
                                                            // $old_slots = old('slot_minutes', []);
                                                            $initialRows = max(
                                                                count($old_days),
                                                                isset($doctorAvailabilities)
                                                                    ? count($doctorAvailabilities)
                                                                    : 0,
                                                                0,
                                                            );
                                                        @endphp

                                                        @for ($i = 0; $i < max($initialRows, 1); $i++)
                                                            @php
                                                                // Prefer old inputs, then $doctorAvailabilities (array of objects/arrays), else empty
                                                                $dayVal =
                                                                    $old_days[$i] ??
                                                                    ($doctorAvailabilities[$i]->day_of_week ??
                                                                        ($doctorAvailabilities[$i]['day_of_week'] ??
                                                                            '' ??
                                                                            ''));
                                                                $startVal =
                                                                    $old_starts[$i] ??
                                                                    ($doctorAvailabilities[$i]->start_time ??
                                                                        ($doctorAvailabilities[$i]['start_time'] ??
                                                                            '' ??
                                                                            ''));
                                                                $endVal =
                                                                    $old_ends[$i] ??
                                                                    ($doctorAvailabilities[$i]->end_time ??
                                                                        ($doctorAvailabilities[$i]['end_time'] ??
                                                                            '' ??
                                                                            ''));
                                                                // $slotVal = $old_slots[$i] ?? ($doctorAvailabilities[$i]->slot_minutes ?? ($doctorAvailabilities[$i]['slot_minutes'] ?? '')) ?? '';
                                                            @endphp

                                                            <div class="availability-row row gx-3 align-items-end mb-2">
                                                                <div class="col-lg-3 col-sm-6">
                                                                    <label class="form-label">Day of Week</label>
                                                                    <select name="day_of_week[]" class="form-select">
                                                                        <option value="">Select Day</option>
                                                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $d)
                                                                            <option value="{{ $d }}"
                                                                                @selected($dayVal == $d)>{{ $d }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-lg-2 col-sm-6">
                                                                    <label class="form-label">Start Time</label>
                                                                    <input type="time" name="start_time[]"
                                                                        class="form-control" value="{{ $startVal }}">
                                                                </div>

                                                                <div class="col-lg-2 col-sm-6">
                                                                    <label class="form-label">End Time</label>
                                                                    <input type="time" name="end_time[]"
                                                                        class="form-control" value="{{ $endVal }}">
                                                                </div>

                                                                {{-- <div class="col-lg-2 col-sm-6">
                                                                        <label class="form-label">Slot (minutes)</label>
                                                                        <input type="number" name="slot_minutes[]" class="form-control" min="1" value="{{ $slotVal }}" placeholder="15">
                                                                    </div> --}}

                                                                <div class="col-lg-1 col-sm-6">
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-availability"
                                                                        title="Remove row" style="margin-top:0.5rem;">
                                                                        &times;
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>

                                                    <div class="mt-2">
                                                        <button type="button" id="addAvailability"
                                                            class="btn btn-primary btn-sm">+ Add Availability</button>
                                                        <small class="text-muted ms-2">You can add multiple days.</small>
                                                    </div>
                                                </div>

                                                {{-- Template (hidden) for new rows --}}
                                                <template id="availabilityTemplate">
                                                    <div class="availability-row row gx-3 align-items-end mb-2">
                                                        <div class="col-lg-3 col-sm-6">
                                                            <label class="form-label">Day of Week</label>
                                                            <select name="day_of_week[]" class="form-select">
                                                                <option value="">Select Day</option>
                                                                <option value="Monday">Monday</option>
                                                                <option value="Tuesday">Tuesday</option>
                                                                <option value="Wednesday">Wednesday</option>
                                                                <option value="Thursday">Thursday</option>
                                                                <option value="Friday">Friday</option>
                                                                <option value="Saturday">Saturday</option>
                                                                <option value="Sunday">Sunday</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-2 col-sm-6">
                                                            <label class="form-label">Start Time</label>
                                                            <input type="time" name="start_time[]" class="form-control"
                                                                value="">
                                                        </div>

                                                        <div class="col-lg-2 col-sm-6">
                                                            <label class="form-label">End Time</label>
                                                            <input type="time" name="end_time[]" class="form-control"
                                                                value="">
                                                        </div>

                                                        {{-- <div class="col-lg-2 col-sm-6">
                                                                    <label class="form-label">Slot (minutes)</label>
                                                                    <input type="number" name="slot_minutes[]" class="form-control" min="1" placeholder="15">
                                                            </div> --}}

                                                        <div class="col-lg-1 col-sm-6">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm remove-availability"
                                                                title="Remove row" style="margin-top:0.5rem;">
                                                                &times;
                                                            </button>
                                                        </div>
                                                    </div>
                                                </template>

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
                                    <a href="{{ route('tenants.index') }}" class="btn btn-outline-secondary">
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


    <!-- Script to toggle Doctor Availability -->
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('roleSelect');
            const doctorSection = document.getElementById('doctorAvailability');
            const availabilityList = document.getElementById('availabilityList');
            const addBtn = document.getElementById('addAvailability');
            const template = document.getElementById('availabilityTemplate').content;

            // Show/hide doctor availability when role includes "doctor"
            function toggleDoctorFields() {
                const selectedRoleText = roleSelect?.options[roleSelect.selectedIndex]?.text?.toLowerCase() || '';
                if (selectedRoleText.includes('doctor')) {
                    doctorSection.style.display = 'block';
                } else {
                    doctorSection.style.display = 'none';
                }
            }

            // Add new availability row
            function addAvailabilityRow(prefill = {}) {
                const clone = document.importNode(template, true);
                // Optionally prefill values if provided
                if (prefill.day) clone.querySelector('select[name="day_of_week[]"]').value = prefill.day;
                if (prefill.start) clone.querySelector('input[name="start_time[]"]').value = prefill.start;
                if (prefill.end) clone.querySelector('input[name="end_time[]"]').value = prefill.end;
                // if (prefill.slot) clone.querySelector('input[name="slot_minutes[]"]').value = prefill.slot;

                availabilityList.appendChild(clone);
            }

            // Remove row (event delegation)
            availabilityList.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-availability')) {
                    // If there's only one row left, clear it instead of removing to keep one row in UI
                    const rows = availabilityList.querySelectorAll('.availability-row');
                    const row = e.target.closest('.availability-row');
                    if (rows.length <= 1) {
                        // clear inputs
                        row.querySelector('select[name="day_of_week[]"]').value = '';
                        row.querySelector('input[name="start_time[]"]').value = '';
                        row.querySelector('input[name="end_time[]"]').value = '';
                        // row.querySelector('input[name="slot_minutes[]"]').value = '';
                    } else {
                        row.remove();
                    }
                }
            });

            // Add button handler
            addBtn.addEventListener('click', function() {
                addAvailabilityRow();
            });

            // Initialize visibility and ensure at least one row exists
            toggleDoctorFields();
            roleSelect?.addEventListener('change', toggleDoctorFields);

            // If there are zero .availability-row (shouldn't happen because server renders 1), add one
            if (availabilityList.querySelectorAll('.availability-row').length === 0) {
                addAvailabilityRow();
            }
        });
    </script>
@endsection

@endsection
