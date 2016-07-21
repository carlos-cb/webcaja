
$(function(){
    $(".add").click(function(){
        var t=$(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val())+1)
        setHeji();
        setTotal();
    })
    $(".min").click(function(){
        var t=$(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val())-1)
        if(parseInt(t.val())<0){
            t.val(0);
        }
        setHeji();
        setTotal();
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