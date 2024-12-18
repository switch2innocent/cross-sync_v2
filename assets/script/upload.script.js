$(document).ready(function () {

    $('#upload-form').on('submit', function (e) {
        e.preventDefault();

        // Get file inputs
        var inventoryData = $('#upload-inventoryData')[0].files[0];
        var centralWarehouse = $('#upload-centralWarehouse')[0].files[0];
        var bomData = $('#upload-bomData')[0].files[0];

        // Create FormData object to hold the files
        var formData = new FormData();
        formData.append('upload-inventoryData', inventoryData);
        formData.append('upload-centralWarehouse', centralWarehouse);
        formData.append('upload-bomData', bomData);

        $.ajax({
            type: 'POST',
            url: 'controls/upload_add.ctrl.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (responce) {

                Swal.fire({
                    title: "Saved!",
                    text: "Saved successfully!",
                    icon: "success",
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then(function () {
                    window.location.reload();
                });

                $('#uploadModal').modal('hide'); 1

            },
            error: function (xhr, status, error) {

                Swal.fire({
                    icon: 'error',
                    title: 'Upload Failed!',
                    text: 'There was an error while uploading your file. Please try again.',
                    showConfirmButton: true
                });

            }

        }); // End for upload statement













        // for upload onsite
        // var formData_onsite = new FormData();
        // var fileUpload_onsite = $('#upload-onsite')[0].files[0];
        // formData_onsite.append('upload-onsite', $('#upload-onsite')[0].files[0]);

        // validate files
        // if (fileUpload_office && fileUpload_onsite && fileUpload_office.name === fileUpload_onsite.name) {

        //     Swal.fire({
        //         icon: 'warning',
        //         title: 'Warning!',
        //         text: 'You have selected the same file for both uploads. Please choose different files.',
        //         showConfirmButton: true
        //     });
        //     return;

        // } else if (!fileUpload_office || !fileUpload_onsite) {

        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Error!',
        //         text: 'Please select both files for upload.',
        //         showConfirmButton: true
        //     });

        //     return;

        // } else {

        //     // Merge data together for ajax request
        //     formData_onsite.forEach(function (value, key) {
        //         formData_office.append(key, value);
        //     });

        //     $.ajax({
        //         type: 'POST',
        //         url: 'controls/upload_add.ctrl.php',
        //         data: formData_office,
        //         processData: false,
        //         contentType: false,
        //         success: function (responce) {

        //             Swal.fire({
        //                 title: "Saved!",
        //                 text: "Saved successfully!",
        //                 icon: "success",
        //                 allowOutsideClick: false,
        //                 allowEscapeKey: false
        //             }).then(function () {
        //                 window.location.reload();
        //             });

        //             $('#uploadModal').modal('hide');

        //         },
        //         error: function (xhr, status, error) {

        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Upload Failed!',
        //                 text: 'There was an error while uploading your file. Please try again.',
        //                 showConfirmButton: true
        //             });

        //         }

        //     }); // End for upload statement

        //} // End for validation

    }); // End of upload form

    new DataTable('#upload-datatable', {
        layout: {
            topStart: {
                buttons: [
                    {
                        text: '<i class="fas fa-plus"></i> &nbsp; Add File',  // Custom button text
                        action: function (e, dt, node, config) {
                            // Trigger the modal to open
                            var myModal = new bootstrap.Modal(document.getElementById('uploadModal'));
                            myModal.show();
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv"></i> &nbsp; Export'
                    }
                ]
            }
        }
    });

    // For input file
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

}); // End document ready function