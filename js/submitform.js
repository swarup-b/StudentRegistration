$(document).ready(function() {
    var loginFormSubmit= $("#loginf");
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
                $('#hidId').val(json[0].id);
                $('#name').val(json[0].name);
                $('#salary').val(json[0].salary);
                $('#address').val(json[0].address);
                $('#create').hide();
                $('#update').show();
                $('#update-employee').modal('show');
                console.log(response);
            }
        })
    })
   
   

});

function myFunction(){
    reveledData.getAllEmployee();
}


