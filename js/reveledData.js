var reveledData=function ajaxCall() {
    function submitForm() {
        $.ajax({
            type: "POST",
            url: "login.php",
            data: $('form#loginf').serialize(),
            success: function(response) {
                if (response === "password is incorrect") {
                 loginSpan.html(response);
             } else {
                window.location.href = "dashboard.php";
            }
        },
        error: function() {
            alert("Error");
        }
    });
    }

    function createEmployee() {
        $.ajax({
            type: "POST",
            url: "createEmployee.php",
            data: $('form#create').serialize(),
            success: function(response) {
                if (response === "success") window.location.reload();
                else $('#empSpan').html(response);
                console.log(response);

            },
            error: function() {
                alert("Error");
            }
        });
    }

    function getAllEmployee() {
        $('#spinner').show();
        $.ajax({
            type: "POST",
            url: "getEmpDetails.php",
            data: "",
            success: function(response) {
                var json = JSON.parse(response);
               /* var tbl = "<table class='table table-bordered table-striped' id='empTbl'><thead><th>#</th><th>Name</th><th>Address</th><th>Salary</th><th>Action</th></tr></thead><tbody id='myTable'></tbody></table>";
               $('#etbl').append(tbl);*/
               $.each(json, function(i, el) {
                var tr = "<tr>" +
                "<td>" + el.id + "</td>" +
                "<td>" + el.name + "</td>" +
                "<td>" + el.address + "</td>" +
                "<td>" + el.salary + "</td>" +
                "<td>" + "<button id="+el.id+" name='edit' class='btn-info btn-xs edit_data'>Edit</button>" +
                "<button id="+el.id+" name='delete' class='btn-info btn-xs delete_data'>Delete</button>"+
                "<a href='delete.php?id=" + el.id + "title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>"+
                "</td></tr>";
                $('#empTable').append(tr);
                $('#spinner').hide();
            })
               $('#empTable').DataTable();
           },
           error: function() {
            alert("Error");
        }
    });
    }
    function submitUpdatedEmployee(){
       $.ajax({
        type: "POST",
        url: "update.php",
        data: $('form#update').serialize(),
        success: function(response) {
            if (response.trim() === "success")  {
               window.location.reload();
               $('#lblSpan').html('updated successfully');
            }
            else $('#empSpan').html(response);
            console.log(response);

        },
        error: function() {
            alert("Error");
        }
    });
   }

   var returnData = {
    submitForm: submitForm,
    createEmployee: createEmployee,
    getAllEmployee: getAllEmployee,
    submitUpdatedEmployee:submitUpdatedEmployee
}

return returnData;
}();
