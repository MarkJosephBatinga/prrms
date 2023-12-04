@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/pre-register.css') }}">
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <a href="{{route('courses')}}" class="back-button"> < Back </a>
        <!-- Content Header -->
        <div class="content-header mt-4 mb-n4">
            <h3 class="content-header mt-2">{{$course->descriptive_title}}</h3>
            <div class="action-container">
                <a href="{{route('edit_course', $course->id)}}"><i class='bx bx-pencil action-icons'></i></a>
                <a href="#" id="openDeleteModal"><i class='bx bx-trash action-icons'></i></a>
            </div>
        </div>
        <!-- Program Details -->
        <div class="sub-page-content">
            <div class="details-body">
                <div class="tab-headers">
                    <i id="course-info-header" class="header-one active">Course Information</i>
                    <i id="course-schedule-header" class="header-two">Schedule</i>
                </div>
                <div id="course-info-details" class="detail-one info">
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
                <div id="course-schedule-details" class="detail-two info d-none">
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

@push('add_content')
    <!-- Delete Modal -->
    <div class="modal-container delete-modal d-none">
        <div class="modal-content">
            <div class="body">
                <img src="{{ asset('/images/warning-logo.svg') }}" />
                <p class="heading-text">Are you sure you want to delete this item?</p>
                <p class="info-text">Deleting this item will remove it permanently. Do you wish to proceed and delete?</p>
                <div class="button-container">
                    <button class="cancel">Cancel</button>
                    <a  type="button" href="{{route('delete_course', $course->id)}}" class="delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
@endpush
