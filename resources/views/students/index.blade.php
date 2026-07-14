@extends('layout')
@section('content')
<h2>Student List</h2>
<a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<table class="table mt-3">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>
@foreach($students as $student)
<tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>{{ $student->phone }}</td>
    <td>
        <a href="{{ route('students.edit',$student->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('students.destroy',$student->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
{{ $students->links() }}
@endsection
