@extends('app.layouts.app')
@section('content')
    <!-- App body starts -->
    <div class="app-body">

        <!-- Row starts -->
        <div class="row gx-3">
            <div class="col-xl-4">
                <form action="{{ route('roles.store') }}" method="POST">
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
                                                class="ri-briefcase-4-line"></i> Role Details</a>
                                    </li>
                                </ul>
                                <!-- Nav tabs ends -->

                                <!-- Tab content starts -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                                        <!-- Row starts -->
                                        <div class="row gx-3">
                                            <!-- Name -->
                                            <div class="col-xxl-12 col-lg-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="ri-account-circle-line"></i>
                                                        </span>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Enter Name" required>
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
                                    <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">Save</button>

                                </div>
                                <!-- Card acrions ends -->

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Row ends -->

    </div>
    <!-- App body ends -->
@endsection
