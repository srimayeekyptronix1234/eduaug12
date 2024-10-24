  <?php
   $assignment_details = $this->db->get_where('assignment_new', array('id' => $param1))->row_array();

   $subject_details = $this->db->get_where('subjects', array('id' => $param2))->row_array();

   $user_id = $this->session->userdata('user_id');
   $teacher_table_data = $this->db->get_where('teachers', ['user_id' => $user_id])->row_array();

  ?>
  
  <form method="POST" class="d-block ajaxForm" action="<?php echo route('create_assignment/update/'.$param1); ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group mb-1">
            <input type="hidden" name="hid_subjectId" id="hid_subjectId" value="<?php echo $param2;?>">
            <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
            <label for="name"><?php echo get_phrase('assignment_name'); ?></label>
            <input type="text" class="form-control" id="assignment_name" name="assignment_name" value="<?php echo $assignment_details['assignment_name'];?>" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_assignment_name'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('publish_time'); ?></label>
            <input type="radio" class="form-check-input" id="publish_time" name="publish_time" value="now" <?php if($assignment_details['publish_time'] =='now'){?> checked <?php }?> >Now | <input type="radio" class="form-check-input" id="publish_time" name="publish_time" value="later" <?php if($assignment_details['publish_time'] =='later'){?> checked <?php }?> >Later
        </div>

        <div class="form-group mb-1" id="choose_publish_date" <?php if($assignment_details['publish_time'] !='later'){?>style="display:none;" <?php }?>>
            <label for="later_publish_date"><?php echo get_phrase('publish_date'); ?></label>
            <input type="text" class="form-control date" id="later_publish_date" data-bs-toggle="date-picker" data-single-date-picker="true" name="publish_date" value="<?php echo $assignment_details['publish_date'];?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_publish_date'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="due_date"><?php echo get_phrase('due_date'); ?></label>
            <input type="text" class="form-control date" id="due_date" data-bs-toggle="date-picker" data-single-date-picker="true" name="due_date" value="<?php echo $assignment_details['due_date'];?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_due_date'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="select_class"><?php echo get_phrase('choose_class'); ?></label>
            <select name="class_id" id="class_id" class="form-control select2" data-toggle="select2" required
                onchange="classWiseSubject(this.value,'<?php echo $assignment_details['subject_id']; ?>')">
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                <?php
                //$classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
                $classes = $this->db->get_where('classes', array('id' => $teacher_table_data['class_id'], 'school_id' => school_id()))->result_array();
                foreach ($classes as $class) {
                    ?>
                    <option value="<?php echo $class['id']; ?>" <?php if($assignment_details['class_id'] == $class['id']){?> selected <?php }?> ><?php echo $class['name']; ?></option>
                <?php } ?>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('select_class'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="select_class"><?php echo get_phrase('choose_subject'); ?></label>
            <select name="subject_id" id="subject_id" class="form-control select2" data-toggle="select2" required>
                <option value=""><?php echo get_phrase('select_subject'); ?></option>
                <option value="<?php echo $param2; ?>" selected><?php echo $subject_details['name']; ?></option>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('select_class'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="category"><?php echo get_phrase('category'); ?></label>
            <select name="category_name" id="category" class="form-control select2" data-toggle = "select2">
                <option value=""><?php echo get_phrase('select_a_category'); ?></option>
                <option value="project" <?php if($assignment_details['category_name'] == 'project'){?> selected <?php }?>><?php echo get_phrase('project'); ?></option>
                <option value="classwork" <?php if($assignment_details['category_name'] == 'classwork'){?> selected <?php }?> ><?php echo get_phrase('classwork'); ?></option>
                <option value="behaviour" <?php if($assignment_details['category_name'] == 'behaviour'){?> selected <?php }?> ><?php echo get_phrase('behaviour'); ?></option>
                <option value="homework" <?php if($assignment_details['category_name'] == 'homework'){?> selected <?php }?> ><?php echo get_phrase('homework'); ?></option>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('select_a_category'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('Assignment Content'); ?></label>
            <textarea name="assignment_content" class="form-control" id="assignment_content" cols="8" rows="2"><?php echo $assignment_details['assignment_content'];?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_assignment_content'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="assignment_content_file"><?php echo get_phrase('upload_assignment'); ?></label>
            <input type="file" class="form-control" id="assignment_content_file" name="assignment_content_file">
        </div>

        <!-- <div class="form-group mb-1">
            <label for="image_file"><?php echo get_phrase('upload_profile_picture'); ?></label>
            <input type="file" class="form-control" id="image_file" name="image_file">
        </div> -->

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" id="submitbtn" type="submit"><?php echo get_phrase('submit'); ?></button>
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
