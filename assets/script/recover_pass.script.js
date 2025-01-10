$(document).ready(function () {

    // Loader page
    $('#backLogin').click(function (e) {
        e.preventDefault();
        $('#loading-screen').fadeIn(500, function () {
            window.location.href = 'index.php';
        });
    });

});