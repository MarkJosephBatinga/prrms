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
            <button class="add-button" id="exportBtn" data-value="grades">Export to CSV</button>
        </div>
        <!-- Records Table -->
        <div class="table-container">
            <table class="table-results" id="myTable">
                <thead>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Nationality</th>
                    <th>Program</th>
                    <th class="exclude">Action</th>
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
                    <tr id="no-result-row" class="exclude">
                        <td colspan="6">No results Found!</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/filterTable.js') }}"></script>
@endpush
