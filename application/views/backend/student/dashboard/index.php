<style>
  .progress {
    margin: 20px auto;
    padding: 0;
    width: 90%;
    background: #e5e5e5;
    border-radius: 6px;
    position: relative;
  }

  p {
    text-align: left;
    text-transform: capitalize;
    font-weight: 500;
  }

  .progress-header {
    text-align: center;
    margin-bottom: 5px;
    font-size: 14px;
    color: black;
  }

  .bar-container {
    position: relative;
    width: 100%;
    height: 30px;
    background: #e5e5e5;
    border-radius: 6px;
    overflow: hidden;
  }

  .bar {
    height: 100%;
    background: cornflowerblue;
    border-radius: 6px 0 0 6px;
  }

  .percent-outside {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    margin: 0;
    font-family: tahoma, arial, helvetica;
    font-size: 12px;
    color: black;
  }

  .bar-box {
    background: #fff;
    border-radius: 10px;
    padding: 20px 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .bar-box:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  .linebar {
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .linebar:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  .boxhover {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }

  .boxhover:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  .colhover {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    border-radius: 10px;
  }

  .colhover:hover {
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    transition: 1s ease;
  }

  #myLineChart {
    width: 100% !important;
  }

  .adminbar {
    background: #ffdfe8;
    border-radius: 10px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

  }

  .table-responsive {
    display: revert !important;
  }

  .card {
    border: none !important;
  }
</style>

<?php
$user_id = $this->session->userdata('user_id');
$student_table_data = $this->db->get_where('students', ['user_id' => $user_id])->row_array();
$enrols_table_data = $this->db->get_where('enrols', ['student_id' => $student_table_data['id']])->row_array();
$current_session_teachers = $this->user_model->get_total_data($enrols_table_data['class_id']);
$school_id = school_id();
?>
<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body d-flex align-items-center justify-content-between adminbar">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-view-dashboard title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('Welcome to Student Dashboard'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">Empowering
            your learning journey with Eduquest</p>
        </div>
        <img src="<?php echo base_url('assets/backend/images/dashboardimg.png'); ?>" alt="Student Dashboard Image"
          class="img-fluid" style="width: 244px; margin-top: -40px;">
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<!-- end page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="row">
      <!--Attendance Record Start-->
      <div class="col-xl-12">
        <div class="card boxhover">
          <div class="card-body">
            <h6 class="header-title mb-3"><?php echo get_phrase('attendance_record'); ?><a href=""
                style="color: #6c757d"><i class="mdi mdi-export"></i></a></h6>
            <?php include 'attendance_record.php'; ?>
          </div>
        </div>
      </div>
      <!--Attendance Record End-->

      <!-- ClassWise Subject Start -->
      <div class="col-xl-3">
        <div class="card widget-flat boxhover" id="teacher"
          style="background: rgb(131,58,180);
background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);; border-radius: 10px;">
          <div class="card-body">
            <div class="float-end">
              <i class="mdi mdi-account-multiple widget-icon" style="color: #ffffff;"></i>

            </div>
            <h5 class="font-weight-normal mt-0" title="Number of Subject" style="color: #fff;">
              <i class="mdi mdi-book-open-variant title_icon" style="color: #fff;"></i>
              <?php echo get_phrase('subjects'); ?>
              <a href="<?php echo route('subject'); ?>" style="color: #fff; display: none;" id="subject_list">
                <i class="mdi mdi-export"></i>
              </a>
            </h5>
            <h3 class="mt-3 mb-3" style="color: #fff;">
              <?php
              $total_subjects = $this->db->get_where('subjects', ['class_id' => $enrols_table_data['class_id'], 'school_id' => $school_id])->num_rows();
              if (!empty($total_subjects)) {
                echo $total_subjects;
              }
              ?>
            </h3>
            <p class="mb-0" style="color: #fff;">
              <span class="text-nowrap"><?php echo get_phrase('total_number_of_subject'); ?></span>
            </p>
          </div>
        </div>
      </div>

      <!-- ClassWise Subject End -->
      <!-- Announcements Calender Start -->
      <div class="col-xl-6">
        <div class="card widget-flat boxhover" id="teacher" style="on">
          <div class="card-body">
            <h5 class="text-muted font-weight-normal mt-0" title="Announcements Calender"
              style="color:#000 !important;"> <i class="mdi mdi-book-open-variant title_icon"></i>
              <?php echo get_phrase('Announcements Calender'); ?> <a href="" style="color: #6c757d; display: none;"
                id="event_list"><i class="mdi mdi-export"></i></a></h5>
            <h3 class="mt-3 mb-3">

            </h3>
            <?php $school_id = school_id(); ?>
            <?php $query = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session())); ?>
            <?php if ($query->num_rows() > 0): ?>
              <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                <thead>
                  <tr style="background-color: #0272F3; color: #fff;">
                    <th><?php echo get_phrase('event_title'); ?></th>
                    <th><?php echo get_phrase('from'); ?></th>
                    <th><?php echo get_phrase('to'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $event_calendars = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session()))->result_array();
                  foreach ($event_calendars as $event_calendar) {
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
      <div class="col-xl-3">
        <div class="card widget-flat boxhover" id="teacher" style="on">
          <div class="card-body">
            <h4 class="header-title mb-3"><?php echo get_phrase('Exam Results'); ?><a href="" style="color: #6c757d"><i
                  class="mdi mdi-export"></i></a></h4>

            <?php
            $subject = $this->db->get_where('subjects', array('class_id' => $enrols_table_data['class_id']))->result_array();
            ?>
            <div class="table-responsive-sm">
              <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                <thead>
                  <tr style="background-color: #0272F3; color: #fff;">
                    <th width="60%"><?php echo get_phrase('subject'); ?></th>
                    <th width="60%"><?php echo get_phrase('grade'); ?></th>

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

                      $writtent_test_cal_value = $writtentest_mark ? $writtenmultiply * ($writtentest_mark / $number_of_written_exam) : 0;

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
                          <?= $data['name']; ?>
                        </td>
                        <td><?= $grade_name; ?></td>
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
      <!-- Class Timetable Start -->
      <div class="col-xl-12">
        <div class="card boxhover">
          <div class="card-body">
            <h4 class="header-title mb-3"><?php echo get_phrase('Class Timetable'); ?><a href=""
                style="color: #6c757d"><i class="mdi mdi-export"></i></a></h4>
            <?php include 'class_timetable.php'; ?>
          </div>
        </div>
      </div>
      <!-- Class Timetable End -->


    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    initDataTable("expense-datatable");
  });
</script>