<?php $school_id = school_id(); ?>
<?php $semester_plan_data = $this->db->get_where('semester_plan', array('id' => $param1))->result_array(); ?>
<?php foreach($semester_plan_data as $semester){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('syllabus/update_semester_plan/'.$param1); ?>">
    <div class="form-row">
         <div class="form-group mb-1">
          <label for="class_id_on_create"><?php echo get_phrase('quarter'); ?></label>
          <select name="quarter_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_quarter'); ?></option>
            <?php
            $quarters = $this->db->get_where('exams', array('school_id' => school_id()))->result_array();
            foreach($quarters as $quarter){
              ?>
              <option value="<?php echo $quarter['id']; ?>" <?php if($quarter['id'] == $semester['quarter_id']){echo 'selected';}?>><?php echo $quarter['name']; ?></option>
            <?php } ?>
          </select>
          <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_quarter'); ?></small>
        </div>
        
          <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select2"  data-bs-toggle="select2" onchange="classWiseSection(this.value)" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php
                       $allclasses = $this->db->get_where('classes', array('school_id' => $school_id))->result_array();
                        foreach($allclasses as $class){
                    ?>
                        <option value="<?php echo $class['id']; ?>" <?php if($class['id'] == $semester['class_id']){ echo 'selected'; } ?>><?php echo $class['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>

        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('section'); ?></label>
               <select name="section_id" id="sectionid" class="form-control select9" data-toggle = "select9" required >
                <option value=""><?php echo get_phrase('select_section'); ?></option>
                <?php
                       $allsections = $this->db->get_where('sections', array('class_id' => $semester['class_id']))->result_array();
                        foreach($allsections as $sections){
                    ?>
                        <option value="<?php echo $sections['id']; ?>" <?php if($sections['id'] == $semester['section_id']){ echo 'selected'; } ?>><?php echo $sections['name']; ?></option>
                    <?php } ?>
              </select>        
       </div>
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('subject'); ?></label>
               <select name="subject_id" id="subject_id" class="form-control select7" data-toggle = "select7"  required>
                <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                <?php $subjects = $this->db->get_where('subjects', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($subjects as $sub){ ?>
                    <option value="<?php echo $sub['id']; ?>"<?php if($sub['id'] ==$semester['subject_id']){echo 'selected';}?>><?php echo $sub['name']; ?></option>
                <?php } ?>
               </select>

       </div>
       
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('teacher'); ?></label>
          <select name="teacher_id" id="teacher_id" class="form-control select5" data-toggle = "select5" required>
            <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
            <?php $allteachers = $this->db->get_where('users', array('role'=>'teacher','school_id' => $school_id))->result_array(); ?>
            <?php foreach($allteachers as $teachers){ ?>
                <option value="<?php echo $teachers['id']; ?>" <?php if($teachers['id'] == $semester['teacher_id']){ echo 'selected'; } ?>><?php echo $teachers['name']; ?></option>
            <?php } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_teacher'); ?></small>
      </div>
       <div class="form-group col-md-12 mb-2">
          <label for="class_id_on_create"><?php echo get_phrase('semester'); ?></label>
          <select name="semester_id" id="semester_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_semester'); ?></option>
            <?php
            $allsemesters = $this->db->get_where('semester', array('school_id' => school_id()))->result_array();
            foreach($allsemesters as $sem){
              ?>
              <option value="<?php echo $sem['id']; ?>" <?php if($sem['id'] == $semester['semester_id']){ echo 'selected';}?>><?php echo $sem['name']; ?></option>
            <?php } ?>
          </select>
          <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_semester'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="week"><?php echo get_phrase('week'); ?></label>
            <input type="text" class="form-control week" id="week"  name="week"  value="<?=$semester['week'];?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('week'); ?></small>
        </div>
       <div class="form-group mb-1">
            <label for="date"><?php echo get_phrase('date'); ?></label>
            <input type="text" class="form-control date" id="date" data-bs-toggle="date-picker" data-single-date-picker="true" name="date" value="<?php echo $semester['date']; ?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('date'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="content"><?php echo get_phrase('Content'); ?></label>
            <input type="text" class="form-control content" id="content" name = "content" value="<?=$semester['content']?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('content'); ?></small>
        </div>
        <div class="form-group col-md-12 mb-2">
          <label for="events_id_on_create"><?php echo get_phrase('Events'); ?></label>
          <select name="events_id" id="events_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_events'); ?></option>
            <?php
            $event_calendars = $this->db->get_where('event_calendars', array('school_id' => school_id()))->result_array();
            foreach($event_calendars as $event){
              ?>
              <option value="<?php echo $event['id']; ?>" <?php if($event['id'] == $semester['events_id']){ echo 'selected';}?>><?php echo $event['title']; ?></option>
            <?php } ?>
          </select>
          <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_events'); ?></small>
        </div>
        
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_semester_plan'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllSyllabuses);
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
