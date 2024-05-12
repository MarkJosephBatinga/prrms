<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/sign_up.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400,500,600,700&display=swap">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img id="logo" src="{{ asset('images/logo.png') }}" alt="Login Image">
            <h2 class="heading-text">Create an account</h2>
            <ul class="progress-steps">
                <li class="tab-one tab-status step active">
                    <span>1</span>
                    <p>Student Type</p>
                </li>
                <li class="tab-two tab-status step">
                    <span>2</span>
                    <p>Personal Information</p>
                </li>
                <li class="tab-three tab-status step">
                    <span>3</span>
                    <p>Program Offerings</p>
                </li>
                <li class="tab-four tab-status step">
                    <span>4</span>
                    <p>OTR and Payment Mode</p>
                </li>
            </ul>
            <p id="below-login-text"></a> Already have an account? <a id="signin-nav" href="{{route('login')}}">Sign in to your account.</a></p>
        </div>
        <form action="{{ route('register_post') }}" method="POST" id="signup-form" enctype="multipart/form-data">
            @csrf
            <div class="form-container form-one">
                <div class="form-input">
                    <h3 class="sub-heading-text">Student Type</h3>
                    <div class="input-group">
                        <label class="label-input">Student Type:</label>
                        <input type="text" class="input-text student_type" id="student_type" name="student_type" value="New Student" readonly/>
                    </div>
                    <div class="input-group">
                        <label class="label-input">School Year</label>
                        <select class="input-text" name="school_year">
                            <option value="">Select School Year</option>
                            @if(isset($school_years) && $school_years != null)
                                @foreach($school_years as $school_year)
                                    <option value="{{$school_year->id}}">{{$school_year->school_year}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="label-input">Semester</label>
                        <select class="input-text" name="semester">
                            <option value="">Select Semester</option>
                            @if(isset($semesters) && $semesters != null)
                                @foreach($semesters as $semester)
                                    <option value="{{$semester->id}}">{{$semester->semester}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <input type="hidden" class="input-text non_req" name="years_stop" value="" />
                    <input type="hidden" class="input-text non_req" name="courses" value=""/>
                </div>
                <div class="button-container">
                    <i class="continue-button continue-one">Continue</i>
                </div>
            </div>

            <div class="form-container form-two d-none">
                <div class="form-input">
                    <h3 class="sub-heading-text">Personal Information</h3>
                    <div class="input-group">
                        <label class="label-input">Name (Last Name, First Name, Middle Name)</label>
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
                    <div class="input-group">
                        <label class="label-input">Email Address</label>
                        <input type="text" class="input-text" id="email_address" name="email_address"/>
                    </div>
                </div>
                <div class="button-container">
                    <i class="back-button back-two">Back</i>
                    <i class="continue-button continue-two">Continue</i>
                </div>
            </div>

            <div class="form-container form-three d-none">
                <div class="form-input">
                    <h3 class="sub-heading-text">Program Offerings</h3>
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
                </div>
                <div class="button-container">
                    <i class="back-button back-three">Back</i>
                    <i class="continue-button continue-three">Continue</i>
                </div>
            </div>

            <div class="form-container form-four d-none">
                <div class="form-input">
                    <h3 class="sub-heading-text">File Records and Payment</h3>
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
                <div class="button-container">
                    <i class="back-button back-four">Back</i>
                    <button type="submit" class="continue-button">Submit</button>
                </div>
            </div>

            <p id="mobile-login-link"></a> Already have an account? <a id="signin-nav" href="{{route('login')}}">Sign in to your account.</a></p>
        </form>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
{{-- <script src="{{ asset('js/signup.js') }}"></script> --}}
