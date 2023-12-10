@extends('includes.app')

@section('body')
    <div class="content">
        <a href="{{route('grades')}}" class="back-button"> < Back </a>
        <!-- Content Header -->
        <div class="content-header mt-4">
            <h3 class="content-header mt-2">My Grades</h3>
        </div>
        <!-- Search  -->
        <div class="search-button-container">
            <p class="grade-student-name ml-4 mt-3">{{$student->name}}</p>
            <div class="select-filter-container">
                <select class="select-filter">
                    <option>2021-2022</option>
                </select>
                <input type="hidden" name="student_id" value="{{$student->id}}">
                <select id="term_filter" class="select-filter ml-3">
                    <option value="First Semester">First Semester</option>
                    <option value="Second Semester">Second Semester</option>
                </select>
            </div>
        </div>
        <!-- Grade Card -->
        <div class="grade-card">
            <p class="grade-card-heading">2021-2022 &emsp; &emsp; <span id="term_text">First Semester</span></p>
            <!-- List of Student Grades -->
            <div class="table-container">
                <table>
                    <thead>
                        <th>Code No.</th>
                        <th>Course Code</th>
                        <th>Descriptive Title</th>
                        <th>Units</th>
                        <th>Final Grade</th>
                        <th>Removal Rating</th>
                        <th>Remarks</th>
                    </thead>
                    <tbody id="gradeTableBody">
                        @foreach ($grades as $grade)
                            <tr>
                                <td>{{$grade->code_no}}</td>
                                <td>{{$grade->course_no}}</td>
                                <td>{{$grade->descriptive_title}}</td>
                                <td>{{$grade->units}}</td>
                                <td>{{$grade->final_grades}}</td>
                                <td>{{$grade->removal_rating}}</td>
                                <td>{{$grade->remarks}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/grades.js') }}"></script>
@endpush
