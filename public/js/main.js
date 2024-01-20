var mainJs = {

    elements : {

        programRegField: '#program',
        courseCheckbox: '#populate_checkbox',
        fileInput: '#file_record',
        fileLabel: '.file-label',

        formClass: '.multi-form',
        form1: '.form-one',
        form2: '.form-two',
        form3: '.form-three',
        form4: '.form-four',
        form5: '.form-five',
        nonReq: '.non_req',

        allTabs: '.tab-status-container .tab-status',
        tab1: '.tab-one',
        tab2: '.tab-two',
        tab3: '.tab-three',
        tab4: '.tab-four',
        tab5: '.tab-five',

        continue1: '.continue-one',
        continue2: '.continue-two',
        continue3: '.continue-three',
        continue4: '.continue-four',
        continuePreregister : '.continue-preregister',

        back2: '.back-two',
        back3: '.back-three',
        back4: '.back-four',
        back5: '.back-five',

        clear1: '.clear-one',
        clear2: '.clear-two',
        clear3: '.clear-three',
        clear4: '.clear-four',
        clear5: '.clear-five',

        detailContainers: '.details-body .info',
        detailContainer1: '.detail-one',
        detailContainer2: '.detail-two',
        detailContainer3: '.detail-three',
        detailContainer4: '.detail-four',
        detailContainer5: '.detail-five',

        allHeaders: '.tab-headers i',
        headerButton1: '.header-one',
        headerButton2: '.header-two',
        headerButton3: '.header-three',
        headerButton4: '.header-four',
        headerButton5: '.header-five',

        contentWrapper: '.content-wrapper',
        deleteModal: '.delete-modal',
        deleteButton: '.delete-button',
        closeButton: '.button-container .cancel',
    },

    displayForm : function (hideForm, showForm){
        $(hideForm).addClass('d-none');
        $(showForm).removeClass('d-none');
    },
    updateTabStatus : function (previousTab, activeTab, actionType){

        if(actionType == 'next'){
            $(previousTab).addClass('done');
            $(activeTab).removeClass('next');
        } else{
            $(previousTab).addClass('next');
            $(activeTab).removeClass('done next');
        }
    },
    clearForm: function(form) {

        var textNumElements = form.find(':text, :input[type="number"]');
        var selectElement =   form.find('select');
        var checkboxElement = form.find('input[type="checkbox"]');

        if(textNumElements.length > 0){
            textNumElements.val('');
        }

        if(selectElement.length > 0){
            selectElement.val('');
        }

        if(checkboxElement.length > 0){
            checkboxElement.prop('checked', false);
        }
    },


    displayView : function (hideView, showView){
        $(hideView).addClass('d-none');
        $(showView).removeClass('d-none');
    },
    updateHeaderStatus : function (inactive, active){
        $(inactive).removeClass('active');
        $(active).addClass('active');
    },

    isFormInputValid : function(form){

        var formInput = true;

        $(form).find('input:not(.non_req), select:not(.non_req)').each(function () {
            if (!$(this).val()) {
                formInput = false;
                return false;
            }
        });

        return formInput;
    },
    isCheckboxValid : function(form){

        var hasCheckbox = $(form).find('input[type="checkbox"]').length > 0;
        var checkedCheckboxes = $(form).find('input[type="checkbox"]:checked');

        if(!hasCheckbox || (hasCheckbox && checkedCheckboxes.length > 1)){
            return true;
        }else{
            return false;
        }
    },

    events : {

        onPopulateCourseByProgram : function (){

            var self = mainJs;

            $(self.elements.programRegField).change(function(){

                var programId = $(this).val();

                $.ajax({
                    url: '/register/get_course/' + programId,
                    method: 'GET',
                    success: function (data) {

                        $(self.elements.courseCheckbox).empty();

                        data.forEach(function (course) {
                            var new_checkbox = '<div>';
                            new_checkbox += '<input type="checkbox" id="course_' + course.course.id + '" name="courses[]" value="' + course.course.id + '"/>';
                            new_checkbox += '<label class="checkbox-label">' + course.course.descriptive_title + '</label>';
                            new_checkbox += '</div>';

                            $(self.elements.courseCheckbox).append(new_checkbox);
                        });
                    },
                    error: function (error) {
                        console.log('Error fetching courses:', error);
                    }
                });
            })
        },

        onFileChange : function (){

            var self = mainJs;

            $(self.elements.fileInput).change(function(){
                const fileName = $(this).val().split('\\').pop();
                $(self.elements.fileLabel).text(fileName);
            })
        },

        onNavigateForm : function (){

            var self = mainJs;

            $(self.elements.continue1).click(function(){

                var isValidForm = self.isFormInputValid(self.elements.form1);

                if(isValidForm){
                    self.displayForm(self.elements.form1, self.elements.form2)
                    self.updateTabStatus(self.elements.tab1, self.elements.tab2, 'next')
                } else{
                    alert('All Field is required, please try again.');
                }
            })
            $(self.elements.continue2).click(function(){

                var isValidForm = self.isFormInputValid(self.elements.form2);
                var hasCheckbox = self.isCheckboxValid(self.elements.form2)

                if(isValidForm){
                    if(hasCheckbox){
                        self.displayForm(self.elements.form2, self.elements.form3)
                        self.updateTabStatus(self.elements.tab2, self.elements.tab3, 'next')
                    } else {
                        alert('Please select atleast two course.');
                    }
                } else{
                    alert('All Field is required, please try again.');
                }
            })
            $(self.elements.continue3).click(function(){
                var isValidForm = self.isFormInputValid(self.elements.form3);
                var hasCheckbox = self.isCheckboxValid(self.elements.form3)

                if(isValidForm){
                    if(hasCheckbox){
                        self.displayForm(self.elements.form3, self.elements.form4)
                        self.updateTabStatus(self.elements.tab3, self.elements.tab4, 'next')
                    } else {
                        alert('Please select atleast two course.');
                    }
                } else{
                    alert('All Field is required, please try again.');
                }
            })
            $(self.elements.continue4).click(function(){

                var isValidForm = self.isFormInputValid(self.elements.form4);
                var hasCheckbox = self.isCheckboxValid(self.elements.form4)

                if(isValidForm){
                    if(hasCheckbox){
                        self.displayForm(self.elements.form4, self.elements.form5)
                        self.updateTabStatus(self.elements.tab4, self.elements.tab5, 'next')
                    } else {
                        alert('Please select atleast two course.');
                    }
                } else{
                    alert('All Field is required, please try again.');
                }
            })
            $(self.elements.continuePreregister).click(function(){

                var isValidForm = self.isFormInputValid(self.elements.form3);

                if(isValidForm){
                    if($(self.elements.form3).find('input[type="checkbox"]:checked').length > 3){
                        self.displayForm(self.elements.form3, self.elements.form4)
                        self.updateTabStatus(self.elements.tab3, self.elements.tab4, 'next')
                    } else {
                        alert('Please select atleast four course.');
                    }
                } else{
                    alert('All Field is required, please try again.');
                }
            })
            $(self.elements.formClass).submit(function(e){

                var isValidForm = self.isFormInputValid(self.elements.form5);
                var hasCheckbox = self.isCheckboxValid(self.elements.form5)

                if(isValidForm){
                    if(!hasCheckbox){
                        e.preventDefault();
                        alert('Please select atleast two course.');
                    }
                } else{
                    e.preventDefault();
                    alert('All Field is required, please try again.');
                }
            })


            $(self.elements.back2).click(function(){
                self.displayForm(self.elements.form2, self.elements.form1)
                self.updateTabStatus(self.elements.allTabs, self.elements.tab1, 'back')
            })
            $(self.elements.back3).click(function(){
                self.displayForm(self.elements.form3, self.elements.form2)
                self.updateTabStatus(self.elements.allTabs, self.elements.tab2, 'back')
            })
            $(self.elements.back4).click(function(){
                self.displayForm(self.elements.form4, self.elements.form3)
                self.updateTabStatus(self.elements.allTabs, self.elements.tab3, 'back')
            })
            $(self.elements.back5).click(function(){
                self.displayForm(self.elements.form5, self.elements.form4)
                self.updateTabStatus(self.elements.allTabs, self.elements.tab4, 'back')
            })

        },

        onNavigateDetails : function (){

            var self = mainJs;

            $(self.elements.headerButton1).click(function(){
                self.displayView(self.elements.detailContainers, self.elements.detailContainer1)
                self.updateHeaderStatus(self.elements.allHeaders, self.elements.headerButton1)
            })
            $(self.elements.headerButton2).click(function(){
                self.displayView(self.elements.detailContainers, self.elements.detailContainer2)
                self.updateHeaderStatus(self.elements.allHeaders, self.elements.headerButton2)
            })
            $(self.elements.headerButton3).click(function(){
                self.displayView(self.elements.detailContainers, self.elements.detailContainer3)
                self.updateHeaderStatus(self.elements.allHeaders, self.elements.headerButton3)
            })
            $(self.elements.headerButton4).click(function(){
                self.displayView(self.elements.detailContainers, self.elements.detailContainer4)
                self.updateHeaderStatus(self.elements.allHeaders, self.elements.headerButton4)
            })
            $(self.elements.headerButton5).click(function(){
                self.displayView(self.elements.detailContainers, self.elements.detailContainer5)
                self.updateHeaderStatus(self.elements.allHeaders, self.elements.headerButton5)
            })
        },

        onClearForm : function (){

            var self = mainJs;

            $(self.elements.clear1).click(function(){
                self.clearForm($(self.elements.form1))
            })
            $(self.elements.clear2).click(function(){
                self.clearForm($(self.elements.form2))
            })
            $(self.elements.clear3).click(function(){
                self.clearForm($(self.elements.form3))
            })
            $(self.elements.clear4).click(function(){
                self.clearForm($(self.elements.form4))
            })
            $(self.elements.clear5).click(function(){
                self.clearForm($(self.elements.form5))
            })
        },

        onDeleteModal : function (){

            var self = mainJs;

            $(self.elements.deleteButton).click(function(){
                $(self.elements.contentWrapper).addClass('blur');
                $(self.elements.deleteModal).removeClass('d-none');
            })
            $(self.elements.closeButton).click(function(){
                $(self.elements.contentWrapper).removeClass('blur');
                $(self.elements.deleteModal).addClass('d-none');
            })
        },

        init : function () {
            var _self = this;

            _self.onPopulateCourseByProgram();
            _self.onFileChange();
            _self.onNavigateForm();
            _self.onNavigateDetails();
            _self.onClearForm();
        }
    },

    init : function () {
        var self = mainJs;
        self.events.init();
    }
}

$(document).ready(function () {
    mainJs.init();
});


document.addEventListener('DOMContentLoaded', function () {
    // Get the elements
    var studentTypeSelect = document.getElementById('student_type');
    var yearsStopInput = document.getElementById('years_stop_grp');

    // Initially hide the years stop input
    yearsStopInput.style.display = 'none';

    studentTypeSelect.addEventListener('change', function () {
        if (studentTypeSelect.value === 'Returning Student') {
            yearsStopInput.style.display = 'block';
        } else if (studentTypeSelect.value === 'New Student') {
            yearsStopInput.style.display = 'block';
        } else  {
            yearsStopInput.style.display = 'none';
        }
    });
});
