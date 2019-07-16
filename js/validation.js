/**
 * File : validation.js
 * Path : E:\ProjectWork1\BootStrapDemo\js\val1.js
 * Purpose : It will add formdata and also check email uniqueness.
 * Created : 16-july-2017
 * Author : Swarup.
 * Comments :
 */

$().ready(function(){
  $('#f1').validate({
    rules:{  
     name:'required',
     email:{
      required:true,
      email:true
      },
      password:{
        required:true,
        minlength:5
      }
    }
  });
});

var checkPassword=()=>{
  if($("#password").val()!=$("#cpassword").val()){
    $("#passSpan").html('Password not matching');
    $("#passSpan").css('color','red');
    return false;
  }else{
     $("#passSpan").html('Password matching');
     $("#passSpan").css('color','green');
  }
}
