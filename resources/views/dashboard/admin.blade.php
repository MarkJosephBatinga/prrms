@extends('includes.app')

@section('body')
<div class="content px-3">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Dashboard</h3>
        <h4 class="content-sub-header">Welcome Back, Admin!</h4>
    </div>
    <!-- Dashboard Cards -->
    <div class="row mt-4">
        <div class="card-container col-6 col-md-6 col-lg-3 mb-3 mx-3">
            <a href="coordinator_list.php"> <h4 class="card-text-heading">Pre-registered Students</h4> </a>
            <h4 class="card-value">20</h4>
        </div>
        <div class="card-container col-6 col-md-6 col-lg-3 mb-3 mx-3">
            <a href="coordinator_list.php"> <h4 class="card-text-heading">Programs</h4> </a>
            <h4 class="card-value">20</h4>
        </div>
        <div class="card-container col-6 col-md-6 col-lg-3 mb-3 mx-3">
            <a href="coordinator_list.php"> <h4 class="card-text-heading">Users</h4> </a>
            <h4 class="card-value position-absolute bottom-0 right-0 mb-3 mr-3">20</h4>
        </div>
    </div>
</div>
@endsection
