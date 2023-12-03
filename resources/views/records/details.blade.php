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
                    </thead>
                    <tbody>
                        <tr>
                            <td>Recommending Approval</td>
                            <td>Admin</td>
                            <td>Endorsed</td>
                        </tr>
                        <tr>
                            <td>Approved By</td>
                            <td>CGS Chairman</td>
                            <td>
                                <button class="show-modal">Evaluate</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Students Details -->
        <div class="details-body">
            <div class="tab-headers">
                <i id="type-header" class="active">Student Type</i>
                <i id="info-header">Personal Information</i>
                <i id="program-header">Program Offerings</i>
                <i id="payment-header">Payment Mode</i>
            </div>
            <div id="type-details" class="info">
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
            <div id="info-details" class="info d-none">
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
            <div id="program-details" class="info d-none">
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
            <div id="payment-details" class="info d-none">
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
    <form class="modal-container d-none" id="evaluate-modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class='bx bx-x close-btn'></i>
            </div>
            <div class="eval-modal-body">
                <p>Evaluate Applicant</p>
                <textarea></textarea>
                <div class="button-container">
                    <button id="reject-btn">Reject</button>
                    <button id="revision-btn">Revision</button>
                    <button id="approve-btn">Approve</button>
                </div>
            </div>
        </div>
    </form>
@endpush

@push('js_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/pre-register.js') }}"></script>
@endpush
