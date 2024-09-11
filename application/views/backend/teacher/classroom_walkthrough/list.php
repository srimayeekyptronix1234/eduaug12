<style>
  .filbtn:hover {
    background: #0272f3;
    color: #fff;
  }
</style>

<?php
$user_id = $this->session->userdata('user_id');
if (!empty($class_id) && !empty($classroom_id)) {
  $check_data = $this->db->get_where('classroom_walkthrough', array('class_id' =>$class_id,'class_rooms_id' => $classroom_id,'teacher_id' =>$user_id))->result_array();

} else {
  $check_data = $this->db->get_where('classroom_walkthrough',['teacher_id'=>$user_id])->result_array();
}

if (count($check_data) > 0): ?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #0272F3; color: #fff;">
        <th><?php echo get_phrase('class'); ?></th>
        <th><?php echo get_phrase('classroom'); ?></th>
        <th><?php echo get_phrase('observer_name'); ?></th>
        <th><?php echo get_phrase('Teacher'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($check_data as $data) {
        $class_room_data = $this->db->get_where('class_rooms', array('id' => $data['class_rooms_id']))->row_array();
        $teacher_data = $this->db->get_where('users', array('id' => $data['teacher_id'], 'role' => 'teacher'))->row_array();
        $class_data=$this->db->get_where('classes',['id'=>$data['class_id']])->row_array();
        $section_data=$this->db->get_where('sections',['id'=>$data['section_id']])->row_array();
        ?>
        <tr>
          <td><?=$class_data['name'] .'('.$section_data['name'].')';?></td>
          <td><?=$class_room_data['name']; ?></td>
          <td><?php echo $data['observer_name']; ?></td>
          <td><?php echo $teacher_data['name']; ?></td>
          <td>

            <div class="dropdown text-center">
              <button type="button"
                class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop filbtn"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:void(0);" class="dropdown-item"
                  onclick="previewModal('<?php echo site_url('modal/popup/classroom_walkthrough/view/' . $data['id']) ?>', '<?php echo get_phrase('classroom_walkthrough'); ?>');"><?php echo get_phrase('view'); ?></a>

              </div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>