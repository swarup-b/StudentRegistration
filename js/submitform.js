$(document).ready(function() {
    var loginFormSubmit= $("#loginf");
    var updateFormSubmit= $("#update-employee");
    var createEmp=$("#create-employee");
    var registerDiv=$("#registerDiv");
    var loginDiv=$("#loginDiv");
    var empTbl=$('#empTbl');
    var allEmp=$('#allEmp');
    var dataTables_length=$('.dataTables_length');
    var loginSpan= $("#loginSpan");
    var spinner=$('#spinner');

    loginFormSubmit.submit(function(event) {
        reveledData.submitForm();
        return false;
    });

     updateFormSubmit.submit(function() {
        reveledData.submitUpdatedEmployee();
        return false;
    });


    createEmp.submit(function(event) {
        reveledData.createEmployee();
        return false;
    });


    $("#lDiv").on("click", function() {
        registerDiv.hide();
        loginDiv.show();
    });

     $(document).on('click','.edit_data' ,function(){
        var emp_id=$(this).attr('id');
        $.ajax({
            url:'update.php?id='+emp_id,
            method:'GET',
            data:"",
            success:function(response){
                var json=JSON.parse(response);
                $('#emp').val(json[0].id);
                $('#uname').val(json[0].name);
                $('#usalary').val(json[0].salary);
                $('#uaddress').val(json[0].address);
                $('#update-employee').modal('show');
                console.log(response);
            }
        })
    })

     $(document).on('click','.delete_data' ,function(){
        var emp_id=$(this).attr('id');
      if(confirm('Are you sure to delete this record..')){
        $.ajax({
            url:'delete.php?id='+emp_id,
            method:'GET',
            data:"",
            success:function(response){
                if(response.trim()==='success') $('#lblSpan').html('Deleted  successfully');
                else $('#lblSpan').html('some error occured');
                console.log(response);
            }
        })
      }
    })
   
   

});

function myFunction(){
    reveledData.getAllEmployee();
}


