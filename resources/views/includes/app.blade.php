<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.header')
        @stack('css_scripts')
    </head>
    <body>
        <div class="wrapper">
            @include('includes.sidebar')
            <div class="content-wrapper px-2">
                @include('includes.navbar')
                @yield('body')
            </div>
        </div>
        {{-- @include('includes.js-assets') --}}
        @stack('js_scripts')
    </body>
</html>
