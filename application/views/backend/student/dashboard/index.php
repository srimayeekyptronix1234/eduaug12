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

  .listar-header-category-name {
    font-size: 15px;
    font-weight: 500;
    text-transform: uppercase;
    color: #000;
  }

  .listar-header-category-name {
    white-space: nowrap;
    word-wrap: normal;
    overflow-wrap: normal;
    word-break: normal;
    -ms-hyphens: none;
    -moz-hyphens: none;
    -webkit-hyphens: none;
    hyphens: none;
    padding: 4px 8px;
    border-radius: 40px;
  }

  .listar-category-icon-wrapper {
    position: relative;
    margin-top: 5px;
    margin-bottom: 12px;
  }

  .listar-category-icon-wrapper {
    margin-top: 12px;
    margin-bottom: 45px;
  }

  .listar-search-categories {
    width: 100%;
    -webkit-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    -moz-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    -ms-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    -o-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    display: block;
    padding: 0 30px;
    color: #fff;
    max-height: 140px;
    height: 140px;
    text-align: center;
    z-index: 4;
    font-size: 0;
    line-height: 0;
    border-radius: 36px 36px 0 0;
    background: #0000000f;
  }

  .listar-category-icon-box {
    background-color: #2f53bf;
  }

  .listar-search-categories .listar-listing-categories a {
    display: inline-block;
    min-width: 128px;
    line-height: 3px;
    height: auto;
    top: 0;
    vertical-align: middle;
    text-shadow: 1px 1px rgba(0, 0, 0, 0.2);
    padding: 10px 10px;
    color: #fff;
    font-weight: 400;
    font-size: 13px;
    letter-spacing: 1px;
    border-radius: 20px;
  }

  .listar-category-icon-box {
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -22px;
    background-color: #258bd5;
    width: 44px;
    height: 44px;
    line-height: 44px;
    text-align: center;
    border-radius: 50%;
    z-index: -1;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1), 5px 5px 5px rgba(0, 0, 0, 0.1);
  }

  .listar-search-categories .listar-listing-categories span {
    width: 44px;
    height: 44px;
    line-height: 44px;
    display: block;
    position: relative;
    left: 50%;
    margin-left: -22px;
    border-radius: 50%;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  }

  .listar-search-categories .listar-listing-categories span:before {
    -webkit-transition-duration: 1s;
    -moz-transition-duration: 1s;
    -ms-transition-duration: 1s;
    -o-transition-duration: 1s;
    transition-duration: 1s;
    -webkit-transition-property: -webkit-transform;
    -moz-transition-property: -moz-transform;
    -ms-transform-property: -ms-transform;
    -o-transition-property: -o-transform;
    transition-property: transform;
    -webkit-transform: initial;
    -moz-transform: initial;
    -ms-transform: initial;
    -o-transform: initial;
    transform: initial;
  }

  .listar-search-categories .listar-listing-categories span:before,
  .listar-tagline-category-icon .listar-category-icon-wrapper span:before {
    display: inline-block;
    font-size: 22px;
    width: 44px;
    height: 44px;
    line-height: 44px;
    text-align: center;
    border-radius: 50%;
  }

  .icon-moon:before {
    left: 1px;
  }

  .icon-moon:before {
    content: "\e949";
  }

  [class^="icon-"]:before,
  [class*=" icon-"]:before {
    font-family: "icon" !important;
    position: relative;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    display: inline-block;
    vertical-align: middle;
  }

  .listar-search-categories .listar-listing-categories span:after {
    content: "";
    display: inline-block;
    position: absolute;
    top: -12px;
    left: -12px;
    width: calc(100% + 24px);
    height: calc(100% + 24px);
    border-radius: 50%;
    z-index: -1000;
    background-color: rgba(255, 255, 255, 1);
  }

  .listar-search-categories .listar-listing-categories span:after {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }

  .listar-search-categories {
    -webkit-transition: all 0.6s ease-out;
    -moz-transition: all 0.6s ease-out;
    -ms-transition: all 0.6s ease-out;
    -o-transition: all 0.6s ease-out;
    transition: all 0.6s ease-out;
  }

  .listar-search-categories {
    width: 100%;
    position: relative;
    -webkit-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    -moz-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    -ms-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    -o-transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    transform: translate(-50%, 0%) translateZ(1009px) translate3d(0, 0, 0);
    display: block;
    padding: 0 30px;
    color: #fff;
    max-height: 140px;
    height: 140px;
    text-align: center;
    z-index: 4;
    font-size: 0;
    line-height: 0;
    border-radius: 10px;
    left: 50%;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  }

  .listar-search-categories .listar-listing-categories {
    margin-top: 0;
    padding: 0;
    margin: 0 auto;
  }

  .listar-search-categories .listar-listing-categories span:after {
    background-color: rgba(255, 255, 255, 1);
    box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 50px 50px 10px;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  .listar-search-categories .listar-listing-categories a {
    cursor: pointer;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
  }

  .listar-search-categories .listar-listing-categories a:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  .listar-hero-categories-design-marker .listar-search-categories .listar-listing-categories .listar-listing-categories-wrapper .listar-listing-category-link:hover span:after {
    border-radius: 50px 50px 10px;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  .listar-search-categories:hover .listar-listing-categories a span:after {
    border-radius: 50px;
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }

  .listar-search-categories .listar-listing-categories a:hover span:after {
    border-radius: 50px 50px 10px;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  /***********header************/
  .listar-header-centralizer {
    position: relative;
    display: table;
    overflow-x: hidden;
    text-align: center;
    white-space: nowrap;
    font-size: 0;
    z-index: 3;
    height: 20vh;
    min-height: 20vh;
    height: calc(20vh - var(--vh-offset, 0px));
    min-height: calc(20vh - var(--vh-offset, 0px));
  }

  .listar-header-centralizer {
    position: absolute;
    top: 0;
    left: 0;
    padding: 0;
    width: 100%;
    height: 100%;
  }

  .listar-content-centralized {
    width: 100%;
    position: relative;
    vertical-align: middle;
    white-space: normal;
    font-size: 14px;
    line-height: normal;
    padding-top: 40px;
    z-index: 1010;
    -webkit-transform: translateZ(1010px) translate3d(0, 0, 0);
    -moz-transform: translateZ(1010px) translate3d(0, 0, 0);
    -o-transform: translateZ(1010px) translate3d(0, 0, 0);
    transform: translateZ(1010px) translate3d(0, 0, 0);
  }

  .listar-hero-container {
    max-width: 1160px;
    margin: auto;
  }

  .listar-hero-section-title {
    position: relative;
    min-height: 50px;
    z-index: 1011;
    -webkit-transform: translateZ(1011px) translate3d(0, 0, 0);
    -moz-transform: translateZ(1011px) translate3d(0, 0, 0);
    -o-transform: translateZ(1011px) translate3d(0, 0, 0);
    transform: translateZ(1011px) translate3d(0, 0, 0);
  }

  .listar-hero-section-title h1,
  .listar-hero-section-title p {
    color: #fff;
    text-shadow: 1px 1px rgba(0, 0, 0, 0.2), 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .listar-hero-section-title h1 span {
    display: inline-block;
    color: #fff;
    font-size: 43px;
    font-weight: bold;
    text-shadow: 1px 1px rgba(0, 0, 0, 0.2), 0 0 10px rgba(0, 0, 0, 0.2);
  }

  @media only screen and (max-width: 480px) {
    .listar-hero-section-title h1 span {
      font-size: 18px;
    }

    .listar-content-centralized {
      padding: 0px 16px 352px;
    }

    .listar-search-categories .listar-listing-categories {
      width: 100%;
      margin: 0 auto;
    }

    .listar-search-categories .listar-listing-categories a {
      min-width: 100px;
    }

    .listar-search-categories.listar-categories-fixed-bottom {
      max-height: 350px;
      height: 340px;
    }

    .searchbox {
      min-height: 400px;
    }
  }

  @media (min-width: 768px) {
    .listar-hero-section-title {
      font-size: 18px;
    }
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

<div class="container-fluide listar-hero-categories-design-marker">
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="searchbox listar-hero-header">
        <div class="bg-color-blend"></div>
        <div class="s-img-con"></div>
        <!--------->
        <div class="listar-search-categories listar-categories-fixed-bottom">
          <div class="listar-listing-categories">

            <a href="<?php echo base_url() ?>student/attendance">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(121, 50, 209)"></div>
                  <span class="fa-solid fa-clipboard-user"> </span>
                </div>
                <div class="listar-header-category-name">Attendance</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/grade">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(38, 100, 201)"></div>
                  <span class="fa-solid fa-a"> </span>
                </div>
                <div class="listar-header-category-name"> Grades</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/grade">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: #0b5e0a"></div>
                  <span class="fa-solid fa-route"> </span>
                </div>
                <div class="listar-header-category-name">Assign route</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/project">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: #343A40"></div>
                  <span class="fa-solid fa-list"> </span>
                </div>
                <div class="listar-header-category-name"> Project</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/classwork">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: #0272F3"></div>
                  <span class="fa-solid fa-school"> </span>
                </div>
                <div class="listar-header-category-name"> Classwork</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/invoice">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(178, 39, 99)"></div>
                  <span class="fa-solid fa-money-bill"> </span>
                </div>
                <div class="listar-header-category-name"> Student fees</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/mark">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(9, 151, 44)"></div>
                  <span class="fa-solid fa-sheet-plastic"> </span>
                </div>
                <div class="listar-header-category-name"> Marks</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/syllabus">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(13, 134, 150)"></div>
                  <span class="fa-solid fa-user-graduate"> </span>
                </div>
                <div class="listar-header-category-name"> Syllabus</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>student/routine">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(83, 132, 55)"></div>
                  <span class="fa-solid fa-book"> </span>
                </div>
                <div class="listar-header-category-name">Routine</div>
              </div>
            </a>
          </div>
        </div>
        <!--------->
      </div>
    </div>
  </div>
</div>


<!-- end page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="row">
      <!--Attendance Record Start-->
      <div class="col-xl-12">
        <div class="card boxhover" style="margin-top: 50px;">
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