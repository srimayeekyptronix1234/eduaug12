<form method="POST" class="d-block ajaxForm" action="<?php echo route('quiz/create'); ?>">
  <div class="form-row">

    <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
    <input type="hidden" name="session" value="<?php echo active_session();?>">
    <div class="form-group mb-1">
      <label for="class_id_on_create"><?php echo get_phrase('Exam'); ?></label>
      <select name="quarter_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
        <option value=""><?php echo get_phrase('select_a_exam'); ?></option>
        <?php
        $quarters = $this->db->get_where('exams', array('school_id' => school_id()))->result_array();
        foreach($quarters as $quarter){
          ?>
          <option value="<?php echo $quarter['id']; ?>"><?php echo $quarter['name']; ?></option>
        <?php } ?>
      </select>
      <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_exam'); ?></small>
    </div>

    <div class="form-group mb-1">
      <label for="class_id_on_create"><?php echo get_phrase('class'); ?></label>
      <select name="class_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
        <?php
        $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
        foreach($classes as $class){
          ?>
          <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
        <?php } ?>
      </select>
      <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
    </div>
    <div class="form-group mb-1">
      <label for="sub_id_on_create"><?php echo get_phrase('subject'); ?></label>
      <select name="subject_id" id="sub_id_on_create" class="form-control select3" data-bs-toggle="select3" required>
        <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
        <?php
        $all_subjects = $this->db->get_where('subjects', array('school_id' => school_id()))->result_array();
        foreach($all_subjects as $sub){
          ?>
          <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
        <?php } ?>
      </select>
      <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_subject'); ?></small>
    </div>

    <div class="form-group mb-1">
      <label for="class_id_on_create">Questions</label>
      <input type="text" class="form-control" id="questions" name="questions" required>
    </div>

    <div class="form-group mb-1">
      <label for="name">Answers 1</label>
      <input type="text" class="form-control" id="answers1" name="answers1" required>
     <div class="correctCls"><p>This is correct answer ? <input type="radio" name="correct_answer" value="1"></p></div>
    </div>
    <div class="form-group mb-1">
      <label for="name">Answers 2</label>
      <input type="text" class="form-control" id="answers2" name="answers2" >
      <div class="correctCls"><p>This is correct answer ? <input type="radio" name="correct_answer" value="2"></p></div>
    </div>
   <div class="form-group mb-1">
      <label for="name">Answers 3</label>
      <input type="text" class="form-control" id="answers3" name="answers3" >
      <div class="correctCls"><p>This is correct answer ? <input type="radio" name="correct_answer" value="3"></p></div>
    </div>
    <div class="form-group mb-1">
      <label for="name">Answers 4</label>
      <input type="text" class="form-control" id="answers4" name="answers4" >
      <div class="correctCls"><p>This is correct answer ? <input type="radio" name="correct_answer" value="4"></p></div>
    </div>

    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_quiz'); ?></button>
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
  ajaxSubmit(e, form, showAllQuiz);
});
</script>
