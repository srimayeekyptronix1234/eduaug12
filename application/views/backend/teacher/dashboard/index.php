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
    color: #000;
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
    background: #ffeb3b2e;
    margin-bottom: 30px;
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
$teacher_table_data = $this->db->get_where('teachers', ['user_id' => $user_id])->row_array();
$teacher_permissions_data = $this->db->get_where('teacher_permissions', ['teacher_id' => $teacher_table_data['id']])->row_array();
$current_session_students = $this->user_model->get_total_students($teacher_table_data['class_id'], $teacher_table_data['section_id']);
$total_exam = $this->db->get_where('online_exam_details', ['class_id' => $teacher_permissions_data['class_id']])->num_rows();
$school_id = school_id();
?>
<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card adminbar">
      <div class="card-body d-flex align-items-center justify-content-between py-2">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-view-dashboard title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('dashboard'); ?>
            </span>
          </h4>
          <!-- Optional Description -->
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #000 !important;">
            View an overview of system metrics and status.
          </p>
        </div>
        <img src="<?php echo base_url('assets/backend/images/dashboardimg.png'); ?>" alt="Dashboard Image"
          class="img-fluid" style="width: 215px; margin-left: 20px; margin-top: -30px;">
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->

<div class="container-fluide listar-hero-categories-design-marker">
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="searchbox listar-hero-header">
        <div class="bg-color-blend"></div>
        <div class="s-img-con"></div>
        <!--------->
        <div class="listar-search-categories listar-categories-fixed-bottom">
          <div class="listar-listing-categories">
            <a href="<?php echo base_url() ?>teacher/staff_attendance">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(121, 50, 209)"></div>
                  <span class="fa-solid fa-clipboard-user"> </span>
                </div>
                <div class="listar-header-category-name">Attendance</div>
              </div>
            </a>

            <a href="<?php echo base_url() ?>teacher/staff_attendance">
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(38, 100, 201)"></div>
                  <span class="fa-solid fa-a"> </span>
                </div>
                <div class="listar-header-category-name"> Grades</div>
              </div>
            </a>

            <a>
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: #0b5e0a"></div>
                  <span class="fa-solid fa-route"> </span>
                </div>
                <div class="listar-header-category-name">Assign route</div>
              </div>
            </a>

            <a>
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: #343A40"></div>
                  <span class="fa-solid fa-list"> </span>
                </div>
                <div class="listar-header-category-name"> Project</div>
              </div>
            </a>

            <a>
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: #0272F3"></div>
                  <span class="fa-solid fa-school"> </span>
                </div>
                <div class="listar-header-category-name"> Classwork</div>
              </div>
            </a>

            <a>
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(178, 39, 99)"></div>
                  <span class="fa-solid fa-money-bill"> </span>
                </div>
                <div class="listar-header-category-name"> Student fees</div>
              </div>
            </a>

            <a>
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(9, 151, 44)"></div>
                  <span class="fa-solid fa-sheet-plastic"> </span>
                </div>
                <div class="listar-header-category-name"> Marks</div>
              </div>
            </a>

            <a>
              <div>
                <div class="listar-category-icon-wrapper">
                  <div class="listar-category-icon-box" style="background-color: rgb(13, 134, 150)"></div>
                  <span class="fa-solid fa-user-graduate"> </span>
                </div>
                <div class="listar-header-category-name"> Syllabus</div>
              </div>
            </a>

            <a>
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

