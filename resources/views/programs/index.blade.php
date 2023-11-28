@extends('includes.app')

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Programs</h3>
        </div>
        <!-- Search and Add Program Button -->
        <div class="search-button-container">
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Search">
                <i class='bx bx-search-alt search-icon'></i>
            </div>
            <a class="add-button" href="{{ route('add_program') }}">Add Program</a>
        </div>
        <!-- Small Cards -->
        <div class="small-cards">
            @if(isset($programs) && $programs != null)
                @foreach($programs as $program)
                    <div class="card-container">
                        <div class="card-text">
                            <a href="{{route('view_program', $program->id)}}">
                                <p class="small-text">Effective since {{$program->effective_school_year}}</p>
                                <p class="large-text">{{$program->program_name}}</p>
                            </a>
                        </div>
                        <img class="program-image" src="{{asset('images/program-card.svg')}}" />
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
