@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Add Program</h3>
            <div class="tab-status-container">
                <div id="prog-info-tab" class="tab-status"></div>
                <div id="core-courses-tab" class="tab-status next"></div>
                <div id="major-courses-tab" class="tab-status next"></div>
                <div id="elective-courses-tab" class="tab-status next"></div>
                <div id="institutional-courses-tab" class="tab-status next"></div>
            </div>
        </div>
        <!-- Add Program Form -->
        <form id="prog_form" class="sub-page-content" action="{{route('create_program')}}" method="POST">
            @csrf
            <div id="prog-info-form">
                <div class="form-top-container">
                    <p class="form-header">Program Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Program Name</label>
                            <input class="input-text prog_info" name="program_name" id="program_name"/>
                        </div>

                        <div class="input-group">
                            <label class="label-input">Effective School Year</label>
                            <input class="input-text prog_info" name="effective_school_year" id="effective_school_year"/>
                        </div>

                        <div class="input-group">
                            <label class="label-input">Dean</label>
                            <input class="input-text prog_info" name="dean" id="dean"/>
                        </div>

                        <div class="input-group">
                            <label class="label-input">Program Chair</label>
                            <input class="input-text prog_info" name="program_chair" id="program_chair"/>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i id="prog-info-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('programs') }}"><i class="back-button">Back</i></a>
                        <i class="continue-button ml-3" id="prog-info-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="core-courses-form" class="d-none">
                <div class="form-top-container">
                    <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Core Courses)</p>
                    </div>
                </div>
                <div class="program-courses-container">
                    @foreach ($core_courses as $c_course)
                        <div class="checkbox-group">
                            <input type="checkbox" class="core_course" name='program_courses[]' value="{{$c_course->id}}"/>
                            <label class="checkbox-label">{{$c_course->descriptive_title}}({{$c_course->course_code}})</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-bottom-container">
                    <i id="core-courses-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <i class="back-button" id="core-courses-back">Back</i>
                        <i class="continue-button ml-3" id="core-courses-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="major-courses-form" class="d-none">
                <div class="form-top-container">
                <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Major Courses)</p>
                    </div>
                </div>
                <div class="program-courses-container">
                    @foreach ($major_courses as $m_course)
                        <div class="checkbox-group">
                            <input type="checkbox" class="major_course" name='program_courses[]' value="{{$m_course->id}}"/>
                            <label class="checkbox-label">{{$m_course->descriptive_title}}({{$m_course->course_code}})</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-bottom-container">
                    <i id="major-courses-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <i class="back-button" id="major-courses-back">Back</i>
                        <i class="continue-button ml-3" id="major-courses-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="elective-courses-form" class="d-none">
                <div class="form-top-container">
                    <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Elective Courses)</p>
                    </div>
                </div>
                <div class="program-courses-container">
                    @foreach ($elective_courses as $e_course)
                        <div class="checkbox-group">
                            <input type="checkbox" class="elective_course" name='program_courses[]' value="{{$e_course->id}}"/>
                            <label class="checkbox-label">{{$e_course->descriptive_title}}({{$e_course->course_code}})</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-bottom-container">
                    <i id="elective-courses-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <i class="back-button" id="elective-courses-back">Back</i>
                        <i class="continue-button ml-3" id="elective-courses-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="institutional-courses-form" class="d-none">
                <div class="form-top-container">
                    <div class="courses-header">
                        <p>Program Courses</p>
                        <p class="course-type">(Institutional Requirement for Graduation)</p>
                    </div>
                </div>
                <div class="program-courses-container">
                    @foreach ($institutional_reqs as $i_req)
                        <div class="checkbox-group">
                            <input type="checkbox" class="ins_course" name='program_courses[]' value="{{$i_req->id}}"/>
                            <label class="checkbox-label">{{$i_req->descriptive_title}}({{$i_req->course_code}})</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-bottom-container">
                    <i id="institutional-courses-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <div class="button-container">
                            <i class="back-button" id="institutional-courses-back">Back</i>
                            <button id="prog_submit" type="submit" class="continue-button ml-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('add_content')
    <!-- Core Courses Modal -->
    <form class="modal-container d-none" id="core-courses-modal">
        <div class="modal-content">
            <div class="prog-modal-body">
                <p>Add Core Courses</p>
                <div class="courses-checkbox">
                    <div class="checkbox-groups">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Molecular Biology and Biotechnology</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Course 2</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Course 3</label>
                    </div>
                </div>
                <div class="button-container">
                    <i class="cancel-btn">Cancel</i>
                    <button class="add-btn">Add</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Major Courses Modal -->
    <form class="modal-container d-none" id="major-courses-modal">
        <div class="modal-content">
            <div class="prog-modal-body">
                <p>Major Courses</p>
                <div class="courses-checkbox">
                    <div class="checkbox-groups">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Molecular Biology and Biotechnology</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Course 2</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Course 3</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Course 4</label>
                    </div>
                </div>
                <div class="button-container">
                    <i class="cancel-btn">Cancel</i>
                    <button class="add-btn">Add</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Elective Courses Modal -->
    <form class="modal-container d-none" id="elective-courses-modal">
        <div class="modal-content">
            <div class="prog-modal-body">
                <p>Elective Courses</p>
                <div class="courses-checkbox">
                    <div class="checkbox-groups">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Molecular Biology and Biotechnology</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" />
                        <label class="checkbox-label" >Course 2</label>
                    </div>
                </div>
                <div class="button-container">
                    <i class="cancel-btn">Cancel</i>
                    <button class="add-btn">Add</button>
                </div>
            </div>
        </div>
    </form>
@endpush


@push('js_scripts')
    <script src="{{ asset('js/program.js') }}"></script>
@endpush
