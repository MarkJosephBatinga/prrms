@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Add Course</h3>
            <div class="tab-status-container">
                <div id="course-info-tab" class="tab-status"></div>
                <div id="course-schedule-tab" class="tab-status next"></div>
            </div>
        </div>
        <!-- Add Course Form -->
        <form action="{{route('create_course')}}" method="POST">
            @csrf
            <div class="sub-page-content">
                <div id="course-info-form">
                    <div class="form-top-container">
                        <p class="form-header">Course Information</p>
                        <div class="form-input">
                            <div class="input-group">
                                <label class="label-input">Course Category</label>
                                <select class="input-text course_info" name="course_category" id="course_category">
                                    <option selected disabled>Select Category</option>
                                    <option value="Core Subjects">Core Course</option>
                                    <option value="Major Subjects">Major Course</option>
                                    <option value="Elective Subjects">Elective Course</option>
                                    <option value="Institutional Requirement">Institutional Requirement</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label class="label-input">Course Code</label>
                                <input type="text" class="input-text course_info" name="course_code" id="course_code"/>
                            </div>

                            <div class="input-group">
                                <label class="label-input">Descriptive Title</label>
                                <input type="text" class="input-text course_info" name="descriptive_title" id="descriptive_title"/>
                            </div>

                            <div class="input-group">
                                <label class="label-input">Units</label>
                                <input type="number" class="input-text course_info" name="units" id="units"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-bottom-container">
                        <i id="course-info-clear" class="clear-button">Clear</i>
                        <div class="button-container">
                            <a href="{{ route('courses') }}"><i class="back-button">Back</i></a>
                            <i class="continue-button ml-3" id="course-info-next">Continue</i>
                        </div>
                    </div>
                </div>
                <div id="course-schedule-form" class="d-none">
                    <div class="form-top-container">
                        <p class="form-header">Schedule</p>
                        <div class="form-input">
                            <div class="input-group">
                                <label class="label-input">Day</label>
                                <select class="input-text" name="day[]">
                                    <option selected disabled>Select Day</option>
                                    <option value="Monday">Monday</option>
                                    <option  value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label class="label-input">Time</label>
                                <input type="time" class="input-text" name="time[]" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-bottom-container">
                        <i id="course-schedule-clear" class="clear-button">Clear</i>
                        <div class="button-container">
                            <i class="back-button" id="course-schedule-back">Back</i>
                            <button type="submit" class="continue-button ml-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/course.js') }}"></script>
@endpush
