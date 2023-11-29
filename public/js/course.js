// FORM Navigate Buttons
infoNextButton= $('#course-info-next');
scheduleBackButton= $('#course-schedule-back');

infoHeader = $('#course-info-header');
scheduleHeader = $('#course-schedule-header');
allHeaders = $('.tab-headers').find('i');

// FORM Containers
informationForm = $('#course-info-form');
scheduleForm = $('#course-schedule-form');

informationDetails = $('#course-info-details');
scheduleDetails = $('#course-schedule-details');
allDetails = $('.details-body').find('.info');

// FORM Tab Status
allTabs = $('.tab-status-container').find('.tab-status');
informationTab = $('#course-info-tab');
scheduleTab = $('#course-schedule-tab');


$(document).ready(function() {
    navigateAddForms()
    navigateViewForms()
    clearForm()
});


// Add Program
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
    infoNextButton.click(function() {
        if (isCourseInfoValid()) {
            displayAddForm(informationForm, scheduleForm);
            nextTabStatus(informationTab, scheduleTab);
        } else {
            alert('All Course Information is required, please try again.');
        }

    });

    scheduleBackButton.click(function() {
        displayAddForm(scheduleForm, informationForm);
        backTabStatus(scheduleTab, informationTab)
    });
}
function clearForm(){
    $('#course-info-clear').click(function() {
        informationForm.find('input').val('');
    });
    $('#course-schedule-clear').click(function() {
        scheduleForm.find('input').val('');
    });
}

function isCourseInfoValid() {
    var isValid = true;

    $('.course_info').each(function() {
        if (!$(this).val()) {
            isValid = false;
            return false;
        }
    });

    return isValid;
}

// View Program
function displayViewForm(hideForm, showForm){
    hideForm.addClass('d-none');
    showForm.removeClass('d-none');
}
function headerStatus(inactive, active){
    inactive.removeClass('active')
    active.addClass('active')
}
function navigateViewForms(){
    infoHeader.click(function() {
        displayViewForm(allDetails, informationDetails);
        headerStatus(allHeaders, infoHeader);
    });
    scheduleHeader.click(function() {
        displayViewForm(allDetails, scheduleDetails);
        headerStatus(allHeaders, scheduleHeader);
    });
}


