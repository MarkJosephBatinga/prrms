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
                <div id="course-info-tab" class="tab-one tab-status"></div>
                <div id="course-schedule-tab" class="tab-two tab-status next"></div>
            </div>
        </div>
        <!-- Add Course Form -->
        <form action="{{route('create_course')}}" method="POST" class="sub-page-content multi-form">
            @csrf
            <div id="course-info-form" class="form-one">
                <div class="form-top-container">
                    <p class="form-header">Course Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Course Category</label>
                            <select class="input-text course_info" name="course_category" id="course_category">
                                <option value="" selected>Select Category</option>
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
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('courses') }}"><i class="back-button">Back</i></a>
                        <i class="continue-button continue-one ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div id="course-schedule-form" class="form-two d-none">
                <div class="form-top-container">
                    <p class="form-header">Schedule</p>
                </div>
                <div id="schedule-input">
                    <div class="input-group">
                        <label class="label-input">Day</label>
                        <select class="input-text" name="day[]" required>
                            <option value="" selected>Select Day</option>
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
                        <input type="text" class="input-text" name="time[]" required/>
                    </div>
                </div>
                <div id="schedule-container"></div>

                <div class="schedule-actions">
                    <i class='bx bx-x delete-row'></i>
                    <i class='bx bx-plus add-row'></i>
                </div>

                <div class="form-bottom-container">
                    <i class="clear-button clear-two">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-two">Back</i>
                        <button type="submit" class="continue-button ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(document).ready(function() {

            var rowCounter = 0;

            function cloneExamRow() {
                rowCounter++;

                var newRow = $('#schedule-input').clone();
                newRow.find("input[name='day[]']").attr('name', 'day[]').prop('required', true);
                newRow.find("input[name='time[]']").attr('name', 'time[]').prop('required', true);

                newRow.find("input[name='day[]']").val('');
                newRow.find("input[name='time[]").val('');
                
                $('#schedule-container').append(newRow);
                console.log('New clone name:', newRow.find("input[name='schedule_day[" + rowCounter + "]']").prop('name'));
            }

            $('.add-row').click(function() {
                cloneExamRow();
            });

            $('.delete-row').click(function() {
                if (rowCounter > 0) {
                    $('#schedule-container').children().last().remove();
                    rowCounter--;
                }
            });

        });
    </script>
@endpush
