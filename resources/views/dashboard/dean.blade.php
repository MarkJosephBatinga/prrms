@extends('includes.app')

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Dashboard</h3>
    </div>
    <!-- Greet Message -->
    <h4 class="content-sub-header">Welcome Back, Dean!</h4>
    <!-- Dashboard Table -->
    <div class="staff-card">
        <div class="text-header">
            <p>Program List</p>
            <p>School Year: {{ date('Y') . '-' . date('Y', strtotime('+1 year')) }}</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <th class="text-left">Program</th>
                    <th>Total Pre - registered</th>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                        <tr>
                            <td class="text-left">{{$program->program_name}}</td>
                            <td>{{$program->pre_registered}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="staff-card">
        <div class="text-header">
            <p>Course List</p>
            <p>School Year: {{ date('Y') . '-' . date('Y', strtotime('+1 year')) }}</p>
        </div>
        <div class="table-container">
            <table>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush