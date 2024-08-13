<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?php echo get_phrase('quiz'); ?>
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/quiz/create'); ?>', '<?php echo get_phrase('create_quiz'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_quiz'); ?></button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-1 mb-1"></div>
                <div class="col-md-2 mb-1">
                    <select name="exam" id="exam_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?php echo get_phrase('select_a_exam'); ?></option>
                        <?php $school_id = school_id();
                        $exams = $this->db->get_where('exams', array('school_id' => $school_id, 'session' => active_session()))->result_array();
                        foreach($exams as $exam){ ?>
                            <option value="<?php echo $exam['id']; ?>"><?php echo $exam['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php
                        $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
                        foreach($classes as $class){
                            ?>
                            <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                 <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                        <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                        <?php
                        $subjects = $this->db->get_where('subjects', array('school_id' => school_id()))->result_array();
                        foreach($subjects as $sub){
                            ?>
                            <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
               
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_class()" ><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body quiz_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
function filter_class(){
    var class_id = $('#class_id').val();
    var exam = $('#exam_id').val();
    var subject_id = $('#subject_id').val();

    if(class_id != ""){
        showAllQuiz();
    }
    
}

var showAllQuiz = function () {
    var exam = $('#exam_id').val();
    var class_id = $('#class_id').val();
    var subject_id = $('#subject_id').val();

    if(class_id != "" && exam != "" && subject_id != ""){
        $.ajax({
            url: '<?php echo route('quiz/list/') ?>'+class_id+'/'+exam+'/'+subject_id,
            success: function(response){
                $('.quiz_content').html(response);
            }
        });
    }
}
</script>
