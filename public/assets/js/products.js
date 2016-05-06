(function() {
    // Variables
    var $noBasket = true;

    var $basketsAmount = Number($('#quantity-baskets').val());
    var $eggsAmount    = Number($('#quantity-eggs').val());

    var $eggsInInventory = Number($('#eggs').data('amount'));
    var $eggsPrice       = $('#eggs').data('price');

    // Set Quantities for Labels
    $('#eggs-label').text("Eggs (By Dozen) - $" + $eggsPrice + " - " + $eggsInInventory + " dozen left");

    // Default Basket Quantity to Disabled
    $('#basket-sub, #basket-add, #quantity-baskets').addClass('disabled');

    // Reset Quantities on Size Change
    // Set Basket Size in Order Summary
    $('#size').change(function() {
        $('#quantity-baskets').val(0);
        $('#basket-sum').text(0);

        $basketsAmount = 0;

        if($(this).val() == 1) {
            $noBasket = true;

            $('#basket-sub, #basket-add, #quantity-baskets').addClass('disabled');
            $('#basket-type').text("No Basket");
        } else if($(this).val() == 2) {
            $noBasket = false;

            $('#basket-sub, #basket-add, #quantity-baskets').removeClass('disabled');
            $('#basket-type').text("Small Basket");
        } else if($(this).val() == 3) {
            $noBasket = false;

            $('#basket-sub, #basket-add, #quantity-baskets').removeClass('disabled');
            $('#basket-type').text("Large Basket");
        }

        $('#order-sum').text("$" + calculatePrice());
        $('#total').val(calculatePrice());
    });

    // Set Delivery Method
    $('#delivery').change(function() {
        if($(this).val() == 1) {
            $('#delivery-method').text("Home Delivery");

            if($('#delivery-disclaimer').hasClass('text-hide')) {
                $('#delivery-disclaimer').removeClass('text-hide');
            }
        } else if($(this).val() == 2) {
            $('#delivery-method').text("Pickup - St. Pius");

            if(!$('#delivery-disclaimer').hasClass('text-hide')) {
                $('#delivery-disclaimer').addClass('text-hide');
            }
        } else if($(this).val() == 3) {
            $('#delivery-method').text("Pickup - Nite Market at La Villita");

            if(!$('#delivery-disclaimer').hasClass('text-hide')) {
                $('#delivery-disclaimer').addClass('text-hide');
            }
        } else {
            $('#delivery-method').text("Not Selected");

            if(!$('#delivery-disclaimer').hasClass('text-hide')) {
                $('#delivery-disclaimer').addClass('text-hide');
            }
        }
    });

    // Calculate Total Price
    function calculatePrice() {
        var $basketsPrice  = Number($('#size').find(':selected').data('price'));
        var $eggsPrice     = Number($('#eggs').data('price'));

        var $basketTotal = 0;
        var $eggTotal    = 0;
        var $totalPrice  = 0;

        if($('#size').val() > 1) {
            $basketTotal = $basketsPrice * $basketsAmount;
        } else {
            $basketTotal = 0;
        }

        $eggTotal = $eggsPrice * $eggsAmount;
        $totalPrice = $basketTotal + $eggTotal;

        return $totalPrice;
    }

    // Button Controls (Baskets)
    $('#basket-sub').on('click', function() {
        var $selected = $('#size').find(':selected');

        if($basketsAmount > 0) {
            $basketsAmount -= 1;
        }

        $('#quantity-baskets').val($basketsAmount);
        $('#basket-sum').text($basketsAmount);
        $('#order-sum').text("$" + calculatePrice());
        $('#total').val(calculatePrice());
    });

    $('#basket-add').on('click', function() {
        var $selected = $('#size').find(':selected');

        if($basketsAmount < $selected.data('amount')) {
            $basketsAmount += 1;
        }

        $('#quantity-baskets').val($basketsAmount);
        $('#basket-sum').text($basketsAmount);
        $('#order-sum').text("$" + calculatePrice());
        $('#total').val(calculatePrice());
    });

    // Button Controls (Eggs)
    $('#egg-sub').on('click', function() {
        if($eggsAmount > 0) {
            $eggsAmount -= 1;
        }

        $('#quantity-eggs').val($eggsAmount);
        $('#egg-sum').text($eggsAmount);
        $('#order-sum').text("$" + calculatePrice());
        $('#total').val(calculatePrice());
    });

    $('#egg-add').on('click', function() {
        var $selected = $('#eggs').data('amount');

        if($eggsAmount < $eggsInInventory) {
            $eggsAmount += 1;
        }

        $('#quantity-eggs').val($eggsAmount);
        $('#egg-sum').text($eggsAmount);
        $('#order-sum').text("$" + calculatePrice());
        $('#total').val(calculatePrice());
    });
}());
