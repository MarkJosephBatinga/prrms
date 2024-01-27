@extends('includes.app')

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Edit Profile</h3>
            <div class="tab-status-container">
                <div class="tab-one tab-status"></div>
                <div class="tab-two tab-status next"></div>
            </div>
        </div>
        <!-- Edit Profile Form -->
        <div class="sub-page-content">
            <div class="form-one" >
                <div class="form-top-container">
                    <p class="form-header">User Account</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Name</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Nationality</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Program</label>
                            <input class="input-text" />
                        </div>

                        <div class="input-group">
                            <label class="label-input">Mobile Number</label>
                            <input class="input-text" />
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i></i>
                    <div class="button-container">
                        <a href="dashboard.php"><i class="back-button">Back</i></a>
                        <i class="continue-button continue-one ml-3">Continue</i>
                    </div>
                </div>
            </div>
            <div class="form-two d-none">
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
                    <i></i>
                    <div class="button-container">
                        <i class="back-button back-two">Back</i>
                        <button class="continue-button continue-two ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
