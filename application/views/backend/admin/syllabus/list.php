<style>
  .filbtn:hover {
    background: #0272f3;
    color: #fff;
  }
</style>

<?php
if (!empty($class_id) && !empty($section_id)) {
  $check_data = $this->db->get_where('semester_plan', array('class_id' => $class_id, 'section_id' => $section_id))->result_array();

} else {
  $check_data = $this->crud_model->get_semester_plan_data();
}
if (count($check_data) > 0): ?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #0272F3; color: #fff;">
        <th><?php echo get_phrase('quarter'); ?></th>
        <th><?php echo get_phrase('Class'); ?></th>
        <th><?php echo get_phrase('semester'); ?></th>
        <th><?php echo get_phrase('Teacher'); ?></th>
        <th><?php echo get_phrase('subject'); ?></th>
        <th><?php echo get_phrase('syllabus'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($check_data as $data) {
        $teacher_data = $this->db->get_where('users', array('id' => $data['teacher_id'], 'role' => 'teacher'))->row_array();
        $section_data = $this->db->get_where('sections', array('id' => $data['section_id'], 'class_id' => $data['class_id']))->row_array();
        $subject_data = $this->db->get_where('subjects',['id'=>$data['subject_id']])->row_array();
        $quarters = $this->db->get_where('exams', array('school_id' => school_id(),'id' =>$data['quarter_id']))->row_array();
        $semester = $this->db->get_where('semester', array('school_id' => school_id(),'id' =>$data['semester_id']))->row_array();
        $syllabuses_data = $this->db->get_where('syllabuses', array('subject_id' => $data['subject_id'], 'school_id' =>school_id(), 'session_id' => active_session()))->row_array();
        ?>
        <tr>
          <td><?=$quarters['name'];?></td>
          <td><?php echo 'class' . $data['class_id'] . '(' . $section_data['name'] . ')'; ?></td>
          <td><?=$semester['name'];?></td>
          <td><?php echo $teacher_data['name']; ?></td>
          <td><?=$subject_data['name'];?></td>
          <td>
            <?php if(!empty($syllabuses_data)){ ?>
            <a href="<?php echo base_url('uploads/syllabus/'.$syllabuses_data['file']); ?>" class="btn btn-info mdi mdi-download" download><?php echo get_phrase('download'); ?></a>
           <?php } ?>
         </td>

          <td>

            <div class="dropdown text-center">
              <button type="button"
                class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop filbtn"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
               <a href="javascript:void(0);" class="dropdown-item"
                  onclick="rightModal('<?php echo site_url('modal/popup/syllabus/semester_plan_edit/' . $data['id']) ?>', '<?php echo get_phrase('update_semester_plan'); ?>');"><?php echo get_phrase('edit'); ?></a>
                <a href="javascript:void(0);" class="dropdown-item"
                  onclick="confirmModal('<?php echo route('syllabus/delete/' . $data['id']); ?>', showAllSyllabuses)"><?php echo get_phrase('delete'); ?></a>
                <a href="javascript:void(0);" class="dropdown-item"
                  onclick="previewModal('<?php echo site_url('modal/popup/syllabus/view/' . $data['id']) ?>', '<?php echo get_phrase('semester_plan'); ?>');"><?php echo get_phrase('view'); ?></a>

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
<!-- <?php
$school_id = school_id();
if (isset($class_id) && isset($section_id)):
    $syllabuses = $this->db->get_where('syllabuses', array('class_id' => $class_id, 'section_id' => $section_id, 'session_id' => active_session()))->result_array();
    if(count($syllabuses) > 0):?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
            <tr style="background-color: #313a46; color: #ababab;">
                <th><?php echo get_phrase('title'); ?></th>
                <th><?php echo get_phrase('syllabus'); ?></th>
                <th><?php echo get_phrase('subject'); ?></th>
                <th><?php echo get_phrase('option'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($syllabuses as $syllabus):?>
                <tr>
                    <td><?php echo $syllabus['title']; ?></td>
                    <td><a href="<?php echo base_url('uploads/syllabus/'.$syllabus['file']); ?>" class="btn btn-info mdi mdi-download" download><?php echo get_phrase('download'); ?></a></td>
                    <td><?php echo $this->db->get_where('subjects', array('id' => $syllabus['subject_id']))->row('name'); ?></td>
                    <td>
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirmModal('<?php echo route('syllabus/delete/'.$syllabus['id']); ?>', showAllSyllabuses)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="<?php echo get_phrase('delete_syllabus'); ?>"> <i class="mdi mdi-window-close"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <?php include APPPATH.'views/backend/empty.php'; ?>
    <?php endif; ?>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
 -->