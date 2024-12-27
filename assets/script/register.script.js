$(document).ready(function () {

    $('#project').select2({
        ajax: {
            url: 'fetch.php', // URL to fetch data from
            dataType: 'json',
            processResults: function(data) {
                // Map the data to the format Select2 expects
                return {
                    results: data.map(function(user) {
                        return {
                            id: user.id,
                            text: user.name
                        };
                    })
                };
            }
        },
        placeholder: 'Search for a user',
        minimumInputLength: 1 // Start searching after 1 character is typed
    });



    // $('#project').select2({
    //     placeholder: 'Select a position...',
    //     minimumInputLength: 1,
    //     ajax: {
    //         url: 'controls/project.ctrl.php',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results: data
    //             };
    //     },
    //     cache: true
    // }
    // });

});
