@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
    <link rel='stylesheet' href="{{ asset('css/input_fields.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
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
            <div class="button-group">
                <a class="add-button" href="{{ route('add_school_year') }}">Add SY</a>
                <a class="add-button importBtn">Import</a>
            </div>
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
    @if(session('error'))
        <div class="modal-container">
            <div class="modal-content">
                <div class="body">
                    <img src="../images/warning-logo.svg" />
                    <p class="heading-text">Error!</p>
                    <p class="info-text">{{ session('error') }}</p>
                    <div class="button-container">
                        <button class="continue-button">Continue</button>
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
    <div class="modal-container import-modal d-none">
        <div class="modal-content">
            <form action="{{ route('import_school_year') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="body">
                    <div class="input-group">
                        <label class="label-input">Import School Year (CSV Only)</label> <br>
                        <div class="file-uploads">
                            <div>
                                <div class="custom-file-input">
                                    <label class="file-label">
                                        <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> Upload a File
                                    </label>
                                    <input type="file" id="csv_file" name="csv_file" accept=".csv" class="input-file"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-container">
                        <a class="back-button close">Cancel</a>
                        <button type="submit" class="continue-button">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush

@push('js_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/filterTable.js') }}"></script>
@endpush