// FORM Navigate Buttons
infoNextButton= $('#prog-info-next');
coursesBackButton= $('#prog-courses-back');

infoHeader = $('#prog-info-header');
coursesHeader = $('#prog-courses-header');
summaryHeader = $('#prog-summary-header');
allHeaders = $('.tab-headers').find('i');

// FORM Containers
informationForm = $('#prog-info-form');
coursesForm = $('#prog-courses-form');

informationDetails = $('#prog-info-details');
coursesDetails = $('#prog-courses-details');
summaryDetails = $('#prog-summary-details');
allDetails = $('.details-body').find('.info');

// FORM Tab Status
allTabs = $('.tab-status-container').find('.tab-status');
informationTab = $('#prog-info-tab');
coursesTab = $('#prog-courses-tab');


$(document).ready(function() {
    navigateAddForms()
    navigateViewForms()
    displayModal()
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
        displayAddForm(informationForm, coursesForm);
        nextTabStatus(informationTab, coursesTab)
    });

    coursesBackButton.click(function() {
        displayAddForm(coursesForm, informationForm);
        backTabStatus(coursesTab, informationTab)
    });
}
function clearForm(){
    $('#prog-info-clear').click(function() {
        informationForm.find('input').val('');
    });
}
function displayModal(){
    $('#core-course-btn').click(function() {
        $('#core-courses-modal').removeClass('d-none') 
        $('.content-wrapper').addClass('blur')
    });
    $('#major-course-btn').click(function() {
        $('#major-courses-modal').removeClass('d-none') 
        $('.content-wrapper').addClass('blur')
    });
    $('#elective-course-btn').click(function() {
        $('#elective-courses-modal').removeClass('d-none') 
        $('.content-wrapper').addClass('blur')
    });
    $('.cancel-btn').click(function() {
        $('.modal-container').addClass('d-none')
        $('.content-wrapper').removeClass('blur')
    });
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
    coursesHeader.click(function() {
        displayViewForm(allDetails, coursesDetails);
        headerStatus(allHeaders, coursesHeader);
    });
    summaryHeader.click(function() {
        displayViewForm(allDetails, summaryDetails);
        headerStatus(allHeaders, summaryHeader);
    });
}


