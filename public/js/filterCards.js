$(document).ready(function(){

    $(".search-box").on("input", function() {

        var filter = $(this).val().toLowerCase();

        $(".small-cards .card-container").each(function(){

            var card = $(this);
            var cardText = card.find(".card-text");
            var display = false;

            if (cardText.text().toLowerCase().indexOf(filter) > -1) {
                display = true;
            }

            card.toggle(display);
        });
    });
});