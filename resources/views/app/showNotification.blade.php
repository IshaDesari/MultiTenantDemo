@extends('app.layouts.app')

@section('content')

    <div class="body d-flex pb-3">
        <div class="container-fluid container-xxl=">
            <div class="row align-items-center">
                <div class="border-0 mb-2">
                    <div
                        class="card-header py-2 no-bg bg-transparent d-flex align-items-center px-0 border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Notifications
                            {{-- <small class="alert alert-warning ms-2 py-0 px-2 noti-count" style="font-size: 16px">
                                {{ $notifications->count() }}
                            </small> --}}
                        </h3>
                        <div class="alert= alert-warning mx-0 ms-2 px-2 py-0 noti-count" style="margin-bottom: 1rem">
                            {{ $notifications->count() }}</div>
                    </div>
                </div>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                </ol>
            </nav>

            <div class="row g-3 mb-3">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($notifications->count() > 0)
                                <a href="#" class="btn btn-sm btn-outline-primary" id="mark-all">
                                    Mark all as read
                                </a>
                                @foreach ($notifications as $notification)
                                    <ul class="list-unstyled list mb-0">
                                        <li class="py-2 mb-1 border-bottom noti-item">
                                            <a href="{{ url($notification->data['url']) }}" class="d-flex"
                                                data-id="{{ $notification->id }}">
                                                <div class="flex-fill ms-2">
                                                    <p class="d-flex justify-content-between mb-0">
                                                        <span class="font-weight-bold">
                                                            {{ $notification->data['name'] }}</span>
                                                        <a href="#" rel="tooltip" title="Mark as read"
                                                            style="font-size: 16px;" class="link-danger mark-as-read"
                                                            data-id="{{ $notification->id }}">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </p>
                                                    <p class="d-flex justify-content-between mb-0">
                                                        {{ $notification->data['noti-msg'] }}
                                                        <small>{{ date('j M Y, g:i A', strtotime($notification->created_at)) }}</small>
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <p align="center">There are no new notifications</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
