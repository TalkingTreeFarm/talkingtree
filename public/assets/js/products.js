(function() {
    // Variables
    var $baskets = $('#quantity-baskets').value();
    var $eggs    = $('#quantity-eggs').value();

    // Button Controls (Baskets)
    $('#basket-sub').on('click', function() {
        if($baskets >= 0) {
            $baskets -= 1;
        }
    });

    $('#basket-add').on('click', function() {
        if($baskets < $('#')) {
            $baskets += 1;
        }
    });
}());
