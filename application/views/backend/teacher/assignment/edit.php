<?php 
$school_id = school_id(); 
$user_id = $this->session->userdata('user_id');
$teacher_table_data=$this->db->get_where('teachers',['user_id'=>$user_id])->row_array();

?>
<?php $assignment_data = $this->db->get_where('assignment', array('id' => $param1))->result_array(); ?>
<?php foreach($assignment_data as $assignment){?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('assignment/update/'.$param1); ?>">
    <div class="form-row">
          <div class="form-group mb-1">
             <label for=""><?php echo get_phrase('class'); ?></label>
               <select name="class" id="cid" class="form-control select10" data-toggle="select10" required
               onchange="classWiseSection(this.value)">
               <option value=""><?php echo get_phrase('select_a_class'); ?></option>
               <?php
               $classes = $this->db->get_where('classes', array('id'=>$teacher_table_data['class_id'],'school_id' => school_id()))->result_array();
               foreach ($classes as $class) {
                ?>
                <option value="<?php echo $class['id']; ?>" <?php if($class['id'] == $assignment['class']){ echo 'selected'; } ?>><?php echo $class['name']; ?></option>
              <?php } ?>
            </select>

            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>

        </div>

        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('section'); ?></label>
               <select name="section" id="sectionid" class="form-control select9" data-toggle = "select9" required >
                <option value=""><?php echo get_phrase('select_section'); ?></option>
                <?php
                       $allsections = $this->db->get_where('sections', array('id' => $assignment['section']))->result_array();
                        foreach($allsections as $sections){
                    ?>
                        <option value="<?php echo $sections['id']; ?>" <?php if($sections['id'] == $assignment['section']){ echo 'selected'; } ?>><?php echo $sections['name']; ?></option>
                    <?php } ?>
              </select>        
       </div>
       <div class="form-group mb-1">
        <label for="subject"><?php echo get_phrase('subject'); ?></label>
        <select name="subject" id="sid" class="form-control select4" data-toggle = "select4" required>
          <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
          <?php
          $subjects = $this->db->get_where('subjects', array('class_id'=>$teacher_table_data['class_id'],'school_id' => school_id()))->result_array();
          foreach($subjects as $sub){
            ?>
            <option value="<?php echo $sub['id']; ?>" <?php if($sub['id'] == $assignment['subject']){echo 'selected';}?>><?php echo $sub['name']; ?></option>
          <?php } ?>
        </select>

      </div>
      <div class="form-group mb-1">
        <label for="name">Lesson</label>
        <textarea class="form-control" id="example-textarea" rows="5" name = "lesson" placeholder="Lesson"><?=$assignment['lesson'];?></textarea>
      </div>

      <div class="form-group mb-1">
        <label for="name">Remark</label>
        <input type="text" class="form-control" id="remark" name="remark" value="<?=$assignment['remark'];?>">
      </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('assignment'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllAssignment);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});
function classWiseSection(classId) {
    $.ajax({
        url: "<?php echo route('section/list/'); ?>"+classId,
        success: function(response){
            $('#sectionid').html(response);
        }
    });
}

</script>
