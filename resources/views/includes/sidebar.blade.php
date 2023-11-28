<nav id="sidebar" class="d-none d-md-block">
    <div id="sidebar-header">
        <img class="logo" src="{{ asset('images/logo.png') }}">
        <h3 id="text-header" class="mt-1">PRRMS</h3>
    </div>
    <ul class="list-unstyled components">
        <li class="mb-2 mx-2">
            <a class="d-flex align-items-center p-2" href="{{route('dashboard')}}">
                <i class='bx bx-home-alt icon' ></i>
                <span class="text nav-text">Dashboard</span>
            </a>
        </li>
        <li class="mb-2 mx-2">
            <a class="d-flex align-items-center p-2" href="{{route('records')}}">
                <i class='bx bx-file icon'></i>
                <span class="text nav-text">Records</span>
            </a>
        </li>
        <li class="mb-2 mx-2">
            <a class="d-flex align-items-center p-2" href="{{route('grades')}}">
                <i class='bx bx-star icon'></i>
                <span class="text nav-text">Grades</span>
            </a>
        </li>
        <li class="mb-2 mx-2">
            <a class="d-flex align-items-center p-2" href="{{route('programs')}}">
                <i class='bx bx-folder-open icon'></i>
                <span class="text nav-text">Programs</span>
            </a>
        </li>
        <li class="mb-2 mx-2">
            <a class="d-flex align-items-center p-2" href="{{route('courses')}}">
                <i class='bx bx-list-ul icon'></i>
                <span class="text nav-text">Courses</span>
            </a>
        </li>

        <li class="mx-2">
            <a class="d-flex align-items-center p-2" href="{{ route('logout') }}">
                <i class='bx bx-log-out icon'></i>
                <span class="text nav-text">Logout</span>
            </a>
        </li>
    </ul>
</nav>
