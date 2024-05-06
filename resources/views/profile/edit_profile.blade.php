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
            </div>
        </div>
        <!-- Edit Profile Form -->
        <form action="{{ route('profile_update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="id" class="input-text d-none" value="{{$student->id}}"/>
            <div class="sub-page-content">
                <div class="form-one">
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
                            <div class="input-group">
                                <label class="label-input">Email Address</label>
                                <input name="email_address" id="email_address" class="input-text personal_info" value="{{$student->email_address}}" readonly/>
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
                        <p class="form-header">Login Credentials</p>
                        <div class="form-input">
                            <div class="input-group">
                                <label class="label-input">ID Number</label>
                                <input type="text" class="input-text" name="email" id="email" value="{{ Auth::user()->email}}" readonly/>
                            </div>

                            <div class="input-group">
                                <label class="label-input">New Password</label>
                                <input type="password" class="input-text" name="new_pass" id="new_pass" />
                            </div>

                            <div class="input-group">
                                <label class="label-input">Confirm Password</label>
                                <input type="password" class="input-text" name="con_pass" id="con_pass" />
                                <p class="text-danger">Password doesnt match, please try again</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-bottom-container">
                        <i class="clear-button clear-two">Clear</i>
                        <div class="button-container">
                            <i class="back-button back-two">Back</i>
                            <button type="submit" class="continue-button continue-five ml-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
