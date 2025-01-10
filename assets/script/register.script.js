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

    // Loader page
    $('#backLogin').click(function(e) {
        e.preventDefault();
        var linkLocation = this.href;
        $('#loading-screen').fadeIn(500, function() {
            window.location = linkLocation;
        });
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
    var conPass = $("#con-password").val();

    var check = email.substring(email.lastIndexOf('@') + 1);

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

        toastr["info"]("Firstname is required.", "Info");
        $("#firstname").focus();

    } else if (lname == '') {

        toastr["info"]("Lastname is required.", "Info");
        $("#lastname").focus();

    } else if (pos == '') {

        toastr["info"]("Position is required.", "Info");
        $("#position").focus();

    } else if (proj == '') {

        toastr["info"]("Select a project.", "Info");
        $("#project").focus();

    } else if (dateHire == '') {

        toastr["info"]("Select your date hire.", "Info");
        $("#date-hire").focus();

    } else if (dept == '') {

        toastr["info"]("Select your department.", "Info");
        $("#department").focus();

    } else if (unit == '') {

        toastr["info"]("Unit is required.", "Info");
        $("#unit").focus();

    } else if (email == '') {

        toastr["info"]("Email is required.", "Info");
        $("#email").focus();

    } else if (check !== 'innogroup.com.ph' && check !== 'induco.com.ph' && check !== 'citrineland.com.ph' && check !== 'innoland.com.ph' && check !== 'innoprime.com.ph') {

        toastr["error"]("Enter a valid company domain. (ex. your_email@innogroup.com.ph)", "Error");
        $("#email").focus();

    } else if (uname == '') {

        toastr["info"]("Username is required.", "Info");
        $("#username").focus();

    } else if (pass == '') {

        toastr["info"]("Password is required.", "Info");
        $("#password").focus();

    } else if (conPass == '') {

        toastr["info"]("Confirmation password is required.", "Info");
        $("#con-password").focus();

    } else if (pass !== conPass) {

        toastr["error"]("Password do not match! Please try again.", "Error");

    } else {

        $.ajax({
            type: 'POST',
            url: 'controls/add_user.ctrl.php',
            data: appendAllData,
            success: function (responce) {
                console.log(responce);
                if (responce > 0) {

                    Swal.fire({
                        title: "Saved!",
                        text: "Saved successfully!",
                        icon: "success",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        location.reload();
                    });

                } else {

                    toastr["error"]("Failed to saved.", "Error");

                }
            }
        });

    }
}

// Verify if email already exist on the database
$("#email").on("blur", function(e) {
    e.preventDefault();

    var email = $(this).val(); 

    if (email !== '') {
        
        $.ajax({
            type: 'POST',
            url: 'controls/verify_user_email.ctrl.php',
            data: { email: email },
            success: function(response) {

                if (response > 0) {
                    toastr["error"]("This email has already been taken.", "Error");
                    $("#email").focus();
                }
                
            }
        });
    }
});

// Generate username
$('#firstname').blur(function (e) {
    e.preventDefault();

    var str = $('#firstname').val();
    var fname = str.replace(/\s/g, '');
    var f = fname.toLowerCase();
    var str1 = $('#lastname').val();
    var lname = str1.replace(/\s/g, '');
    var l = lname.toLowerCase();
    var username = f.concat('.').concat(l);
    $('#username').val(username);

});

$('#lastname').blur(function (e) {
    e.preventDefault();

    var str = $('#firstname').val();
    var fname = str.replace(/\s/g, '');
    var f = fname.toLowerCase();
    var str1 = $('#lastname').val();
    var lname = str1.replace(/\s/g, '');
    var l = lname.toLowerCase();
    var username = f.concat('.').concat(l);
    $('#username').val(username);

});

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

