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
            <div class="card-container">
                <div class="card-text">
                    <a href="view_course.php">
                        <p class="small-text">SEd 311</p>
                        <p class="large-text">Molecular Biology and Biotechnology</p>
                        <p class="small-text">Prof Name</p>
                    </a>
                </div>
                <img class="course-image" src="../images/course-card.svg" />
            </div>
            <div class="card-container">
                <div class="card-text">
                    <a href="view_course.php">
                        <p class="small-text">SEd 311</p>
                        <p class="large-text">Molecular Biology and Biotechnology</p>
                        <p class="small-text">Prof Name</p>
                    </a>
                </div>
                <img class="course-image" src="../images/course-card.svg" />
            </div>
            <div class="card-container">
                <div class="card-text">
                    <a href="view_course.php">
                        <p class="small-text">SEd 311</p>
                        <p class="large-text">Molecular Biology and Biotechnology</p>
                        <p class="small-text">Prof Name</p>
                    </a>
                </div>
                <img class="course-image" src="../images/course-card.svg" />
            </div>
            <div class="card-container">
                <div class="card-text">
                    <a href="view_course.php">
                        <p class="small-text">SEd 311</p>
                        <p class="large-text">Molecular Biology and Biotechnology</p>
                        <p class="small-text">Prof Name</p>
                    </a>
                </div>
                <img class="course-image" src="../images/course-card.svg" />
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
@endpush
