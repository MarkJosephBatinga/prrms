$(document).ready(function() {
    $(".search-box").on("input", function() {
        
        var filter = $(this).val().toLowerCase();
        var found = false; 

        $(".table-results tbody tr").each(function(){

            var row = $(this);
            var cells = row.find("td");
            var display = false;

            cells.each(function() {

                var cell = $(this);

                if (cell.text().toLowerCase().indexOf(filter) > -1) {
                    display = true;
                    found = true;
                    return false; 
                }
            });

            row.toggle(display);
        });

        $("#no-result-row").toggle(!found);
    });

    $('#exportBtn').click(function () {
        var table = $('#myTable')[0];
        var csvData = "";
        var headers = [];
        
        // Get table headers
        $(table).find('thead th:not(.exclude)').each(function () {
            headers.push($(this).text());
        });
        csvData += headers.join(',') + '\n';
        
        // Get filtered table rows
        var filteredRows = $(table).find('tbody tr:not(.exclude)').filter(function () {
            return $(this).is(":visible");
        });

        // Loop through filtered table rows
        filteredRows.each(function () {
            var rowData = "";
            $(this).find('td:not(.exclude)').each(function () {
                rowData += '"' + $(this).text() + '",';
            });
            rowData = rowData.slice(0, -1);
            csvData += rowData + '\n';
        });
        
        // Get file name from the button's data value
        var fileName = $(this).data('value') + '_list.csv';

        // Create a download link
        var link = document.createElement('a');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvData));
        link.setAttribute('download', fileName);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
});