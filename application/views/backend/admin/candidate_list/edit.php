  <?php
   $candidate_details = $this->db->get_where('candidate_list', array('id' => $param1))->row_array();
  ?>
  
  <form method="POST" class="d-block ajaxForm" action="<?php echo route('candidate_list/update/'.$param1); ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group mb-1">
            <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
            <label for="name"><?php echo get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="candidate_name" value="<?php echo $candidate_details['candidate_name']?>" name="candidate_name" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_candidate_name'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('email'); ?></label>
            <input type="email" class="form-control" id="candidate_email" name="candidate_email" value="<?php echo $candidate_details['candidate_email']?>" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_candidate_email'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('phone_number'); ?></label>
            <input type="text" class="form-control" id="candidate_phone" name="candidate_phone" value="<?php echo $candidate_details['candidate_phone']?>" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_candidate_phone'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('position_applied_for'); ?></label>
            <select name="position_applied_for" id="position_applied_for" class="form-control" data-toggle = "select2" required onChange="getAppliedValue(this.value)">
                <option value=""><?php echo get_phrase('select_a_position'); ?></option>
                <?php $applied_position = $this->db->get_where('position_applied_for', array('status' => 1))->result_array();
                foreach($applied_position as $pos){
                    ?>
                    <option <?php echo $candidate_details['position_applied_for'] == $pos['id'] ? "selected" : "";?> value="<?php echo $pos['id']; ?>"><?php echo $pos['position_name']; ?></option>
                <?php } ?>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_candidate_position'); ?></small>
        </div>

        <div class="form-group mb-1" id="selectdepartment" <?php if($candidate_details['position_applied_for'] != 1) { ?> style="display: none" <?php } ?>>
            <label for="department"><?php echo get_phrase('department'); ?></label>
            <select name="department" id="department" class="form-control" data-toggle = "select2" required>
                <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                <?php $departments = $this->db->get_where('departments', array('school_id' => school_id()))->result_array();
                foreach($departments as $department){
                    ?>
                    <option <?php echo $candidate_details['department'] == $department['name'] ? "selected" : "";?> value="<?php echo $department['name']; ?>"><?php echo $department['name']; ?></option>
                <?php } ?>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_a_department'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="gender"><?php echo get_phrase('gender'); ?></label>
            <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
                <option value=""><?php echo get_phrase('select_a_gender'); ?></option>
                <option value="Male" <?php echo $candidate_details['gender'] == 'Male' ? "selected" : "";?>><?php echo get_phrase('male'); ?></option>
                <option value="Female" <?php echo $candidate_details['gender'] == 'Female' ? "selected" : "";?>><?php echo get_phrase('female'); ?></option>
            </select>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_teacher_gender'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="interview_date"><?php echo get_phrase('interview_date'); ?></label>
            <input type="text" class="form-control date" id="interview_date" data-bs-toggle="date-picker" data-single-date-picker="true" name="interview_date" value="<?php echo $candidate_details['interview_date']?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_interview_date'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="interview_time"><?php echo get_phrase('interview_time'); ?></label>
            <input type="time" id="interview_time" name="interview_time" class="form-control" value="<?php echo $candidate_details['interview_time']?>" required>
            <select id="interview_time_am_pm" name="interview_time_am_pm">
                <option value="AM" <?php echo $candidate_details['interview_time_am_pm'] == 'AM' ? "selected" : "";?> >AM</option>
                <option value="PM" <?php echo $candidate_details['interview_time_am_pm'] == 'PM' ? "selected" : "";?> >PM</option>
            </select>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_interview_time'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="interview_type"><?php echo get_phrase('interview_type'); ?></label>
            <select id="interview_type" name="interview_type" class="form-control" required>
                <option value="">--select--</option>
                <option value="In-person" <?php echo $candidate_details['interview_type'] == 'In-person' ? "selected" : "";?> >In-person</option>
                <option value="Virtual" <?php echo $candidate_details['interview_type'] == 'Virtual' ? "selected" : "";?> >Virtual</option>
                <option value="Phone" <?php echo $candidate_details['interview_type'] == 'Phone' ? "selected" : "";?>>Phone</option>
            </select>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_interview_type'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="interview_mode"><?php echo get_phrase('interview_mode'); ?></label>
            <select id="interview_mode" name="interview_mode" class="form-control" required>
                <option value="">--select--</option>
                <option value="One-on-One" <?php echo $candidate_details['interview_mode'] == 'One-on-One' ? "selected" : "";?> >One-on-One</option>
                <option value="Panel" <?php echo $candidate_details['interview_mode'] == 'Panel' ? "selected" : "";?> >Panel</option>
                <option value="Group" <?php echo $candidate_details['interview_mode'] == 'Group' ? "selected" : "";?> >Group</option>
            </select>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_interview_mode'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="interview_location"><?php echo get_phrase('interview_location'); ?></label>
            <textarea class="form-control" id="interview_location" name="interview_location" rows="5" required><?php echo $candidate_details['interview_location']?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_interview_location'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="document_to_bring"><?php echo get_phrase('document_to_bring'); ?></label>
            <textarea class="form-control" id="document_to_bring" name="document_to_bring" rows="5" required><?php echo $candidate_details['document_to_bring']; ?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_document_to_bring'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="instruction_of_candidate"><?php echo get_phrase('Notes/Instructions_for_the_Candidate'); ?></label>
            <textarea class="form-control" id="instruction_of_candidate" name="instruction_of_candidate" rows="5"><?php echo $candidate_details['instruction_of_candidate']; ?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_instruction_of_candidate'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="interview_link"><?php echo get_phrase('interview_link'); ?></label>
            <input type="text" class="form-control" id="interview_link" name="interview_link" value="<?php echo $candidate_details['interview_link']?>">
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_interview_link'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="resume_file"><?php echo get_phrase('upload_resume'); ?></label>
            <input type="file" class="form-control" id="resume_file" name="resume_file">
        </div>

        <div class="form-group mb-1">
            <label for="image_file"><?php echo get_phrase('upload_profile_picture'); ?></label>
            <input type="file" class="form-control" id="image_file" name="image_file">
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" id="submitbtn" type="submit"><?php echo get_phrase('submit'); ?></button>
         
            <img id="loader" style="display:none; text-align:center;" src="<?php echo base_url('assets/backend/images/straight-loader.gif'); ?>" alt="Loading..." width="30px" height="30px"/>
           
        </div>
    </div>
</form>

<script>

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
$("#interview_date" ).daterangepicker();
</script>
