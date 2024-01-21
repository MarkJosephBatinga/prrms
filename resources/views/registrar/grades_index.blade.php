@extends('includes.app')

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Grades</h3>
        </div>
        <!-- Search  -->
        <div class="search-button-container">
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Search">
                <i class='bx bx-search-alt search-icon'></i>
            </div>
        </div>
        <!-- Records Table -->
        <div class="table-container">
            <table>
                <thead>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Nationality</th>
                    <th>Program</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->student_id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->nationality}}</td>
                            <td>{{$student->program}}</td>
                            <td>
                                <a href="{{route('view_grades', $student->id)}}"><i class='bx bx-file-find action-icons mr-2'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
