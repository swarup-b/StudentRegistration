/**
 * File : validation.js
 * Path : E:\ProjectWork1\BootStrapDemo\js\val1.js
 * Purpose : It will add formdata and also check email uniqueness.
 * Created : 16-july-2017
 * Author : Swarup.
 * Comments :
 */
$(document).ready(function(){ 
  //$("#loginDiv").css('visibility','hidden');
  $("#loginf").submit(function(event){
    submitForm();
    return false;
  });

  $("#create-employee").submit(function(event){
    createEmployee();
    return false;
  });

  $("#registerDiv").on("click","#lDiv",function(){ 
    $("#registerDiv").hide();
    $("#loginDiv").show();
  });

});
function submitForm(){
 $.ajax({
  type: "POST",
  url: "login.php",
  data: $('form#loginf').serialize(),
  success: function(response){
    if(response==="password is incorrect"){
      $("#loginSpan").html(response);
    }else{
      window.location.href = "dashboard.php";
    }

  },
  error: function(){
    alert("Error");
  }
});
}

function createEmployee(){
 $.ajax({
  type: "POST",
  url: "createEmployee.php",
  data: $('form#create').serialize(),
  success: function(response){
    if(response==="success") window.location.reload(); 
    else $('#empSpan').html(response);
    console.log(response); 

  },
  error: function(){
    alert("Error");
  }
});
}
