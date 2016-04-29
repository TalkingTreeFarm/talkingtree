(function() {
    // Variables
    var $baskets = Number($('#quantity-baskets').val());
    var $eggs    = Number($('#quantity-eggs').val());

    // Reset Quantities on Change
    $('#size').change(function() {
        $('#quantity-baskets').val(0);
    });

    // Button Controls (Baskets)
    $('#basket-sub').on('click', function() {
        if($baskets > 0) {
            $baskets -= 1;
        }

        $('#quantity-baskets').val($baskets);
        $('#basket-sum').text($baskets);
    });

    $('#basket-add').on('click', function() {
        var $selected = $('#size').find(':selected');

        if($baskets < $selected.data('amount')) {
            $baskets += 1;
        }

        $('#quantity-baskets').val($baskets);
        $('#basket-sum').text($baskets);
    });

    // Button Controls (Eggs)
    $('#egg-sub').on('click', function() {
        if($eggs > 0) {
            $eggs -= 1;
        }

        $('#quantity-eggs').val($eggs);
        $('#egg-sum').text($eggs);
    });

    $('#egg-add').on('click', function() {
        var $selected = $('#Eggs').data('amount');

        if($eggs < $selected) {
            $eggs += 1;
        }

        $('#quantity-eggs').val($eggs);
        $('#egg-sum').text($eggs);
    });
}());
