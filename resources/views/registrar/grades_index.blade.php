@extends('includes.app')

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Grades</h3>
        </div>
        <!-- Search  -->
        <div class="search-button-container">
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Search">
                <i class='bx bx-search-alt search-icon'></i>
            </div>
        </div>
        <!-- Records Table -->
        <div class="table-container">
            <table>
                <thead>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Nationality</th>
                    <th>Program</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>001-021</td>
                        <td>Mohammad Jones</td>
                        <td>Foreign</td>
                        <td>MDA-PA</td>
                        <td>
                            <a href="{{route('view_grades', 1)}}"><i class='bx bx-low-vision action-icons mr-2'></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>001-022</td>
                        <td>John Doe</td>
                        <td>Foreign</td>
                        <td>MDA-PA</td>
                        <td>
                            <a href="{{route('view_grades', 2)}}"><i class='bx bx-low-vision action-icons mr-2'></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>001-023</td>
                        <td>Travis Reyes</td>
                        <td>Foreign</td>
                        <td>MDA-PA</td>
                        <td>
                            <a href="{{route('view_grades', 3)}}"><i class='bx bx-low-vision action-icons mr-2'></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
