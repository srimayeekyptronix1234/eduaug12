<?php
     $student_lists = $this->user_model->get_student_homework_marks_list_of_logged_in_parent()
?>
<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-format-list-numbered title_icon"></i> <?php echo get_phrase('manage_homework_marks'); ?>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              
              <?php if (count($student_lists) > 0): ?>
        <table class="table table-bordered table-responsive-sm" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th><?php echo get_phrase('subject_name'); ?></td>
                    <th><?php echo get_phrase('exam'); ?></td>
                    <th><?php echo get_phrase('mark'); ?></td>
                    <th><?php echo get_phrase('grade_point'); ?></td>
                    <th><?php echo get_phrase('comment'); ?></td>
                </tr>
            </thead>
            <tbody>
               <?php foreach($student_lists as $mark):
                $subject = $this->db->get_where('subjects', array('id' => $mark['subject_id'],'class_id'=>$mark['class_id'],'school_id'=>$school_id))->row_array();
                 $exam_details = $this->db->get_where('exams',['id'=>$mark['exam_id']])->row_array();
                ?>
                    <tr>
                        <td><?=$subject['name'];?></td>
                        <td><?=$exam_details['name'];?></td>
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
     
            </div>
        </div>
    </div>
</div>

