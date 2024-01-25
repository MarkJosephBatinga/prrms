@extends('includes.app')

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Dashboard</h3>
    </div>

    <h4 class="content-sub-header">Welcome Back, {{Auth::user()->name}}!</h4>
    <!-- Dashboard Cards -->
    <div class="dashboard-cards">

    </div>
    <div class="progress-status-card">
        <p>Pre-registration Status</p>
        <section class="step-wizard">
            <ul class="step-wizard-list">
                <li class="step-wizard-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Pre-Registered</span>
                </li>
                <li class="step-wizard-item {{($student->approval_log->status == 1) ? 'current-item' : ''}}">
                    <span class="progress-count">2</span>
                    <span class="progress-label">Endorsed</span>
                </li>
                <li class="step-wizard-item {{($student->approval_log->status == 2) ? 'current-item' : ''}}">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Approved</span>
                </li>
                <li class="step-wizard-item {{($student->approval_log->status == 3) ? 'current-item' : ''}}">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Registered</span>
                </li>
                <li class="step-wizard-item {{($student->approval_log->status == 4) ? 'current-item' : ''}}">
                    <span class="progress-count">5</span>
                    <span class="progress-label">Enrolled</span>
                </li>
            </ul>
        </section>
    </div>

    <div class="progress-status-card">
        <div class="text-header">
            <p>{{$student->program_info->program_name}}</p>
            <p>School Year: {{ date('Y') . '-' . date('Y', strtotime('+1 year')) }}</p>
        </div>
        <div class="table-container non-centered">
            <table>
                <thead>
                    <th>Course</th>
                    <th colspan=2 >Day and Time</th>
                </thead>
                <tbody>
                    @foreach ($student->course as $course)
                        <tr>
                            <td>{{$course->course->descriptive_title}}</td>
                            <td>{{ optional($course->course->schedules)->day ?? 'No schedule' }}</td>
                            <td>{{ optional($course->course->schedules)->time ?? '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach ($student->course as $course)
            <div class="course-sched-item">
                <div class="course-name">
                    <p class="code">{{$course->course->course_code}}</p>
                    <p class="desc">{{$course->course->descriptive_title}}</p>
                </div>
                <div class="course-time">
                    <p class="sched-day">{{ optional($course->course->schedules)->day ?? 'No schedule' }}</p>
                    <p class="sched-time">{{ optional($course->course->schedules)->time ?? '' }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush

