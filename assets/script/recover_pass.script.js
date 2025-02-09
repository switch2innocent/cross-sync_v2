$(document).ready(function () {

    // Loader page
    $('#backLogin').click(function (e) {
        e.preventDefault();
        $('#loading-screen').fadeIn(500, function () {
            window.location.href = 'index.php';
        });
    });

    $('#reset').on('click', function (e) {
        e.preventDefault();

        var password = $('#password').val();
        var conpassword = $('#conpassword').val();
        var id = location.search.split('id=')[1];

        if (!password || !conpassword) {
            alert("Fill in all fields.");
        } else if (password !== conpassword) {
            alert("password do not match.");
        } else {
            $.ajax({
                type: 'POST',
                url: 'controls/change_password.ctrl.php',
                data: {password: password, id: id},
                success: function (r) {
                    if (r > 0) {
                        alert("updated");
                    } else {
                        alert("error");
                    }
                }

            });
        }

    });

});