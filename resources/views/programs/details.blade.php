@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <a href="{{route('programs')}}" class="back-button"> < Back </a>
        <!-- Content Header -->
        <div class="content-header mt-4 mb-n4">
            <h3 class="content-header mt-2">{{$program->program_name}}</h3>
            <div class="action-container">
                <a href="{{route('edit_program', $program->id)}}"><i class='bx bx-pencil action-icons'></i></a>
                <a href="#" id="openDeleteModal"><i class='bx bx-trash action-icons'></i></a>
            </div>
        </div>
        <!-- Program Details -->
        <div class="sub-page-content">
            <div class="details-body">
                <div class="tab-headers">
                    <i id="prog-info-header" class="header-one active">Program Information</i>
                    <i id="prog-courses-header" class="header-two">Program Courses</i>
                    <i id="prog-summary-header" class="header-three">Summary</i>
                </div>
                <div id="prog-info-details" class="detail-one info">
                    <div class="detail-group">
                        <p class="detail-label">Effective School Year</p>
                        <p class="details-value">{{$program->effective_school_year}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Dean</p>
                        <p class="details-value">{{$program->dean}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Program Chair</p>
                        <p class="details-value">{{$program->program_chair}}</p>
                    </div>
                </div>
                <div id="prog-courses-details" class="detail-two info d-none">
                    <div class="core-courses">
                        <table class="course-table">
                            <colgroup>
                                <col style="width: 30%;">
                                <col style="width: 60%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Core Courses</th>
                                    <th></th>
                                    <th>{{$totalCoreUnits}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coreCourses as $course)
                                    <tr>
                                        <td>{{$course->course->course_code}}</td>
                                        <td>{{$course->course->descriptive_title}}</td>
                                        <td>{{$course->course->units}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="major-courses">
                        <table class="course-table">
                            <colgroup>
                                <col style="width: 30%;">
                                <col style="width: 60%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Major Courses</th>
                                    <th></th>
                                    <th>{{$totalMajorUnits}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($majorCourses as $course)
                                    <tr>
                                        <td>{{$course->course->course_code}}</td>
                                        <td>{{$course->course->descriptive_title}}</td>
                                        <td>{{$course->course->units}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="elective-courses">
                        <table class="course-table">
                            <colgroup>
                                <col style="width: 30%;">
                                <col style="width: 60%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Elective Courses</th>
                                    <th></th>
                                    <th>{{$totalElectiveUnits}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($electiveCourses as $course)
                                    <tr>
                                        <td>{{$course->course->course_code}}</td>
                                        <td>{{$course->course->descriptive_title}}</td>
                                        <td>{{$course->course->units}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="institutional-requirement">
                        <table class="course-table">
                            <colgroup>
                                <col style="width: 30%;">
                                <col style="width: 60%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Institutional Requirement for Graduation</th>
                                    <th></th>
                                    <th>{{$totalInstitutionalUnits}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institutionalCourses as $course)
                                    <tr>
                                        <td>{{$course->course->course_code}}</td>
                                        <td>{{$course->course->descriptive_title}}</td>
                                        <td>{{$course->course->units}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="prog-summary-details" class="detail-three info d-none">
                    <div class="summary-details">
                        <table class="summary-table">
                            <thead>
                                <tr>
                                    <th>Summary</th>
                                    <th>Units</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Core Courses</td>
                                    <td>{{$totalCoreUnits}}</td>
                                </tr>
                                <tr>
                                    <td>Major Courses</td>
                                    <td>{{$totalMajorUnits}}</td>
                                </tr>
                                <tr>
                                    <td>Elective Courses</td>
                                    <td>{{$totalElectiveUnits}}</td>
                                </tr>
                                <tr>
                                    <td>Institutional Requirement for Graduation</td>
                                    <td>{{$totalInstitutionalUnits}}</td>
                                </tr>
                                <tr>
                                    <td>TOTAL</td>
                                    <td>{{$oveallUnits}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('add_content')
    <!-- Delete Modal -->
    <div class="modal-container delete-modal d-none">
        <div class="modal-content">
            <div class="body">
                <img src="{{ asset('/images/warning-logo.svg') }}" />
                <p class="heading-text">Are you sure you want to delete this item?</p>
                <p class="info-text">Deleting this item will remove it permanently. Do you wish to proceed and delete?</p>
                <div class="button-container">
                    <button class="cancel">Cancel</button>
                    <a  type="button" href="{{route('delete_program', $program->id)}}" class="delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
@endpush
