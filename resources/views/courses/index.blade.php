@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Courses</h3>
        </div>
        <!-- Search and Add Course Button -->
        <div class="search-button-container">
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Search">
                <i class='bx bx-search-alt search-icon'></i>
            </div>
            <a class="add-button" href="{{ route('add_course') }}">Add Course</a>
        </div>
        <!-- Small Cards -->
        <div class="small-cards">
            @if(isset($courses) && $courses != null)
            @foreach($courses as $course)
                <div class="card-container">
                    <div class="card-text">
                        <a href="{{route('view_course', $course->id)}}">
                            <p class="small-text">{{$course->course_code}}</p>
                            <p class="large-text">{{$course->descriptive_title}}</p>
                            <p class="small-text">Units: {{$course->units}}</p>
                        </a>
                    </div>
                    <img class="course-image" src="{{asset('images/course-card.svg')}}" />
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@push('add_content')
    @if(session('success'))
        <div class="modal-container">
            <div class="modal-content">
                <div class="body">
                    <img src="../images/success-logo.svg" />
                    <p class="heading-text">Success!</p>
                    <p class="info-text">{{ session('success') }}</p>
                    <div class="button-container">
                        <button id="continueButton" class="continue-button">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endpush

@push('js_scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
@endpush
