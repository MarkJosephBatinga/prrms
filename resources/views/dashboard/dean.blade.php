@extends('includes.app')

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Dashboard</h3>
    </div>
    <!-- Greet Message -->
    <h4 class="content-sub-header">Welcome Back, Dean!</h4>
    <!-- Dashboard Table -->
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
            <p class="card-text-count">{{count($programs)}}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>
        <a href="{{ route('courses') }}" class="card-container">
            <i class='bx bx-list-ul card-icon'></i>
            <p class="card-text-heading">Courses</p>
            <p class="card-text-count">{{ count(get_object_vars($courses)) }}</p>
            <i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i>
        </a>
    </div>
</div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush