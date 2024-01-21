<div class="top-nav-container">
    <div class="hamburger-menu-container">
        <i id="hamburger-button" class='bx bx-menu'></i>
    </div>
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}">
        <p>PRRMS</p>
    </div>
    <div class="user-info">
        <a href="{{(Auth::user()->user_type === 'student') ? route('profile_view') : '#'}}">
            <img src="{{ asset('images/default-image.svg') }}" />
            <p> {{ Auth::user()->name }} </p>
        </a>
    </div>
</div>

<div class="responsive-menu">
    @if(Auth::user()->user_type === 'admin')
        @include('includes.responsive_menu')
    @else
        @include('includes.stud_responsive_menu')
    @endif
</div>
