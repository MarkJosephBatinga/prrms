@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="sub-page-header">
            <h3 class="content-header mt-2">Edit Profile</h3>
            <div class="tab-status-container">
                <div class="tab-one tab-status"></div>
                <div class="tab-two tab-status next"></div>
                <div class="tab-three tab-status next"></div>
                <div class="tab-four tab-status next"></div>
                <div class="tab-five tab-status next"></div>
            </div>
        </div>
        <!-- Edit Profile Form -->
        <div class="sub-page-content">
            <div class="form-one">
                <div class="form-top-container">
                    <p class="form-header">Student Type</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Student Type:</label>
                            <select class="input-text student_type" id="student_type" name="student_type">
                                <option value="Old Student">Old Student</option>
                                <option value="Returning Student">Returning Student</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Student Status:</label>
                            <input type="text" class="input-text student_type" id="student_status" name="student_status"/>
                        </div>
                        <div class="input-group" id="years_stop_grp">
                            <label class="label-input">Number of Years Stop:</label>
                            <input type="number" class="input-text non_req" id="years_stop" name="years_stop"/>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <a href="{{route('profile_view')}}" class="back-button"><i>Back</i></a>
                        <i class="continue-button continue-one ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div class="form-two d-none">
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
                    <i class="clear-button clear-two">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-two">Back</i>
                        <i class="continue-button continue-two ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div class="form-three d-none">
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
                        <div class="input-checkbox">
                            <div class="input-checkbox" id="populate_checkbox">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-three">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-three">Back</i>
                        <i class="continue-button continue-three ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div class="form-four d-none">
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
                            <p class="sub-text">
                                After pre-registration, the enrollment fee will be sent to you remotely after assessment. Choose which mode would you like to send the payment.
                            </p>
                            <select class="input-text" id="payment_mode" name="payment_mode" required>
                                <option value="MLUC Cashier">MLUC Cashier (open from Monday-Friday, 8:00am to 5:00pm)</option>
                                <option value="Billed to CHED">Billed to CHED (CHED Scholars)</option>
                                <option value="Billed to Sending Institution">Billed to Sending Institution</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-four">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-four">Back</i>
                        <i class="continue-button continue-four ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div class="form-five d-none">
                <div class="form-top-container">
                    <p class="form-header">Login Credentials</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">ID Number</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Old Password</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">New Password</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Confirm Password</label>
                            <input class="input-text" />
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-five">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-five">Back</i>
                        <button class="continue-button continue-five ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
