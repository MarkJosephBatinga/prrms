<div class="top-nav-container">
    <img src="{{ asset('images/default-image.svg') }}" class="top-nav-image" />
    <a class="top-nav-name" href="{{(Auth::user()->user_type === 'student') ? route('profile_view') : '#'}}">{{ Auth::user()->name }}</a>
</div>
