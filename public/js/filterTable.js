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
});