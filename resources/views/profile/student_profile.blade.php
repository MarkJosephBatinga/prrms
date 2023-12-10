@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/pre-register.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">{{$student->name}}</h3>
            <div class="action-container">
                <a href="edit_profile.php"><i class='bx bx-pencil action-icons'></i></a>
            </div>
        </div>
        <!-- Program Details -->
        <div class="sub-page-content">
            <div class="details-body">
                <div class="tab-headers">
                    <i class="header-one active">User Account</i>
                </div>
                <div class="info detail-one">
                    <div class="detail-group">
                        <p class="detail-label">ID Number</p>
                        <p class="details-value">001-019</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Full Name</p>
                        <p class="details-value">{{$student->name}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Nationality</p>
                        <p class="details-value">{{$student->nationality}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Program</p>
                        <p class="details-value">{{$student->program_info->program_name}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Mobile Number</p>
                        <p class="details-value">{{$student->mobile_number}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
