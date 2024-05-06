@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="sub-page-header">
            <h3 class="content-header mt-2">Edit User</h3>
            <div class="tab-status-container">
                <div class="tab-one tab-status"></div>
                <div class="tab-two tab-status"></div>
            </div>
        </div>
        <!-- Edit User Form -->
        <form class="sub-page-content multi-form" action="{{route('update_user')}}" method="POST">
            @csrf

            <input type="hidden" class="input-text" name="id" id="id" value="{{$user->id}}"/>
            <div class="form-one">
                <div class="form-top-container">
                    <p class="form-header">User Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Name (Last Name, First Name, Middle Initial)</label>
                            <input class="input-text" name="name" value="{{$user->name}}"/>
                        </div>
                        <div class="input-group">
                            <label class="label-input">User Type</label>
                            <select name="user_type" id="user_type" class="input-text">
                                <option value="">Select</option>
                                @foreach($user_types as $user_type)
                                    <option value="{{strtolower($user_type)}}" {{($user->user_type == strtolower($user_type)) ? 'selected' : ''}}>
                                        {{$user_type}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="program_field" class="input-group d-none">
                            <label class="label-input">Program</label>
                            <select name="staff_program" id="staff_program" class="input-text non_req">
                                <option value="">Select</option>
                                @if(isset($programs) && $programs != null)
                                    @foreach($programs as $program)
                                    <option value="{{$program->id}}" {{($user->staff_program == $program->id) ? 'selected' : ''}}>
                                        {{$program->program_name}}
                                    </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div id="college_field" class="input-group d-none">
                            <label class="label-input">College</label>
                            <select name="staff_college" id="staff_college" class="input-text non_req">
                                <option value="">Select</option>
                                @foreach($colleges as $college)
                                <option value="{{strtolower($college)}}" {{($user->staff_college == strtolower($college)) ? 'selected' : ''}}>
                                    {{$college}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('users') }}" class="back-button"><i>Back</i></a>
                        <i class="continue-button continue-one ml-3">Continue</i>
                        <i class="clear-button-responsive clear-one">Clear all Answers</i>
                    </div>
                </div>
            </div>
            <div class="form-two d-none">
                <div class="form-top-container">
                    <p class="form-header">Login Credentials</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Email</label>
                            <input class="input-text" name="email" value="{{$user->email}}" readonly />
                        </div>
                        <div class="input-group">
                            <label class="label-input">New Password</label>
                            <input class="input-text" type="password" name="new_pass" id="new_pass" />
                        </div>
                        <div class="input-group">
                            <label class="label-input">Confirm Password</label>
                            <input class="input-text" type="password" name="con_pass" id="con_pass" />
                            <p class="text-danger">Password doesnt match, please try again</p>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <i class="back-button back-two">Back</i>
                        <button type="submit" class="continue-button ml-3">Submit</button>
                        <i class="clear-button-responsive clear-one">Clear all Answers</i>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js_scripts')
    <script>
        if (typeof window.alert !== 'undefined' && '{{ session()->has('alert_message') }}') {
        alert('{{ session()->get('alert_message') }}');
        }
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
