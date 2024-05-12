@extends('includes.app')

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">Courses</h3>
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
            <table class="table-results">
                <thead>
                    <th class="text-left">Course</th>
                    <th>Total Pre - registered</th>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td class="text-left">{{$course->course}}</td>
                            <td>{{$course->counts->pre_registered}}</td>
                        </tr>
                    @endforeach
                    <tr id="no-result-row">
                        <td colspan="6">No results Found!</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/filterTable.js') }}"></script>
@endpush
