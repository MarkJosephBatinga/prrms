@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">My Courses</h3>
        </div>

        <!-- Small Cards -->
        <div class="small-cards mt-5">
            @foreach ($courses as $course)
                <div class="card-container">
                    <div class="card-text">
                        <a href="{{route('student_course_view', $course->course_id)}}">
                            <p class="small-text">{{$course->course->course_code}}</p>
                            <p class="large-text">{{$course->course->descriptive_title}}</p>
                            <p class="small-text">{{$course->course->course_category}}</p>
                        </a>
                    </div>
                    <img class="course-image" src="{{asset('images/course-card.svg')}}" />
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
@endpush
