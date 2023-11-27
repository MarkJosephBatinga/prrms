
$('document').ready(function(){

    $('#toggleBar').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#sidebar').removeClass('d-none d-md-block');
    });


    $('#sideTap').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});