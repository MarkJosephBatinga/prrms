// FORM Navigate Buttons
studentTypeButton = $('#studtype-button');
personalInfoButton = $('#personinfo-button');
programButton = $('#program-button');

backStudentType = $('#back-studtype');
backPersonalInfo = $('#back-personinfo');
backProgramOfferings = $('#back-program');
backFileUpload = $('#back-payment');


// FORM Containers
formContainers = $('#signup-form').find('.form-container');
studentType = $('#student-type');
personalInformation = $('#personal-information');
programOfferings = $('#program-offerings');
filesUpload = $('#files-upload');



$(document).ready(function() {

    navigateActions();
    fileChange();
});


function navigateForm(currentSection, nextSection) {
    currentSection.addClass('d-none');
    nextSection.removeClass('d-none');
}
function navigateActions(){
    studentTypeButton.click(function() {
        navigateForm(studentType, personalInformation);
    });
    personalInfoButton.click(function() {
        navigateForm(personalInformation, programOfferings);
    });
    programButton.click(function() {
        navigateForm(programOfferings, filesUpload);
    });

    backStudentType.click(function() {
        navigateForm(formContainers, studentType);
    });
    backPersonalInfo.click(function() {
        navigateForm(formContainers, personalInformation);
    });
    backProgramOfferings.click(function() {
        navigateForm(formContainers, programOfferings);
    });
    backFileUpload.click(function() {
        navigateForm(formContainers, filesUpload);
    });
}
function fileChange(){
    $('#file_record').on('change', function() {
        const fileName = $(this).val().split('\\').pop();
        $('.file-label').text(fileName);
    });
}