(function() {
    // Button Controls (Small Baskets)
    $('#small-basket-remove').on('click', function() {
        var $amount = Number($('#small-basket-amount').val());

        if($amount > 0) {
            $amount -= 1;
        }

        $('#small-basket-amount').val($amount);
    });

    $('#small-basket-add').on('click', function() {
        var $amount = Number($('#small-basket-amount').val());

        $amount += 1;

        $('#small-basket-amount').val($amount);
    });

    // Button Controls (Large Baskets)
    $('#large-basket-remove').on('click', function() {
        var $amount = Number($('#large-basket-amount').val());

        if($amount > 0) {
            $amount -= 1;
        }

        $('#large-basket-amount').val($amount);
    });

    $('#large-basket-add').on('click', function() {
        var $amount = Number($('#large-basket-amount').val());

        $amount += 1;

        $('#large-basket-amount').val($amount);
    });

    // Button Controls (Eggs By Dozen)
    $('#eggs-remove').on('click', function() {
        var $amount = Number($('#eggs-amount').val());

        if($amount > 0) {
            $amount -= 1;
        }

        $('#eggs-amount').val($amount);
    });

    $('#eggs-add').on('click', function() {
        var $amount = Number($('#eggs-amount').val());

        $amount += 1;

        $('#eggs-amount').val($amount);
    });
})();
