$(document).ready(function () {

    $('#upload-form').on('submit', function (e) {
        e.preventDefault();

        // for upload 1
        var formData = new FormData();
        var fileUpload = $('#fileUpload')[0].files[0];
        formData.append('fileUpload', $('#fileUpload')[0].files[0]);

        // for upload 2
        var formDatatwo = new FormData();
        var fileUploadTwo = $('#fileUploadtwo')[0].files[0];
        formDatatwo.append('fileUploadtwo', $('#fileUploadtwo')[0].files[0]);

        // validate
        if (fileUpload && fileUploadTwo && fileUpload.name === fileUploadTwo.name) {

            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'You have selected the same file for both uploads. Please choose different files.',
                showConfirmButton: true
            });
            return;

        } else if (!fileUpload || !fileUploadTwo) {

            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Please select both files for upload.',
                showConfirmButton: true
            });
            return;

        } else {

            // Merge data together for ajax request
            formDatatwo.forEach(function (value, key) {
                formData.append(key, value);
            });

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
                        icon: "success"
                    });

                    $('#uploadModal').modal('hide');

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

        } // End for validation

    }); // End of upload form

}); // End document ready function