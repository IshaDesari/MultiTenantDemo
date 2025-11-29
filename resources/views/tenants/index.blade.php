{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link class="ml-4 float-right" href="{{ route('tenants.create') }}">Add Tenant</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Domain
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $tenant)
                                    <tr class="bg-white border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap
                                        Apple MacBook Pro 17">{{$tenant->name}}
                                            </th>
                                        <td class="px-6 py-4">
                                            {{$tenant->email}}
                                        </td>
                                        <td class="px-6 py-4">
                                           @foreach ($tenant->domains as $domain)
                                               {{$domain->domain}} {{$loop->last ? "" : ", "}}
                                           @endforeach
                                        </td>
                                        <td class="px-6 py-4">

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.app')
@section('content')
    <!-- App body starts -->
    <div class="app-body">

        <!-- Row starts -->
        <div class="row gx-3">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Hospital List</h5>
                        <a href="{{ route('tenants.create') }}" class="btn btn-primary ms-auto">Add Hospital</a>
                    </div>
                    <div class="card-body">

                        <!-- Table starts -->
                        <div class="table-responsive">
                            <table id="basicExample" class="table truncate m-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Domain</th>
                                        <th>Password</th>
                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tenants as $tenant)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tenant->name }}</td>
                                            <td>{{ $tenant->email }}</td>
                                            <td> @foreach ($tenant->domains as $domain)
                                               {{$domain->domain}} {{$loop->last ? "" : ", "}}
                                           @endforeach</td>
                                            <td>{{ $tenant->password }}</td>
                                            {{-- <td>
                                                <div class="d-inline-flex gap-1">
                                                    <form method="POST"
                                                        action="{{ route('tenants.destroy', $tenant->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete Tenant">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('tenants.edit', $tenant->id) }}"
                                                        class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-title="Edit Tenant Details">
                                                        <i class="ri-edit-box-line"></i>
                                                    </a>
                                                </div>
                                            </td> --}}
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
    <!-- App body ends -->
@endsection
