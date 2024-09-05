<?php
$school_id = school_id(); 
$user_id = $this->session->userdata('user_id');
$teacher_table_data=$this->db->get_where('teachers',['user_id'=>$user_id])->row_array();
?>

<form method="POST" class="d-block ajaxForm" action="<?php echo route('assignment/create'); ?>">
  <div class="form-row">

    <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
    <input type="hidden" name="session" value="<?php echo active_session();?>">
    <input type="hidden" name="teacher_id" value="<?=$teacher_table_data['id'];?>">
    <div class="form-group mb-1">
      <label for="date"><?php echo get_phrase('date'); ?></label>
      <input type="text" class="form-control date" id="date" data-bs-toggle="date-picker" data-single-date-picker="true" name="date" value="" required>
    </div>
   
    <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('class'); ?></label>
      <select name="class" id="class_id" class="form-control select2" data-toggle="select2" required
      onchange="classWiseSection(this.value)">
      <option value=""><?php echo get_phrase('select_a_class'); ?></option>
      <?php
      $classes = $this->db->get_where('classes', array('id'=>$teacher_table_data['class_id'],'school_id' => school_id()))->result_array();
      foreach ($classes as $class) {
        ?>
        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
      <?php } ?>
    </select>
  </div>
    <div class="form-group mb-1">
       <label for=""><?php echo get_phrase('section'); ?></label>
       <select name="section" id="sectionid" class="form-control select2" data-toggle = "select2" required>
        <option value=""><?php echo get_phrase('select_section'); ?></option>
      </select>
    </div>
    <div class="form-group mb-1">
      <label for="subject"><?php echo get_phrase('subject'); ?></label>
      <select name="subject" id="subject_id" class="form-control select2" data-toggle = "select2" required onchange="">
        <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
        <?php
        $subjects = $this->db->get_where('subjects', array('class_id'=>$teacher_table_data['class_id'],'school_id' => school_id()))->result_array();
        foreach($subjects as $sub){
          ?>
          <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
        <?php } ?>
      </select>

    </div>
    <div class="form-group mb-1">
      <label for="name">Lesson</label>
      <textarea class="form-control" id="example-textarea" rows="5" name = "lesson" placeholder="Lesson" required></textarea>
   </div>
   
    <div class="form-group mb-1">
      <label for="name">Remark</label>
      <input type="text" class="form-control" id="remark" name="remark" required>
    </div>
   
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_assignment'); ?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); 
  $('#date').daterangepicker();

});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllAssignment);
});
function classWiseSection(classId) {
  $.ajax({
    url: "<?php echo route('section/list/'); ?>" + classId,
    success: function (response) {
      $('#sectionid').html(response);
    }
  });
}


</script>
