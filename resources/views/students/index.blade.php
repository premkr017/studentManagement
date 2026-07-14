@extends('layout')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-people"></i> Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Student
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card shadow">
    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>DOB</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ \Carbon\Carbon::parse($student->dob)->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('students.edit',$student->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('students.destroy',$student->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete karna hai?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
</div>
@endsection
