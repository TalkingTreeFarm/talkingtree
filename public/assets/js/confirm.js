(function() {
    // Set Delivery Method Disclaimer &
    // Disable Reserve button on Home Delivery option
    if($('#delivery-method').text() == "Home Delivery") {
        $('#delivery-disclaimer').removeClass('text-hide');
        $('#reserve-button').addClass('disabled');
    }
}());
