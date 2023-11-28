// FORM Navigate Buttons
infoNextButton= $('#prog-info-next');
coreCoursesBack= $('#core-courses-back');
coreCoursesNext= $('#core-courses-next');
majorCoursesBack= $('#major-courses-back');
majorCoursesNext= $('#major-courses-next');
electiveCoursesBack= $('#elective-courses-back');
electiveCoursesNext= $('#elective-courses-next');
institutionalCoursesBack= $('#institutional-courses-back');
institutionalCoursesNext= $('#institutional-courses-next');
otherCoursesBack= $('#other-courses-back');

infoHeader = $('#prog-info-header');
coursesHeader = $('#prog-courses-header');
summaryHeader = $('#prog-summary-header');
allHeaders = $('.tab-headers').find('i');

// FORM Containers
informationForm = $('#prog-info-form');
coreCoursesForm = $('#core-courses-form');
majorCoursesForm = $('#major-courses-form');
electiveCoursesForm = $('#elective-courses-form');
institutionalCoursesForm = $('#institutional-courses-form');
otherCoursesForm = $('#other-courses-form');

informationDetails = $('#prog-info-details');
coursesDetails = $('#prog-courses-details');
summaryDetails = $('#prog-summary-details');
allDetails = $('.details-body').find('.info');

// FORM Tab Status
allTabs = $('.tab-status-container').find('.tab-status');
informationTab = $('#prog-info-tab');
coreCoursesTab = $('#core-courses-tab');
majorCoursesTab = $('#major-courses-tab');
electiveCoursesTab = $('#elective-courses-tab');
institutionalCoursesTab = $('#institutional-courses-tab');
otherCoursesTab = $('#other-courses-tab');


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
        displayAddForm(informationForm, coreCoursesForm);
        nextTabStatus(informationTab, coreCoursesTab)
    });

    coreCoursesNext.click(function() {
        displayAddForm(coreCoursesForm, majorCoursesForm);
        nextTabStatus(coreCoursesTab, majorCoursesTab)
    });

    coreCoursesBack.click(function() {
        displayAddForm(coreCoursesForm, informationForm);
        backTabStatus(coreCoursesTab, informationTab)
    });

    majorCoursesNext.click(function() {
        displayAddForm(majorCoursesForm, electiveCoursesForm);
        nextTabStatus(majorCoursesTab, electiveCoursesTab)
    });

    majorCoursesBack.click(function() {
        displayAddForm(majorCoursesForm, coreCoursesForm);
        backTabStatus(majorCoursesTab, coreCoursesTab)
    });

    electiveCoursesNext.click(function() {
        displayAddForm(electiveCoursesForm, institutionalCoursesForm);
        nextTabStatus(electiveCoursesTab, institutionalCoursesTab)
    });

    electiveCoursesBack.click(function() {
        displayAddForm(electiveCoursesForm, majorCoursesForm);
        backTabStatus(electiveCoursesTab, majorCoursesTab)
    });

    institutionalCoursesNext.click(function() {
        displayAddForm(institutionalCoursesForm, otherCoursesForm);
        nextTabStatus(institutionalCoursesTab, otherCoursesTab)
    });

    institutionalCoursesBack.click(function() {
        displayAddForm(institutionalCoursesForm, electiveCoursesForm);
        backTabStatus(institutionalCoursesTab, electiveCoursesTab)
    });

    otherCoursesBack.click(function() {
        displayAddForm(otherCoursesForm, institutionalCoursesForm);
        backTabStatus(otherCoursesTab, institutionalCoursesTab)
    });

}
function clearForm(){
    $('#prog-info-clear').click(function() {
        informationForm.find('input').val('');
    });
    $('#core-courses-clear').click(function() {
        coreCoursesForm.find(':checkbox').prop('checked', false);
    });
    $('#major-courses-clear').click(function() {
        majorCoursesForm.find(':checkbox').prop('checked', false);
    });
    $('#elective-courses-clear').click(function() {
        electiveCoursesForm.find(':checkbox').prop('checked', false);
    });
    $('#institutional-courses-clear').click(function() {
        institutionalCoursesForm.find(':checkbox').prop('checked', false);
    });
    $('#other-courses-clear').click(function() {
        otherCoursesForm.find(':checkbox').prop('checked', false);
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


