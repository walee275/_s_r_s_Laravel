@extends('layout.admin.main')

@section('title', 'Admin | Add Student')

@section('contents')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Add Student</h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.students') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                @section('contents')
                <div class="row">
                    <div class="col-6">
                        <h1 class="h3 mb-3">Courses</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('admin.courses.add') }}" class="btn btn-outline-primary">Add Course</a>
                    </div>
                </div>
                    @if (count($courses))
                    @include('partials.alerts')
                        <table class="table table-bordered">
                            <thead>
                                    <th>S.R No.</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->created_at }}</td>
                                    <td><a href="{{ route('admin.course.edit', $course) }}" class="btn btn-primary">Edt</a>
                                        <a href="{{ route('admin.course.destroy', $course) }}" class="btn btn-danger">Delete</a>
                                    </td>

                            </tbody>
                    @endforeach
                    </table>
                @else
                    @endif
                @endsection
