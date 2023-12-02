@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/pre-register.css') }}">
@endpush

@section('body')
    <div class="content">
        <a href="{{route('courses')}}" class="back-button"> < Back </a>
        <!-- Content Header -->
        <div class="content-header mt-4 mb-n4">
            <h3 class="content-header mt-2">{{$course->descriptive_title}}</h3>
            <div class="action-container">
                <a href="{{route('edit_course', $course->id)}}"><i class='bx bx-pencil action-icons'></i></a>
                <a href=""><i class='bx bx-trash action-icons'></i></a>
            </div>
        </div>
        <!-- Program Details -->
        <div class="sub-page-content">
            <div class="details-body">
                <div class="tab-headers">
                    <i id="course-info-header" class="active">Course Information</i>
                    <i id="course-schedule-header">Schedule</i>
                </div>
                <div id="course-info-details" class="info">
                    <div class="detail-group">
                        <p class="detail-label">Course Category</p>
                        <p class="details-value">{{$course->course_category}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Course Code</p>
                        <p class="details-value">{{$course->course_code}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Descriptive Title</p>
                        <p class="details-value">{{$course->descriptive_title}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Units</p>
                        <p class="details-value">{{$course->units}}</p>
                    </div>
                </div>
                <div id="course-schedule-details" class="info d-none">
                    @if($course->schedules !== null)
                        @foreach ($course->schedules as $schedule)
                            <div class="detail-group">
                                <p class="detail-label">Day of the Week</p>
                                <p class="details-value">{{$schedule->day}}</p>
                            </div>
                            <div class="detail-group">
                                <p class="detail-label">Time</p>
                                <p class="details-value">{{$schedule->time}}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/course.js') }}"></script>
@endpush
