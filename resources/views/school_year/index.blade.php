@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="content-header">
            <h3 class="content-header mt-2">School Years</h3>
        </div>
        <!-- Search and Add School Year Button -->
        <div class="search-button-container">
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Search">
                <i class='bx bx-search-alt search-icon'></i>
            </div>
            <a class="add-button" href="{{ route('add_school_year') }}">Add School Year</a>
        </div>
        <!-- School Year Table -->
        <div class="table-container">
            <table class="table-results">
                <thead>
                    <th>School Year</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($school_years as $school_year)
                        <tr>
                            <td>{{$school_year->school_year}}</td>
                            <td>{{$school_year->start_date}}</td>
                            <td>{{$school_year->end_date}}</td>
                            <td class="table-actions">
                                <a href="{{route('edit_school_year', $school_year->id)}}"> <i class='bx bx-pencil action-icons mr-2'></i> </a>
                                <i class='bx bx-trash action-icons openStudentDelete' data-modal="{{ $school_year->id }}"></i>
                            </td>
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

@push('add_content')
    @if(session('success'))
        <div class="modal-container">
            <div class="modal-content">
                <div class="body">
                    <img src="../images/success-logo.svg" />
                    <p class="heading-text">Success!</p>
                    <p class="info-text">{{ session('success') }}</p>
                    <div class="button-container">
                        <button id="continueButton" class="continue-button">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal-container delete-modal d-none">
        <div class="modal-content">
            <div class="body">
                <img src="{{ asset('/images/warning-logo.svg') }}" />
                <p class="heading-text">Are you sure you want to delete this item?</p>
                <p class="info-text">Deleting this item will remove it permanently. Do you wish to proceed and delete?</p>
                <div class="button-container">
                    <button class="cancel">Cancel</button>
                    <a href="#" class="delete" id="confirmDeleteSchoolYear">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js_scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/filterTable.js') }}"></script>
@endpush