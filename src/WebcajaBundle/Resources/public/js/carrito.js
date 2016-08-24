
$(function(){
    $(".addnum").click(function(){
        var t = $(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val())+1)
        setHeji();
        setTotal();
        var isAdd = 1;
        var cartItemId = parseInt($(this).parent().find('#id').text());
        var path = $(this).attr("data-path");
        $.ajax({
            type: 'POST',
            url: path,
            data: {val1: isAdd, val2: cartItemId},
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error: ' +  errorThrown);
            }
        });
    });
    $(".minnum").click(function(){
        var t=$(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val())-1)
        if(parseInt(t.val())<1){
            t.val(1);
        }else{
            var isAdd = -1;
            var cartItemId = parseInt($(this).parent().find('#id').text());
            var path = $(this).attr("data-path");
            $.ajax({
                type: 'POST',
                url: path,
                data: {val1: isAdd, val2: cartItemId},
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    alert('Error: ' +  errorThrown);
                }
            });
        }
        setHeji();
        setTotal();
    });
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
});

$(document).ready(function() {
    $(".jiezhang").click(function(){
        var total = parseFloat($("#total").text());
            $(this).fancybox({
                fitToView: true,
                helpers : {
                    overlay : {
                        css : {
                            'background' : 'rgba(40, 33, 27, 0.3)'
                        },
                        closeClick: false
                    }
                }
            });

    });
});



