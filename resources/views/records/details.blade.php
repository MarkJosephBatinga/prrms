@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="header-buttons">
            <a href="{{route('records')}}" class="view-back-button"> < Back </a>
        </div>
        <div class="view-page-header mt-4 mb-n4">
            <h3 class="content-header mt-2">Student Pre-Registration</h3>
        </div>
        <!-- Approval Logs -->
        <div class="pre-registration-details">
            <p class="table-label">Approval Log</p>
            <div class="approval-logs">
                <table>
                    <thead>
                        <tr>
                            <th>Sequence</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Recommending Approval</td>
                            <td>Program Chairman</td>
                            @if ($student->approval_log->status === 1)
                            <td>
                                <button id="show-endorse">Endorse</button>
                            </td>
                            @elseif($student->approval_log->status === 0 && $student->approval_log->last_status === 1)
                            <td>Rejected</td>
                            @else
                            <td>Endorsed</td>
                            @endif
                            <td>{{$student->approval_log->notes}}</td>
                        </tr>
                        <tr>
                            <td>Approved By</td>
                            <td>Dean</td>
                            @if ($student->approval_log->status === 2)
                            <td>
                                <button id="show-evaluate">Evaluate</button>
                            </td>
                            @elseif($student->approval_log->status === 1)
                            <td>Not yet endorsed</td>
                            @elseif($student->approval_log->status === 0 && $student->approval_log->last_status === 2)
                            <td>Rejected</td>
                            @else
                            <td>Evaluated</td>
                            @endif
                            <td>{{$student->approval_log->approve_notes}}</td>
                        </tr>
                        <tr>
                            <td>Registered By</td>
                            <td>Registrar</td>
                            @if ($student->approval_log->status === 3)
                            <td>
                                <button id="show-register">Register</button>
                            </td>
                            @elseif($student->approval_log->status <= 2 && $student->approval_log->status != 0)
                            <td>Not yet evaluated</td>
                            @elseif($student->approval_log->status === 0 && $student->approval_log->last_status === 3)
                            <td>Rejected</td>
                            @else
                            <td>Registered</td>
                            @endif
                            <td>{{$student->approval_log->register_notes}}</td>
                        </tr>
                        <tr>
                            <td>Enrolled By</td>
                            <td>Registrar</td>
                            @if ($student->approval_log->status === 4)
                            <td>
                                <button id="show-enroll">Enroll</button>
                            </td>
                            @elseif($student->approval_log->status <= 3 && $student->approval_log->status != 0)
                            <td>Not yet registered</td>
                            @elseif($student->approval_log->status === 0 && $student->approval_log->last_status === 4)
                            <td>Rejected</td>
                            @else
                            <td>Enrolled</td>
                            @endif
                            <td>{{$student->approval_log->enroll_notes}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Students Details -->
        <div class="details-body">
            <div class="tab-headers">
                <i id="type-header" class="active header-one">Student Type</i>
                <i id="info-header" class="header-two">Personal Info</i>
                <i id="program-header" class="header-three">Program Offerings</i>
                <i id="payment-header" class="header-four">Payment Mode</i>
                <i id="file-header" class="header-five">Student Files</i>
            </div>
            <div id="type-details" class="detail-one info">
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
            <div id="info-details" class="detail-two info d-none">
                <div class="detail-group">
                    <p class="detail-label">Full Name</p>
                    <p class="details-value">{{$student->name}}</p>
                </div>
                <div class="detail-group">
                    <p class="detail-label">Complete Address</p>
                    <p class="details-value">{{$student->address}}</p>
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
            <div id="program-details" class="detail-three info d-none">
                <div class="detail-group">
                    <p class="detail-label">Program</p>
                    <p class="details-value">{{(isset($student->program_info)) ? $student->program_info->program_name : 'No Program'}}</p>
                </div>
                <div class="detail-group">
                    <p class="detail-label">Course to Enroll</p>
                    @if($student->course !== null)
                        @foreach ($student->course as $c)
                            <p class="details-value">{{$c->course->descriptive_title}} ({{$c->course->course_code}})</p>
                        @endforeach
                    @else
                    <p class="details-value">No Courses</p>
                    @endif
                </div>
            </div>
            <div id="payment-details" class="detail-four info d-none">
                <div class="detail-group">
                    <p class="detail-label">Payment Mode</p>
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
        <!-- JS Helpers -->
        <input type="hidden" id="user-type" value="{{Auth::user()->user_type}}">
    </div>
@endsection

@push('add_content')

    <!-- Enroll Modal -->
    <form action="{{route('edit_approval')}}" method="POST" class="modal-container d-none" id="enroll-modal">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <i class='bx bx-x close-btn hide-modal'></i>
            </div>
            <div class="eval-modal-body">
                <p>Enroll Applicant</p>
                <input type="hidden" name="id" value="{{$student->id}}">
                <textarea name="notes" class="d-none"></textarea>
                <textarea name="approve_notes" class="d-none"></textarea>
                <textarea name="register_notes" class="d-none"></textarea>
                <textarea name="enroll_notes">{{$student->approval_log->enroll_notes}}</textarea>
                <div class="button-container">
                    <button type="submit" >Submit Comment</button>
                    <button type="submit" name="status" id="reject-btn" value="0">Reject</button>
                    <button type="submit" name="status" id="approve-btn" value="5">Approve</button>
                    <button type="submit" id="comment-btn">Comment</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Register Modal -->
    <form action="{{route('edit_approval')}}" method="POST" class="modal-container d-none" id="register-modal">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <i class='bx bx-x close-btn hide-modal'></i>
            </div>
            <div class="eval-modal-body">
                <p>Register Applicant</p>
                <input type="hidden" name="id" value="{{$student->id}}">
                <textarea name="notes" class="d-none"></textarea>
                <textarea name="approve_notes" class="d-none"></textarea>
                <textarea name="register_notes">{{$student->approval_log->register_notes}}</textarea>
                <textarea name="enroll_notes" class="d-none"></textarea>
                <div class="button-container">
                    <button type="submit" name="status" id="reject-btn" value="0">Reject</button>
                    <button type="submit" name="status" id="approve-btn" value="4">Approve</button>
                    <button type="submit" id="comment-btn">Comment</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Evaluate Modal -->
    <form action="{{route('edit_approval')}}" method="POST" class="modal-container d-none" id="evaluate-modal">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <i class='bx bx-x close-btn hide-modal'></i>
            </div>
            <div class="eval-modal-body">
                <p>Evaluate Applicant</p>
                <input type="hidden" name="id" value="{{$student->id}}">
                <textarea name="notes" class="d-none"></textarea>
                <textarea name="approve_notes">{{$student->approval_log->approve_notes}}</textarea>
                <textarea name="register_notes" class="d-none"></textarea>
                <textarea name="enroll_notes" class="d-none"></textarea>
                <div class="button-container">
                    <button type="submit" name="status" id="reject-btn" value="0">Reject</button>
                    <button type="submit" name="status" id="approve-btn" value="3">Approve</button>
                    <button type="submit" id="comment-btn">Comment</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Endorse Modal -->
    <form action="{{route('edit_approval')}}" method="POST" class="modal-container d-none" id="endorse-modal">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <i class='bx bx-x close-btn hide-modal'></i>
            </div>
            <div class="eval-modal-body">
                <p>Endorse Applicant</p>
                <input type="hidden" name="id" value="{{$student->id}}">
                <textarea name="notes">{{$student->approval_log->notes}}</textarea>
                <textarea name="approve_notes" class="d-none"></textarea>
                <textarea name="register_notes" class="d-none"></textarea>
                <textarea name="enroll_notes" class="d-none"></textarea>
                <div class="button-container">
                    <button type="submit" name="status" id="reject-btn" value="0">Reject</button>
                    <button type="submit" name="status" id="approve-btn" value="2">Approve</button>
                    <button type="submit" id="comment-btn">Comment</button>
                </div>
            </div>
        </div>
    </form>

    @if(session('success'))
    <div class="modal-container">
        <div class="modal-content">
            <div class="body">
                <img src="{{asset('images/success-logo.svg')}}" />
                <p class="heading-text">Success!</p>
                <p class="info-text">{{ session('success') }}</p>
                <div class="button-container">
                    <button id="continueButton" class="continue-button">Continue</button>
                </div>
            </div>
        </div>
    </div>
@endif
@endpush

@push('js_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/download.js') }}"></script>
@endpush
