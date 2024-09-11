<?php 
$school_id = school_id(); 
?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('classroom_walkthrough/create'); ?>">
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
      <label for=""><?php echo get_phrase('classrooms'); ?></label>
     <select name="class_rooms_id" id="class_rooms" class="form-control select6" data-toggle = "select6"  required>
                <option value=""><?php echo get_phrase('select_a_class_rooms'); ?></option>
                <?php $classes = $this->db->get_where('class_rooms', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($classes as $class){ ?>
                    <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                <?php } ?>
       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class_rooms'); ?></small>
    </div>
    <div class="form-group mb-1">
       <label for=""><?php echo get_phrase('Observer Name'); ?></label>
       <input type="text" class="form-control" id="observer_name" name="observer_name" required>
    </div>
    <div class="form-group mb-1">
      <label for="date"><?php echo get_phrase('date'); ?></label>
      <input type="date" class="form-control date" id="date"  name="date" value="" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Time</label>
      <input type="time" class="form-control" id="time" name="time" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Grade Level</label>
      <input type="text" class="form-control" id="grade" name="grade">
    </div>
    
     <div class="form-group mb-1">
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
     <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('subject'); ?></label>
     <select name="subject_id" id="subject_id" class="form-control select7" data-toggle = "select7"  required>
                <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                <?php $subjects = $this->db->get_where('subjects', array('school_id' => $school_id))->result_array(); ?>
                <?php foreach($subjects as $sub){ ?>
                    <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                <?php } ?>
       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_subject'); ?></small>
    </div>
    <div class="form-group mb-1">
      <label for="name">Classroom Location</label>
      <input type="text" class="form-control" id="location" name="location">
    </div>
    <h4>Classroom Environment</h4>
      <div class="form-group mb-1">
        <label for="name"><h5>Classroom Layout</h5></label><br>
        <input type="checkbox" id="layout1" name="classroom_layout[]" value="Organized"> Organized <br>
        <input type="checkbox" id="layout2" name="classroom_layout[]" value="Disorganized"> Disorganized <br>
        <input type="checkbox" id="layout3" name="classroom_layout[]" value="Flexible seating"> Flexible seating <br>
        <input type="checkbox" id="layout4" name="classroom_layout[]" value="Traditional seating"> Traditional seating <br>
        <input type="checkbox" id="layout5" name="classroom_layout[]" value="Other"> Other
      </div>
      <div class="form-group mb-1">
        <label for="name"><h5>Student Engagement</h5></label><br>
        <input type="checkbox" id="student_engagement1" name="student_engagement[]" value="Highly engaged"> Highly engaged <br>
        <input type="checkbox" id="student_engagement2" name="student_engagement[]" value="Moderately engaged"> Moderately engaged <br>
        <input type="checkbox" id="student_engagement3" name="student_engagement[]" value="Disengaged"> Disengaged <br>
        <input type="checkbox" id="student_engagement4" name="student_engagement[]" value="Off-task behavior observed"> Off-task behavior observed 
      </div>
      <div class="form-group mb-1">
        <label for="name"><h5>Classroom Management</h5></label><br>
        <input type="checkbox" id="classroom_management1" name="classroom_management[]" value="Clear routines and procedures"> Clear routines and procedures <br>
        <input type="checkbox" id="classroom_management2" name="classroom_management[]" value="Effective transitions"> Effective transitions <br>
        <input type="checkbox" id="classroom_management3" name="classroom_management[]" value="Few behavior issues"> Few behavior issues <br>
        <input type="checkbox" id="classroom_management4" name="classroom_management[]" value="Frequent redirection needed"> Frequent redirection needed
      </div>
      <h4>Instructional Practices</h4>
        <div class="form-group mb-1">
        <label for="name"><h5>Lesson Objective</h5></label><br>
        <input type="checkbox" id="lesson_objective1" name="lesson_objective[]" value="Clearly stated"> Clearly stated <br>
        <input type="checkbox" id="lesson_objective2" name="lesson_objective[]" value="Implied"> Implied <br>
        <input type="checkbox" id="lesson_objective3" name="lesson_objective[]" value="Unclear/Not evident"> Unclear/Not evident 
      </div>
       <div class="form-group mb-1">
        <label for="name"><h5>Instructional Strategies</h5></label><br>
        <input type="checkbox" id="instructional_strategies1" name="instructional_strategies[]" value="Whole group instruction"> Whole group instruction <br>
        <input type="checkbox" id="instructional_strategies2" name="instructional_strategies[]" value="Small group instruction"> Small group instruction <br>
        <input type="checkbox" id="instructional_strategies3" name="instructional_strategies[]" value="Differentiated instruction"> Differentiated instruction <br>
        <input type="checkbox" id="instructional_strategies4" name="instructional_strategies[]" value="Student-led activities"> Student-led activities  <br>
        <input type="checkbox" id="instructional_strategies5" name="instructional_strategies[]" value="Technology integration"> Technology integration  <br>
        <input type="checkbox" id="instructional_strategies6" name="instructional_strategies[]" value="Other">Other
      </div>
      <div class="form-group mb-1">
        <label for="name"><h5>Questioning Techniques</h5></label><br>
        <input type="checkbox" id="questioning_techniques1" name="questioning_techniques[]" value="Higher-order questioning"> Higher-order questioning <br>
        <input type="checkbox" id="questioning_techniques2" name="questioning_techniques[]" value="Effective transitions"> Effective transitions <br>
        <input type="checkbox" id="questioning_techniques3" name="questioning_techniques[]" value="Few behavior issues"> Few behavior issues <br>
        <input type="checkbox" id="questioning_techniques4" name="questioning_techniques[]" value="Frequent redirection needed"> Frequent redirection needed
      </div>
      <div class="form-group mb-1">
        <label for="name"><h5>Use of Resources</h5></label><br>
        <input type="checkbox" id="use_resources1" name="use_resources[]" value="Effective use of textbooks/materials"> Effective use of textbooks/materials <br>
        <input type="checkbox" id="use_resources2" name="use_resources[]" value="Use of visual aids"> Use of visual aids <br>
        <input type="checkbox" id="use_resources3" name="use_resources[]" value="Use of digital resources"> Use of digital resources <br>
        <input type="checkbox" id="use_resources4" name="use_resources[]" value="Other"> Other
      </div>
      <h4>Student Learning</h4>
      <div class="form-group mb-1">
        <label for="name"><h5>Student Understanding</h5></label><br>
        <input type="checkbox" id="student_understanding1" name="student_understanding[]" value="Majority of students understand the content"> Majority of students understand the content <br>
        <input type="checkbox" id="student_understanding2" name="student_understanding[]" value="Some students struggle with the content"> Some students struggle with the content <br>
        <input type="checkbox" id="student_understanding3" name="student_understanding[]" value="Majority of students struggle with the content"> Majority of students struggle with the content <br>
      </div>
       <div class="form-group mb-1">
        <label for="name"><h5>Student Work</h5></label><br>
        <input type="checkbox" id="student_work1" name="student_work[]" value="Evidence of student work displayed"> Evidence of student work displayed <br>
        <input type="checkbox" id="student_work2" name="student_work[]" value="Student work aligns with lesson objective"> Student work aligns with lesson objective <br>
        <input type="checkbox" id="student_work3" name="student_work[]" value="Student work shows understanding"> Student work shows understanding <br>
        <input type="checkbox" id="student_work4" name="student_work[]" value="Student work shows need for re-teaching"> Student work shows need for re-teaching 

      </div>
      <div class="form-group mb-1">
        <label for="name"><h5>Differentiation</h5></label><br>
        <input type="checkbox" id="differentiation1" name="differentiation[]" value="Differentiated activities for different learning levels"> Differentiated activities for different learning levels <br>
        <input type="checkbox" id="differentiation2" name="differentiation[]" value="Grouping by ability"> Grouping by ability <br>
        <input type="checkbox" id="differentiation3" name="differentiation[]" value="Individualized instruction"> Individualized instruction <br>
        <input type="checkbox" id="differentiation4" name="differentiation[]" value="No evidence of differentiation"> No evidence of differentiation

      </div>



    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_classroom_walkthrough'); ?></button>
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
  ajaxSubmit(e, form, showAllClassroomWalkthrough);
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
