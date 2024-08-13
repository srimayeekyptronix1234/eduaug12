<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-comment title_icon"></i> <?php echo get_phrase('complaint / actions'); ?>
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/complaintsactions/create'); ?>', '<?php echo get_phrase('create_Complaints'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_complaint'); ?></button>
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
                        $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
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
                    <select name="student_id" id="student_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?php echo get_phrase('select_student'); ?></option>
                    </select>
                </div>
                
                 <div class="col-md-2 mb-1">
                    <select name="teacher" id="teacher_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
                        <?php
                        $allteachers = $this->db->get_where('users', array('role'=>'teacher','school_id' => school_id()))->result_array();
                        foreach($allteachers as $teachers){
                            ?>
                            <option value="<?php echo $teachers['id']; ?>"><?php echo $teachers['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
               
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_complaint_class()" ><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body complaint_content">
                <?php include 'list.php'; ?>
            
           </div>
</div>
</div>
</div>

<script>
function filter_complaint_class(){
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    var student_id = $('#student_id').val();
    var teacher_id =$('#teacher_id').val();
    if(class_id != ""){
        showAllComplaint();
    }
    
}

var showAllComplaint = function () {
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    var student_id = $('#student_id').val();
    var teacher_id =$('#teacher_id').val();
   
    if(class_id != "" && section_id != "" && student_id != "" && teacher_id != ""){
        $.ajax({
            url: '<?php echo route('complaintsactions/list/') ?>'+class_id+'/'+section_id+'/'+student_id+'/'+teacher_id,
            success: function(response){
                $('.complaint_content').html(response);
            }
        });
    }else{
         $.ajax({
            url: '<?php echo route('complaintsactions/list/') ?>',
            success: function(response){
                $('.complaint_content').html(response);
            }
        }); 
    }
}
function classWiseSection(classId) {
    $.ajax({
        url: "<?php echo route('section/list/'); ?>"+classId,
        success: function(response){
            $('#section_id').html(response);
            showClassWiseStudent(classId);
        }
    });
}
function showClassWiseStudent(classId) {
    $.ajax({
        url: "<?php echo route('show_class_wise_student/'); ?>"+classId,
        success: function(response){
            $('#student_id').html(response);
        }
    });
}

</script>
