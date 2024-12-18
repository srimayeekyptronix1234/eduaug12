<?php 

$school_id = school_id(); 
$user_id = $this->session->userdata('user_id');
$student_table_data=$this->db->get_where('students',['user_id'=>$user_id])->row_array();
$enrols_table_data=$this->db->get_where('enrols',['student_id'=>$student_table_data['id']])->row_array();

?>

<table  class="table table-bordered table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-sm">
  <thead class="thead-dark">
    <tr style="font-size: 8px;">
      <th width = "100%" style="font-size: 8px;"><?php echo get_phrase('student'); ?> <i class="mdi mdi-arrow-down"></i> <?php echo get_phrase('date'); ?> <i class="mdi mdi-arrow-right"></i></th>
      <?php
      $number_of_days = date('m', $attendance_date) == 2 ? (date('Y', $attendance_date) % 4 ? 28 : (date('m', $attendance_date) % 100 ? 29 : (date('m', $attendance_date) % 400 ? 28 : 29))) : ((date('m', $attendance_date) - 1) % 7 % 2 ? 30 : 31);
      for ($i = 1; $i <= $number_of_days; $i++): ?>
      <th style="font-size: 8px;"><?php echo $i; ?></th>
    <?php endfor; ?>
  </tr>
</thead>
<tbody>
    <?php
  $student_data = $this->user_model->get_logged_in_student_details();
  $student_id_count = 0;
  $active_sesstion = active_session();
  $this->db->order_by('student_id', 'asc');
  $attendance_of_students = $this->db->get_where('daily_attendances',['class_id' => $student_data['class_id'], 'section_id' => $student_data['section_id'], 'school_id' => $school_id, 'session_id' => $active_sesstion])->result_array();
  foreach($attendance_of_students as $attendance_of_student){ ?>
    <?php if ($attendance_of_student['student_id'] == $student_data['id']): ?>
      <?php if(date('m', $attendance_date) == date('m', $attendance_of_student['timestamp'])): ?>
        <?php if($student_id_count != $attendance_of_student['student_id']): ?>
          <tr>
            <td><?php echo $this->user_model->get_user_details($this->db->get_where('students', array('id' => $attendance_of_student['student_id']))->row('user_id'), 'name'); ?></td>
            <?php for ($i = 1; $i <= $number_of_days; $i++): ?>
              <?php 
              $month=date('M'); $year=date('Y');
              $date = $i.' '.$month.' '.$year; ?>
              <?php $timestamp = strtotime($date); ?>
              <td class="text-center">
                <?php $status = $this->db->get_where('daily_attendances',['class_id' => $student_data['class_id'], 'section_id' => $student_data['section_id'] , 'school_id' => $school_id, 'session_id' => $active_sesstion, 'student_id' => $attendance_of_student['student_id'], 'timestamp' => $timestamp])->row('status');
                 ?>
                <?php if($status == 1){ ?>
                  <i class="mdi mdi-circle text-success"></i>
                <?php }elseif($status === "0"){ ?>
                  <i class="mdi mdi-circle text-danger"></i>
                <?php } ?>
              </td>
            <?php endfor; ?>
          </tr>
        <?php endif; ?>
        <?php $student_id_count = $attendance_of_student['student_id']; ?>
      <?php endif; ?>
    <?php endif; ?>
  <?php } ?>

</tbody>
</table>

