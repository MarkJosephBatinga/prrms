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
                <div id="prog-courses-tab" class="tab-status next"></div>
            </div>
        </div>
        <!-- Add Program Form -->
        <div class="sub-page-content">
            <div id="prog-info-form">
                <div class="form-top-container">
                    <p class="form-header">Program Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Program Name</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Effective School Year</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Dean</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Program Chair</label>
                            <input class="input-text" />
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
            <div id="prog-courses-form" class="d-none">
                <div class="form-top-container">
                    <p class="form-header">Program Courses</p>
                    <div class="modal-button-container">
                        <div class="input-group">
                            <label class="label-input">Core Courses</label>
                            <i id="core-course-btn" class="program-input">Add Core Courses</i>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Major Courses</label>
                            <i id="major-course-btn" class="program-input">Add Major Courses</i>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Elective Courses</label>
                            <i id="elective-course-btn" class="program-input">Add Elective Courses</i>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Institutional Requirement for Graduation</label>
                            <i id="requirement-btn" class="program-input">Add Institutional Requirement</i>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Other Requirements</label>
                            <select class="program-input">
                                <option>Dissertion / Thesis Writing</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i></i>
                    <div class="button-container">
                        <i class="back-button" id="prog-courses-back">Back</i>
                        <button class="continue-button ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
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
