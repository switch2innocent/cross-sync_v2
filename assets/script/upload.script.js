$(document).ready(function () {
  $("#upload-form").on("submit", function (e) {
    e.preventDefault();

    // TODO: Get file inputs
    var inventoryData = $("#upload-inventoryData")[0].files[0];
    var centralWarehouse = $("#upload-centralWarehouse")[0].files[0];
    // ? var bomData = $('#upload-bomData')[0].files[0];

    // ! validate files
    if (
      inventoryData &&
      centralWarehouse &&
      inventoryData.name === centralWarehouse.name
    ) {
      Swal.fire({
        icon: "warning",
        title: "Warning!",
        text: "You have selected the same file for both uploads. Please choose different files.",
        showConfirmButton: true,
      });
      return;
    } else if (!inventoryData || !centralWarehouse) {
      Swal.fire({
        icon: "error",
        title: "Error!",
        text: "Please select both files for upload.",
        showConfirmButton: true,
      });

      return;
    } else {
      // TODO: Create FormData object to hold the files
      var formData = new FormData();
      formData.append("upload-inventoryData", inventoryData);
      formData.append("upload-centralWarehouse", centralWarehouse);
      // ? formData.append('upload-bomData', bomData);

      $.ajax({
        type: "POST",
        url: "controls/upload_add.ctrl.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (responce) {
          Swal.fire({
            title: "Saved!",
            text: "Saved successfully!",
            icon: "success",
            allowOutsideClick: false,
            allowEscapeKey: false,
          }).then(function () {
            location.reload();
          });

          $("#uploadModal").modal("hide");
          1;
        },
        error: function (xhr, status, error) {
          Swal.fire({
            icon: "error",
            title: "Upload Failed!",
            text: "There was an error while uploading your file. Please try again.",
            showConfirmButton: true,
          });
        },
      }); // ! End for upload statement
    } // ! End for validation
  }); // ! End of upload form

  // TODO: Create buttons for upload and export
  new DataTable("#upload-datatable", {
    layout: {
      topStart: {
        buttons: [
          {
            text: '<i class="fas fa-plus"></i> &nbsp; Upload File',
            action: function (e, dt, node, config) {
              // ! Trigger the upload modal to open
              var uploadModal = new bootstrap.Modal(
                document.getElementById("uploadModal")
              );
              uploadModal.show();
            },
          },
          {
            extend: "csv",
            text: '<i class="fas fa-file-csv"></i> &nbsp; Export',
          },
          {
            text: '<i class="fas fa-search"></i> &nbsp; Search By Date',
            action: function (e, dt, node, config) {
              // ! Trigger the search modal to open
              var searchModal = new bootstrap.Modal(
                document.getElementById("searchModal")
              );
              searchModal.show();
            },
          },
        ],
      },
    },
  }); // ! End for upload and export button

  // TODO: Search datatable by date
  var table = $("#upload-datatable").DataTable();
  // ? Date range filter logic
  $("#start-date, #end-date").change(function () {
    var startDate = $("#start-date").val();
    var endDate = $("#end-date").val();

    // ? Perform the search when both dates are provided
    table.draw();
  });

  // ? Custom filter function
  $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    var startDate = $("#start-date").val();
    var endDate = $("#end-date").val();
    var date = data[4]; // ! Date column (adjust if your date is in a different column)

    if (startDate && endDate) {
      return (
        new Date(date) >= new Date(startDate) &&
        new Date(date) <= new Date(endDate)
      );
    }
    return true; // ! No filter if no date range selected
  });

  // TODO: Show file name when browse
  $(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  }); // ! End for show file name
}); // ! End document ready function
