$(document).ready(function () {
    $("#term_filter").on("change", function () {
        var selectedTerm = $(this).val();
        var studentId = $("[name='student_id']").val();
        $("#term_text").text(selectedTerm);

        $.ajax({
            url: '/grades/filter_term/' + selectedTerm + '/' + studentId,
            type: 'GET',
            success: function (data) {

                var tbody = $('#gradeTableBody');
                    tbody.empty(); // Clear existing content

                // Loop through the data and append rows to the tbody
                $.each(data, function (index, grade) {
                    var row = $('<tr>');
                    row.append($('<td>').text(grade.code_no));
                    row.append($('<td>').text(grade.course_no));
                    row.append($('<td>').text(grade.descriptive_title));
                    row.append($('<td>').text(grade.units));
                    row.append($('<td>').text(grade.final_grades));
                    row.append($('<td>').text(grade.removal_rating));
                    row.append($('<td>').text(grade.remarks));
                    tbody.append(row);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
});
