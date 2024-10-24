<style>
  .text-muted {
    text-align: left;
    text-transform: capitalize;
    font-weight: 500;
    color: #000 !important;
  }

  .boxhover {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }

  .boxhover:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  #myLineChart {
    width: 100% !important;
  }

  .adminbar {
    background: #ffdfe8;
    border-radius: 10px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .filbtn {
    background-color: #091E6C;
  }
</style>

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
              <?php echo get_phrase('attendance'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c;">
            Track student attendance efficiently and manage records easily.
          </p>
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
        <div class="col-md-3 mb-1">
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
        <div class="col-md-3 mb-1">
          <select name="year" id="year" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_year'); ?></option>
            <?php for ($year = 2015; $year <= date('Y'); $year++) { ?>
              <option value="<?php echo $year; ?>" <?php if (date('Y') == $year)
                   echo 'selected'; ?>><?php echo $year; ?>
              </option>
            <?php } ?>

          </select>
        </div>
        <div class="col-md-3 mb-1">
          <select name="role" id="role" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_staff_role'); ?></option>
            <?php
            $user_id = $this->session->userdata('user_id');

            $this->db->select('u.role');
            $this->db->where('u.role', 'accountant');
            $this->db->where('u.id', $user_id);
            $all_users = $this->db->get('users u')->result_array();
            ?>
            <?php foreach ($all_users as $users): ?>
              <option value="<?php echo $users['role']; ?>"><?php echo $users['role']; ?></option>
            <?php endforeach; ?>

          </select>
        </div>

        <div class="col-md-2">
          <button class="btn btn-block btn-secondary filbtn"
            onclick="filter_staff_attendance()"><?php echo get_phrase('filter'); ?></button>
        </div>
      </div>
      <div class="card-body staff_attendance_content">
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


  function filter_staff_attendance() {
    var month = $('#month').val();
    var year = $('#year').val();
    var role = $('#role').val();
    if (month != "" && year != "" && role != "") {
      getDailyStaffAttendance();
    } else {
      toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
    }
  }

  var getDailyStaffAttendance = function () {
    var month = $('#month').val();
    var year = $('#year').val();
    var role = $('#role').val();
    if (month != "" && year != "" && role != "") {
      $.ajax({
        type: 'POST',
        url: '<?php echo route('staff_attendance/filter') ?>',
        data: { month: month, year: year, role: role },
        success: function (response) {
          $('.staff_attendance_content').html(response);
          initDataTable('basic-datatable');
        }
      });
    } else {
      $.ajax({
        type: 'POST',
        url: '<?php echo route('staff_attendance/filter') ?>',
        data: { month: month, year: year, role: role },
        success: function (response) {
          $('.staff_attendance_content').html(response);
          initDataTable('basic-datatable');
        }
      });

    }
  }
</script>