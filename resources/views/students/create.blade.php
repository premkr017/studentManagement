@extends('layout')
@section('content')
<h2>Add Student</h2>
<form action="{{ route('students.store') }}" method="POST">
@csrf
Name: <input type="text" name="name" class="form-control" required><br>
Email: <input type="email" name="email" class="form-control" required><br>
Phone: <input type="text" name="phone" class="form-control" required><br>
DOB: <input type="date" name="dob" class="form-control" required><br>
Address: <textarea name="address" class="form-control"></textarea><br>
<button class="btn btn-success">Save</button>
</form>
@endsection
