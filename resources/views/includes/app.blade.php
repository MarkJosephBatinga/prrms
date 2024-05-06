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
            @elseif(Auth::user()->user_type === 'program chairman')
                @include('includes.program_chairman_sidebar')
            @elseif(Auth::user()->user_type === 'dean')
                @include('includes.dean_sidebar')
            @elseif(Auth::user()->user_type === 'registrar')
                @include('includes.registrar_sidebar')
            @else
                @include('includes.stud_sidebar')
            @endif
            <div class="content-wrapper">
                @include('includes.navbar')
                @yield('body')
            </div>
            @stack('add_content')
        </div>
        {{-- @include('includes.js-assets') --}}
        @stack('js_scripts')
    </body>
</html>
