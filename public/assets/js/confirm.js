(function() {
    // Set Delivery Method Disclaimer
    if($('#delivery-method').text() == 3 || $('#delivery-method').text() == "Home Delivery") {
        $('#delivery-disclaimer').removeClass('text-hide');
    }
}());
