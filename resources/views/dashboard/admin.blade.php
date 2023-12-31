@extends('includes.app')

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Dashboard</h3>
    </div>

    <h4 class="content-sub-header">Welcome Back, Admin!</h4>
    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
        <div class="card-container">
            <i class='bx bx-file card-icon'></i>
            <p class="card-text-heading">Users</p>
            <p class="card-text-count">{{$user_count}}</p>
            <a href="{{route('dashboard')}}"><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>

        <div class="card-container">
            <i class='bx bx-folder-open card-icon'></i>
            <p class="card-text-heading">Programs</p>
            <p class="card-text-count">{{$program_count}}</p>
            <a href="{{route('programs')}}"><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>

        <div class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Courses</p>
            <p class="card-text-count">{{$course_count}}</p>
            <a href="{{route('courses')}}"><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>
    </div>

    <div class="dashboard-cards">
        <div class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Pre-registered <br>Students</p>
            <p class="card-text-count">{{$prereg_count}}</p>
            <a href="{{route('records')}}"><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>

        <div class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Endorsed <br> Students</p>
            <p class="card-text-count">{{$endorsed_count}}</p>
            <a href="{{route('records')}}"><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>

        <div class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Approved <br> Students</p>
            <p class="card-text-count">{{$approved_count}}</p>
            <a href="{{route('records')}}"><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>
    </div>

</div>
@endsection
