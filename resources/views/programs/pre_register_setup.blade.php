@extends('includes.app')

@push('css_scripts')
    <link rel='stylesheet' href="{{ asset('css/modal.css') }}">
@endpush

@section('body')
<div class="content">
    <!-- Content Header -->
    <div class="content-header">
        <h3 class="content-header mt-2">Pre - registration</h3>
    </div>
    <!-- Dashboard Table -->
    <div class="staff-card">
        <div class="text-header">
            <p> Programs (For Pre Registration Listing)</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <th class="text-left">Effective Dates</th>
                    <th class="text-left">Program Name</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @if(isset($programs))
                        @if(is_iterable($programs))
                            @foreach($programs as $program)
                                <tr>
                                    <td class="text-left">{{$program->effective_school_year}}</td>
                                    <td class="text-left">{{$program->program_name}}</td>
                                    <td class="table-actions">
                                        <a href="{{route('edit_program', $program->id)}}"> <i class='bx bx-pencil action-icons mr-2'></i> </a>
                                        <i class='bx bx-trash action-icons openStudentDelete' data-modal="{{ $program->id }}"></i>
                                        <input type="checkbox" class="action-program-checkbox ml-2" value="{{ $program->id }}" {{ $program->listing_status == 1 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-left">{{$programs->effective_school_year}}</td>
                                <td class="text-left">{{$programs->program_name}}</td>
                                <td class="table-actions">
                                    <a href="{{route('edit_program', $programs->id)}}"> <i class='bx bx-pencil action-icons mr-2'></i> </a>
                                    <i class='bx bx-trash action-icons openProgramDelete' data-modal="{{ $programs->id }}"></i>
                                    <input type="checkbox" class="action-program-checkbox ml-2" value="{{ $programs->id }}" {{ $programs->listing_status == 1 ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="staff-card">
        <div class="text-header">
            <p> Courses (For Pre Registration Listing)</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <th class="text-left">Course Code</th>
                    <th class="text-left">Descriptive Title</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @if(isset($courses) && $courses != null)
                        @foreach($courses as $row)
                        <tr>      
                            <td class="text-left">{{$row->course->course_code}}</td>
                            <td class="text-left">{{$row->course->descriptive_title}}</td>
                            <td class="table-actions">
                                <a href="{{route('edit_course', $row->course->id)}}"> <i class='bx bx-pencil action-icons mr-2'></i> </a>
                                <i class='bx bx-trash action-icons openCourseDelete' data-modal="{{ $row->course->id }}"></i>
                                <input type="checkbox" class="action-course-checkbox ml-2" value="{{ $row->course->id }}" {{ $row->course->listing_status == 1 ? 'checked' : '' }}>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
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
    <div class="modal-container delete-modal d-none" id="program-delete">
        <div class="modal-content">
            <div class="body">
                <img src="{{ asset('/images/warning-logo.svg') }}" />
                <p class="heading-text">Are you sure you want to delete this item?</p>
                <p class="info-text">Deleting this item will remove it permanently. Do you wish to proceed and delete?</p>
                <div class="button-container">
                    <button class="cancel">Cancel</button>
                    <a href="#" class="delete" id="confirmDeleteProgram">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-container delete-modal d-none" id="course-delete">
        <div class="modal-content">
            <div class="body">
                <img src="{{ asset('/images/warning-logo.svg') }}" />
                <p class="heading-text">Are you sure you want to delete this item?</p>
                <p class="info-text">Deleting this item will remove it permanently. Do you wish to proceed and delete?</p>
                <div class="button-container">
                    <button class="cancel">Cancel</button>
                    <a href="#" class="delete" id="confirmDeleteCourse">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js_scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('.action-program-checkbox').change(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var programId = $(this).val();
                var isChecked = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route("update_program_listing_status") }}',
                    method: 'POST',
                    data: {
                        id: programId,
                        status: isChecked
                    },
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });

            });

            $('.action-course-checkbox').change(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var courseId = $(this).val();
                var isChecked = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route("update_course_listing_status") }}',
                    method: 'POST',
                    data: {
                        id: courseId,
                        status: isChecked
                    },
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });

            });

        });
    </script>
@endpush