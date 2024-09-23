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

  .filbtn {
    color: #fff;
    background-color: #00398f;
    border-color: #00398f;
    padding: 6px 50px;
  }
</style>

<?php
$user_id = $this->session->userdata('user_id');
$teacher_table_data = $this->db->get_where('teachers', ['user_id' => $user_id])->row_array();

?>
<!--title-->
<div class="row d-print-none">
  <div class="col-xl-12">
    <div class="card adminbar">
      <div class="card-body d-flex align-items-center justify-content-between py-2">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-calendar-today title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('daily_attendances'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
            Track daily attendance seamlessly with Eduquest
          </p>
        </div>
        <div>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
            onclick="rightModal('<?php echo site_url('modal/popup/attendance/take_attendance'); ?>', '<?php echo get_phrase('take_attendance'); ?>')">
            <i class="mdi mdi-plus"></i> <?php echo get_phrase('take_attendance'); ?>
          </button>
          <?php if (addon_status('biometric-attendance')): ?>
            <button type="button" class="btn btn-outline-info btn-rounded alignToTitle float-end mt-1 me-1"
              onclick="rightModal('<?php echo site_url('modal/popup/attendance/biometric_attendance'); ?>', '<?php echo get_phrase('import_biometric_attendance'); ?>')">
              <i class="mdi mdi-plus"></i> <?php echo get_phrase('biometric_attendance'); ?>
            </button>
          <?php endif; ?>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card boxhover">
      <div class="row mt-3 d-print-none">
        <div class="col-md-1 mb-1"></div>
        <div class="col-md-2 mb-1">
          <select name="month" id="month" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_month'); ?></option>
            <option value="Jan" <?php if (date('M') == 'Jan')
              echo 'selected'; ?>><?php echo get_phrase('january'); ?>
            </option>
            <option value="Feb" <?php if (date('M') == 'Feb')
              echo 'selected'; ?>><?php echo get_phrase('february'); ?>
            </option>
            <option value="Mar" <?php if (date('M') == 'Mar')
              echo 'selected'; ?>><?php echo get_phrase('march'); ?>
            </option>
            <option value="Apr" <?php if (date('M') == 'Apr')
              echo 'selected'; ?>><?php echo get_phrase('april'); ?>
            </option>
            <option value="May" <?php if (date('M') == 'May')
              echo 'selected'; ?>><?php echo get_phrase('may'); ?>
            </option>
            <option value="Jun" <?php if (date('M') == 'Jun')
              echo 'selected'; ?>><?php echo get_phrase('june'); ?>
            </option>
            <option value="Jul" <?php if (date('M') == 'Jul')
              echo 'selected'; ?>><?php echo get_phrase('july'); ?>
            </option>
            <option value="Aug" <?php if (date('M') == 'Aug')
              echo 'selected'; ?>><?php echo get_phrase('august'); ?>
            </option>
            <option value="Sep" <?php if (date('M') == 'Sep')
              echo 'selected'; ?>><?php echo get_phrase('september'); ?>
            </option>
            <option value="Oct" <?php if (date('M') == 'Oct')
              echo 'selected'; ?>><?php echo get_phrase('october'); ?>
            </option>
            <option value="Nov" <?php if (date('M') == 'Nov')
              echo 'selected'; ?>><?php echo get_phrase('november'); ?>
            </option>
            <option value="Dec" <?php if (date('M') == 'Dec')
              echo 'selected'; ?>><?php echo get_phrase('december'); ?>
            </option>
          </select>
        </div>
        <div class="col-md-2 mb-1">
          <select name="year" id="year" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_year'); ?></option>
            <?php for ($year = 2015; $year <= date('Y'); $year++) { ?>
              <option value="<?php echo $year; ?>" <?php if (date('Y') == $year)
                   echo 'selected'; ?>><?php echo $year; ?>
              </option>
            <?php } ?>

          </select>
        </div>
        <div class="col-md-2 mb-1">
          <select name="class" id="class_id" class="form-control select2" data-bs-toggle="select2"
            onchange="classWiseSectionTeacherLogin(this.value,'<?= $teacher_table_data['section_id'] ?>')" required>
            <option value=""><?php echo get_phrase('select_a_class'); ?></option>
            <?php
            $classes = $this->db->get_where('classes', array('id' => $teacher_table_data['class_id'], 'school_id' => school_id()))->result_array();
            foreach ($classes as $class) {
              ?>
              <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-2 mb-1">
          <select name="section" id="section_id" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_section'); ?></option>
          </select>
        </div>
        <div class="col-md-2">
          <button class="btn btn-block btn-secondary filbtn"
            onclick="filter_attendance()"><?php echo get_phrase('filter'); ?></button>
        </div>
      </div>
      <div class="card-body attendance_content">
        <div class="empty_box text-center">
          <img class="mb-3" width="150px" src="<?php echo base_url('assets/backend/images/empty_box.png'); ?>" />
          <br>
          <span class=""><?php echo get_phrase('no_data_found'); ?></span>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('document').ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#month', '#year', '#class_id', '#section_id']);
  });

  function classWiseSectionTeacherLogin(classId, sectionId) {
    $.ajax({
      url: "<?php echo route('section/list/'); ?>" + classId + '/' + sectionId,
      success: function (response) {
        $('#section_id').html(response);
      }
    });
  }

  function filter_attendance() {
    var month = $('#month').val();
    var year = $('#year').val();
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if (class_id != "" && section_id != "" && month != "" && year != "") {
      getDailtyAttendance();
    } else {
      toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
    }
  }

  var getDailtyAttendance = function () {
    var month = $('#month').val();
    var year = $('#year').val();
    var class_id = $('#class_id').val();
    var section_id = $('#section_id').val();
    if (class_id != "" && section_id != "" && month != "" && year != "") {
      $.ajax({
        type: 'POST',
        url: '<?php echo route('attendance/filter') ?>',
        data: { month: month, year: year, class_id: class_id, section_id: section_id },
        success: function (response) {
          $('.attendance_content').html(response);
          initDataTable('basic-datatable');
        }
      });
    }
  }
</script>