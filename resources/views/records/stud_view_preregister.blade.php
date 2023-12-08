@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/pre-register.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header mt-4 mb-n4">
            <h3 class="content-header mt-2">Student Pre-Registration</h3>    
        </div>
        <!-- Registration Status -->
        <div class="pre-registration-status">
            <p>Status</p>
            <section class="step-wizard">
                <ul class="step-wizard-list">
                    <li class="step-wizard-item done-item">
                        <span class="progress-count">1</span>
                        <span class="progress-label">Progress</span>
                    </li>
                    <li class="step-wizard-item current-item">
                        <span class="progress-count">2</span>
                        <span class="progress-label">Progress</span>
                    </li>
                    <li class="step-wizard-item">
                        <span class="progress-count">3</span>
                        <span class="progress-label">Progress</span>
                    </li>
                    <li class="step-wizard-item">
                        <span class="progress-count">4</span>
                        <span class="progress-label">Progress</span>
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
                </div>
                <div class="detail-one info">
                    <div class="detail-group">
                        <p class="detail-label">Full Name</p>
                        <p class="details-value">Jomar P. Pumares</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Nationality</p>
                        <p class="details-value">Filipino</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Student Type</p>
                        <p class="details-value">Old Student</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Student Status</p>
                        <p class="details-value">Regular Student</p>
                    </div>
                </div>
                <div class="detail-two info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Full Name</p>
                        <p class="details-value">Monday</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Complete Address</p>
                        <p class="details-value">Naguilian, La Union</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Facebook Messenger ID</p>
                        <p class="details-value">Sample</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Mobile Number</p>
                        <p class="details-value">123535</p>
                    </div>
                </div>
                <div class="detail-three info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Program</p>
                        <p class="details-value">Master in Information Technology</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Courses</p>
                        <ul class="mt-1 ml-n3">
                            <li>Course</li>
                            <li>Course</li>
                            <li>Course</li>
                        </ul>
                    </div>
                </div>
                <div class="detail-four info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Payment</p>
                        <p class="details-value">MLUC Cashier (open from Monday - Friday, 8:00am to 5:00pm)</p>
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
