@extends('layouts.app')
@section('content')
    <!-- App body starts -->
    <div class="app-body">

        <!-- Row starts -->
        <div class="row gx-3">
            <div class="col-xl-8">
                <div class="card">
                    <form action="{{ route('tenants.store') }}" method="POST">
                        @csrf
                    <div class="card-body">

                        <!-- Custom tabs starts -->
                        <div class="custom-tabs-container">

                            <!-- Nav tabs starts -->
                            <ul class="nav nav-tabs" id="customTab2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA"
                                        role="tab" aria-controls="oneA" aria-selected="true"><i
                                            class="ri-briefcase-4-line"></i> Hospital Details</a>
                                </li>
                            </ul>
                            <!-- Nav tabs ends -->

                            <!-- Tab content starts -->
                            <div class="tab-content">
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
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Enter Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="domain_name">Domain Name <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="ri-account-circle-line"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="domain_name" name="domain_name"
                                                        placeholder="Enter Domain Name">
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
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Enter Email">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="ri-lock-line"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="password"
                                                        name="password" placeholder="Enter Password">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="confirm_password">Confirm Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="ri-lock-2-line"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="confirm_password"
                                                        name="confirm_password" placeholder="Re-enter Password">
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
                                <button type="submit" class="btn btn-primary">Save</button>

                            <a href="{{ route('tenants.index') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                          
                                
                          </div>
                        <!-- Card acrions ends -->
</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row ends -->

    </div>
    <!-- App body ends -->
@endsection
