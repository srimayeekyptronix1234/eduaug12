  <?php
   $assignment_details = $this->db->get_where('assignment_new', array('id' => $param1))->row_array();

   $subject_details = $this->db->get_where('subjects', array('id' => $param2))->row_array();

   $user_id = $this->session->userdata('user_id');
   $teacher_table_data = $this->db->get_where('teachers', ['user_id' => $user_id])->row_array();

   $already_answered = $this->db->get_where('student_assignment_answer', array('assignment_new_tbl_id' => $param1,'student_id' => $param4))->row_array();

  ?>
  
  <form method="POST" class="d-block ajaxForm" action="<?php echo route('assignment_list/update/'.$param1); ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group mb-1">
            <input type="hidden" name="hid_subjectId" id="hid_subjectId" value="<?php echo $param2;?>">
            <input type="hidden" name="hid_classId" id="hid_classId" value="<?php echo $param3;?>">
            <input type="hidden" name="hid_studentId" id="hid_studentId" value="<?php echo $param4;?>">
            <input type="hidden" name="hid_category" id="hid_category" value="<?php echo $assignment_details['category_name'];?>">
            <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
            <label for="name"><?php echo get_phrase('assignment_name'); ?></label>
            <input type="text" readonly class="form-control" id="assignment_name" name="assignment_name" value="<?php echo $assignment_details['assignment_name'];?>" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_assignment_name'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('Assignment Content3'); ?></label>
            <textarea readonly name="assignment_content" class="form-control" id="assignment_content" cols="8" rows="2"><?php echo $assignment_details['assignment_content'];?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_assignment_content'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('Assignment Answer'); ?></label>
            <textarea <?php if(isset($already_answered)) {?> readonly <?php }?> name="assignment_answer" class="form-control" id="assignment_answer" cols="8" rows="2"><?php echo $already_answered['assignment_answer'];?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_assignment_answer'); ?></small>
        </div>

        <?php if(!empty($assignment_details['assignment_content_file'])) {?>
        <div class="form-group mb-1">
            <label for="download_assignment_file"><?php echo get_phrase('download_assignment_file'); ?></label>
            <a href="<?php echo base_url();?>uploads/teacher/assignment/<?php echo $assignment_details['assignment_content_file'];?>" target="_blank">Download Assignment File</a>
        </div>
        <?php } ?>

        <div class="form-group mb-1">
            <label for="assignment_answer_file"><?php echo get_phrase('upload_answer'); ?></label>
            <input type="file" <?php if(isset($already_answered)) {?> readonly <?php }?>  class="form-control" id="assignment_answer_file" name="assignment_answer_file">
        </div>

        <!-- <div class="form-group mb-1">
            <label for="image_file"><?php echo get_phrase('upload_profile_picture'); ?></label>
            <input type="file" class="form-control" id="image_file" name="image_file">
        </div> -->

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" <?php if(isset($already_answered)) {?> disabled <?php }?> id="submitbtn" type="submit"><?php echo get_phrase('submit'); ?></button>
            <img id="loader" style="display:none; text-align:center;" src="<?php echo base_url('assets/backend/images/straight-loader.gif'); ?>" alt="Loading..." width="30px" height="30px"/>
        </div>
    </div>
</form>

<style>
    /* Set the height of the CKEditor 5 content area */
    .ck-editor__editable {
        min-height: 300px; /* Set the minimum height */
        max-height: 500px; /* Set the maximum height */
        height: 400px; /* Set a fixed height */
    }

    /* Set the width of the CKEditor 5 container */
    .ck-editor {
        width: 600px; /* Set a fixed width */
        max-width: 100%; /* Make it responsive */
    }

    .cke_notification_warning {
        display: none !important; /* Hide the status bar */
    }
</style>

<script>

$(document).ready(function() {
    $('input[name="publish_time"]').on('change', function() {
        if ($(this).val() === 'later') {
            $('#choose_publish_date').show();
        } else {
            $('#choose_publish_date').hide();
        }
    });
});

function classWiseSubject(classId,subjectId) {
    $.ajax({
        url: "<?php echo route('class_wise_subject/'); ?>" + classId+"/"+subjectId,
        success: function (response) {
            $('#subject_id').html(response);
        }
    });
}

function getAppliedValue(val)
{
    
    if(val == 1)
    {
        $("#selectdepartment").css("display","block");
        //alert(val);
    }
    else 
    {
        $("#selectdepartment").css("display","none");
        $("#department").val('');
    }
}

$(document).ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#department', '#gender', '#blood_group', '#show_on_website']);
});


$(".ajaxForm").validate({}); // Jquery form validation initialization
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

// initCustomFileUploader();

// Js for calendar
$("#later_publish_date" ).daterangepicker();
$("#due_date" ).daterangepicker();
</script>
