<?php
if (isset($class_id) && isset($exam) && isset($subject_id) ):


  $school_id  = school_id();
  $check_data = $this->db->get_where('quiz', array('school_id' => $school_id,'class_id' => $class_id,'quarter_id' =>$exam,'subject_id'=>$subject_id))->result_array();
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Questions'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $school_id = school_id();
      $quiz_data = $this->db->get_where('quiz', array('school_id' => $school_id, 'class_id' => $class_id,'quarter_id' =>$exam,'subject_id'=>$subject_id))->result_array();
      foreach($quiz_data as $quiz){
        ?>
        <tr>
          <td><?php echo $quiz['questions']; ?></td>
          <td>

            <div class="dropdown text-center">
    					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
    					<div class="dropdown-menu dropdown-menu-end">
    						<!-- item-->
    						<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/quiz/edit/'.$quiz['id'])?>', '<?php echo get_phrase('update_Quiz'); ?>');"><?php echo get_phrase('edit'); ?></a>
    						<!-- item-->
    						<a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('quiz/delete/'.$quiz['id']); ?>', showAllQuiz)"><?php echo get_phrase('delete'); ?></a>
    					</div>
    				</div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
