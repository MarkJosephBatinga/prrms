<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.header')
        @stack('css_scripts')
    </head>
    <body>
        <div class="wrapper">
            @if(Auth::user()->user_type === 'admin')
                @include('includes.sidebar')
            @else
                @include('includes.stud_sidebar')
            @endif
            <div class="content-wrapper px-2">
                @include('includes.navbar')
                @yield('body')
            </div>
            @stack('add_content')
        </div>
        {{-- @include('includes.js-assets') --}}
        @stack('js_scripts')
    </body>
</html>
