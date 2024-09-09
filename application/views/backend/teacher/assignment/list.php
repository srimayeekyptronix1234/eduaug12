<?php
    $user_id = $this->session->userdata('user_id');
    $teacher_table_data=$this->db->get_where('teachers',['user_id'=>$user_id])->row_array();
    $school_id = school_id(); 
    $check_permission = has_permission($teacher_table_data['class_id'], $teacher_table_data['section_id'], 'assignment',$teacher_table_data['id']);

    if (!empty($class_id) && !empty($section_id) && !empty($subject_id)){
        $check_data = $this->db->get_where('assignment', array('class' => $class_id,'subject' =>$subject_id,'teacher_id'=>$teacher_table_data['id']))->result_array();

    }else{
        $check_data=$this->db->get_where('assignment',['teacher_id'=>$teacher_table_data['id']])->result_array();

    }
?>
<?php if ($check_permission): ?>

<?php if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Class'); ?></th>
        <th><?php echo get_phrase('section'); ?></th>
        <th><?php echo get_phrase('subject'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($check_data as $data){
         $class_data = $this->db->get_where('classes', array('id' => $data['class'],'school_id' => $school_id))->row_array();
         $subject_data = $this->db->get_where('subjects', array('id' => $data['subject'],'school_id' => $school_id))->row_array();
         $section_data =$this->db->get_where('sections', array('id' => $data['section']))->row_array();
       
        ?>
        <tr>
          <td><?=$class_data['name'];?></td>
          <td><?=$section_data['name']; ?></td>
          <td><?=$subject_data['name']; ?></td>

          <td>

            <div class="dropdown text-center">
              <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/assignment/edit/'.$data['id'])?>', '<?php echo get_phrase('update_assignment'); ?>');"><?php echo get_phrase('edit'); ?></a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('assignment/delete/'.$data['id']); ?>', showAllAssignment)"><?php echo get_phrase('delete'); ?></a>
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
  <div class="col-md-12 text-center">
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading"><?php echo get_phrase('access_denied'); ?>!</h4>
      <hr>
      <p class="mb-0"><?php echo get_phrase('sorry_you_are_not_permitted_to_access_this_view').'. <br/>'.get_phrase('admin_handles_it'); ?>.</p>
    </div>
  </div>
<?php endif; ?>
