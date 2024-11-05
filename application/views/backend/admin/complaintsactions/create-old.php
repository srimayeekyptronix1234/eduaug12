<?php 
$school_id = school_id(); 
?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('complaintsactions/create'); ?>">
  <div class="form-row">

    <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
    <input type="hidden" name="session" value="<?php echo active_session();?>">
   
    <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('class'); ?></label>
     <select name="class_id" id="class_id" class="form-control select6" data-toggle = "select6" onchange="classWiseSection(this.value)" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($classes as $class){ ?>
                    <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                <?php } ?>
       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
    </div>
    <div class="form-group mb-1">
       <label for=""><?php echo get_phrase('section'); ?></label>
       <select name="section_id" id="sectionid" class="form-control select3" data-toggle = "select3" required >
                <option value=""><?php echo get_phrase('select_section'); ?></option>
        </select>        
    </div>
    <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('Student'); ?></label>
        <select name="student_id" id="studentid" class="form-control select4" data-toggle = "select4" required>
               <option value=""><?php echo get_phrase('select_student'); ?></option>
        </select>
    </div>
     <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('class teacher'); ?></label>
     <select name="teacher_id" id="teacher_id" class="form-control select5" data-toggle = "select5" required>
                <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
                <?php $allteachers = $this->db->get_where('users', array('role'=>'teacher','school_id' => $school_id))->result_array(); ?>
                <?php foreach($allteachers as $teachers){ ?>
                    <option value="<?php echo $teachers['id']; ?>"><?php echo $teachers['name']; ?></option>
                <?php } ?>
       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_teacher'); ?></small>
    </div>
    <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('type'); ?></label>
     <select name="complaint_type" id="complaint_type" class="form-control select10" data-toggle = "select10"  required>
                <option value=""><?php echo get_phrase('select_a_type'); ?></option>
                <option value="1">Major</option>
                <option value="2">Minor</option>

       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_type'); ?></small>
    </div>
    
    <div class="form-group mb-1">
      <label for="name">Complaint By</label>
      <input type="text" class="form-control" id="complaint_by" name="complaint_by" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Complaint Date</label>
      <input type="date" class="form-control" id="complaint_date" name="complaint_date" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Complaint Description</label>
      <textarea class="form-control" id="example-textarea" rows="5" name = "desc" placeholder="Complaint Description"></textarea>
   </div>
    <div class="form-group mb-1">
      <label for="name">Status</label>
      <input type="radio" id="active" name="status" value="1">Active
      <input type="radio" id="inactive" name="status" value="0">Inactive

   </div>
    
   
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_complaint'); ?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllComplaint);
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
