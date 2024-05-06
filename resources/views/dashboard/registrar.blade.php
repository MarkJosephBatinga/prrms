@extends('includes.app')

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Dashboard</h3>
    </div>

    <h4 class="content-sub-header">Welcome Back, Registrar!</h4>
    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
        <a href="{{ route('records') }}" class="card-container">
            <i class='bx bx-file card-icon'></i>
            <p class="card-text-heading">Students</p>
            <p class="card-text-count">{{ $student_count }}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>

        <a href="{{ route('programs') }}" class="card-container">
            <i class='bx bx-folder-open card-icon'></i>
            <p class="card-text-heading">Programs</p>
            <p class="card-text-count">{{$program_count}}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>

        <a href="{{ route('courses') }}" class="card-container">
            <i class='bx bx-list-ul card-icon'></i>
            <p class="card-text-heading">Courses</p>
            <p class="card-text-count">{{$course_count}}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>

        <a href="{{ route('filter_student', ['status' => 1]) }}" class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Pre-registered <br>Students</p>
            <p class="card-text-count">{{$prereg_count}}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>

        <a href="{{ route('filter_student', ['status' => 2]) }}" class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Endorsed <br> Students</p>
            <p class="card-text-count">{{$endorsed_count}}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>

        <a href="{{ route('filter_student', ['status' => 3]) }}" class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Approved <br> Students</p>
            <p class="card-text-count">{{$approved_count}}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>
    </div>

</div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush