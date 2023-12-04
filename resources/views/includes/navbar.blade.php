<div class="top-nav-container">
    <img src="{{ asset('images/default-image.svg') }}" class="top-nav-image" />
    <a class="top-nav-name" href="{{route('dashboard')}}">{{Auth::user()->name}}</a>
</div>
