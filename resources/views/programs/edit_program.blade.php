@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="sub-page-header">
            <h3 class="content-header mt-2">Edit Program</h3>
            <div class="tab-status-container">
                <div id="prog-info-tab" class="tab-one tab-status"></div>
                <div id="core-courses-tab" class="tab-two tab-status next"></div>
                <div id="major-courses-tab" class="tab-three tab-status next"></div>
                <div id="elective-courses-tab" class="tab-four tab-status next"></div>
                <div id="institutional-courses-tab" class="tab-five tab-status next"></div>
            </div>
        </div>
        <!-- Add Program Form -->
        <form id="prog_form" class="sub-page-content multi-form" action="{{route('update_program')}}" method="POST">
            @csrf
            <div id="prog-info-form" class="form-one">
                <div class="form-top-container">
                    <p class="form-header">Program Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Program Name</label>
                            <input class="input-text prog_info" name="program_name" id="program_name" value="{{$program->program_name}}"/>
                            <input type="hidden" class="input-text prog_info" name="id" id="id" value="{{$program->id}}"/>
                        </div>

                        <div class="input-group">
                            <label class="label-input">Effective School Year</label>
                            <input class="input-text prog_info" name="effective_school_year" id="effective_school_year" value="{{$program->effective_school_year}}"/>
                        </div>

                        <div class="input-group">
                            <label class="label-input">Dean</label>
                            <input class="input-text prog_info" name="dean" id="dean" value="{{$program->dean}}"/>
                        </div>

                        <div class="input-group">
                            <label class="label-input">Program Chair</label>
                            <input class="input-text prog_info" name="program_chair" id="program_chair" value="{{$program->program_chair}}"/>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('programs') }}"><i class="back-button">Back</i></a>
                        <i class="continue-button continue-one ml-3">Continue</i>
                        <i class="clear-button-responsive clear-one">Clear all Answers</i>
                    </div>
                </div>
            </div>
            <div id="core-courses-form" class="form-two d-none">
                <div class="form-top-container">
                    <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Core Courses)</p>
                    </div>
                    <div class="form-input input-checkbox mt-1">
                        @foreach ($core_courses as $c_course)
                            <div class="checkbox-container">
                                <input type="checkbox" class="core_course" name='program_courses[]' value="{{$c_course->id}}"
                                    {{ $program->program_courses->contains('course_id', $c_course->id) ? 'checked' : '' }} />
                                <label class="checkbox-label">{{$c_course->descriptive_title}}({{$c_course->course_code}})</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-two">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-two">Back</i>
                        <i class="continue-button continue-two ml-3">Continue</i>
                        <i class="clear-button-responsive clear-two">Clear all Answers</i>
                    </div>
                </div>
            </div>
            <div id="major-courses-form" class="form-three d-none">
                <div class="form-top-container">
                    <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Major Courses)</p>
                    </div>
                    <div class="form-input input-checkbox mt-1">
                        @foreach ($major_courses as $m_course)
                            <div class="checkbox-container">
                                <input type="checkbox" class="major_course" name='program_courses[]' value="{{$m_course->id}}"
                                    {{ $program->program_courses->contains('course_id', $m_course->id) ? 'checked' : '' }} />
                                <label class="checkbox-label">{{$m_course->descriptive_title}}({{$m_course->course_code}})</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-three">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-three">Back</i>
                        <i class="continue-button continue-three ml-3">Continue</i>
                        <i class="clear-button-responsive clear-three">Clear all Answers</i>
                    </div>
                </div>
            </div>
            <div id="elective-courses-form" class="form-four d-none">
                <div class="form-top-container">
                    <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Elective Courses)</p>
                    </div>
                    <div class="form-input input-checkbox mt-1">
                        @foreach ($elective_courses as $e_course)
                            <div class="checkbox-container">
                                <input type="checkbox" class="elective_course" name='program_courses[]' value="{{$e_course->id}}"
                                    {{ $program->program_courses->contains('course_id', $e_course->id) ? 'checked' : '' }} />
                                <label class="checkbox-label">{{$e_course->descriptive_title}}({{$e_course->course_code}})</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-four">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-four">Back</i>
                        <i class="continue-button continue-four ml-3">Continue</i>
                        <i class="clear-button-responsive clear-four">Clear all Answers</i>
                    </div>
                </div>
            </div>
            <div id="institutional-courses-form" class="form-five d-none">
                <div class="form-top-container">
                    <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Institutional Requirement for Graduation)</p>
                    </div>
                    <div class="form-input input-checkbox mt-1">
                        @foreach ($institutional_reqs as $i_req)
                            <div class="checkbox-container">
                                <input type="checkbox" class="ins_course" name='program_courses[]' value="{{$i_req->id}}"
                                    {{ $program->program_courses->contains('course_id', $i_req->id) ? 'checked' : '' }} />
                                <label class="checkbox-label">{{$i_req->descriptive_title}}({{$i_req->course_code}})</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-five">Clear</i>
                    <div class="button-container">
                        <div class="button-container">
                            <i class="back-button back-five">Back</i>
                            <button id="prog_submit" type="submit" class="continue-button ml-3">Submit</button>
                            <i class="clear-button-responsive clear-five">Clear all Answers</i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
