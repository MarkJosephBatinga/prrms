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
            <table class="table-results">
                <thead>
                    <th>Code No.</th>
                    <th>Course Code</th>
                    <th>Descriptive Title</th>
                    <th>Units</th>
                    <th>Total Passed</th>
                    <th>Total Failed</th>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                        <tr>
                            <td>{{$grade->code_no}}</td>
                            <td>{{$grade->course_no}}</td>
                            <td>{{$grade->descriptive_title}}</td>
                            <td>{{$grade->units}}</td>
                            <td>{{$grade->passed}}</td>
                            <td>{{$grade->failed}}</td>
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
