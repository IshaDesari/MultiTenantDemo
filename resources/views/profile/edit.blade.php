@extends('layouts.app')

@section('content')
    <!-- App body starts -->
    <div class="app-body">

        <!-- Row starts -->
        <div class="row gx-3">
            <div class="col-xl-8">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
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
                                                class="ri-user-3-line"></i> Profile Details</a>
                                    </li>
                                </ul>
                                <!-- Nav tabs ends -->

                                <!-- Tab content starts -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                        <!-- Row starts -->
                                        <div class="row gx-3">
                                            <!-- Name -->
                                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-account-circle-line"></i>
                                                        </span>
                                                        <input type="text" value="{{ $user->name }}"
                                                            class="form-control" id="name" name="name"
                                                            placeholder="Enter Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Email -->
                                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Email <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-mail-line"></i>
                                                        </span>
                                                        <input type="email" value="{{ $user->email }}"
                                                            class="form-control" id="email" name="email"
                                                            placeholder="Enter Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Password -->
                                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="password">Password <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-lock-2-line"></i>
                                                        </span>
                                                        <input type="password" value="" class="form-control"
                                                            id="password" name="password" placeholder="Enter Password">
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Phone -->
                                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="phone">Phone <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-cellphone-line"></i>
                                                        </span>
                                                        <input type="text" value="{{ $user->phone }}"
                                                            class="form-control" id="phone" name="phone"
                                                            placeholder="Enter Phone">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- DOB -->
                                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="dob">DOB <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-calendar-2-line"></i>
                                                        </span>
                                                        <input type="date" value="{{ $user->dob }}"
                                                            class="form-control" id="dob" name="dob"
                                                            placeholder="Enter DOB">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Gender -->
                                            <div class="col-xxl-6 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="selectGender1">Gender<span
                                                            class="text-danger">*</span></label>
                                                    <div class="m-0">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="male" value="male" @checked($user->gender == 'male')>
                                                            <label class="form-check-label" for="male">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="female" value="female" @checked($user->gender == 'female')>
                                                            <label class="form-check-label" for="female" >Female</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="other" value="other" @checked($user->gender == 'other')>
                                                            <label class="form-check-label" for="other">Other</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Address -->
                                            <div class="col-xxl-8 col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Address <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-user-location-line"></i>
                                                        </span>
                                                        <textarea name="address" placeholder="Enter Address" id="adress" rows="3" class="form-control">{{ $user->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Password -->
                                            <div class="col-xxl-4 col-lg-6 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="a3">Status <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select" id="a3">
                                                            <option value="">Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
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
                                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">Save</button>

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
@endsection
