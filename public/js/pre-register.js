// FORM Navigate Buttons
typeNextButton = $('#type-next');
infoNextButton= $('#info-next');
infoBackButton = $('#info-back');
programNextButton= $('#program-next');
programBackButton = $('#program-back');
paymentBackButton = $('#payment-back');

typeHeader = $('#type-header');
informationHeader = $('#info-header');
programHeader = $('#program-header');
paymentHeader = $('#payment-header');
allHeaders = $('.tab-headers').find('i');

// FORM Containers
typeForm = $('#type-form');
informationForm = $('#info-form');
programForm = $('#program-form');
paymentForm = $('#payment-form');

typeDetails = $('#type-details');
informationDetails = $('#info-details');
programDetails = $('#program-details');
paymentDetails = $('#payment-details');
allDetails = $('.details-body').find('.info');

// FORM Tab Status
allTabs = $('.tab-status-container').find('.tab-status');
typeTab = $('#student-tab');
informationTab = $('#info-tab');
programTab = $('#program-tab');
paymentTab = $('#payment-tab');


$(document).ready(function() {
    navigateAddForms()
    navigateViewForms()
    clearForm()
    displayModal()
});


// Add Pre Registration
function displayAddForm(hideForm, showForm){
    hideForm.addClass('d-none');
    showForm.removeClass('d-none');
}
function nextTabStatus(previousTab, activeTab){
    previousTab.addClass('done');
    activeTab.removeClass('next');
}
function backTabStatus(previousTab, activeTab){
    previousTab.addClass('next');
    activeTab.removeClass('done next');
}
function navigateAddForms(){
    typeNextButton.click(function() {
        displayAddForm(typeForm, informationForm);
        nextTabStatus(typeTab, informationTab)
    });

    infoNextButton.click(function() {
        displayAddForm(informationForm, programForm);
        nextTabStatus(informationTab, programTab)
    });
    infoBackButton.click(function() {
        displayAddForm(informationForm, typeForm);
        backTabStatus(allTabs, typeTab)
    });

    programNextButton.click(function() {
        displayAddForm(programForm, paymentForm);
        nextTabStatus(programTab, paymentTab)
    });
    programBackButton.click(function() {
        displayAddForm(programForm, informationForm);
        backTabStatus(allTabs, informationTab)
    });

    paymentBackButton.click(function() {
        displayAddForm(paymentForm, programForm);
        backTabStatus(allTabs, programTab)
    });

}
function clearForm(){

    $('#type-clear').click(function() {
        typeForm.find('input').val('');
    });

    $('#info-clear').click(function() {
        informationForm.find('input').val('');
    });
}


// View Pre Registration
function displayViewForm(hideForm, showForm){
    hideForm.addClass('d-none');
    showForm.removeClass('d-none');
}
function headerStatus(inactive, active){
    inactive.removeClass('active')
    active.addClass('active')
}
function navigateViewForms(){
    typeHeader.click(function() {
        displayViewForm(allDetails, typeDetails);
        headerStatus(allHeaders, typeHeader);
    });
    informationHeader.click(function() {
        displayViewForm(allDetails, informationDetails);
        headerStatus(allHeaders, informationHeader);
    });
    programHeader.click(function() {
        displayViewForm(allDetails, programDetails);
        headerStatus(allHeaders, programHeader);
    });
    paymentHeader.click(function() {
        displayViewForm(allDetails, paymentDetails);
        headerStatus(allHeaders, paymentHeader);
    });
}
function displayModal(){
    $('.show-modal').click(function() {
        $('#evaluate-modal').removeClass('d-none')
        $('.content-wrapper').addClass('blur')
    });
    $('.close-btn').click(function() {
        $('#evaluate-modal').addClass('d-none')
        $('.content-wrapper').removeClass('blur')
    });
}

$(document).ready(function () {
    // On change of the program select
    $('#program').change(function () {
        // Get the selected program ID
        var programId = $(this).val();

        // Make an Ajax request to get courses based on the program ID
        $.ajax({
            url: '/register/get_course/' + programId,
            method: 'GET',
            success: function (data) {
                // Clear existing checkboxes
                $('#populate_checkbox').empty();

                // Populate checkboxes based on the fetched courses
                data.forEach(function (course) {
                    var new_checkbox = '<div>';
                    new_checkbox += '<input type="checkbox" id="course_' + course.course.id + '" name="courses[]" value="' + course.course.id + '"/>';
                    new_checkbox += '<label class="checkbox-label">' + course.course.descriptive_title + '</label>';
                    new_checkbox += '</div>';

                    $('#populate_checkbox').append(new_checkbox);
                });
            },
            error: function (error) {
                console.log('Error fetching courses:', error);
            }
        });
    });
});
