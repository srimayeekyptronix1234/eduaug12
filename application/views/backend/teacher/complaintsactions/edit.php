<?php $school_id = school_id(); ?>
<?php $complaint_data = $this->db->get_where('complaint', array('id' => $param1))->result_array(); ?>
<?php foreach($complaint_data as $complaint){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('complaintsactions/update/'.$param1); ?>">
    <div class="form-row">
          <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select2"  data-bs-toggle="select2" onchange="classWiseSection(this.value)" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php
                       $allclasses = $this->db->get_where('classes', array('school_id' => $school_id))->result_array();
                        foreach($allclasses as $class){
                    ?>
                        <option value="<?php echo $class['id']; ?>" <?php if($class['id'] == $complaint['class_id']){ echo 'selected'; } ?>><?php echo $class['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>

        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('section'); ?></label>
               <select name="section_id" id="sectionid" class="form-control select9" data-toggle = "select9" required >
                <option value=""><?php echo get_phrase('select_section'); ?></option>
                <?php
                       $allsections = $this->db->get_where('sections', array('class_id' => $complaint['class_id']))->result_array();
                        foreach($allsections as $sections){
                    ?>
                        <option value="<?php echo $sections['id']; ?>" <?php if($sections['id'] == $complaint['section_id']){ echo 'selected'; } ?>><?php echo $sections['name']; ?></option>
                    <?php } ?>
              </select>        
       </div>
        <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('student'); ?></label>
            <select name="student_id" id="studentid" class="form-control select4" data-bs-toggle="select4" required>
                <option value=""><?php echo get_phrase('select_a_student'); ?></option>
                    <?php
                        $allstudents = $this->db->get_where('users', array('id'=>$complaint['student_id'],'role'=>'student','school_id' => $school_id))->result_array();
                        foreach($allstudents as $student){
                    ?>
                        <option value="<?php echo $student['id']; ?>" <?php if($student['id'] == $complaint['student_id']){ echo 'selected'; } ?>><?php echo $student['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_student'); ?></small>
        </div>
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('class teacher'); ?></label>
          <select name="teacher_id" id="teacher_id" class="form-control select5" data-toggle = "select5" required>
            <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
            <?php $allteachers = $this->db->get_where('users', array('role'=>'teacher','school_id' => $school_id))->result_array(); ?>
            <?php foreach($allteachers as $teachers){ ?>
                <option value="<?php echo $teachers['id']; ?>" <?php if($teachers['id'] == $complaint['teacher_id']){ echo 'selected'; } ?>><?php echo $teachers['name']; ?></option>
            <?php } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_teacher'); ?></small>
      </div>
      <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('type'); ?></label>
       <select name="complaint_type" id="complaint_type" class="form-control select10" data-toggle = "select10"  required>
                <option value=""><?php echo get_phrase('select_a_type'); ?></option>
                <option value="1" <?php if($complaint['complaint_type'] == '1'){echo 'selected';}?>>Major</option>
                <option value="2" <?php if($complaint['complaint_type'] == '2'){echo 'selected';}?>>Minor</option>

       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_type'); ?></small>
    </div>
    
      <div class="form-group mb-1">
          <label for="name">Complaint By</label>
          <input type="text" class="form-control" id="complaint_by" name="complaint_by"  value="<?=$complaint['complaint_by']?>" required>
      </div>
      <div class="form-group mb-1">
          <label for="name">Complaint Date</label>
          <input type="date" class="form-control" id="complaint_date" name="complaint_date" value="<?=$complaint['complaint_date']?>" required>
      </div>
      <div class="form-group mb-1">
          <label for="name">Complaint Description</label>
          <textarea class="form-control" id="example-textarea" rows="5" name = "desc" required><?=$complaint['complaint_desc']?></textarea>
      </div>
      <div class="form-group mb-1">
          <label for="name">Status</label>
          <input type="radio" id="active" name="status" value="1" <?php if($complaint['status'] == '1'){ echo 'checked'; } ?>>Active
          <input type="radio" id="inactive" name="status" value="0" <?php if($complaint['status'] == '0'){ echo 'checked'; } ?>>Inactive

      </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_complaint'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showClassWiseStudent);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});
function classWiseSection(classId) {
    $.ajax({
        url: "<?php echo route('section/list/'); ?>"+classId,
        success: function(response){
            $('#sectionid').html(response);
            showClassWiseStudent(classId);
        }
    });
}
function showClassWiseStudent(classId) {
    $.ajax({
        url: "<?php echo route('show_class_wise_student/'); ?>"+classId,
        success: function(response){
            $('#studentid').html(response);
        }
    });
}

</script>
