function check(){
    var Vcode=parseInt(document.fos_user_registration_form.Vcode.value);
    if(Vcode!='leon28'){
        alert("验证码错误，请联系管理员");
        return false;
    }else{
        return true;
    }
}