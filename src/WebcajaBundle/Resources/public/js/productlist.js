
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
    $("span.nocart").click(function(){
        $(this).toggle();
        $(this).parent().find("span.yescart").toggle();
        var productId = parseInt($(this).parent().find('p.productId').text());
        var path = $(this).find("button").attr("data-path");
        $.ajax({
            type: 'POST',
            url: path,
            data: {num: '1', id: productId},
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error: ' +  errorThrown);
            }
        });
    });
    var ppy = $("ul.cartItems").find("li.cartItemId");
    var ppn = $("div#product").find("p.productId");
    for(var y=0; y<ppy.length; y++){
        for(var n=0; n<ppn.length; n++){
            if(parseInt($(ppy[y]).text()) == parseInt($(ppn[n]).text())){
                $(ppn[n]).parent().find("span.nocart").toggle();
                $(ppn[n]).parent().find("span.yescart").toggle();
            }
        }
    }
});



