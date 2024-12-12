$(document).ready(function () {

    $('#upload-form').on('submit', function (e) {
        e.preventDefault();

        // for upload office
        var formData_office = new FormData();
        var fileUpload_office = $('#upload-office')[0].files[0];
        formData_office.append('upload-office', $('#upload-office')[0].files[0]);

        // for upload onsite
        var formData_onsite = new FormData();
        var fileUpload_onsite = $('#upload-onsite')[0].files[0];
        formData_onsite.append('upload-onsite', $('#upload-onsite')[0].files[0]);

        // validate files
        if (fileUpload_office && fileUpload_onsite && fileUpload_office.name === fileUpload_onsite.name) {

            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'You have selected the same file for both uploads. Please choose different files.',
                showConfirmButton: true
            });
            return;

        } else if (!fileUpload_office || !fileUpload_onsite) {

            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please select both files for upload.',
                showConfirmButton: true
            });

            return;

        } else {

            // Merge data together for ajax request
            formData_onsite.forEach(function (value, key) {
                formData_office.append(key, value);
            });

            $.ajax({
                type: 'POST',
                url: 'controls/upload_add.ctrl.php',
                data: formData_office,
                processData: false,
                contentType: false,
                success: function (responce) {

                    Swal.fire({
                        title: "Saved!",
                        text: "Saved successfully!",
                        icon: "success",
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then(function() {
                        window.location.reload();
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

    $('#upload-datatable').DataTable();

}); // End document ready function

  function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("#upload-datatable tr");

    // Get headers
    var headers = document.querySelectorAll("#upload-datatable thead th");
    var headerRow = [];
    for (var i = 0; i < headers.length; i++) {
      headerRow.push(headers[i].innerText.trim());
    }
    csv.push(headerRow.join(","));

    // Get rows from tbody
    rows.forEach(function(row) {
      var rowData = [];
      var cols = row.querySelectorAll("td");
      cols.forEach(function(col) {
        rowData.push(col.innerText.trim());
      });
      csv.push(rowData.join(","));
    });

    // Create a link and trigger the CSV download
    var csvFile = new Blob([csv.join("\n")], { type: 'text/csv' });
    var downloadLink = document.createElement("a");
    downloadLink.href = URL.createObjectURL(csvFile);
    downloadLink.download = filename;
    downloadLink.click();
  }