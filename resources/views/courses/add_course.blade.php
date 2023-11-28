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
        <div class="sub-page-content">
            <div id="course-info-form">
                <div class="form-top-container">
                    <p class="form-header">Course Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Course Category</label>
                            <select class="input-text">
                                <option selected disabled>Select Category</option>
                                <option>Core Course</option>
                                <option>Major Course</option>
                                <option>Elective Course</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label class="label-input">Course Code</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Descriptive Title</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Units</label>
                            <input class="input-text" />
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i id="course-info-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <a href="course_list.php"><i class="back-button">Back</i></a>
                        <i class="continue-button ml-3" id="course-info-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="course-schedule-form" class="d-none">
                <div class="form-top-container">
                    <p class="form-header">Schedule</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">First Class of the Week</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Time</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Second Class of the Week</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Time</label>
                            <input class="input-text" />
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i id="course-schedule-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <i class="back-button" id="course-schedule-back">Back</i>
                        <button class="continue-button ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/course.js') }}"></script>
@endpush
