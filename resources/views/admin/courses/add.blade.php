@extends('layout.admin.main')

@section('title', 'Admin | Add Courses')

@section('contents')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Add Courses</h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.courses') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('partials.alerts')

                    <form action="{{ route('admin.courses.add') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Course Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{ old('name') }}" placeholder="Enter the course name">

                            @error('name')
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
