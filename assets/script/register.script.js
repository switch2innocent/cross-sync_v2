$(document).ready(function () {

    // Initialize Select2
    $('.select2').select2({
        placeholder: "Click here to search data...",
        allowClear: true,
        minimumInputLength: 2
    });

    // For projects
    $.ajax({
        url: 'controls/get_proj.ctrl.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Check if the data is valid
            if (Array.isArray(data)) {
                var select = $('#project');
                data.forEach(function (project) {
                    var option = new Option(project.proj_name, project.id, false, false);
                    select.append(option);
                });

                // Trigger the Select2 update
                select.trigger('change');
            } else {
                console.error('Invalid data format:', data);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching projects:', error);
            console.log('Response:', xhr.responseText);  // Log the response text to debug
        }
    });


    // For department
    $.ajax({
        url: 'controls/get_dept.ctrl.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Check if the data is valid
            if (Array.isArray(data)) {
                var select = $('#department');
                data.forEach(function (department) {
                    var option = new Option(department.dept_name, department.id, false, false);
                    select.append(option);
                });

                // Trigger the Select2 update
                select.trigger('change');
            } else {
                console.error('Invalid data format:', data);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching projects:', error);
            console.log('Response:', xhr.responseText);  // Log the response text to debug
        }
    });

});

// Save user
function save_user() {

    var fname = $("#firstname").val();
    var lname = $("#lastname").val();
    var pos = $("#position").val();
    var proj = $("#project").val();
    var dateHire = $("#date-hire").val();
    var dept = $("#department").val();
    var unit = $("#unit").val();
    var email = $("#email").val();
    var uname = $("#username").val();
    var pass = $("#password").val();
    var allowedCompanyDomains = ["@innogroup.com.ph", "@induco.com.ph", "@citrineland.com.ph", "@innoland.com.ph", "@innoprime.com.ph"];

    var appendAllData = 'firstname=' + fname +
        '&lastname=' + lname +
        '&position=' + pos +
        '&project=' + proj +
        '&date_hire=' + dateHire +
        '&dept=' + dept +
        '&unit=' + unit +
        '&email=' + email +
        '&username=' + uname +
        '&password=' + pass;

    if (fname == '') {

        alert("Please enter your first name");
        $("#firstname").focus();

    } else if(lname == '') {
            
        alert("Please enter your last name");
        $("#lastname").focus();
  
    } else if(pos == '') {
            
        alert("Please enter your position");
        $("#position").focus();
  
    } else if(proj == '') {
            
        alert("Please select a project");
        $("#project").focus();
  
    } else if(dateHire == '') {
            
        alert("Please select a your date hired");
        $("#date-hire").focus();
  
    } else if(dept == '') {
            
        alert("Please select a your department");
        $("#department").focus();
  
    } else if(unit == '') {
            
        alert("Please enter your unit");
        $("#unit").focus();
  
    } else if(email == '') {
            
        alert("Please enter an email");
        $("#email").focus();
  
    } else if(email.endsWith(allowedCompanyDomains)) {
            
        alert("Please enter a valid company email");
        $("#email").focus();
  
    } else {
        
        $.ajax({
            type: 'POST',
            url: 'controls/add_user.ctrl.php',
            data: appendAllData,
            success: function (responce) {
                console.log(responce);
                if (responce > 0) {

                    alert("Save");

                } else {

                    alert("Failed to save");

                }
            }

        });
    }
}


