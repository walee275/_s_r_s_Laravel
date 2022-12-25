@extends('layout.admin.main')

@section('title', 'Admin | Edit Registerations')

@section('contents')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Edit Registerations</h1>
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

                    <form action="{{ route('admin.registeration.edit', $registeration) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <select name="student" id="student"
                                class="form-select @error('student') is-invalid @enderror">
                                <option value="" selected hidden disabled>Please select the student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        @if (old('student')) {{ $student->id == old('student') ? 'selected' : '' }} @else {{ $student->id == $registeration->student_id ? 'selected' : '' }} @endif>
                                        {{ $student->user->name }}</option>
                                @endforeach
                            </select>
                            @error('student')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select name="course" id="course"
                                class="form-select @error('student') is-invalid @enderror">
                                <option value="" selected hidden disabled>Please select the course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        @if (old('student')) {{ $course->id == old('course') ? 'selected' : '' }} @else {{ $course->id == $registeration->course_id ? 'selected' : '' }} @endif>
                                        {{ $course->name }}</option>
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
