$(document).ready(function () {
    $('#openDeleteModal').on('click', function () {
        // Show the modal
        $('.delete-modal').removeClass('d-none');
    });

    $('#show-evaluate').on('click', function () {
        // Hide the modal
        $('#evaluate-modal').removeClass('d-none');
    });

    $('#show-endorse').on('click', function () {
        // Hide the modal
        $('#endorse-modal').removeClass('d-none');
    });

    $('.openStudentDelete').on('click', function () {
        console.log('Hello');
        var modalData = $(this).data('modal');

        $('.delete-modal').data('modalData', modalData);
        $('.delete-modal').removeClass('d-none');
    });

    $('#confirmDelete').on('click', function () {
        var modalData = $('.delete-modal').data('modalData');

        var baseUrl = window.location.origin;
        var url = baseUrl + "/records/delete/" + modalData;

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
