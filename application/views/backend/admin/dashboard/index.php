<?php 
    $school_id = school_id();

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
</style>

<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2 d-flex align-items-center justify-content-between adminbar">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-view-dashboard title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('Welcome to Admin Dashboard'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">Empowering
            your management with seamless efficiency.</p>
        </div>
        <img src="<?php echo base_url('assets/backend/images/dashboardimg.png'); ?>" alt="Dashboard Image"
          class="img-fluid" style="width: 215px; margin-top: -30px;">
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>



<!-- end page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="row">
      <div class="col-xl-8">
        <div class="row">
          <div class="col-lg-6">
            <div class="card widget-flat bg-primary colhover" id="student">
              <div class="card-body" style="background-color: #5655AB;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="color: #ffffff;"></i>
                </div>


                <h5 class="text-muted font-weight-normal mt-0" title="Number of Student">
                  <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                  <span style="color: #ffffff;">
                    <?php echo get_phrase('students'); ?>
                  </span>
                  <a href="<?php echo route('student'); ?>" style="color: #6c757d; display: none;" id="student_list">
                    <i class="mdi mdi-export text-light"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="color: #ffffff;">
                  <?php
                  $current_session_students = $this->user_model->get_session_wise_student();
                  echo $current_session_students->num_rows();
                  ?>
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap" style="color: #ffffff;">
                    <?php echo get_phrase('total_number_of_student'); ?>
                  </span>
                </p>
              </div> <!-- end card-body-->
            </div> <!-- end card-->
          </div> <!-- end col-->

          <div class="col-lg-6">
            <div class="card widget-flat colhover" id="teacher">
              <div class="card-body" style="background-color:#FD858F; color: #ffffff;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="color: #ffffff!important;"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Teacher"
                  style="color:#ffffff !important;">
                  <i class="fa-solid fa-chalkboard-user" style="color: #ffffff;"></i>
                  <?php echo get_phrase('teacher'); ?>
                  <a href="<?php echo route('teacher'); ?>" style="color: #6c757d; display: none;" id="teacher_list">
                    <i class="mdi mdi-export text-light"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="color: #ffffff;">
                  <?php
                  $teachers = $this->user_model->get_teachers();
                  echo $teachers->num_rows();
                  ?>
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap" style="color: #ffffff;">
                    <?php echo get_phrase('total_number_of_teacher'); ?>
                  </span>
                </p>
              </div>
              <!-- end card-body-->

            </div> <!-- end card-->
          </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
          <div class="col-lg-6">
            <div class="card widget-flat colhover" id="total_exams">
              <div class="card-body" style="background-color: #035fbd; color: #ffffff!important;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="color: #ffffff;"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Exam"
                  style="color: #ffffff!important;">
                  <i class="mdi mdi-book-clock title_icon" style="color: #ffffff;"></i>
                  <?php echo get_phrase('exam'); ?>
                  <a href="" style="color: #6c757d; display: none;" id="exam_list">
                    <i class="mdi mdi-export text-light"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="color: #ffffff;">
                  <?php
                  $total_exams=$this->db->get('online_exam_details')->num_rows();
                  echo $total_exams;
                  ?>
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap" style="color: #ffffff;">
                    <?php echo get_phrase('total_number_of_exams'); ?>
                  </span>
                </p>
              </div>
              <!-- end card-body-->

            </div> <!-- end card-->
          </div> <!-- end col-->

          <div class="col-lg-6">
            <div class="card widget-flat colhover">
              <div class="card-body" style="background-color: #FF8911; color: #ffffff;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="color: #ffffff;"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Staff"
                  style="color:#ffffff !important;">
                  <i class="mdi mdi-account-group title_icon" style="color: #ffffff!important;"></i>
                  <?php echo get_phrase('staff'); ?>
                </h5>
                <h3 class="mt-3 mb-3" style="color: #ffffff;">
                  <?php
                    $school_id = school_id();
                    $role=array('student','parent','admin','superadmin');
                    $this->db->select('u.*');
                    $this->db->where_not_in('u.role',$role);
                    $this->db->where('u.school_id',$school_id);
                    $total_staff=$this->db->get('users u')->num_rows();
                    if(!(empty($total_staff))){
                        echo $total_staff;
                    }
                  ?>
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap" style="color: #ffffff;">
                    <?php echo get_phrase('total_number_of_staff'); ?>
                  </span>
                </p>
              </div>
              <!-- end card-body-->

            </div> <!-- end card-->
          </div> <!-- end col-->
        </div>
      </div> <!-- end col -->
      <div class="col-xl-4">
        <div class="card bg-primary colhover">
          <div class="card-body">
            <h4 class="header-title text-white mb-2">
              <?php echo get_phrase('todays_attendance'); ?>
            </h4>
            <div class="text-center">
              <h3 class="font-weight-normal text-white mb-2">
                <?php echo $this->crud_model->get_todays_attendance(); ?>
              </h3>
              <p class="text-light text-uppercase font-13 font-weight-bold">
                <?php echo $this->crud_model->get_todays_attendance(); ?>
                <?php echo get_phrase('students_are_attending_today'); ?>
              </p>
              <a href="<?php echo route('attendance'); ?>" class="btn btn-outline-light btn-sm mb-1">
                <?php echo get_phrase('go_to_attendance'); ?>
                <i class="mdi mdi-arrow-right ms-1"></i>
              </a>

            </div>
          </div>
        </div>
        <div class="card boxhover">
          <div class="card-body">
            <h4 class="header-title">
              <?php echo get_phrase('recent_events'); ?><a href="<?php echo route('event_calendar'); ?>"
                style="color: #6c757d;"><i class="mdi mdi-export text-light"></i></a>
            </h4>
            <?php include 'event.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end col-->
