$(document).ready(function () {
    $('#openDeleteModal').on('click', function () {
        // Show the modal
        $('.delete-modal').removeClass('d-none');
    });

    // Click event for the cancel button in the modal
    $('.delete-modal .cancel').on('click', function () {
        // Hide the modal
        $('.delete-modal').addClass('d-none');
    });
});
