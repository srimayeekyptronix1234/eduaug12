  <?php
   $assignment_answer_details = $this->db->get_where('student_assignment_answer', array('id' => $param1))->row_array();

    $this->db->select('students.*, users.name, users.email'); 
    $this->db->from('students');
    $this->db->join('users', 'students.user_id = users.id', 'left');
    $this->db->where('students.id', $param2); 
    $query = $this->db->get();
    $user_details = $query->row_array(); 


   $subject_details = $this->db->get_where('subjects', array('id' => $param3))->row_array();

   $user_id = $this->session->userdata('user_id');
   $teacher_table_data = $this->db->get_where('teachers', ['user_id' => $user_id])->row_array();

  ?>
  
  <form method="POST" class="d-block ajaxForm" action="" enctype="multipart/form-data">
    <div class="form-row">

        <div class="form-group mb-1">
            <label for="student_name"><?php echo get_phrase('student_name'); ?>: </label>
            <?php echo $user_details['name'];?>
        </div>

        <div class="form-group mb-1">
            <label for="student_name"><?php echo get_phrase('subject'); ?>: </label>
            <?php echo $subject_details['name'];?>
        </div>

        <div class="form-group mb-1">
            <label for="student_name"><?php echo get_phrase('category'); ?>: </label>
            <?php echo $assignment_answer_details['category'];?>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('Student_answer'); ?></label>
            <textarea readonly name="assignment_content" class="form-control" id="assignment_content" cols="8" rows="2"><?php echo $assignment_answer_details['assignment_answer'];?></textarea>
        </div>

        <?php if(!empty($assignment_answer_details['assignment_answer_file'])) {?>
            <div class="form-group mb-1">
                <label for="download_assignment_file"><?php echo get_phrase('download_answer_file'); ?></label>
                <a href="<?php echo base_url();?>uploads/student/assignment_answer_files/<?php echo $assignment_answer_details['assignment_answer_file'];?>" target="_blank">Download Assignment Answer File</a>
            </div>
        <?php } ?>    
       
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
