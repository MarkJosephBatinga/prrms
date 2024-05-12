<div class="top-nav-container">
    <div class="hamburger-menu-container">
        <i id="hamburger-button" class='bx bx-menu'></i>
    </div>
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}">
        <p>PRRMS</p>
    </div>
    <div class="user-info">
        @if(Auth::user()->user_type === 'student')
            <i class='bx bx-bell icon' id="notif"></i>
            <div class="notification-box" id="notificationBox">
                @if(isset($notificationMessage) && count($notificationMessage) > 0)
                    @foreach($notificationMessage as $title => $message)
                        @if(!empty($message))
                            <strong>{{ $title }}:</strong><br>
                            {{ $message }} <br><br>
                        @endif
                    @endforeach
                @else
                    No Notification
                @endif
            </div>
        @endif
        <a href="{{(Auth::user()->user_type === 'student') ? route('profile_view') : '#'}}">
            <img src="{{ asset('images/default-image.svg') }}" />
            <p> {{ Auth::user()->name }} </p>
        </a>
    </div>
</div>

<div class="responsive-menu">
    @if(Auth::user()->user_type === 'admin')
        @include('includes.responsive_menu')
    @elseif(Auth::user()->user_type === 'student')
        @include('includes.stud_responsive_menu')
    @elseif(Auth::user()->user_type === 'program chairman')
        @include('includes.chairman_responsive_menu')
    @elseif(Auth::user()->user_type === 'dean')
        @include('includes.dean_responsive_menu')
    @elseif(Auth::user()->user_type === 'registrar')
        @include('includes.registrar_responsive_menu')
    @endif
</div>