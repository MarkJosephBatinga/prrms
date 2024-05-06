$(document).ready(function () {

    var userType =  $('#user-type').val();

    $('.openDeleteModal').on('click', function () {
        // Show the modal
        $('.delete-modal').removeClass('d-none');
    });

    $('#show-enroll').on('click', function () {
        if(userType == 'admin' || userType == 'registrar'){
            $('#enroll-modal').removeClass('d-none');
        } else{
            alert ('No Permission to enroll!')
        }
    });

    $('#show-register').on('click', function () {
        if(userType == 'admin' || userType == 'registrar'){
            $('#register-modal').removeClass('d-none');
        } else{
            alert ('No Permission to register!')
        }
    });

    $('#show-evaluate').on('click', function () {
        if(userType == 'admin' || userType == 'dean'){
            $('#evaluate-modal').removeClass('d-none');
        } else{
            alert ('No Permission to evaluate!')
        }
    });

    $('#show-endorse').on('click', function () {
        if(userType == 'admin' || userType == 'program chairman'){
            $('#endorse-modal').removeClass('d-none');
        } else{
            alert ('No Permission to endorsed!')
        }
    });

    $('.openStudentDelete').on('click', function () {
        var modalData = $(this).data('modal');

        $('.delete-modal').data('modalData', modalData);
        $('.delete-modal').removeClass('d-none');
    });

    $('.openProgramDelete').on('click', function () {
        var modalData = $(this).data('modal');

        $('#program-delete').data('modalData', modalData);
        $('#program-delete').removeClass('d-none');
    });

    $('.openCourseDelete').on('click', function () {
        var modalData = $(this).data('modal');

        $('#course-delete').data('modalData', modalData);
        $('#course-delete').removeClass('d-none');
    });

    $('#confirmDelete').on('click', function () {
        var modalData = $('.delete-modal').data('modalData');

        var baseUrl = window.location.origin;
        var url = baseUrl + "/records/delete/" + modalData;

        window.location.href = url;
    });

    $('#confirmDeleteUser').on('click', function () {
        var modalData = $('.delete-modal').data('modalData');

        var baseUrl = window.location.origin;
        var url = baseUrl + "/users/delete/" + modalData;

        window.location.href = url;
    });

    $('#confirmDeleteSchoolYear').on('click', function () {
        var modalData = $('.delete-modal').data('modalData');

        var baseUrl = window.location.origin;
        var url = baseUrl + "/school_year/delete/" + modalData;

        window.location.href = url;
    });

    $('#confirmDeleteSemester').on('click', function () {
        var modalData = $('.delete-modal').data('modalData');

        var baseUrl = window.location.origin;
        var url = baseUrl + "/semester/delete/" + modalData;

        window.location.href = url;
    });

    $('#confirmDeleteProgram').on('click', function () {
        var modalData = $('#program-delete').data('modalData');

        var baseUrl = window.location.origin;
        var url = baseUrl + "/programs/delete/" + modalData;

        window.location.href = url;
    });

    $('#confirmDeleteCourse').on('click', function () {
        var modalData = $('#course-delete').data('modalData');

        var baseUrl = window.location.origin;
        var url = baseUrl + "/courses/delete/" + modalData;

        window.location.href = url;
    });

    // Click event for the cancel button in the modal
    $('.delete-modal .cancel').on('click', function () {
        // Hide the modal
        $('.delete-modal').addClass('d-none');
    });
});

$(document).ready(function () {
    // Click event for the Continue button
    $('#continueButton').on('click', function () {
        // Hide the modal
        $('.modal-container').addClass('d-none');
    });

    $('.hide-modal').on('click', function () {
        // Hide the modal
        $('.modal-container').addClass('d-none');
    });

});
