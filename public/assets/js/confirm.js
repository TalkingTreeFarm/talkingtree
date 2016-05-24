(function() {
    // Set Delivery Method Disclaimer &
    // Disable Reserve button on Home Delivery option
    if($('#delivery-method').text() == "Home Delivery") {
        $('#delivery-disclaimer').removeClass('text-hide');
        $('#reserve-button').addClass('disabled');
    }

    // If required, require user to input address before paying
    if($('#address-disclaimer').data('required')) {
        $('#stripeButton').addClass('hidden');
        $('#address-button').removeClass('hidden');
    }

    // Add Address Button
    $('#address-button').on('click', function(e) {
        $('#address-modal').modal({
            backdrop: true
        });
    });
}());
