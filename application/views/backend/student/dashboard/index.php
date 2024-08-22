<?php 
$user_id = $this->session->userdata('user_id');
$student_table_data=$this->db->get_where('students',['user_id'=>$user_id])->row_array();
$enrols_table_data=$this->db->get_where('enrols',['student_id'=>$student_table_data['id']])->row_array();
$current_session_teachers = $this->user_model->get_total_data($enrols_table_data['class_id']);
$school_id  = school_id();
?>
<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title"> <i class="mdi mdi-view-dashboard title_icon"></i> <?php echo get_phrase('dashboard'); ?> </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="row">
      <!-- Class Timetable Start -->  
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title mb-3"><?php echo get_phrase('Class Timetable'); ?><a href="" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
            <?php include 'class_timetable.php'; ?>
          </div>
        </div>
      </div>
      <!-- Class Timetable End -->  
      <!-- ClassWise Subject Start -->  
      <div class="col-xl-4">
        <div class="card widget-flat" id="teacher" style="on">
          <div class="card-body">
            <h5 class="text-muted font-weight-normal mt-0" title="Number of Subject"> <i class="mdi mdi-book-open-variant title_icon"></i> <?php echo get_phrase('subject'); ?> <a href="<?php echo route('subject'); ?>" style="color: #6c757d; display: none;" id = "subject_list"><i class = "mdi mdi-export"></i></a></h5>
            <h3 class="mt-3 mb-3">
             <?php
             $total_subjects = $this->db->get_where('subjects',['class_id'=>$enrols_table_data['class_id'],'school_id'=>$school_id])->num_rows();
             if(!empty($total_subjects)){
               echo $total_subjects;
             }
             ?>

           </h3>
           <p class="mb-0 text-muted">
            <span class="text-nowrap"><?php echo get_phrase('total_number_of_subject'); ?></span>
          </p>
        </div> 
      </div>
    </div>
    <!-- ClassWise Subject End -->  
    <!-- Announcements Calender Start -->  
     <div class="col-xl-4">
        <div class="card widget-flat" id="teacher" style="on">
          <div class="card-body">
            <h5 class="text-muted font-weight-normal mt-0" title="Announcements Calender"> <i class="mdi mdi-book-open-variant title_icon"></i> <?php echo get_phrase('Announcements Calender'); ?> <a href="" style="color: #6c757d; display: none;" id = "event_list"><i class = "mdi mdi-export"></i></a></h5>
            <h3 class="mt-3 mb-3">
           
           </h3>
           <?php $school_id = school_id(); ?>
        <?php $query = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session())); ?>
        <?php if($query->num_rows() > 0): ?>
          <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead>
              <tr style="background-color: #313a46; color: #ababab;">
                <th><?php echo get_phrase('event_title'); ?></th>
                <th><?php echo get_phrase('from'); ?></th>
                <th><?php echo get_phrase('to'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $event_calendars = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session()))->result_array();
              foreach($event_calendars as $event_calendar){
                ?>
                <tr>
                  <td><?php echo $event_calendar['title']; ?></td>
                  <td><?php echo date('D, d M Y', strtotime($event_calendar['starting_date'])); ?></td>
                  <td><?php echo date('D, d M Y', strtotime($event_calendar['ending_date'])); ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
         <?php else: ?>
              <td colspan="2"><?php echo get_phrase('No Data Found'); ?></td>
        <?php endif; ?>
        </div> 
      </div>
    </div>
   <!-- Announcements Calender End --> 
    <!--Exam Results Start--> 
     <div class="col-xl-4">
        <div class="card widget-flat" id="teacher" style="on">
          <div class="card-body">
             <h4 class="header-title mb-3"><?php echo get_phrase('Exam Results'); ?><a href="" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
           
             <?php 
                $subject = $this->db->get_where('subjects', array('class_id' => $enrols_table_data['class_id']))->result_array();
             ?>
              <div class="table-responsive-sm">
                <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                  <thead>
                    <tr>
                      <th width = "60%"><?php echo get_phrase('subject') ;?></th>
                      <th width = "60%"><?php echo get_phrase('grade') ;?></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($subject) > 0): ?>
                      <?php foreach ($subject as $data): 
                              $student_id = $student_table_data['id'];
                              $class_id = $enrols_table_data['class_id'];
                              $subjectId = $list['id'];
                               $this->db->select('student_id, class_id, subject_id, SUM(mark_obtained) AS total_marks');
                               $this->db->from('marks');
                               $this->db->where('student_id', $student_id);
                               $this->db->where('class_id', $class_id);
                               $this->db->where('subject_id', $subjectId);
                               $this->db->group_by(array('student_id', 'class_id', 'subject_id'));
                               $written_query = $this->db->get();
                               $written_marks = $written_query->result_array();

                               $number_of_written_exam = $row_written_count > 0 ? 100 * $row_written_count : 0; 
                               $writtentest_mark = $written_marks[0]['total_marks'] ? $written_marks[0]['total_marks'] : 0;

                               $writtent_test_cal_value = $writtentest_mark ? $writtenmultiply * ( $writtentest_mark / $number_of_written_exam) : 0; 

                               $extraCaricularActivityScore = ($class_work_cal_value + $home_work_cal_value + $behavior_cal_value + $test_quize_cal_value + $project_cal_value) / 100;

                               $get_original_activityVal = intval($extraCaricularActivityScore);
                               $extracaricul_percent = $get_original_activityVal ? 75 * ($get_original_activityVal / 100) : 0;
                               $totalScore_of_student = $writtent_test_cal_value + $extracaricul_percent;
                               $gettotalScore_of_student = intval($totalScore_of_student);
                               $this->db->select('*');
                               $this->db->from('grades');
                               $this->db->where('mark_from <=', $gettotalScore_of_student);
                               $this->db->where('mark_upto >=', $gettotalScore_of_student);
                               $grade_query = $this->db->get();
                               $grade_row = $grade_query->row_array();

                               $grade_name = $grade_row ? $grade_row['name'] : "";
                               $grade_point = $grade_row ? $grade_row['grade_point'] : 0;

                
                       ?>
                       <tr>
                        <td>
                          <?=$data['name'];?>
                        </td>
                        <td><?=$grade_name;?></td>
                      </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <td colspan="2"><?php echo get_phrase('No Data Found'); ?></td>
                    <?php endif; ?>

                  </tbody>
                </table>
              </div>

          </div> 
      </div>

    </div>
    <!--Exam Results End-->  
    <!--Attendance Record Start-->
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title mb-3"><?php echo get_phrase('attendance_record'); ?><a href="" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
            <?php include 'attendance_record.php'; ?>
          </div>
        </div>
      </div>
      <!--Attendance Record End-->

      
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
    initDataTable("expense-datatable");
});
</script>
