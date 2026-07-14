@extends('layout')
@section('content')
<h2>Edit Student</h2>
<form action="{{ route('students.update',$student->id) }}" method="POST">
@csrf @method('PUT')
Name: <input type="text" name="name" value="{{ $student->name }}" class="form-control" required><br>
Email: <input type="email" name="email" value="{{ $student->email }}" class="form-control" required><br>
Phone: <input type="text" name="phone" value="{{ $student->phone }}" class="form-control" required><br>
DOB: <input type="date" name="dob" value="{{ $student->dob }}" class="form-control" required><br>
Address: <textarea name="address" class="form-control">{{ $student->address }}</textarea><br>
<button class="btn btn-success">Update</button>
</form>
@endsection
