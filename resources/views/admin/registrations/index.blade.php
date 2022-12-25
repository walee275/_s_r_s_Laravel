@extends('layout.admin.main')

@section('title', 'Admin | Registerations')

@section('contents')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Registerations</h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.registerations.add') }}" class="btn btn-outline-primary">Add Registeration</a>
        </div>
    </div>

    <div class="row bg-white mb-5">
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-body">

                    @include('partials.alerts')

                {{-- @section('contents') --}}

                    @if ($registerations)
                        <table class="table table-bordered bg-white mb-5">
                            <thead>
                                <th>S.R NO.</th>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($registerations as $registeration)
                                     <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $registeration->student->user->name }}</td>
                                        <td>{{ $registeration->course->name }}</td>
                                        <td>{{ $registeration->created_at }}</td>
                                        <td><a href="{{ route('admin.registeration.edit', $registeration) }}" class="btn btn-outline-info">Edit</a>
                                            <a href="{{ route('admin.registeration.destroy', $registeration) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                            </tbody>
                    @endforeach
                    </table>
                @else
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                No Records Found
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    @endif
                @endsection
