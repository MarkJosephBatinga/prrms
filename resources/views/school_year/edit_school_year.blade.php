@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="sub-page-header">
            <h3 class="content-header mt-2">Edit School Year</h3>
            <div class="tab-status-container">
                <div id="course-info-tab" class="tab-one tab-status"></div>
            </div>
        </div>
        <!-- Add School Year Form -->
        <form action="{{route('update_school_year')}}" method="POST" class="sub-page-content multi-form">
            @csrf
            <input type="hidden" class="input-text" name="id" id="id" value="{{$school_year->id}}"/>
            <div class="form-one">
                <div class="form-top-container">
                    <p class="form-header">School Year Information</p>
                    <div class="form-input">
                        <div class="input-group">
                            <label class="label-input">School Year</label>
                            <input type="text" class="input-text" name="school_year" value="{{$school_year->school_year}}" required/>
                        </div>
                        <div class="input-group">
                            <label class="label-input">Start Date</label>
                            <input type="date" class="input-text" name="start_date"  value="{{$school_year->start_date}}" required/>
                        </div>
                        <div class="input-group">
                            <label class="label-input">End Date</label>
                            <input type="date" class="input-text" name="end_date" value="{{$school_year->end_date}}" required/>
                        </div>
                    </div>
                </div>
                <div class="form-bottom-container">
                    <i class="clear-button clear-one">Clear</i>
                    <div class="button-container">
                        <a href="{{ route('school_year') }}" class="back-button"><i>Back</i></a>
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
