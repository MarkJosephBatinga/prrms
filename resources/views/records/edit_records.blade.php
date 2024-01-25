@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="sub-page-header">
            <h3 class="content-header mt-2">Edit Student Records</h3>
            <div class="tab-status-container">
                <div id="student-tab" class="tab-one tab-status"></div>
                <div id="info-tab" class="tab-two tab-status next"></div>
                <div id="program-tab" class="tab-three tab-status next"></div>
                <div id="payment-tab" class="tab-four tab-status next"></div>
            </div>
        </div>
        <!-- Pre Registration Form -->
        <form action="{{ route('update_record') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="sub-page-content">
                <div id="type-form" class="form-one">
                    <div class="form-top-container">
                        <p class="form-header">Student Type</p>
                        <div class="form-input">
                            <div class="input-group">
                                <label class="label-input">Student Type</label>
                                <select class="input-text student_type" id="student_type" name="student_type">
                                    <option value="New Student" {{($student->student_type === 'New Student') ? 'selected' : ''}}>New Student</option>
                                    <option value="Old Student" {{($student->student_type === 'Old Student') ? 'selected' : ''}}>Old Student</option>
                                    <option value="Returning Student" {{($student->student_type === 'Returning Student') ? 'selected' : ''}}>Returning Student</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label class="label-input">Student Status</label>
                                <input type="text" class="input-text student_type" id="student_status" name="student_status" value="{{$student->student_status}}"/>
                                <input type="hidden" class="input-text" id="id" name="id" value="{{$student->id}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-bottom-container">
                        <i class="clear-button clear-one">Clear</i>
                        <div class="button-container">
                            <a href="{{ route('records') }}"><i class="back-button">Back</i></a>
                            <i class="continue-button continue-one ml-3">Continue</i>
                            <i class="clear-button-responsive clear-one">Clear all Answers</i>
                        </div>
                    </div>
                </div>
                <div id="info-form" class="form-two d-none">
                    <div class="form-top-container">
                        <p class="form-header">Personal Information</p>
                        <div class="form-input">
                            <div class="input-group">
                                <label class="label-input">Name (Last Name, First Name, Middle Initial)</label>
                                <input name="name" id="name" class="input-text personal_info" value="{{$student->name}}"/>
                            </div>
                            <div class="input-group">
                                <label class="label-input">Nationality</label>
                                <input name="nationality" id="nationality" class="input-text personal_info" value="{{$student->nationality}}"/>
                            </div>
                            <div class="input-group">
                                <label class="label-input">Complete Address</label>
                                <input name="address" id="address" class="input-text personal_info" value="{{$student->address}}"/>
                            </div>
                            <div class="input-group">
                                <label class="label-input">Mobile Number</label>
                                <input name="mobile_number" id="mobile_number" class="input-text personal_info" value="{{$student->mobile_number}}"/>
                            </div>
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
                <div id="program-form" class="form-three d-none">
                    <div class="form-top-container">
                        <p class="form-header">Program Offerings</p>
                        <div class="form-input">
                            <div class="input-group">
                                <label class="label-input">Program</label>
                                <select name="program" id="program" class="input-text program_offer">
                                    <option value="">Select</option>
                                    @if(isset($programs) && $programs != null)
                                        @foreach($programs as $program)
                                        <option {{($student->program == $program->id) ? 'selected' : ''}}
                                            value="{{$program->id}}">{{$program->program_name}}</option>
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
                        <i class="clear-button clear-three">Clear</i>
                        <div class="button-container">
                            <i class="back-button back-three">Back</i>
                            <i class="continue-button continue-preregister ml-3">Continue</i>
                            <i class="clear-button-responsive clear-three">Clear all Answers</i>
                        </div>
                    </div>
                </div>
                <div id="payment-form" class="form-four d-none">
                    <div class="form-top-container">
                        <p class="form-header">OTR and Payment Mode</p>
                        <div class="form-input">
                            <div class="input-group">
                                <label class="label-input">Upload here the scanned copy (PDF Only)</label>
                                <div class="file-uploads">
                                    <div>
                                        <label class="sub-text">Official Transcript of Records</label>
                                        <div class="custom-file-input">
                                            <label class="file-label">
                                                <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> Upload a File
                                            </label>
                                            <input type="file" name="file_record" id="file_record" class="input-file" required accept="application/pdf"/>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="sub-text">Birth Certificate</label>
                                        <div class="custom-file-input">
                                            <label class="birth_cert-label">
                                                <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> Upload a File
                                            </label>
                                            <input type="file" name="birth_cert" id="birth_cert" class="input-file" required accept="application/pdf"/>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="sub-text">Letter of Intent</label>
                                        <div class="custom-file-input">
                                            <label class="letter_intent-label">
                                                <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> Upload a File
                                            </label>
                                            <input type="file" name="letter_intent" id="letter_intent" class="input-file" required accept="application/pdf"/>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="sub-text">Recommendation Letter</label>
                                        <div class="custom-file-input">
                                            <label class="rec_letter-label">
                                                <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> Upload a File
                                            </label>
                                            <input type="file" name="rec_letter" id="rec_letter" class="input-file" required accept="application/pdf"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <label class="label-input">Payment Mode</label>
                                <p class="sub-text">After pre-registration, the enrollment fee will be sent to you remotely after assessment. Choose which mode would you like to send the payment.</p>
                                <select class="input-text" id="payment_mode" name="payment_mode" required>
                                    <option value="MLUC Cashier" {{($student->payment_mode == 'MLUC Cashier') ? 'selected' : ''}}>MLUC Cashier (open from Monday-Friday, 8:00am to 5:00pm)</option>
                                    <option value="Billed to CHED" {{($student->payment_mode == 'Billed to CHED') ? 'selected' : ''}}>Billed to CHED (CHED Scholars)</option>
                                    <option value="Billed to Sending Institution" {{($student->payment_mode == 'Billed to Sending Institution') ? 'selected' : ''}}>Billed to Sending Institution</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-bottom-container">
                        <i class="clear-button clear-four">Clear</i>
                        <div class="button-container">
                            <i class="back-button back-four">Back</i>
                            <button class="continue-button ml-3">Submit</button>
                            <i class="clear-button-responsive clear-four">Clear all Answers</i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@push('js_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/pre-register.js') }}"></script>
@endpush
