// FORM Navigate Buttons
studentTypeButton = $('#studtype-button');
personalInfoButton = $('#personinfo-button');
programButton = $('#program-button');

// FORM PROGRESS BAR STATUS
studentBarStatus = $('#student-status');
infoBarStatus = $('#info-status');
programBarStatus = $('#program-status');
fileBarStatus = $('#file-status');

// FORM Containers
formContainers = $('#signup-form').find('.form-container');
studentType = $('#student-type');
personalInformation = $('#personal-information');
programOfferings = $('#program-offerings');
filesUpload = $('#files-upload');

student_type = $('.student_type');
personal_info = $('.personal_info');
program_offer = $('.program_offer');
otr_payment = $('.otr_payment');

$(document).ready(function() {
    navigateActions();
    fileChange();
});


function buttonNavigate(currentSection, nextSection) {
    currentSection.addClass('d-none');
    nextSection.removeClass('d-none');
}

function progressBarStatus(doneBar, activeBar) {
    activeBar.addClass('active');
    doneBar.addClass('done');
}

function checkAllValuesFilled(fields) {
    var allValuesFilled = true;

    fields.each(function() {
        if (!$(this).val()) {
            allValuesFilled = false;
            // If any element doesn't have a value, break out of the loop
            return false;
        }
    });

    return allValuesFilled;
}

function checkCourses() {
    var checkboxes = $('input[name="courses"]');
    return checkboxes.filter(':checked').length >= 2;
}


function navigateActions(){
    studentTypeButton.click(function() {
        var allValuesFilled = checkAllValuesFilled(student_type);

        if (allValuesFilled) {
            buttonNavigate(studentType, personalInformation);
            progressBarStatus(studentBarStatus, infoBarStatus);
        } else {
            alert('Please fill in all student type before proceeding.');
        }

    });
    personalInfoButton.click(function() {
        var allValuesFilled = checkAllValuesFilled(personal_info);

        if (allValuesFilled) {
            buttonNavigate(personalInformation, programOfferings);
            progressBarStatus(infoBarStatus, programBarStatus);
        } else {
            alert('Please fill in all personal information before proceeding.');
        }
    });
    programButton.click(function() {
        var allValuesFilled = checkAllValuesFilled(program_offer);

        if (allValuesFilled) {
            if(checkCourses()) {
                buttonNavigate(programOfferings, filesUpload);
                progressBarStatus(programBarStatus, fileBarStatus);
            } else {
                alert('At least 2 courses are required to continue');
            }
        } else {
            alert('Please select a program before proceeding.');
        }

    });

    studentBarStatus.click(function() {
        buttonNavigate(formContainers, studentType);
    });
    infoBarStatus.click(function() {
        buttonNavigate(formContainers, personalInformation);
    });
    programBarStatus.click(function() {
        buttonNavigate(formContainers, programOfferings);
    });
    fileBarStatus.click(function() {
        buttonNavigate(formContainers, filesUpload);
    });
}

function fileChange(){
    $('#file_record').on('change', function() {
        const fileName = $(this).val().split('\\').pop();
        $('.file-label').text(fileName);
    });
}
