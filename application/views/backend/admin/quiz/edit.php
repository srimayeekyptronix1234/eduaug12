<?php $school_id = school_id(); ?>
<?php $quiz_data = $this->db->get_where('quiz', array('id' => $param1))->result_array(); ?>
<?php foreach($quiz_data as $quiz){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('quiz/update/'.$param1); ?>">
    <div class="form-row">
          <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('exam'); ?></label>
            <select name="quarter_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
                <option value=""><?php echo get_phrase('select_a_exam'); ?></option>
                    <?php
                        $allexams = $this->db->get_where('exams', array('school_id' => $school_id))->result_array();
                        foreach($allexams as $exams){
                    ?>
                        <option value="<?php echo $exams['id']; ?>" <?php if($exams['id'] == $quiz['quarter_id']){ echo 'selected'; } ?>><?php echo $exams['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select3" data-bs-toggle="select3" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php
                        $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array();
                        foreach($classes as $class){
                    ?>
                        <option value="<?php echo $class['id']; ?>" <?php if($class['id'] == $quiz['class_id']){ echo 'selected'; } ?>><?php echo $class['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('subject'); ?></label>
            <select name="subject_id" id="class_id_on_create" class="form-control select4" data-bs-toggle="select4" required>
                <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                    <?php
                        $subjects = $this->db->get_where('subjects', array('school_id' => $school_id))->result_array();
                        foreach($subjects as $sub){
                    ?>
                        <option value="<?php echo $sub['id']; ?>" <?php if($sub['id'] == $quiz['subject_id']){ echo 'selected'; } ?>><?php echo $sub['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_subject'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="name"><?php echo get_phrase('Questions'); ?></label>
            <input type="text" class="form-control" id="questions" name="questions" value="<?php echo $quiz['questions']; ?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_questions'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="name"><?php echo get_phrase('Answers 1'); ?></label>
            <input type="text" class="form-control" id="answers1" name="answers1" value="<?php echo $quiz['answers1']; ?>" >
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_answers1'); ?></small>
            <div class="correctCls"><p><i>This is correct answer ?</i> <input type="radio" name="correct_answer" <?php echo $quiz['answers1'] == $quiz['correct_answer'] ? "checked" : ""; ?> value="1"></p></div>
        </div>
        <div class="form-group mb-1">
            <label for="name"><?php echo get_phrase('Answers 2'); ?></label>
            <input type="text" class="form-control" id="answers2" name="answers2" value="<?php echo $quiz['answers2']; ?>">
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_answers2'); ?></small>
            <div class="correctCls"><p>This is correct answer ? <input type="radio" name="correct_answer" <?php echo $quiz['answers2'] == $quiz['correct_answer'] ? "checked" : ""; ?> value="2"></p></div>
        </div>
         <div class="form-group mb-1">
            <label for="name"><?php echo get_phrase('Answers 3'); ?></label>
            <input type="text" class="form-control" id="answers3" name="answers3" value="<?php echo $quiz['answers3']; ?>">
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_answers3'); ?></small>
            <div class="correctCls"><p>This is correct answer ? <input type="radio" name="correct_answer" <?php echo $quiz['answers3'] == $quiz['correct_answer'] ? "checked" : ""; ?> value="3"></p></div>
        </div>
         <div class="form-group mb-1">
            <label for="name"><?php echo get_phrase('Answers 4'); ?></label>
            <input type="text" class="form-control" id="answers4" name="answers4" value="<?php echo $quiz['answers4']; ?>">
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_answers4'); ?></small>
            <div class="correctCls"><p><i>This is correct answer ?</i> <input type="radio" name="correct_answer" <?php echo $quiz['answers4'] == $quiz['correct_answer'] ? "checked" : ""; ?> value="4"></p></div>
        </div>

        
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_Quiz'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllQuiz);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});
</script>
