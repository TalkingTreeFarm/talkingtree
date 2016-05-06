(function() {
    $.ajax('/ajax/product-list').done(function(products) {
        products.forEach(function(product) {
            var $amount = Number($('#' + product.name.toLowerCase().replace(/\s/g, '-') + '-amount').attr('placeholder'));

            $('#' + product.name.toLowerCase().replace(/\s/g, '-') + '-amount').on('change', function() {
                $amount = Number($(this).val());
            });

            $('#' + product.name.toLowerCase().replace(/\s/g, '-') + '-remove').on('click', function() {
                if($amount > 0) {
                    $amount -= 1;
                }

                $('#' + product.name.toLowerCase().replace(/\s/g, '-') + '-amount').val($amount);
            });

            $('#' + product.name.toLowerCase().replace(/\s/g, '-') + '-add').on('click', function() {
                $amount += 1;

                $('#' + product.name.toLowerCase().replace(/\s/g, '-') + '-amount').val($amount);
            });
        });
    });
})();
