<ul class="list-unstyled components">
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('dashboard')}}">
            <i class='bx bx-home-alt icon' ></i>
            <span class="text nav-text">Dashboard</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('student_record')}}">
            <i class='bx bx-file icon'></i>
            <span class="text nav-text">Pre-register</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('student_course')}}">
            <i class='bx bx-star icon'></i>
            <span class="text nav-text">My Courses</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('student_grades')}}">
            <i class='bx bx-folder-open icon'></i>
            <span class="text nav-text">My Grades</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{ route('logout') }}">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
        </a>
    </li>
</ul>