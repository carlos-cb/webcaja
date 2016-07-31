
$(function(){
    $(".addnum").click(function(){
        var t = $(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val())+1)
        setHeji();
        setTotal();
        var isAdd = 1;
        var cartItemId = parseInt($(this).parent().find('#id').text());
        $.ajax({
            type: 'POST',
            url: "/carrito/ajaxUpdate",
            data: {val1: isAdd, val2: cartItemId},
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error: ' +  errorThrown);
            }
        });
    })
    $(".minnum").click(function(){
        var t=$(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val())-1)
        if(parseInt(t.val())<0){
            t.val(0);
        }
        setHeji();
        setTotal();
        var isAdd = -1;
        var productid = parseInt($(this).parent().find('#id').text());
        $.ajax({
            type: 'POST',
            url: "/carrito/ajaxUpdate",
            data: {val1: isAdd, val2: productid},
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error: ' +  errorThrown);
            }
        });
    })
    function setHeji(){
        var ff = $('#shangpin').find('ul');
        for(var j=0; j<ff.length; j++){
            var s = parseInt($(ff[j]).find(".text_box").val())*parseFloat($(ff[j]).find("#price").text())*parseFloat($(ff[j]).find("#unit").text());
            $(ff[j]).find("#heji").html(s.toFixed(2));
        }
    }
    function setTotal(){
        var total = 0;
        var tt = $('#shangpin').find('ul');
        for(var i=0; i<tt.length; i++){
            total += parseFloat($(tt[i]).find('#heji').text());
        }
        $("#total").html(total.toFixed(2));
    }
    setHeji();
    setTotal();
})


 $(document).ready(function(){
    $(".jiezhang").click(function(){
        var ssd = 12;
        var ggggg = $('#shangpin').find('ul');
        var orderItems = new Array();
        var total = parseFloat($("#total").text());
        for(var k=0; k<ggggg.length; k++){
            orderItems[k] = new Array();
            orderItems[k]['name'] = $(ggggg[k]).find('#name').text();
            orderItems[k]['codigo'] = $(ggggg[k]).find('#codigo').text();
            orderItems[k]['unitprice'] = parseFloat($(ggggg[k]).find('#price').text());
            orderItems[k]['unit'] = parseInt($(ggggg[k]).find('#unit').text());
            orderItems[k]['quantity'] = parseInt($(ggggg[k]).find('.text_box').val());
            orderItems[k]['heji'] = parseFloat($(ggggg[k]).find('#heji').text());
        }
    });
});

$(document).ready(function() {
    $(".jiezhang").fancybox({
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(40, 33, 27, 0.3)'
                }
            }
        }
    });
});



