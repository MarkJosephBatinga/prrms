@extends('includes.app')

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Records</h3>
    </div>
    <!-- Search and Pre register Button -->
    <div class="search-button-container">
        <div class="search-container">
            <input type="text" class="search-box" placeholder="Search">
            <i class='bx bx-search-alt search-icon'></i>
        </div>
        <a class="add-button" href="{{ route('pre_register') }}">Pre - Register</a>
    </div>
    <!-- Records Table -->
    <div class="table-container">
        <table>
            <thead>
                <th>Student ID</th>
                <th>Student Type</th>
                <th>Name</th>
                <th>Nationality</th>
                <th>Program</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if(isset($students) && $students != null)
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->user_info->email}}</td>
                            <td>{{$student->student_type}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->nationality}}</td>
                            <td>{{$student->program_info->program_name}}</td>
                            <td>
                                <a href="view_record.php"> <i class='bx bx-low-vision action-icons mr-2'></i> </a>
                                <a href="edit_record.php"> <i class='bx bx-pencil action-icons mr-2'></i> </a>
                                <i class='bx bx-trash action-icons'></i>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
