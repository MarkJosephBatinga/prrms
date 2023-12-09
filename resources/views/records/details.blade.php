@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/pre-register.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <a href="{{route('records')}}" class="back-button"> < Back </a>
        <!-- Content Header -->
        <div class="content-header mt-4 mb-n4">
            <h3 class="content-header mt-2">Student Pre-Registration</h3>
        </div>
        <!-- Approval Logs -->
        <div class="pre-registration-details">
            <p class="table-label">Approval Log</p>
            <div class="approval-logs">
                <table>
                    <thead>
                        <th>Sequence</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Notes</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Recommending Approval</td>
                            <td>Admin</td>
                            @if ($student->approval_log->status === 1)
                                <td>
                                    <button id="show-endorse">Endorse</button>
                                </td>
                            @elseif($student->approval_log->status === 0)
                                <td>Rejected</td>
                            @else
                                <td>Endorsed</td>
                            @endif
                            <td>{{($student->approval_log->status === 2) ? $student->approval_log->notes : ''}}</td>
                        </tr>
                        <tr>
                            <td>Approved By</td>
                            <td>CGS Chairman</td>
                            @if ($student->approval_log->status === 2)
                                <td>
                                    <button id="show-evaluate">Evaluate</button>
                                </td>
                            @elseif($student->approval_log->status === 1)
                                <td>Not yet endorsed</td>
                            @elseif($student->approval_log->status === 0)
                                <td>Rejected</td>
                            @else
                                <td>Evaluated</td>
                            @endif
                            <td>{{($student->approval_log->status === 3) ? $student->approval_log->notes : ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Students Details -->
        <div class="details-body">
            <div class="tab-headers">
                <i id="type-header" class="active header-one">Student Type</i>
                <i id="info-header" class="header-two">Personal Information</i>
                <i id="program-header" class="header-three">Program Offerings</i>
                <i id="payment-header" class="header-four">Payment Mode</i>
            </div>
            <div id="type-details" class="detail-one info">
                <div class="detail-group">
                    <p class="detail-label">Full Name</p>
                    <p class="details-value">{{$student->name}}</p>
                </div>
                <div class="detail-group">
                    <p class="detail-label">Nationality</p>
                    <p class="details-value">{{$student->nationality}}</p>
                </div>
                <div class="detail-group">
                    <p class="detail-label">Student Type</p>
                    <p class="details-value">{{$student->student_type}}</p>
                </div>
                <div class="detail-group">
                    <p class="detail-label">Student Status</p>
                    <p class="details-value">{{$student->student_status}}</p>
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
                    <p class="detail-label">Facebook Messenger ID</p>
                    <p class="details-value">https://www.facebook.com/</p>
                </div>
                <div class="detail-group">
                    <p class="detail-label">Mobile Number</p>
                    <p class="details-value">{{$student->mobile_number}}</p>
                </div>
            </div>
            <div id="program-details" class="detail-three info d-none">
                <div class="detail-group">
                    <p class="detail-label">Program</p>
                    <p class="details-value">{{$student->program_info->program_name}}</p>
                </div>
                <div class="detail-group">
                    <p class="detail-label">Course to Enroll</p>
                    @foreach ($student->course as $c)
                        <p class="details-value">{{$c->course->descriptive_title}} ({{$c->course->course_code}})</p>
                    @endforeach
                </div>
            </div>
            <div id="payment-details" class="detail-four info d-none">
                <div class="detail-group">
                    <p class="detail-label">Payment Mode</p>
                    <p class="details-value">{{$student->payment_mode}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('add_content')
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
                <textarea name="notes"></textarea>
                <div class="button-container">
                    <button type="submit" name="status" id="reject-btn" value="0">Reject</button>
                    <button type="submit" name="status" id="approve-btn" value="3">Approve</button>
                </div>
            </div>
        </div>
    </form>

    <form action="{{route('edit_approval')}}" method="POST" class="modal-container d-none" id="endorse-modal">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <i class='bx bx-x close-btn hide-modal'></i>
            </div>
            <div class="eval-modal-body">
                <p>Endorse Applicant</p>
                <input type="hidden" name="id" value="{{$student->id}}">
                <textarea name="notes"></textarea>
                <div class="button-container">
                    <button type="submit" name="status" id="reject-btn" value="0">Reject</button>
                    <button type="submit" name="status" id="approve-btn" value="2">Approve</button>
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
@endpush
