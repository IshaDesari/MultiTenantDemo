{{-- <x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('put')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Roles -->
                        <div class="mt-4">
                            <x-input-label for="roles" :value="__('Roles')" />
                            <select multiple class="" name="roles[]">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if (in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-tenant-app-layout> --}}

@extends('app.layouts.app')
@section('content')
    @can('user-update')
        <!-- App body starts -->
        <div class="app-body">

            <!-- Row starts -->
            <div class="row gx-3">
                <div class="col-xl-8">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                                                            <span class="input-group-text">
                                                                <i class="ri-account-circle-line"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Enter Name"
                                                                value={{ $user->name }}>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-mail-open-line"></i>
                                                            </span>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" placeholder="Enter Email"
                                                                value={{ $user->email }}>
                                                        </div>
                                                    </div>
                                                </div>

                                                @hasanyrole('admin')
                                                    <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                        <label for="roles" class="form-label">Assigned Role</label>
                                                        {!! Form::select('roles', $roles, $userRole[0] ?? null, ['class' => 'form-select', 'id' => 'roleSelect']) !!}
                                                        @error('roles')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                @endhasanyrole

                                                {{-- @hasanyrole('admin')
                                                    <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                        <label for="roles" class="form-label">Assigned Role</label>
                                                        {!! Form::select('roles[]', $roles, old('roles', $userRoles ?? []), ['class' => 'form-select', 'id' => 'roleSelect']) !!}
                                                        @error('roles')
                                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                @endhasanyrole --}}


                                                <!-- Password -->
                                                {{-- <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="password">Password <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-lock-line"></i>
                                                        </span>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="Enter Password">
                                                    </div>
                                                </div>
                                            </div> --}}

                                                <!-- Phone -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phone">Phone <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-phone-line"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" placeholder="Enter Phone Number"
                                                                value="{{ $user->phone }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Gender -->
                                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="gender">Gender <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ri-user-line"></i>
                                                            </span>
                                                            <select class="form-select" id="gender" name="gender">
                                                                <option value="">Select Gender</option>
                                                                <option value="male" @selected($user->gender == 'male')>Male
                                                                </option>
                                                                <option value="female" @selected($user->gender == 'female')>Female
                                                                </option>
                                                                <option value="other" @selected($user->gender == 'other')>Other
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
                                                            <span class="input-group-text">
                                                                <i class="ri-calendar-line"></i>
                                                            </span>
                                                            <input type="date" class="form-control" id="dob"
                                                                name="dob" value={{ $user->dob }}>
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
                                                            <select class="form-select" id="status" name="status">
                                                                <option value="">Select Status</option>
                                                                <option value="1" @selected($user->status == 1)>Active
                                                                </option>
                                                                <option value="0" @selected($user->status == 0)>Inactive
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
                                                            <span class="input-group-text">
                                                                <i class="ri-map-pin-line"></i>
                                                            </span>
                                                            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter Address">{{ $user->address }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Doctor Availability Section (shown if role includes doctor) -->
                                                <div class="col-12" id="doctorAvailability" style="display:none;">
                                                    @php
                                                        $days = [
                                                            0 => 'Sunday',
                                                            1 => 'Monday',
                                                            2 => 'Tuesday',
                                                            3 => 'Wednesday',
                                                            4 => 'Thursday',
                                                            5 => 'Friday',
                                                            6 => 'Saturday',
                                                        ];
                                                    @endphp

                                                    <hr>
                                                    <h5 class="mb-3">Doctor Availability</h5>

                                                    <div id="availabilityList">
                                                        {{-- Render old() values first on validation fail --}}
                                                        @php
                                                            $old_days = old('day_of_week', []);
                                                            $old_starts = old('start_time', []);
                                                            $old_ends = old('end_time', []);
                                                            // $old_slots = old('slot_minutes', []);
                                                            $old_ids = old('availability_id', []);
                                                            $existing = $doctorAvailabilities ?? collect([]);
                                                            $initialRows = max(count($old_days), $existing->count(), 0);
                                                        @endphp

                                                        @for ($i = 0; $i < max($initialRows, 1); $i++)
                                                            @php
                                                                $dayVal =
                                                                    $old_days[$i] ??
                                                                    ($existing[$i]->day_of_week ??
                                                                        ($existing[$i]['day_of_week'] ?? ('' ?? '')));
                                                                $startVal =
                                                                    $old_starts[$i] ??
                                                                    ($existing[$i]->start_time ??
                                                                        ($existing[$i]['start_time'] ?? ('' ?? '')));
                                                                $endVal =
                                                                    $old_ends[$i] ??
                                                                    ($existing[$i]->end_time ??
                                                                        ($existing[$i]['end_time'] ?? ('' ?? '')));
                                                                // $slotVal =
                                                                //     $old_slots[$i] ??
                                                                //     ($existing[$i]->slot_minutes ??
                                                                //         ($existing[$i]['slot_minutes'] ?? ('' ?? '')));
                                                                $idVal =
                                                                    $old_ids[$i] ??
                                                                    ($existing[$i]->id ??
                                                                        ($existing[$i]['availability_id'] ??
                                                                            ('' ?? '')));
                                                            @endphp

                                                            <div class="availability-row row gx-3 align-items-end mb-2">
                                                                {{-- keep track of existing availability id (if any) for server updates --}}
                                                                <input type="hidden" name="availability_id[]"
                                                                    value="{{ $idVal }}">

                                                                <div class="col-lg-3 col-sm-6">
                                                                    <label class="form-label">Day of Week</label>
                                                                    <select name="day_of_week[]" class="form-select">
                                                                        <option value="">Select Day</option>
                                                                        @foreach ($days as $key => $day)
                                                                            <option value="{{ $key }}"
                                                                                @selected(old('day_of_week.' . $i, $availability->day_of_week ?? '') == $key)>
                                                                                {{ $day }}
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


                                                </div>
                                                <!-- Row ends -->
                                            </div>
                                        </div>

                                        <!-- Tab content ends -->

                                    </div>
                                    <!-- Custom tabs ends -->

                                    <!-- Card acrions starts -->
                                    <div class="d-flex gap-2 justify-content-center mt-4">

                                        <button class="btn btn-primary" type="submit"> Save</button>
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

@section('scripts')
    {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                function toggleDoctorAvailability() {
                    const roleSelect = document.querySelector('select[name="roles[]"]');
                    const doctorAvailabilitySection = document.getElementById('doctorAvailability');
                    const selectedRoles = Array.from(roleSelect.selectedOptions).map(option => option.text.toLowerCase());

                    if (selectedRoles.includes('doctor')) {
                        doctorAvailabilitySection.style.display = 'block';
                    } else {
                        doctorAvailabilitySection.style.display = 'none';
                    }
                }

                // Initial check
                toggleDoctorAvailability();

                // Listen for changes
                const roleSelect = document.querySelector('select[name="roles[]"]');
                roleSelect.addEventListener('change', toggleDoctorAvailability);
            });
        </script> --}}


    <template id="availabilityTemplate">
        <div class="availability-row row gx-3 align-items-end mb-2">
            <input type="hidden" name="availability_id[]" value="">
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
                <input type="time" name="start_time[]" class="form-control" value="">
            </div>

            <div class="col-lg-2 col-sm-6">
                <label class="form-label">End Time</label>
                <input type="time" name="end_time[]" class="form-control" value="">
            </div>

            <div class="col-lg-2 col-sm-6">
                <label class="form-label">Slot (minutes)</label>
                <input type="number" name="slot_minutes[]" class="form-control" min="1" placeholder="15">
            </div>

            <div class="col-lg-1 col-sm-6">
                <button type="button" class="btn btn-danger btn-sm remove-availability" title="Remove row"
                    style="margin-top:0.5rem;">
                    &times;
                </button>
            </div>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('roleSelect');
            const doctorSection = document.getElementById('doctorAvailability');
            const availabilityList = document.getElementById('availabilityList');
            const addBtn = document.getElementById('addAvailability');
            const template = document.getElementById('availabilityTemplate').content;

            function toggleDoctorFields() {
                // roleSelect may be a multiple select depending on your Form::select setup
                let selectedText = '';
                if (!roleSelect) {
                    doctorSection.style.display = 'none';
                    return;
                }

                // If it's a multi-select, check all selected options
                if (roleSelect.multiple) {
                    const opts = Array.from(roleSelect.options).filter(o => o.selected).map(o => o.text
                        .toLowerCase());
                    selectedText = opts.join(' ');
                } else {
                    selectedText = roleSelect.options[roleSelect.selectedIndex]?.text?.toLowerCase() || '';
                }

                if (selectedText.includes('doctor')) {
                    doctorSection.style.display = 'block';
                } else {
                    doctorSection.style.display = 'none';
                }
            }

            function addAvailabilityRow(prefill = {}) {
                const clone = document.importNode(template, true);
                if (prefill.id) clone.querySelector('input[name="availability_id[]"]').value = prefill.id;
                if (prefill.day) clone.querySelector('select[name="day_of_week[]"]').value = prefill.day;
                if (prefill.start) clone.querySelector('input[name="start_time[]"]').value = prefill.start;
                if (prefill.end) clone.querySelector('input[name="end_time[]"]').value = prefill.end;
                // if (prefill.slot) clone.querySelector('input[name="slot_minutes[]"]').value = prefill.slot;
                availabilityList.appendChild(clone);
            }

            // Remove row (event delegation)
            availabilityList.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-availability')) {
                    const rows = availabilityList.querySelectorAll('.availability-row');
                    const row = e.target.closest('.availability-row');

                    // If row has an availability_id (existing), removing it will simply drop it from the submitted list.
                    // Handle deleting on the server (delete availabilities not present in availability_id[]).
                    if (rows.length <= 1) {
                        // clear inputs
                        row.querySelector('select[name="day_of_week[]"]').value = '';
                        row.querySelector('input[name="start_time[]"]').value = '';
                        row.querySelector('input[name="end_time[]"]').value = '';
                        // row.querySelector('input[name="slot_minutes[]"]').value = '';
                        row.querySelector('input[name="availability_id[]"]').value = '';
                    } else {
                        row.remove();
                    }
                }
            });

            addBtn?.addEventListener('click', function() {
                addAvailabilityRow();
            });

            // Init
            toggleDoctorFields();
            roleSelect?.addEventListener('change', toggleDoctorFields);

            // Ensure at least one row exists
            if (availabilityList.querySelectorAll('.availability-row').length === 0) {
                addAvailabilityRow();
            }
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const roleSelect = document.getElementById("roleSelect");
            const section = document.getElementById("doctorAvailability");
            const wrapper = document.getElementById("availabilityWrapper");

            // Show when role is doctor
            const toggle = () => {
                const txt = roleSelect?.options[roleSelect.selectedIndex]?.text?.toLowerCase() || '';
                section.style.display = txt.includes('doctor') ? 'block' : 'none';
            };
            roleSelect?.addEventListener('change', toggle);
            toggle();

            // Add new row
            document.getElementById("addRow").addEventListener("click", () => {
                const row = wrapper.querySelector(".availability-row").cloneNode(true);
                row.querySelectorAll("input, select").forEach(el => el.value = '');
                wrapper.appendChild(row);
            });

            // Remove row
            wrapper.addEventListener("click", e => {
                if (e.target.classList.contains("removeRow")) {
                    if (wrapper.children.length > 1) e.target.closest(".availability-row").remove();
                }
            });
        });
    </script>
@endsection
@endsection
