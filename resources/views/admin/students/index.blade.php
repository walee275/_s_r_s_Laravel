@extends('layout.admin.main')

@section('title', 'Admin | Add Student')
@section('section-title', 'Students')
@section('contents')

    <div class="row mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3"></h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.students.add') }}" class="btn btn-outline-primary">Add Students</a>
                </div>
            </div>
            <div class="card mb-5">

                <div class="card-body">

                    @include('partials.alerts')

                {{-- @section('contents') --}}

                    @if (count($students))
                        <table class="table table-bordered bg-white">
                            <thead>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td><img src="{{ asset('uploads/' . $student->user->profile_picture) }}"
                                                alt="profile_picture" width="100px" class="rounded-circle"></td>
                                        <td>{{ $student->user->name }}</td>
                                        <td>{{ $student->user->email }}</td>
                                        <td>{{ $student->user->created_at }}</td>
                                        <td><a href="{{ route('admin.student.edit', $student) }}" class="btn btn-outline-info">Edit</a>
                                            <a href="{{ route('admin.student.destroy', $student) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                            </tbody>
                    @endforeach
                    </table>
                @else
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div>No Records Found</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    @endif
                @endsection
