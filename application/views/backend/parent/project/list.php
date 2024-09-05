<div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4 toll-free-box text-center text-white pb-2" style="background-color: #6c757d; border-radius: 10px;">
        <h4><?php echo get_phrase('manage_marks'); ?></h4>
        <span><?php echo get_phrase('class'); ?> : <?php echo $this->db->get_where('classes', array('id' => $class_id))->row('name'); ?></span><br>
        <span><?php echo get_phrase('section'); ?> : <?php echo $this->db->get_where('sections', array('id' => $section_id))->row('name'); ?></span><br>
        <span><?php echo get_phrase('subject'); ?> : <?php echo $this->db->get_where('subjects', array('id' => $subject_id))->row('name'); ?></span>
    </div>
</div>
<?php
$school_id = school_id();
$marks = $this->crud_model->get_student_project_marks_parent_login($exam_id, $class_id, $section_id, $subject_id);

?>
<?php if (count($marks) > 0): ?>
    <table class="table table-bordered table-responsive-sm" width="100%">
        <thead class="thead-dark">
            <tr>
                <th><?php echo get_phrase('student_name'); ?></td>
                <th><?php echo get_phrase('mark'); ?></td>
                <th><?php echo get_phrase('grade_point'); ?></td>
                <th><?php echo get_phrase('comment'); ?></td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($marks as $mark):
        ?>
                <tr>
                    <td><?php echo $this->user_model->get_user_details($mark['user_id'], 'name'); ?></td>
                    <td><?php echo $mark['mark_obtained']; ?></td>
                    <td><span id="grade-for-mark-<?php echo $mark['student_id']; ?>"><?php echo get_grade($mark['mark_obtained']); ?></span></td>
                    <td><?php echo $mark['comment']; ?></td>

                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>

<script>
  
function get_grade(exam_mark, id){
    $.ajax({
        url : '<?php echo base_url('admin/get_grade'); ?>/'+exam_mark, 
        success : function(response){
            $('#grade-for-'+id).text(response);
        }
    });
}
</script>

