@extends('includes.app')

@section('body')
    <div class="content">
        <!-- Content Header -->
        <div class="header-buttons">
            <a href="{{route('dashboard')}}" class="view-back-button"> < Back </a>
            <div class="action-container">
                <a href="{{route('profile_edit')}}"><i class='bx bx-pencil action-icons'></i></a>
            </div>
        </div>
        <div class="view-page-header mt-4 mb-n4">
            <h3 class="content-header mt-2">{{$student->name}}</h3>
            <div class="action-container">
                <a href="{{route('profile_edit')}}"><i class='bx bx-pencil action-icons'></i></a>
            </div>
        </div>
        <!-- Program Details -->
        <div class="sub-page-content">
            <div class="details-body">
                <div class="tab-headers">
                    <i class="active header-one">Student Info</i>
                    <i class="header-two">Program Offerings</i>
                    <i class="header-three">Payment Mode and File</i>
                    <i class="header-four">Login Credentials</i>
                </div>
                <div class="detail-one info">
                    <div class="detail-group">
                        <p class="detail-label">Student Type</p>
                        <p class="details-value">{{$student->student_type}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Student Status</p>
                        <p class="details-value">{{$student->student_status}}</p>
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
                        <p class="detail-label">Address</p>
                        <p class="details-value">{{$student->address}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Mobile Number</p>
                        <p class="details-value">{{$student->mobile_number}}</p>
                    </div>
                </div>
                <div class="detail-two info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Program</p>
                        <p class="details-value">{{(isset($student->program_info)) ? $student->program_info->program_name : 'No Program'}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Course to Enroll</p>
                        @if($student->course !== null)
                            @foreach ($student->course as $c)
                                <p class="details-value">{{$c->course->descriptive_title}} ({{$c->course->course_code}})</p>
                            @endforeach
                        @else
                        <p class="details-value">No Courses</p>
                        @endif
                    </div>
                </div>
                <div class="detail-three info d-none">
                    <div class="detail-group">
                        <p class="detail-label">Payment Mode</p>
                        <p class="details-value">{{$student->payment_mode}}</p>
                    </div>
                    <div id="file-details">
                        <div class="detail-group">
                            <p class="detail-label">OTR</p>
                            <form action="{{ route('download_file') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filename" value="{{$student->file_record}}">
                                <button class="download-button"  type="submit" class="download-button">Download</button>
                            </form>
                        </div>
                        <div class="detail-group">
                            <p class="detail-label">Birth Certificate</p>
                            <form action="{{ route('download_file') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filename" value="{{$student->birth_cert}}">
                                <button class="download-button"  type="submit" class="download-button">Download</button>
                            </form>
                        </div>
                        <div class="detail-group">
                            <p class="detail-label">Letter of Intent</p>
                            <form action="{{ route('download_file') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filename" value="{{$student->letter_intent}}">
                                <button class="download-button"  type="submit" class="download-button">Download</button>
                            </form>
                        </div>
                        <div class="detail-group">
                            <p class="detail-label">Recommendation Letter</p>
                            <form action="{{ route('download_file') }}" method="POST">
                                @csrf
                                <input type="hidden" name="filename" value="{{$student->rec_letter}}">
                                <button class="download-button"  type="submit" class="download-button">Download</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="detail-four info d-none">
                    <div class="detail-group">
                        <p class="detail-label">ID Number</p>
                        <p class="details-value">{{ Auth::user()->email}}</p>
                    </div>
                    <div class="detail-group">
                        <p class="detail-label">Password</p>
                        <p class="details-value">*****</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
