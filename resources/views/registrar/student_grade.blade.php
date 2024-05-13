@extends('includes.app')

@section('body')
    <div class="content">

        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">My Grades</h3>
        </div>
        <!-- Search  -->
        <div class="search-button-container">
            <div></div>
            <div class="select-filter-container">
                <select class="select-filter">
                    <option>{{ date('Y') . '-' . date('Y', strtotime('+1 year')) }}</option>
                </select>
                <select class="select-filter ml-3">
                    <option>First Semester</option>
                </select>
                <button class="add-button" id="exportBtn" data-value="my_grades">Export to CSV</button>
            </div>
        </div>
        <!-- Grade Card -->
        <div class="grade-card">
            <p class="grade-card-heading">{{ date('Y') . '-' . date('Y', strtotime('+1 year')) }} &emsp; &emsp; First Semester</p>
            <!-- List of Student Grades -->
            <div class="table-container" id="myTable">
                <table>
                    <thead>
                        <th>Code Category</th>
                        <th>Course Code</th>
                        <th>Descriptive Title</th>
                        <th>Units</th>
                        <th>Final Grade</th>
                        <th>Removal Rating</th>
                        <th>Remarks</th>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr>
                                <td>{{$grade->course->course_category}}</td>
                                <td>{{$grade->course->course_code}}</td>
                                <td>{{$grade->course->descriptive_title}}</td>
                                <td>{{$grade->course->units}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/filterTable.js') }}"></script>
@endpush
