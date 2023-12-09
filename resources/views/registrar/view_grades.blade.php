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
                    <option>School Year</option>
                </select>

                <select class="select-filter ml-3">
                    <option>Term</option>
                </select>
            </div>
        </div>
        <!-- Grade Card -->
        <div class="grade-card">
            <p class="grade-card-heading">2020-2021 &emsp; &emsp; First Semester</p>
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
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr>
                                <td>{{$grade->code_no}}</td>
                                <td>G{{$grade->course_no}}</td>
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
