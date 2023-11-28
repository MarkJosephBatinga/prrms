@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/pre-register.css') }}">
@endpush

@section('body')
    <div class="content">
        <a href="course_list.php" class="back-button"> < Back </a>
        <!-- Content Header -->
        <div class="content-header mt-4 mb-n4">
            <h3 class="content-header mt-2">Molecular Biology and Biotechnology</h3>
            <div class="action-container">
                <a href="edit_course.php"><i class='bx bx-pencil action-icons'></i></a>
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
                        <p class="details-value">Major Course</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Course Code</p>
                        <p class="details-value">SEd 31</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Descriptive Title</p>
                        <p class="details-value">Molecular Biology and Biotechnology</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Units</p>
                        <p class="details-value">3</p>
                    </div>
                </div>
                <div id="course-schedule-details" class="info d-none">
                    <div class="detail-group">
                        <p class="detail-label">First Class of the Week</p>
                        <p class="details-value">Monday</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Time</p>
                        <p class="details-value">5:00 - 8:00 PM</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Second Class of the Week</p>
                        <p class="details-value">Saturday</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Time</p>
                        <p class="details-value">8:00 - 11:00 AM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/course.js') }}"></script>
@endpush
