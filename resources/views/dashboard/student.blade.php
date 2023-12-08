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
                <li class="step-wizard-item done-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Pre-Registered</span>
                </li>
                <li class="step-wizard-item current-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">Endorsed</span>
                </li>
                <li class="step-wizard-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Approved</span>
                </li>
                <li class="step-wizard-item">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Registered</span>
                </li>
                <li class="step-wizard-item">
                    <span class="progress-count">5</span>
                    <span class="progress-label">Enrolled</span>
                </li>
            </ul>
        </section>
    </div>

    <div class="progress-status-card">
        <div class="text-header">
            <p>PhD TEM Schedule</p>
            <p>CGS2 101</p>
        </div>
        <div class="table-container non-centered">
            <table>
                <thead>
                    <th>Course</th>
                    <th colspan=2 >Day and Time</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Quantitative Methods</td>
                        <td>Tuesday</td>
                        <td>5:00-8:00 PM</td>
                    </tr>
                    <tr>
                        <td>TEM 307 - Project Planning & Institutional Development</td>
                        <td>Wednesday</td>
                        <td>5:00-8:00 PM</td>
                    </tr>
                    <tr>
                        <td>Seminar Dissertation Writing</td>
                        <td>Thursday</td>
                        <td>5:00-8:00 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
