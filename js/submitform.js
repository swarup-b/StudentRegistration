/**
 * File : validation.js
 * Path : E:\ProjectWork1\BootStrapDemo\js\val1.js
 * Purpose : It will add formdata and also check email uniqueness.
 * Created : 16-july-2017
 * Author : Swarup.
 * Comments :
 */
$(document).ready(function(){ 
  //submitting the login form
  $("#loginf").submit(function(event){
    submitForm();
    return false;
  });

  //inserting the employee details
  $("#create-employee").submit(function(event){
    createEmployee();
    return false;
  });

  //button show and hide

  $("#registerDiv").on("click","#lDiv",function(){ 
    $("#registerDiv").hide();
    $("#loginDiv").show();
  });

  /*$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });*/
  //Searching table data
  $('#empTbl').DataTable();
  $('.dataTables_length').addClass('bs-select');

});

//calling employee form submit using ajax
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

//calling login form submit using ajax
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
