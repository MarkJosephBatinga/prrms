@extends('includes.app')

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
            <a class="add-button" href="add_course.php">Add Course</a>
        </div>
        <!-- Small Cards -->
        <div class="small-cards">
            @if(isset($courses) && $courses != null)
            @foreach($courses as $course)
                <div class="card-container">
                    <div class="card-text">
                        <a href="view_course.php">
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
