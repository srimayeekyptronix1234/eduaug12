<?php
$user_id = $this->session->userdata('user_id');
$teacher_table_data=$this->db->get_where('teachers',['user_id'=>$user_id])->row_array();
?>

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-format-list-numbered title_icon"></i> <?php echo get_phrase('behaviour_marks'); ?>
        </h4>
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
                        <?php 
                        $school_id = school_id();
                        $exams = $this->db->get_where('exams', array('school_id' => $school_id, 'session' => active_session()))->result_array();
                        foreach($exams as $exam){ ?>
                            <option value="<?php echo $exam['id']; ?>"><?php echo $exam['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSectionTeacherLogin(this.value,'<?=$teacher_table_data['section_id']?>')">
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php
                        $classes = $this->db->get_where('classes', array('id'=>$teacher_table_data['class_id'],'school_id' => school_id()))->result_array();
                        foreach($classes as $class){
                            ?>
                            <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?php echo get_phrase('select_section'); ?></option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?php echo get_phrase('select_subject'); ?></option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_behaviour_marks()" ><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body behaviours_content">
                <div class="empty_box text-center">
                    <img class="mb-3" width="150px" src="<?php echo base_url('assets/backend/images/empty_box.png'); ?>" />
                    <br>
                    <span class=""><?php echo get_phrase('no_data_found'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('document').ready(function(){
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); });
});

function classWiseSectionTeacherLogin(classId,sectionId) {
  $.ajax({
    url: "<?php echo route('section/list/'); ?>"+classId+'/'+sectionId,
    success: function(response){
      $('#section_id').html(response);
      classWiseSubject(classId);

    }
  });
}

function classWiseSubject(classId) {
    $.ajax({
        url: "<?php echo route('class_wise_subject/'); ?>"+classId,
        success: function(response){
            $('#subject_id').html(response);
        }
    });
}

function filter_behaviour_marks(){
    var exam_id = $('#exam_id').val();
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    var subject_id = $('#subject_id').val();
    if(exam_id != "" && class_id != "" && section_id != "" && subject_id != ""){
        $.ajax({
            type: 'POST',
            url: '<?php echo route('behaviours/list') ?>',
            data: {exam_id: exam_id, class_id: class_id, section_id: section_id, subject_id: subject_id},
            success: function(response){
                $('.behaviours_content').html(response);
            }
        });
    }else{
        toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
    }
}
</script>