<div class="row ">
  <div class="col-xl-12">
    <div class="row">
      <div class="col-xl-12">
        <div class="row">
          <!--Number of Student start-->
          <!-- Student Count Start -->
          <div class="col-lg-4">
            <div class="card widget-flat" id="student"
              style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
               border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
              <div class="card-body" style="color: #fff;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="font-size: 24px; color: #fff;"></i>
                </div>
                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;" title="Number of Students">
                  <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                  <?php echo get_phrase('students'); ?>
                  <a href="<?php echo route('student'); ?>" style="color: #fff; display: none;" id="student_list">
                    <i class="mdi mdi-export"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="font-size: 26px; color: #fff;">
                  <?php
                  if (isset($current_session_students) && $current_session_students != '') {
                    echo count($current_session_students);
                  }
                  ?>
                </h3>
                <p class="mb-0 text-muted" style="color: #fff;">
                  <span class="text-nowrap"
                    style="color: white; font-weight: 600; font-size: 16px;"><?php echo get_phrase('total_number_of_student'); ?></span>
                </p>
              </div>
            </div>
          </div>
          <!-- Student Count End -->

          <script>
            // Hover effect using JavaScript
            document.getElementById('student').addEventListener('mouseenter', function () {
              this.style.transform = 'translateY(-5px)';
              this.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
            });
            document.getElementById('student').addEventListener('mouseleave', function () {
              this.style.transform = 'translateY(0)';
              this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
            });
          </script>
          <!-- end col-->
          <!--Number of Student END-->
          <!-- COMPLAINT SECTION START -->
          <!-- Complaints Count Start -->
          <div class="col-lg-4">
            <div class="card widget-flat" id="complaints"
              style="background-image: linear-gradient(to right top, rgb(12, 2, 76), rgb(8, 43, 116), rgb(14, 67, 135), rgb(0, 102, 185), rgb(26, 51, 241));
               border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
              <div class="card-body" style="color: #fff;">
                <div class="float-end">
                  <i class="mdi mdi-file-compare widget-icon" style="font-size: 24px; color: #fff;"></i>
                </div>
                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;"
                  title="Number of Complaints">
                  <i class="mdi mdi-file-compare title_icon" style="color: #fff;"></i>
                  <?php echo get_phrase('complaints'); ?>
                  <a href="<?php echo route('complaints'); ?>" style="color: #fff; display: none;" id="complaint_list">
                    <i class="mdi mdi-export"></i>
                  </a>
                </h5>
                <h4 class="mt-3 mb-3" style="font-size: 1.6rem; color: #fff;">
                  <?php
                  $total_active_complaints = $this->db->get_where('complaint', ['teacher_id' => $user_id, 'status' => '1'])->num_rows();
                  $total_closed_complaints = $this->db->get_where('complaint', ['teacher_id' => $user_id, 'status' => '0'])->num_rows();

                  echo 'Active: ' . $total_active_complaints . '&nbsp;&nbsp;Closed: ' . $total_closed_complaints;
                  ?>
                </h4>
                <p class="mb-0 text-muted" style="color: #fff;">
                  <span class="text-nowrap"
                    style="color: white; font-weight: 600; font-size: 16px;"><?php echo get_phrase('total_number_of_complaints'); ?></span>
                </p>
              </div>
            </div>
          </div>
          <!-- Complaints Count End -->

          <script>
            // Hover effect using JavaScript
            document.getElementById('complaints').addEventListener('mouseenter', function () {
              this.style.transform = 'translateY(-5px)';
              this.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
            });
            document.getElementById('complaints').addEventListener('mouseleave', function () {
              this.style.transform = 'translateY(0)';
              this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
            });
          </script>

          <!-- COMPLAINT SECTION END -->
          <!-- Today's Attendance Card Start -->
          <div class="col-xl-4">
            <!-- Today's Attendance Card Start -->
            <div class="card"
              style="background-image: linear-gradient(to left, #c2ba01, #ba7821, #8d4632, #4d262b, #0b090a);; border-radius: 12px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); color: #fff; overflow: hidden;">
              <div class="card-body">
                <h4 class="header-title text-white mb-3" style="font-size: 20px; font-weight: 600; text-align: center;">
                  <?php echo get_phrase('todays_attendance'); ?>
                </h4>
                <div class="text-center">
                  <h3 class="font-weight-bold text-white mb-2" style="font-size: 2.5rem;">
                    <?php
                    $students_attendance = $this->db->get_where('daily_attendances', [
                      'class_id' => $teacher_permissions_data['class_id'],
                      'school_id' => $school_id,
                      'status' => 1,
                      'timestamp' => strtotime(date('Y-m-d'))
                    ])->num_rows();
                    echo isset($students_attendance) ? $students_attendance : '0';
                    ?>
                  </h3>
                  <p class="text-light text-uppercase font-14 font-weight-bold" style="font-size: 16px !important; font-weight: 600 !important;
                     text-align: center; margin: 0 0;">
                    <?php echo isset($students_attendance) ? $students_attendance : '0'; ?>
                    <?php echo get_phrase('students_are_attending_today'); ?>
                  </p>
                </div>
              </div>
            </div>
            <!-- Today's Attendance Card End -->

            <?php if (isset($teacher_permissions_data['online_exam']) && $teacher_permissions_data['online_exam'] == '1'): ?>
              <!-- Exam Schedule Card Start -->
              <div class="card"
                style="background: linear-gradient(to right, #ff5722, #ff9800); border-radius: 12px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); color: #fff; overflow: hidden; margin-top: 20px;">
                <div class="card-body">
                  <h5 class="text-muted font-weight-normal mt-0" title="Exam Schedule">
                    <i class="mdi mdi-book-clock title_icon" style="font-size: 24px; color: #fff;"></i>
                    <?php echo get_phrase('Exam Schedule'); ?>
                    <a href="<?php echo route('exam'); ?>" style="color: #fff; display: none;" id="exam_list">
                      <i class="mdi mdi-export"></i>
                    </a>
                  </h5>
                  <h3 class="mt-3 mb-3" style="font-size: 2rem; color: #fff;">
                    <?php
                    $this->db->select('oed.*');
                    $this->db->from('online_exam_details oed');
                    $this->db->where('NOT EXISTS (
                                        SELECT oer.exam_status 
                                        FROM online_exam_result oer 
                                        WHERE oer.exam_id = oed.id
                                      )');
                    $check_data = $this->db->get()->result_array();
                    echo count($check_data) > 0 ? count($check_data) . ' Exams' : 'No Exams';
                    ?>
                  </h3>
                  <div class="table-responsive-sm">
                    <table class="table table-striped table-centered table-bordered mb-0">
                      <thead>
                        <tr>
                          <th><?php echo get_phrase('exam_name'); ?></th>
                          <th><?php echo get_phrase('starting_date'); ?></th>
                          <th><?php echo get_phrase('exam_time'); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (count($check_data) > 0): ?>
                          <?php foreach ($check_data as $data): ?>
                            <tr>
                              <td><?php echo $data['online_exam_name']; ?></td>
                              <td><?php echo $data['exam_start_date']; ?></td>
                              <td>
                                <?php echo $data['exam_start_time'] . " - " . $data['exam_end_time']; ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="3" class="text-center"><?php echo get_phrase('No Data Found'); ?></td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                  <p class="mb-0 text-muted text-center" style="color: #fff;">
                    <span class="text-nowrap"><?php echo get_phrase('Exam Schedule'); ?></span>
                  </p>
                </div>
              </div>
              <!-- Exam Schedule Card End -->
            <?php endif; ?>
          </div>

          <!-- Today's Attendance Card End -->

          <?php if (isset($teacher_permissions_data['online_exam']) && $teacher_permissions_data['online_exam'] == '1'): ?>
            <!-- Exam Schedule Card Start -->
            <div class="card"
              style="background: linear-gradient(to right, #f06292, #ec407a); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
              <div class="card-body">
                <h5 class="text-muted font-weight-normal mt-0" title="Exam Schedule">
                  <i class="mdi mdi-book-clock title_icon" style="font-size: 24px; color: #fff;"></i>
                  <?php echo get_phrase('Exam Schedule'); ?>
                  <a href="<?php echo route('exam'); ?>" style="color: #fff; display: none;" id="exam_list">
                    <i class="mdi mdi-export"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="color: #fff;">
                  <?php
                  $this->db->select('oed.*');
                  $this->db->from('online_exam_details oed');
                  $this->db->where('NOT EXISTS (
                                        SELECT oer.exam_status 
                                        FROM online_exam_result oer 
                                        WHERE oer.exam_id = oed.id
                                      )');
                  $check_data = $this->db->get()->result_array();
                  echo count($check_data) > 0 ? count($check_data) . ' Exams' : 'No Exams';
                  ?>
                </h3>
                <div class="table-responsive-sm">
                  <table class="table table-striped table-centered table-bordered mb-0">
                    <thead>
                      <tr>
                        <th><?php echo get_phrase('exam_name'); ?></th>
                        <th><?php echo get_phrase('starting_date'); ?></th>
                        <th><?php echo get_phrase('exam_time'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($check_data) > 0): ?>
                        <?php foreach ($check_data as $data): ?>
                          <tr>
                            <td><?php echo $data['online_exam_name']; ?></td>
                            <td><?php echo $data['exam_start_date']; ?></td>
                            <td>
                              <?php echo $data['exam_start_time'] . " - " . $data['exam_end_time']; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="3"><?php echo get_phrase('No Data Found'); ?></td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <p class="mb-0 text-muted" style="color: #fff;">
                  <span class="text-nowrap"><?php echo get_phrase('Exam Schedule'); ?></span>
                </p>
              </div>
            </div>
            <!-- Exam Schedule Card End -->
          <?php endif; ?>
        </div>
      </div> <!-- end row -->
      <div class="row">
        <!-- Upcoming classes and subjects start-->
        <div class="col-lg-6">
          <div class="card widget-flat" id="Class Schedule">
            <div class="card-body">
              <div class="float-end">
                <i class="mdi mdi-account-multiple widget-icon"></i>
              </div>
              <h5 class="text-muted font-weight-normal mt-0" title="Upcoming classes and subjects"> <i
                  class="mdi mdi-book-variant title_icon"></i>
                <?php echo get_phrase('Upcoming classes and subjects'); ?> <a href="<?php echo route('class'); ?>"
                  style="color: #6c757d; display: none;" id="class_list"><i class="mdi mdi-export"></i></a></h5>
              <h3 class="mt-3 mb-3">

              </h3>
              <?php
              $this->db->select('c.id as class_id, c.name as class_name, GROUP_CONCAT(s.name SEPARATOR " , ") as subjects');
              $this->db->from('routines r');
              $this->db->join('subjects s', 's.id = r.subject_id', 'left');
              $this->db->join('classes c', 'c.id = r.class_id', 'left');
              $checker = array(
                'r.school_id' => $teacher_table_data['school_id'],
                'r.teacher_id' => $teacher_table_data['id'],
                'r.class_id' => $teacher_table_data['class_id'],
                'r.section_id' => $teacher_table_data['section_id']
              );
              $this->db->where($checker);
              $this->db->group_by('c.id, c.name');
              $check_data = $this->db->get()->result_array();


              ?>
              <div class="table-responsive-sm">
                <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                  <thead>
                    <tr>
                      <th width="60%"><?php echo get_phrase('Class'); ?></th>
                      <th width="60%"><?php echo get_phrase('subject'); ?></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($check_data) > 0): ?>
                      <?php foreach ($check_data as $data):
                        $class_data = $this->db->get_where('classes', ['id' => $data['class_id']])->row_array();
                        $subject = $this->db->get_where('subjects', ['id' => $data['subject_id'], 'class_id' => $data['class_id']])->row_array();
                        ?>
                        <tr>
                          <td>
                            <?= $data['class_name']; ?>
                          </td>
                          <td><?= $data['subjects']; ?></td>
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
        <!-- Upcoming classes and subjects end-->
        <!-- Class Subects start-->
        <div class="col-lg-6">
          <div class="card widget-flat" id="class_subects">
            <div class="card-body">
              <div class="float-end">
                <i class="mdi mdi-account-multiple widget-icon"></i>
              </div>
              <h5 class="text-muted font-weight-normal mt-0" title="Class Subects"> <i
                  class="mdi mdi-book-multiple title_icon"></i> <?php echo get_phrase('Class Subects'); ?> <a
                  href="<?php echo route('class'); ?>" style="color: #6c757d; display: none;" id="class_sub_list"><i
                    class="mdi mdi-export"></i></a></h5>
              <h3 class="mt-3 mb-3">

              </h3>
              <?php
              $this->db->select('c.id as class_id, c.name as class_name, GROUP_CONCAT(s.name SEPARATOR " , ") as subjects');
              $this->db->from('classes c');
              $this->db->join('subjects s', 's.class_id = c.id', 'left');
              $this->db->where('c.school_id', $school_id);
              $this->db->where('c.id', $teacher_table_data['class_id']);
              $this->db->group_by('c.id, c.name');
              $check_data = $this->db->get()->result_array();
              ?>
              <div class="table-responsive-sm">
                <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                  <thead>
                    <tr>
                      <th width="60%"><?php echo get_phrase('Class'); ?></th>
                      <th width="60%"><?php echo get_phrase('subject'); ?></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($check_data) > 0): ?>
                      <?php foreach ($check_data as $data):
                        ?>
                        <tr>
                          <td>
                            <?= $data['class_name']; ?>
                          </td>
                          <td><?= $data['subjects']; ?></td>
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
        <!-- Class Subects end-->
      </div>
    </div> <!-- end col -->
  </div>
</div><!-- end col-->
</div>
<script>
  $(document).ready(function () {
    initDataTable("expense-datatable");
  });
</script>