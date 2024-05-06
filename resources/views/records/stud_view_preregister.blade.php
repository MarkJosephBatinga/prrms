@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header mb-n4">
            <h3 class="content-header mt-2">Student Pre-Registration</h3>
        </div>
        <!-- Registration Status -->
        <div class="pre-registration-status">
            <p>Status</p>
            <section class="step-wizard">
                <ul class="step-wizard-list">
                    <li class="step-wizard-item">
                        <span class="progress-count">1</span>
                        <span class="progress-label">Pre-Registered</span>
                    </li>
                    <li class="step-wizard-item {{($student->approval_log->status == 1) ? 'current-item' : ''}}">
                        <span class="progress-count">2</span>
                        <span class="progress-label">{{($student->approval_log->status == 1) ? 'In-Progress' : 'Endorsed'}}</span>
                    </li>
                    <li class="step-wizard-item {{($student->approval_log->status == 2) ? 'current-item' : ''}}">
                        <span class="progress-count">3</span>
                        <span class="progress-label">{{($student->approval_log->status == 2) ? 'In-Progress' : 'Approved'}}</span>
                    </li>
                    <li class="step-wizard-item {{($student->approval_log->status == 3) ? 'current-item' : ''}}">
                        <span class="progress-count">4</span>
                        <span class="progress-label">{{($student->approval_log->status == 3) ? 'In-Progress' : 'Registered'}}</span>
                    </li>
                    <li class="step-wizard-item {{($student->approval_log->status == 4) ? 'current-item' : ''}}">
                        <span class="progress-count">5</span>
                        <span class="progress-label">{{($student->approval_log->status == 4) ? 'In-Progress' : 'Enrolled'}}</span>
                    </li>
                </ul>
            </section>
        </div>
        <!-- Registration Details -->
        <div class="sub-page-content">
            <div class="details-body">
                <div class="tab-headers">
                    <i class="header-one active">Student Type</i>
                    <i class="header-two">Personal Information</i>
                    <i class="header-three">Program Offerings</i>
                    <i class="header-four">Payment Mode</i>
                    <i class="header-five">Student Files</i>
                </div>
                <div class="detail-one info">
                    <div class="detail-group">
                        <p class="detail-label">Student Type</p>
                        <p class="details-value">{{$student->student_type}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">School Year</p>
                        <p class="details-value">{{$student->school_year_info->start_date}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Semester</p>
                        <p class="details-value">{{$student->semester_info->semester}}</p>
                    </div>
                </div>
                <div class="detail-two info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Full Name</p>
                        <p class="details-value">{{$student->name}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Complete Address</p>
                        <p class="details-value">{{$student->address}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Nationality</p>
                        <p class="details-value">{{$student->nationality}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Mobile Number</p>
                        <p class="details-value">{{$student->mobile_number}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Email Address</p>
                        <p class="details-value">{{$student->email_address}}</p>
                    </div>
                </div>
                <div class="detail-three info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Program</p>
                        <p class="details-value">{{(isset($student->program_info)) ? $student->program_info->program_name : 'No Program'}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Courses</p>
                        <ul class="mt-1 ml-n3">
                            @foreach ($student->course as $c)
                                <li>{{$c->course->descriptive_title}} ({{$c->course->course_code}})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="detail-four info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Payment</p>
                        <p class="details-value">{{$student->payment_mode}}</p>
                    </div>
                </div>
                <div id="file-details" class="detail-five info d-none">
                    <div class="detail-group">
                        <p class="detail-label">OTR</p>
                        <form action="{{ route('download_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->file_record}}">
                            <button class="download-button"  type="submit" class="download-button">Download</button>
                        </form>
                        <form class="view-file-form" action="{{ route('view_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->file_record}}">
                            <button class="download-button"  type="submit" class="download-button">View</button>
                        </form>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Birth Certificate</p>
                        <form action="{{ route('download_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->birth_cert}}">
                            <button class="download-button"  type="submit" class="download-button">Download</button>
                        </form>
                        <form class="view-file-form" action="{{ route('view_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->birth_cert}}">
                            <button class="download-button"  type="submit" class="download-button">View</button>
                        </form>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Letter of Intent</p>
                        <form action="{{ route('download_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->letter_intent}}">
                            <button class="download-button"  type="submit" class="download-button">Download</button>
                        </form>
                        <form class="view-file-form" action="{{ route('view_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->letter_intent}}">
                            <button class="download-button"  type="submit" class="download-button">View</button>
                        </form>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Recommendation Letter</p>
                        <form action="{{ route('download_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->rec_letter}}">
                            <button class="download-button"  type="submit" class="download-button">Download</button>
                        </form>
                        <form class="view-file-form" action="{{ route('view_file') }}" method="POST">
                            @csrf
                            <input type="hidden" name="filename" value="{{$student->rec_letter}}">
                            <button class="download-button"  type="submit" class="download-button">View</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/pre-register.js') }}"></script>
@endpush
