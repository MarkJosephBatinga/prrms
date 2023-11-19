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

            <ul class="progress-bar">
                <li id="back-studtype" class="active"> Student Type </li>
                <li id="back-personinfo"> Personal Information </li>
                <li id="back-program"> Program Offerings </li>
                <li id="back-payment"> OTR and Payment Mode </li>
            </ul>
        </div>

        <div id="signup-form">
            <div id="student-type" class="form-container">
                <div class="form-input">
                    <h3 class="sub-heading-text">Student Type</h3>
                    <div class="input-group">
                        <label class="label-input">Student Type / Classification 1</label>
                        <select class="input-text" name="student_type" required>
                            <option>New Student</option>
                            <option>Old Student</option>
                            <option>Returning Student</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="label-input" >Student Status / Classification 2</label>
                        <input type="text" class="input-text" name="student_status" required/>
                    </div>
                </div>
                <div class="button-container">
                    <i id="studtype-button" class="form-button">Continue</i>
                </div>
            </div>
            <div id="personal-information" class="form-container d-none">
                <div class="form-input">
                    <h3 class="sub-heading-text">Personal Information</h3>
                    <div class="input-group">
                        <label class="label-input">Name (Last Name, First Name, Middle Initial)</label>
                        <input name="name" id="name" class="input-text" />
                    </div>
                    <div class="input-group">
                        <label class="label-input">Nationality</label>
                        <input name="nationality" id="nationality" class="input-text" />
                    </div>
                    <div class="input-group">
                        <label class="label-input">Complete Address</label>
                        <input name="address" id="address" class="input-text" />
                    </div>
                    <div class="input-group">
                        <label class="label-input">Mobile Number</label>
                        <input name="mobile_number" id="mobile_number" class="input-text" />
                    </div>
                </div>
                <div class="button-container">
                    <i id="personinfo-button" class="form-button">Continue</i>
                </div>
            </div>
            <div id="program-offerings" class="form-container d-none">
                <div class="form-input">
                    <h3 class="sub-heading-text">Program Offerings</h3>
                    <div class="input-group">
                        <label class="label-input">Program</label>
                        <select name="program" id="program" class="input-text">
                            <option>Program 1</option>
                            <option>Program 2</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="label-input">Courses to Enroll</label>
                        <p class="sub-text">To be enrolled only by those who have completed the academic requirements</p>
                    </div>
                    <div class="input-checkbox">
                        <div class="input-checkbox">
                            <div>
                                <input type="checkbox" name="course"/>
                                <label class="checkbox-label" >Course 1</label>
                            </div>
                            <div>
                                <input type="checkbox" name="course"/>
                                <label class="checkbox-label" >Course 2</label>
                            </div>
                            <div>
                                <input type="checkbox" name="course"/>
                                <label class="checkbox-label" >Course 3</label>
                            </div>
                            <div>
                                <input type="checkbox" name="course"/>
                                <label class="checkbox-label" >Course 4</label>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="button-container">
                    <i id="program-button" class="form-button">Continue</i>
                </div>
            </div>
            <div id="files-upload" class="form-container d-none">
                <div class="form-input">
                    <h3 class="sub-heading-text">Official Transcript of Records and Payment Mode</h3>
                    <div class="input-group">
                        <label class="label-input">Upload here the scanned copy of your Official Transcript of Records</label>
                        <div class="custom-file-input">
                            <label class="file-label">
                                <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> Upload a File
                            </label>
                            <input type="file" name="file_record" id="file_record" class="input-file" />
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label-input">Payment Mode</label>
                        <p class="sub-text">
                            After pre-registration, the enrollment fee will be sent to you remotely after assessment. Choose which mode would you like to send the payment.
                        </p>
                        <select class="input-text" name="payment_mode">
                            <option>Bank</option>
                            <option>G-Cash</option>
                        </select>
                    </div>
                </div>
                <div class="button-container">
                    <button id="signup-button" class="form-button">Submit</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('js/signup.js') }}"></script>
