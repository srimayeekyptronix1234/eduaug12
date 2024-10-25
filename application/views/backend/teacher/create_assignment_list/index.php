<style>
  .title_icon {
    font-size: 1.5rem;
    color: #ff7580;
    vertical-align: middle;
  }

  .page-title {
    font-size: 20px;
    font-weight: 700;
    color: #ff7580;
    line-height: 1.5;
  }

  .ms-2 {
    margin-left: 0.5rem;
  }

  .parentbar {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    background: #ffdfe8;
  }

  .inspiring-line {
    font-size: 16px;
    color: #2c2c2c !important;
    font-weight: 600;
  }

  .parbox {
    font-weight: 600;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius: 10px;
    padding: 20PX;
  }

  .parbox:hover {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transition: 1s ease;
  }

  .boxbtn {
    background: #0272f3;
    color: white;
    padding-left: 30px;
    padding-right: 30px;
  }
</style>

<!--title-->
<div class="row">
  <div class="col-xl-12">
    <div class="card parentbar">
      <div class="card-body py-2 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="page-title d-inline-block">
            <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('assignment'); ?>
          </h4>
          <p class="inspiring-line">
             Created Assignment List..
          </p>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
          onclick="rightModal('<?php echo site_url('modal/popup/create_assignment_list/create'); ?>', '<?php echo get_phrase('create_assignment'); ?>')">
          <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_assignment'); ?>
        </button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card parbox">
      <div class="card-body assignment_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script> 
  var showAllCandidate = function () {
    var url = '<?php echo route('create_assignment/list'); ?>';

    $.ajax({
      type: 'GET',
      url: url,
      success: function (response) {
        // Hide the loader
        document.getElementById('loader').style.display = 'none';
        document.getElementById('submitbtn').disabled = false;
        $('.assignment_content').html(response);
        location.reload(); 
        //initDataTable('basic-datatable');
      }
    });
  }


  function showConfirmModal(id)
  {
    var url = '<?php echo route('create_assignment/delete'); ?>/' + id;
    $.ajax({
        type: 'GET', // or 'POST' if you want to change it
        url: url,
        dataType: 'text', // Expect text to handle string response
        success: function (response) {
            console.log(response); // Log the entire response
            
            // Parse the response if it's a string
            try {
                var jsonResponse = JSON.parse(response); // Parse the JSON string
                console.log(jsonResponse.status); // Log the parsed object

                // Check the response status
                if (jsonResponse && jsonResponse.status) {
                    // Show SweetAlert
                    Swal.fire({
                        title: 'Success!',
                        text: jsonResponse.notification,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(); // Reload the page
                        }
                    });
                } else {
                    alert('An error occurred while deleting the assignment.');
                }
            } catch (e) {
                console.error('Parsing error:', e);
                alert('Error parsing response.');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
            alert('An error occurred. Please try again.');
        }
    });
  }
</script> 