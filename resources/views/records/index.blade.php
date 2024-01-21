@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Records</h3>
    </div>
    <!-- Search and Pre register Button -->
    <div class="search-button-container">
        <div class="search-container">
            <input type="text" class="search-box" placeholder="Search">
            <i class='bx bx-search-alt search-icon'></i>
        </div>
        {{-- <a class="add-button" href="{{ route('pre_register') }}">Pre - Register</a> --}}
    </div>
    <!-- Records Table -->
    <div class="table-container">
        <table>
            <thead>
                <th>Student ID</th>
                <th>Student Type</th>
                <th>Name</th>
                <th>Nationality</th>
                <th>Program</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if(isset($students) && $students != null)
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->user_info->email}}</td>
                            <td>{{$student->student_type}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->nationality}}</td>
                            <td>{{$student->program_info->program_name}}</td>
                            <td class="table-actions">
                                <a href="{{route('view_record', $student->id)}}"> <i class='bx bx-file-find action-icons mr-2'></i> </a>
                                <a href="{{route('edit_record', $student->id)}}"> <i class='bx bx-pencil action-icons mr-2'></i> </a>
                                <i class='bx bx-trash action-icons openStudentDelete' data-modal="{{ $student->id }}"></i>
                            </td>
                        </tr>
                    @endforeach
                @endif
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
                    <a href="#" class="delete" id="confirmDelete">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js_scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
