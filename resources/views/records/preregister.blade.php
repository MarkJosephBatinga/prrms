@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Student Pre-Registration</h3>
            <div class="tab-status-container">
                <div id="student-tab" class="tab-status"></div>
                <div id="info-tab" class="tab-status next"></div>
                <div id="program-tab" class="tab-status next"></div>
                <div id="payment-tab" class="tab-status next"></div>
            </div>
        </div>
        <!-- Pre Registration Form -->
        <div class="sub-page-content">
            <div id="type-form" >
                <div class="form-top-container">
                    <p class="form-header">Student Type</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Student Type</label>
                            <select class="input-text" id="student_type student_type" name="student_type">
                                <option value="New Student">New Student</option>
                                <option value="Old Student">Old Student</option>
                                <option value="Returning Student">Returning Student</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Student Status</label>
                            <input type="text" class="input-text student_type" id="student_status" name="student_status"/>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i id="type-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('records') }}"><i class="back-button">Back</i></a>
                        <i class="continue-button ml-3" id="type-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="info-form" class="d-none">
                <div class="form-top-container">
                    <p class="form-header">Personal Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Name (Last Name, First Name, Middle Initial)</label>
                            <input name="name" id="name" class="input-text personal_info" />
                        </div>
                        <div class="input-group">
                            <label class="label-input">Nationality</label>
                            <input name="nationality" id="nationality" class="input-text personal_info" />
                        </div>
                        <div class="input-group">
                            <label class="label-input">Complete Address</label>
                            <input name="address" id="address" class="input-text personal_info" />
                        </div>
                        <div class="input-group">
                            <label class="label-input">Mobile Number</label>
                            <input name="mobile_number" id="mobile_number" class="input-text personal_info" />
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i id="info-clear" class="clear-button">Clear</i>
                    <div class="button-container">
                        <i class="back-button" id="info-back">Back</i>
                        <i class="continue-button ml-3" id="info-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="program-form" class="d-none">
                <div class="form-top-container">
                    <p class="form-header">Program Offerings</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Program</label>
                            <select name="program" id="program" class="input-text program_offer">
                                <option value="">Select</option>
                                @if(isset($programs) && $programs != null)
                                    @foreach($programs as $program)
                                    <option value="{{$program->id}}">{{$program->program_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Courses to Enroll</label>
                            <p class="sub-text">To be enrolled only by those who have completed the academic requirements</p>
                        </div>
                        <div id="populate_checkbox" class="input-checkbox">

                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <div></div>
                    <div class="button-container">
                        <i class="back-button" id="program-back">Back</i>
                        <i class="continue-button ml-3" id="program-next">Continue</i>
                    </div>
                </div>
            </div>
            <div id="payment-form" class="d-none">
                <div class="form-top-container">
                    <p class="form-header">OTR and Payment Mode</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Official Transcript of Records</label>
                            <p class="sub-text">Upload here the scanned copy of your Official Transcript of Records</p>
                            <div class="custom-file-input">
                                <label class="file-label">
                                    <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> Upload a File
                                </label>
                                <input type="file" name="file_record" id="file_record" class="input-file" required/>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Payment Mode</label>
                            <p class="sub-text">After pre-registration, the enrollment fee will be sent to you remotely after assessment. Choose which mode would you like to send the payment.</p>
                            <select class="input-text" id="payment_mode" name="payment_mode" required>
                                <option value="MLUC Cashier">MLUC Cashier (open from Monday-Friday, 8:00am to 5:00pm)</option>
                                <option value="Billed to CHED">Billed to CHED (CHED Scholars)</option>
                                <option value="Billed to Sending Institution">Billed to Sending Institution</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <div></div>
                    <div class="button-container">
                        <i class="back-button" id="payment-back">Back</i>
                        <button class="continue-button ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/pre-register.js') }}"></script>
@endpush
