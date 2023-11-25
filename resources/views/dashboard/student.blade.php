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
    <div class="action-card-container">
        <p class="card-text-action">Action Needed</p>
    </div>

</div>
@endsection
