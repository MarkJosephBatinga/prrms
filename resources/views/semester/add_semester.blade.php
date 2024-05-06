@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="sub-page-header">
            <h3 class="content-header mt-2">Add Semester</h3>
            <div class="tab-status-container">
                <div id="course-info-tab" class="tab-one tab-status"></div>
            </div>
        </div>
        <!-- Add School Year Form -->
        <form action="{{route('create_semester')}}" method="POST" class="sub-page-content multi-form">
            @csrf
            <div class="form-one">
                <div class="form-top-container">
                    <p class="form-header">Semester Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">Semester</label>
                            <input type="text" class="input-text" name="semester" required/>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('semester') }}" class="back-button"><i>Back</i></a>
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