</div>

<!--CHART OPEN-->
<div class="row ">
  <div class="col-sm-8">
    <div class="linebar">
      <canvas id="myLineChart"></canvas>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="bar-box">
      <div class="progress-container">
        <div class="progressbar">
          <div class="progress-header">
            <p class="mt-2 mb-2">Today Present Students</p>
            <?php $date=date('Y-m-d');
                  $timestamp=(strtotime($date));
                  $today_present_students=$this->db->get_where('daily_attendances',['timestamp'=>$timestamp,'school_id'=>$school_id,'status'=>'1'])->num_rows();
                  $current_students = $this->user_model->get_session_wise_student();
                  $total_students=$current_students->num_rows();
                  if(isset($today_present_students) && $today_present_students == $total_students){
                     $student_percent_outside= '100%';
                  }else if(isset($today_present_students) && $today_present_students > 0){
                     $student_percent_outside=$today_present_students.'%';
                  }else{$student_percent_outside= '0%';}
                 
            ?>
        
          </div>
          <div class="bar-container">
            <div class="bar" style="width:<?=$student_percent_outside;?>; background-color:#FD858F;"></div>
            <p class="percent-outside"><b><?=$student_percent_outside;?></b></p>
            <input type="hidden" id="student_percent" value="<?=$today_present_students?>">
          </div>
        </div>

        <div class="progressbar">
          <div class="progress-header">
            <p class="mt-2 mb-2">Today Present Employees</p>
            <?php 
                 $date=date('Y-m-d');
                 $timestamp=(strtotime($date));
                 $today_present_employees=$this->db->get_where('staff_attendance',['timestamp'=>$timestamp,'school_id'=>$school_id,'status'=>'1'])->num_rows();
                 $role=array('student','parent','admin','superadmin');
                 $this->db->select('u.*');
                 $this->db->where_not_in('u.role',$role);
                 $this->db->where('u.school_id',$school_id);
                 $total_number_staffs=$this->db->get('users u')->num_rows();
                 if(isset($today_present_employees) && $today_present_employees == $total_number_staffs){
                     $employee_percent_outside= '100%';
                  }else if(isset($today_present_employees) && $today_present_employees > 0){
                     $employee_percent_outside= $today_present_employees.'%';
                  }else{$employee_percent_outside= '0%';}

 
 
            ?>
          </div>
          <div class="bar-container">
            <div class="bar" style="width:<?=$employee_percent_outside;?>; background-color:#FF8911;"></div>
            <p class="percent-outside"><b><?=$employee_percent_outside;?></b></p>
          </div>
        </div>

        <div class="progressbar">
          <div class="progress-header">
            <p class="mt-2 mb-2">Today’s New Enrollments</p>
             <?php $date=date('Y-m-d');
                  $timestamp=(strtotime($date));
                  $today_new_enrollments=$this->db->get_where('enrols',['timestamp'=>$timestamp,'school_id'=>$school_id])->num_rows();
                  if(isset($today_new_enrollments) && $today_new_enrollments > 0){
                     $emp_percent_outside=$today_new_enrollments.'%';
                  }else{$emp_percent_outside= '0%';}

            ?>
        
          </div>
          <div class="bar-container">
            <div class="bar" style="width:<?=$emp_percent_outside;?>; background-color:#035FBD;"></div>
            <p class="percent-outside"><b><?=$emp_percent_outside;?></b></p>
          </div>
        </div>

        <div class="progressbar">
          <div class="progress-header">
            <p class="mt-2 mb-2">This Month Fees Collection</p>
          </div>
          <div class="bar-container mb-3">
            <div class="bar" style="width:76%; background-color:#2CBC63;"></div>
            <p class="percent-outside"><b>76%</b></p>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

<!--CHART CLOSE-->

<!--Accounts Start-->
<div class="row">
  <div class="col-xl-12">
    <div class="row">
      <div class="col-xl-8">
        <div class="card boxhover">
          <div class="card-body">
            <h4 class="header-title mb-3">
              <?php echo get_phrase('accounts_of'); ?>
              <?php echo date('F'); ?> <a href="<?php echo route('invoice'); ?>" style="color: #6c757d"><i
                  class="mdi mdi-export text-light"></i></a>
            </h4>
            <?php include 'invoice.php'; ?>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card boxhover">
          <div class="card-body">
            <h4 class="header-title mb-3">
              <?php echo get_phrase('expense_of'); ?>
              <?php echo date('F'); ?> <a href="<?php echo route('expense'); ?>" style="color: #6c757d"><i
                  class="mdi mdi-export text-light"></i></a>
            </h4>
            <?php include 'expense.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Accounts close-->
<script>
  $(document).ready(function () {
    initDataTable("expense-datatable");
  });

  $(".widget-flat").mouseenter(function () {
    var id = $(this).attr('id');
    $('#' + id + '_list').show();
  }).mouseleave(function () {
    var id = $(this).attr('id');
    $('#' + id + '_list').hide();
  });

  //lINE CHART START//
  const data = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Student',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      },
      {
        label: 'Teacher',
        data: [28, 48, 40, 19, 86, 27, 90],
        fill: false,
        borderColor: 'rgb(255, 99, 132)',
        tension: 0.1
      },
      {
        label: 'Staff',
        data: [18, 12, 60, 20, 46, 77, 80],
        fill: false,
        borderColor: 'rgb(54, 162, 235)',
        tension: 0.1
      }
    ]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Student Statistics'
        }
      }
    },
  };

  const myLineChart = new Chart(
    document.getElementById('myLineChart'),
    config
  );

  //lINE CHART END//


</script>