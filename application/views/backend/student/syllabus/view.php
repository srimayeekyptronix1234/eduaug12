<style>
  .filbtn:hover {
    background: #0272f3;
    color: #fff;
  }
</style>

<?php
  $check_data = $this->db->get_where('semester_plan', array('id' => $param1))->row_array();
  $teachers = $this->db->get_where('users', ['id' =>$check_data['teacher_id'],'role'=>'teacher'])->row_array();
  $subject_data = $this->db->get_where('subjects',['id' =>$check_data['subject_id']])->row_array(); 
  $quarter_data = $this->db->get_where('exams',['id' =>$check_data['quarter_id']])->row_array(); 
  $semester_data = $this->db->get_where('semester',['id' =>$check_data['semester_id']])->row_array(); 
  $event_data = $this->db->get_where('event_calendars',['id' =>$check_data['events_id']])->row_array(); 

if (count($check_data) > 0): ?>
  <table id="basicdatatable" class="nowrap table table-bordered" width="100%">
    <thead>

      <tr>
        <th colspan="2"><?php echo 'Teacher’s Name:'.$teachers['name']; ?><br><?php echo 'SUBJECT:'.$subject_data['name']; ?><br></th>
        <th><?php echo $semester_data['name'].'PLAN'; ?></th>
        <th><?php echo get_phrase('WEEKLY LOAD: 5 periods'); ?></th>
        <th><?php echo get_phrase('School Events / Extra-Curricular Activities / Notes'); ?></th>
      </tr>
      <tr>
         <th colspan="4"><?php echo $quarter_data['name']; ?></th>
      </tr>
      <tr>
        <th><?php echo get_phrase('WEEK'); ?></th>
        <th><?php echo get_phrase('DATE'); ?></th>
        <th><?php echo get_phrase('Content (Unit / Chapter, Lesson…)'); ?></th>
        <th><?php echo get_phrase('SB / WB Pages'); ?></th>

      </tr>
    </thead>
    <tbody>
        <tr>
          <td><?=$check_data['week'];?></td>
          <td><?=$check_data['date']; ?></td>
          <td><?=$check_data['content'];?></td>
          <td></td>
          <td><?=$event_data['title'];?></td>
        </tr>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>
