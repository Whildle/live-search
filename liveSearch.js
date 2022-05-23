// We get the value of the string when we input any character
$(".searchI").on('keyup', function(e) {
    var data = $(this).val();
    if (data !== '') {
        // Making an AJAX request to our handler
        $.ajax({
            url: '/getResultByWld',
            type: "POST",
            data: {'data': data},
            dataType: 'json',
            success: function(result) {
                // Check if the result is returned, and if it is, display the data
                if (result != '') {
                    $('.search_items').html('');
                    result.forEach(function(item) {
                        $('.search_items').append('<div class="row search_items__item" onclick="window.location=\'YOUR_DOMEN/'+ item.link +'\';"><div class="col-3 search_item__image"><img src="photos_compressed/'+ item.photo_path +
                        '" alt="product"></div><div class="col-6 search_item__article"><p>'+ item.name +
                        '</p></div><div class="col-3 search_item_price"><p>'+ item.price +' р.</p></div></div>');
                    });
                } else {
                    // ...
                }
            }
        });
    } else {
        // ...
    }
});
