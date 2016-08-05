
$(document).ready(function() {
    $("a#product_image").fancybox({
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(40, 33, 27, 0.3)'
                }
            }
        },
        'hideOnContentClick' :   false
    });
    $("body").click(function() {
        $.fancybox.close();
    });
});



