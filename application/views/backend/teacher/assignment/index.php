<?php
$user_id = $this->session->userdata('user_id');
$teacher_table_data=$this->db->get_where('teachers',['user_id'=>$user_id])->row_array();
$teacher_permission=$this->db->get_where('teacher_permissions',['teacher_id'=>$teacher_table_data['id']])->row_array();
?>

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-book-open-page-variant title_icon"></i> <?php echo get_phrase('assignment'); ?>
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/assignment/create'); ?>', '<?php echo get_phrase('create_assignment'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_assignment'); ?></button>
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
                    <select name="class" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
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
                    <select name="section" id="section_id" class="form-control select8" data-toggle = "select8" required>
                        <option value=""><?php echo get_phrase('select_section'); ?></option>
                    </select>
                </div>
               
                 <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                        <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                        <?php
                        $subjects = $this->db->get_where('subjects', array('class_id'=>$teacher_table_data['class_id'],'school_id' => school_id()))->result_array();
                        foreach($subjects as $sub){
                            ?>
                            <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
               
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_assignment()" ><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body assignment_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>
<script>
function filter_assignment(){
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    var subject_id = $('#subject_id').val();

    if(class_id != ""){
        showAllAssignment();
    }
    
}
function classWiseSection(classId) {
  $.ajax({
    url: "<?php echo route('section/list/'); ?>" + classId,
    success: function (response) {
      $('#section_id').html(response);
      showClassWiseStudent(classId);
    }
  });
}

var showAllAssignment = function () {
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    var subject_id = $('#subject_id').val();
   
    if(class_id != "" && section_id != "" && subject_id != ""){
        $.ajax({
            url: '<?php echo route('assignment/list/') ?>'+class_id+'/'+section_id+'/'+subject_id,
            success: function(response){
                $('.assignment_content').html(response);
            }
        });
    }else{
         $.ajax({
            url: '<?php echo route('assignment/list/') ?>',
            success: function(response){
                $('.assignment_content').html(response);
            }
        }); 
    }

}

</script>
