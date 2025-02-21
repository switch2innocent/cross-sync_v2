$(document).ready(function () {

  $("#upload-form").on("submit", function (e) {
    e.preventDefault();

    //Get file inputs
    var inventoryData = $("#upload-inventoryData")[0].files[0];
    var centralWarehouse = $("#upload-centralWarehouse")[0].files[0];
    //var bomData = $('#upload-bomData')[0].files[0];

    //validate files
    if (inventoryData && centralWarehouse && inventoryData.name === centralWarehouse.name) {
      toastr["error"]("You have selected the same file for both uploads. Please choose different files.", "ERROR");
      return;
    } else if (!inventoryData || !centralWarehouse) {
      toastr["error"]("Please select both files for upload.", "ERROR");
      return;
    } else {
      //Create FormData object to hold the files
      var formData = new FormData();
      formData.append("upload-inventoryData", inventoryData);
      formData.append("upload-centralWarehouse", centralWarehouse);
      //formData.append('upload-bomData', bomData);

      $.ajax({
        type: "POST",
        url: "controls/upload_add.ctrl.php",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {

          Swal.fire({
            title: "Uploading...",
            text: "Please wait while your files are being uploaded.",
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
              Swal.showLoading();
            },
          });
        },
        complete: function () {

          Swal.fire({
            title: "Success!",
            text: "Uploaded successfully!",
            icon: "success",
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonColor: "#007bff",
          }).then(function () {
            location.reload();
          });

          $("#uploadModal").modal("hide");
          1;
        },
        error: function (xhr, status, error) {
          toastr["error"]("There was an error while uploading your file. Please try again.", "ERROR");
        },

      });
    }
  });


  //Buttons for upload and export
  let tableData = new DataTable('#upload-datatable');
  new DataTable.Buttons(tableData, {
    buttons: [
      {
        text: '<i class="fas fa-plus fa-xs text-success" title="Upload a CSV File">&nbsp; Add File</i>',
        action: function (e, dt, node, config) {
          //Trigger Upload Modal
          var uploadModal = new bootstrap.Modal(
            document.getElementById("uploadModal")
          );
          uploadModal.show();
        }
      },
      {
        extend: 'pdf',
        text: '<i class="fas fa-download fa-xs text-danger" title="Download To PDF">&nbsp; Download</i>',
        customize: function (doc) {
          doc.content.splice(0, 1, {
            text: 'Cross Sync (Descripancy Report)',
            fontSize: 14,
            alignment: 'center',
            margin: [0, 0, 0, 12]
          });
        }
      },
      {
        text: '<i class="fas fa-search fa-xs text-primary" title="Search By Date">&nbsp; Search Date</i>',
        action: function (e, dt, node, config) {
          //Trigger the search modal to open
          var searchModal = new bootstrap.Modal(
            document.getElementById("searchModal")
          );
          searchModal.show();
        }
      }
    ]
  });
  tableData.order([]).draw();  // Disable initial ordering
  tableData
    .buttons(0, null)
    .container()
    .prependTo(tableData.table().container());
    

  //Show file name when browse
  $(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });


  //Loader page
  $('.logout').click(function (e) {
    e.preventDefault();
    var linkLocation = this.href;
    $('#loading-screen').fadeIn(500, function () {
      window.location = linkLocation;
    });
  });


  //Get User Profile
  $('#editProfile').on('click', function (e) {
    e.preventDefault();

    var id = $(this).val();

    $.ajax({
      type: 'POST',
      url: 'controls/edit_profile.ctrl.php',
      data: { id: id },
      success: function (response) {
        $('#editProfileModal').modal('show');
        $('#editProfileBody').html(response);
      }
    });
  });

  $('#up_profile').on('click', function (e) {
    e.preventDefault();

    var id = $('#up_id').val();
    var firstname = $('#up_fname').val();
    var lastname = $('#up_lname').val();
    var password = $('#up_pass').val();
    var conpassword = $('#up_repass').val();

    if (firstname == "" || lastname == "" || password == "" || conpassword == "") {

      toastr["error"]("Please fill in all fields.", "ERROR");

    } else if (password !== conpassword) {

      toastr["error"]("Password does not match. Please try again.", "ERROR");

    } else {

      $.ajax({
        type: 'POST',
        url: 'controls/update_profile.ctrl.php',
        data: {
          id: id,
          firstname: firstname,
          lastname: lastname,
          password: password
        },
        success: function (r) {

          if (r > 0) {

            Swal.fire({
              title: "Profile Updated!",
              text: "Your profile has been updated successfully. You will be logged out to save changes.",
              icon: "success",
              allowOutsideClick: false,
              allowEscapeKey: false,
              confirmButtonColor: "#007bff",
            }).then(function () {
              window.location.href = 'controls/logout_user.ctrl.php';
            });

          } else {

            toastr["error"]("Failed to update profile!", "ERROR");

          }
        },
        error: function () {

          toastr["error"]("An error occurred while updating profile!", "ERROR");

        }
      });
    }

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
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

});