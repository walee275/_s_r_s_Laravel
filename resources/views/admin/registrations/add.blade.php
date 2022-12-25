@extends('layout.admin.main')

@section('title', 'Admin | Add Registerations')

@section('contents')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Add Registerations</h1>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('admin.registerations') }}" class="btn btn-outline-primary">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('partials.alerts')

                    <form action="{{ route('admin.registerations.add') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                        <select name="student" id="student" class="form-select @error('student') is-invalid @enderror">
                            <option value="" selected hidden disabled>Please select the student</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                            @endforeach
                        </select>
                        @error('student')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                        </div>

                        <div class="mb-3">
                            <select name="course" id="course" class="form-select @error('student') is-invalid @enderror">
                                <option value="" selected hidden disabled>Please select the course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" >{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course')
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
