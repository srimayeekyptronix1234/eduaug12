<form method="POST" class="d-block ajaxForm" action="<?php echo route('syllabus/semester_plan_create'); ?>" enctype="multipart/form-data">
    <div class="form-row">
        <?php $school_id = school_id(); ?>
        <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
        <input type="hidden" name="session_id" value="<?php echo active_session(); ?>">
        <div class="form-group col-md-12 mb-2">
          <label for="class_id_on_create"><?php echo get_phrase('quarter'); ?></label>
          <select name="quarter_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_quarter'); ?></option>
            <?php
            $quarters = $this->db->get_where('exams', array('school_id' => school_id()))->result_array();
            foreach($quarters as $quarter){
              ?>
              <option value="<?php echo $quarter['id']; ?>"><?php echo $quarter['name']; ?></option>
            <?php } ?>
          </select>
          <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_quarter'); ?></small>
        </div>
        
        <div class="form-group col-md-12 mb-2">
            <label for="class_id_on_create"><?php echo get_phrase('class'); ?></label>
            <select class="form-control select2" data-toggle = "select2" id="class_id_on_create" name="class_id" onchange="classWiseSectionOnCreate(this.value)" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($classes as $class): ?>
                    <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>

        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="section_id_on_create"><?php echo get_phrase('section'); ?></label>
            <select class="form-control select2" data-toggle = "select2" id="section_id_on_create" name="section_id" required>
                <option><?php echo get_phrase('select_a_section'); ?></option>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_section'); ?></small>

        </div>
        <div class="form-group col-md-12 mb-2">
            <label for="subject_id_on_create"><?php echo get_phrase('subject'); ?></label>
            <select class="form-control select2" data-toggle = "select2" id="subject_id_on_create" name="subject_id" requied>
                <option><?php echo get_phrase('select_a_subject'); ?></option>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_subject'); ?></small>

        </div>
       
        <div class="form-group col-md-12 mb-2">
              <label for=""><?php echo get_phrase('teacher'); ?></label>
              <select name="teacher_id" id="teacher_id" class="form-control select5" data-toggle = "select5" required>
                <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
                <?php $allteachers = $this->db->get_where('users', array('role'=>'teacher','school_id' => $school_id))->result_array(); ?>
                <?php foreach($allteachers as $teachers){ ?>
                    <option value="<?php echo $teachers['id']; ?>"><?php echo $teachers['name']; ?></option>
                <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_teacher'); ?></small>
        </div>
        <div class="form-group col-md-12 mb-2">
          <label for="class_id_on_create"><?php echo get_phrase('semester'); ?></label>
          <select name="semester_id" id="semester_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_semester'); ?></option>
            <?php
            $semesters = $this->db->get_where('semester', array('school_id' => school_id()))->result_array();
            foreach($semesters as $semester){
              ?>
              <option value="<?php echo $semester['id']; ?>"><?php echo $semester['name']; ?></option>
            <?php } ?>
          </select>
          <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_semester'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="week"><?php echo get_phrase('week'); ?></label>
            <input type="text" class="form-control week" id="week"  name="week"  required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('week'); ?></small>
        </div>
       <div class="form-group mb-1">
            <label for="date"><?php echo get_phrase('date'); ?></label>
            <input type="text" class="form-control date" id="date" data-bs-toggle="date-picker" data-single-date-picker="true" name="date" value="<?php echo date('d/m/Y'); ?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('date'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="content"><?php echo get_phrase('Content'); ?></label>
            <input type="text" class="form-control content" id="content" name = "content" required>
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
              <option value="<?php echo $event['id']; ?>"><?php echo $event['title']; ?></option>
            <?php } ?>
          </select>
          <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_events'); ?></small>
        </div>
        
        <div class="form-group mb-1">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_semester_plan'); ?></button>
        </div>
    </div>
</form>

<script>
$(".ajaxForm").validate({}); // jQuery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllSyllabuses);
});

$(document).ready(function(){
    $('select.select2:not(.normal)').each(function () {
        $(this).select2({ dropdownParent: '#right-modal' });
    });
});

function classWiseSectionOnCreate(classId) {
    $.ajax({
        url: "<?php echo route('section/list/'); ?>" + classId,
        success: function(response) {
            $('#section_id_on_create').html(response);
            classWiseSubjectOnCreate(classId);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching sections:', error);
        }
    });
}

function classWiseSubjectOnCreate(classId) {
    $.ajax({
        url: "<?php echo route('class_wise_subject/'); ?>" + classId,
        success: function(response) {
            $('#subject_id_on_create').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching subjects:', error);
        }
    });
}

initCustomFileUploader();
</script>