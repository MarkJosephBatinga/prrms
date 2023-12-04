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
                <div id="student-tab" class="tab-one tab-status"></div>
                <div id="info-tab" class="tab-two tab-status next"></div>
                <div id="program-tab" class="tab-three tab-status next"></div>
                <div id="payment-tab" class="tab-four tab-status next"></div>
            </div>
        </div>
        <!-- Pre Registration Form -->
        <div class="sub-page-content">
            <div id="type-form" class="form-one" >
                <div class="form-top-container">
                    <p class="form-header">Student Type</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Name (Last Name, First Name, Middle Initial)</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Nationality</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Student Type /  Classification 1?</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Student Status /  Classification 2?</label>
                            <input class="input-text" />
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('records') }}"><i class="back-button">Back</i></a>
                        <i class="continue-button continue-one ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div id="info-form" class="form-two d-none">
                <div class="form-top-container">
                    <p class="form-header">Personal Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Name</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Complete Address</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Facebook Messenger ID</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Mobile Number</label>
                            <input class="input-text" />
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
            <div id="program-form" class="form-three d-none">
                <div class="form-top-container">
                    <p class="form-header">Program Offerings</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Program</label>
                            <select class="input-text">
                                <option value="">Select Program</option>
                                <option value="1">Program 1</option>
                                <option value="2">Program 2</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Courses to Enroll</label>
                            <p class="sub-text">To be enrolled only by those who have completed the academic requirements</p>
                        </div>
                        <div class="input-checkbox">
                            <div>
                                <input type="checkbox" />
                                <label class="checkbox-label" >Course 1</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label class="checkbox-label" >Course 2</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label class="checkbox-label" >Course 3</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label class="checkbox-label" >Course 4</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-three">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-three">Back</i>
                        <i class="continue-button continue-preregister ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div id="payment-form" class="form-four d-none">
                <div class="form-top-container">
                    <p class="form-header">Payment Mode</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Payment Mode</label>
                            <p class="sub-text">After pre-registration, the enrollment fee will be sent to you remotely after assessment. Choose which mode would you like to send the payment.</p>
                            <select class="input-text">
                                <option value="">Select Payment</option>
                                <option value="bank">Bank</option>
                                <option value="gcash">G-Cash</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-four">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-four">Back</i>
                        <button class="continue-button ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
