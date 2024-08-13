<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('candidate'); ?>
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/candidate_list/create'); ?>', '<?php echo get_phrase('create_candidate'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_candidate'); ?></button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body candidate_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<!----- Open Modal to candidate reshedule -----> 
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form id="exampleForm" class="d-block ajaxForm" action="<?php echo route('candidate_list/rescheduled'); ?>" enctype="multipart/form-data">
            <!-- Hidden input for user_id -->
            <input type="hidden" id="hiduser_id" name="hiduser_id" value="">

            <!-- <label for="date">Select Reschedule Date:</label>
            <input type="text" id="datepicker" name="interview_date" placeholder="Choose a date" required> -->

            <div class="form-group mb-1">
              <label for="interview_date"><?php echo get_phrase('interview_date'); ?></label>
              <input type="text" class="form-control date" id="datepicker" data-bs-toggle="date-picker" data-single-date-picker="true" name="interview_date" value="<?php echo date('m/d/Y'); ?>" required>
              <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_interview_date'); ?></small>
            </div>

            <div class="form-group mb-1">
                <label for="interview_time"><?php echo get_phrase('interview_time'); ?></label>
                <input type="time" id="interview_time" name="interview_time" class="form-control" required>
                <select id="interview_time_am_pm" name="interview_time_am_pm">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
                <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_interview_time'); ?></small>
            </div>

            <div class="form-group mb-1">
              <label for="interview_link"><?php echo get_phrase('interview_link'); ?></label>
              <input type="text" class="form-control" id="interview_link" name="interview_link">
              <small id="" class="form-text text-muted"><?php echo get_phrase('provide_interview_link'); ?></small>
            </div>

            <div class="form-group mb-1">
              <label for="instruction_of_candidate"><?php echo get_phrase('Notes/Instructions_for_the_Candidate'); ?></label>
              <textarea class="form-control" id="instruction_of_candidate" name="instruction_of_candidate" rows="5"></textarea>
              <small id="" class="form-text text-muted"><?php echo get_phrase('provide_instruction_of_candidate'); ?></small>
            </div>

             <button class="btn btn-block btn-primary" id="submitbtn" type="submit"><?php echo get_phrase('submit'); ?></button>
            <img id="loader" style="display:none; text-align:center;" src="<?php echo base_url('assets/backend/images/straight-loader.gif'); ?>" alt="Loading..." width="30px" height="30px"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!--------- End ------->    

 

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
    
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container {
            display: none; /* Hide the form initially */
        }
    </style>
<script>
var showAllCandidate = function () {
  var url = '<?php echo route('candidate_list/list'); ?>';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      // Hide the loader
      document.getElementById('loader').style.display = 'none';
      document.getElementById('submitbtn').disabled = false;
      $('.candidate_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}

//$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    e.preventDefault(); // Prevent the default form submission
    if ($(this).valid()) {
    // Show the loader
    document.getElementById('loader').style.display = 'block';
    document.getElementById('submitbtn').disabled = true;
    var form = $(this);
    ajaxSubmit(e, form, showAllCandidate);
    }
});

// Calender show
$(function() {
    // Initialize the datepicker
    $("#datepicker").datepicker({
        dateFormat: "mm/dd/yy" // Customize the date format as needed
    });
});

// Modal show
function ResheduleCandidate(id)
{
 //alert(id);
 $("#hiduser_id").val(id);
 $("#myModal").modal('show');
}
</script>

