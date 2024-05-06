<ul class="list-unstyled components">
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('dashboard')}}">
            <i class='bx bx-home-alt icon' ></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('records')}}">
            <i class='bx bx-file icon'></i>
            <span>Records</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('grades')}}">
            <i class='bx bx-star icon'></i>
            <span>Grades</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('programs')}}">
            <i class='bx bx-folder-open icon'></i>
            <span>Programs</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('courses')}}">
            <i class='bx bx-list-ul icon'></i>
            <span>Courses</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('school_year')}}">
            <i class='bx bxs-graduation icon'></i>
            <span class="text nav-text">School Years</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('semester')}}">
            <i class='bx bxs-graduation icon'></i>
            <span class="text nav-text">Semesters</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('users')}}">
            <i class='bx bxs-user-detail icon'></i>
            <span class="text nav-text">Users</span>
        </a>
    </li>

    <li class="mt-4">
        <a class="d-flex align-items-center p-2" href="{{ route('logout') }}">
            <i class='bx bx-log-out icon'></i>
            <span>Logout</span>
        </a>
    </li>
</ul>