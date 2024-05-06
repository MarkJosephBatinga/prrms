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
            <span class="text nav-text">Records</span>
        </a>
    </li>
    <li>
        <a class="d-flex align-items-center p-2" href="{{route('grades')}}">
            <i class='bx bx-star icon'></i>
            <span class="text nav-text">Grades</span>
        </a>
    </li>

    <li class="mt-4">
        <a class="d-flex align-items-center p-2" href="{{ route('logout') }}">
            <i class='bx bx-log-out icon'></i>
            <span>Logout</span>
        </a>
    </li>
</ul>