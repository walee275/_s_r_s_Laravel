@extends('layout.admin.main')

@section('title', 'Admin | Edit Student')

@section('contents')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Edit Student</h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.students') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('partials.alerts')

                    <form action="{{ route('admin.student.edit', $student) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <img src="{{ asset('uploads/'. $student->user->profile_picture) }}" class="rounded-circle w-25" alt="profile_picture">
                        </div>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{ old('name') ? old('name') : $student->user->name }}" placeholder="Enter the name">

                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{ old('email') ? old('email') : $student->user->email }}" placeholder="Enter the email">

                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" class="form-control @error('profile_picture') is-invalid @enderror " id="profile_picture" name="profile_picture" value="{{ old('profile_picture') }}">

                            @error('profile_picture')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
