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
    text-transform: uppercase;
    font-weight: 600;
  }

  .progress-header {
    text-align: center;
    margin-bottom: 5px;
    font-family: tahoma, arial, helvetica;
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
</style>

<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title"> <i class="mdi mdi-view-dashboard title_icon"></i> <?php echo get_phrase('dashboard'); ?>
        </h4>
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
            <div class="card widget-flat bg-primary" id="student" style="on">
              <div class="card-body" style="background-color: #5655AB;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="color: #ffffff;"></i>
                </div>


                <h5 class="text-muted font-weight-normal mt-0" title="Number of Student">
                  <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                  <span style="color: #ffffff;"><?php echo get_phrase('students'); ?></span>
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
                  <span class="text-nowrap"
                    style="color: #ffffff;"><?php echo get_phrase('total_number_of_student'); ?></span>
                </p>
              </div> <!-- end card-body-->
            </div> <!-- end card-->
          </div> <!-- end col-->

          <div class="col-lg-6">
            <div class="card widget-flat" id="teacher" style="on">
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
                  <span class="text-nowrap"
                    style="color: #ffffff;"><?php echo get_phrase('total_number_of_teacher'); ?></span>
                </p>
              </div>
              <!-- end card-body-->

            </div> <!-- end card-->
          </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
          <div class="col-lg-6">
            <div class="card widget-flat" id="parent">
              <div class="card-body" style="background-color: #035fbd; color: #ffffff!important;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="color: #ffffff;"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents"
                  style="color: #ffffff!important;">
                  <i class="mdi mdi-account-group title_icon" style="color: #ffffff;"></i>
                  <?php echo get_phrase('parents'); ?>
                  <a href="<?php echo route('parent'); ?>" style="color: #6c757d; display: none;" id="parent_list">
                    <i class="mdi mdi-export text-light"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="color: #ffffff;">
                  <?php
                  $parents = $this->user_model->get_parents();
                  echo $parents->num_rows();
                  ?>
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap"
                    style="color: #ffffff;"><?php echo get_phrase('total_number_of_parent'); ?></span>
                </p>
              </div>
              <!-- end card-body-->

            </div> <!-- end card-->
          </div> <!-- end col-->

          <div class="col-lg-6">
            <div class="card widget-flat">
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
                  $accountants = $this->user_model->get_accountants()->num_rows();
                  $librarians = $this->user_model->get_librarians()->num_rows();
                  echo $accountants + $librarians;
                  ?>
                </h3>
                <p class="mb-0 text-muted">
                  <span class="text-nowrap"
                    style="color: #ffffff;"><?php echo get_phrase('total_number_of_staff'); ?></span>
                </p>
              </div>
              <!-- end card-body-->

            </div> <!-- end card-->
          </div> <!-- end col-->
        </div>
      </div> <!-- end col -->
      <div class="col-xl-4">
        <div class="card bg-primary">
          <div class="card-body">
            <h4 class="header-title text-white mb-2"><?php echo get_phrase('todays_attendance'); ?></h4>
            <div class="text-center">
              <h3 class="font-weight-normal text-white mb-2">
                <?php echo $this->crud_model->get_todays_attendance(); ?>
              </h3>
              <p class="text-light text-uppercase font-13 font-weight-bold">
                <?php echo $this->crud_model->get_todays_attendance(); ?>
                <?php echo get_phrase('students_are_attending_today'); ?>
              </p>
              <a href="<?php echo route('attendance'); ?>"
                class="btn btn-outline-light btn-sm mb-1"><?php echo get_phrase('go_to_attendance'); ?>
                <i class="mdi mdi-arrow-right ms-1"></i>
              </a>

            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="header-title"><?php echo get_phrase('recent_events'); ?><a
                href="<?php echo route('event_calendar'); ?>" style="color: #6c757d;"><i
                  class="mdi mdi-export text-light"></i></a>
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
    <div>
      <canvas id="myLineChart"></canvas>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="bar-box">
      <div class="progress-container">
        <div class="progressbar">
          <div class="progress-header">
            <p class="mt-2">Today Present Students</p>
          </div>
          <div class="bar-container">
            <div class="bar" style="width:94%; background-color:#FD858F;"></div>
            <p class="percent-outside"><b>94%</b></p>
          </div>
        </div>

        <div class="progressbar">
          <div class="progress-header">
            <p class="mt-2">Today Present Employees</p>
          </div>
          <div class="bar-container">
            <div class="bar" style="width:92%; background-color:#FF8911;"></div>
            <p class="percent-outside"><b>92%</b></p>
          </div>
        </div>

        <div class="progressbar">
          <div class="progress-header">
            <p class="mt-2">This Month Fee Collection</p>
          </div>
          <div class="bar-container">
            <div class="bar" style="width:96%; background-color:#035FBD;"></div>
            <p class="percent-outside"><b>96%</b></p>
          </div>
        </div>
      </div>
    </div>


  </div>


  <!--CHART CLOSE-->


  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3"><?php echo get_phrase('accounts_of'); ?> <?php echo date('F'); ?> <a
                  href="<?php echo route('invoice'); ?>" style="color: #6c757d"><i
                    class="mdi mdi-export text-light"></i></a></h4>
              <?php include 'invoice.php'; ?>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title mb-3"> <?php echo get_phrase('expense_of'); ?> <?php echo date('F'); ?> <a
                  href="<?php echo route('expense'); ?>" style="color: #6c757d"><i
                    class="mdi mdi-export text-light"></i></a></h4>
              <?php include 'expense.php'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
          label: 'Dataset 1',
          data: [65, 59, 80, 81, 56, 55, 40],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
        {
          label: 'Dataset 2',
          data: [28, 48, 40, 19, 86, 27, 90],
          fill: false,
          borderColor: 'rgb(255, 99, 132)',
          tension: 0.1
        },
        {
          label: 'Dataset 3',
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