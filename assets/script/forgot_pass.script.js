$(document).ready(function () {

    // Loader page
    $('#backLogin').click(function (e) {
        e.preventDefault();
        $('#loading-screen').fadeIn(500, function () {
            window.location.href = 'index.php';
        });
    });

    //Send Email
    $('#retrieve').on('click', function (e) {
        e.preventDefault();

        var email = $('#email').val();

        var check = email.substring(email.lastIndexOf('@') + 1);

        if (!email) {

            alert('Email is required');
            $('#email').focus();
            return

        } else if (check !== 'innogroup.com.ph' && check !== 'induco.com.ph' && check !== 'citrineland.com.ph' && check !== 'innoland.com.ph' && check !== 'innoprime.com.ph') {

            // toastr["error"]("Enter a valid company domain. (ex. your_email@innogroup.com.ph)", "Error");
            alert("Enter a valid IGC email address. (ex. your_email@innogroup.com.ph)");
            $("#email").focus();

        } else {

            $.ajax({
                type: 'POST',
                url: 'controls/retrieve_email.ctrl.php',
                data: { email: email },
                success: function (r) {
                    console.log(r);
                    if (r > 0) {
                        alert("sent");
                        window.location.reload();
                    } else {
                        alert("email not found");
                    }
                }


            });
        }
    });

});