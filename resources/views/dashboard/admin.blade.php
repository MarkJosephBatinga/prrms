@extends('includes.app')

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Dashboard</h3>
    </div>

    <h4 class="content-sub-header">Welcome Back, Admin!</h4>
    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
        <div class="card-container">
            <i class='bx bx-file card-icon'></i>
            <p class="card-text-heading">Pre-registered Students</p>
            <p class="card-text-count">23</p>
            <a href=""><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>

        <div class="card-container">
            <i class='bx bx-folder-open card-icon'></i>
            <p class="card-text-heading">Programs</p>
            <p class="card-text-count">10</p>
            <a href=""><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>

        <div class="card-container">
            <i class='bx bxs-user-account card-icon'></i>
            <p class="card-text-heading">Users</p>
            <p class="card-text-count">13</p>
            <a href=""><i class='bx bx-arrow-back bx-rotate-180 card-nav-icon'></i></a>
        </div>
    </div>
    <div class="action-card-container">
        <p class="card-text-action">Action Needed</p>
    </div>

</div>
@endsection
