<style>
  .title_icon {
    font-size: 1.5rem;
    color: #ff7580;
    vertical-align: middle;
  }

  .page-title {
    font-size: 20px;
    font-weight: 700;
    color: #ff7580;
    line-height: 1.5;
  }

  .ms-2 {
    margin-left: 0.5rem;
  }

  .parentbar {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    background: #ffdfe8;
  }

  .inspiring-line {
    font-size: 16px;
    color: #2c2c2c !important;
    font-weight: 600;
  }

  .parbox {
    font-weight: 600;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius: 10px;
    padding: 20px 10px 20px 10px;
  }

  .parbox:hover {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transition: 1s ease;
  }

  .filbtn {
    background: #0272f3;
  }
</style>

<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card parentbar">
      <div class="card-body py-2 d-flex flex-column">
        <h4 class="page-title d-flex align-items-center">
          <i class="mdi mdi-account-switch title_icon"></i>
          <span class="ms-2"><?php echo get_phrase('student_promotion'); ?></span>
        </h4>
        <p class="inspiring-line">
          Fostering growth and unlocking potential with every advancement.
        </p>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row ">
  <div class="col-xl-12">
    <div class="card parbox">
      <div class="card-body">
        <div class="row justify-content-md-center d-print-none" style="margin-bottom: 10px;">
          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <label for="session_from"><?php echo get_phrase('current_session'); ?></label>
            <select class="form-control select2" data-toggle="select2" id="session_from" name="session_from">
              <option value=""><?php echo get_phrase('session_from'); ?></option>
              <?php
              $sessions = $this->crud_model->get_session()->result_array();
              foreach ($sessions as $session): ?>
                <option value="<?php echo $session['id']; ?>"><?php echo $session['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <label for="session_to"><?php echo get_phrase('next_session'); ?></label>
            <select class="form-control select2" data-toggle="select2" id="session_to" name="session_to">
              <option value=""><?php echo get_phrase('session_to'); ?></option>
              <?php
              $sessions = $this->crud_model->get_session()->result_array();
              foreach ($sessions as $session): ?>
                <option value="<?php echo $session['id']; ?>"><?php echo $session['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <label for="class_id_from"><?php echo get_phrase('promoting_from'); ?></label>
            <select name="class_id_from select2" data-toggle="select2" id="class_id_from" class="form-control" required>
              <option value=""><?php echo get_phrase('promoting_from'); ?></option>
              <?php
              $classes = $this->crud_model->get_classes()->result_array();
              foreach ($classes as $class): ?>
                <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <label for="class_id_to"><?php echo get_phrase('promoting_to'); ?></label>
            <select name="class_id_to" class="form-control select2" data-toggle="select2" id="class_id_to" required>
              <option value=""><?php echo get_phrase('promoting_to'); ?></option>
              <?php
              $classes = $this->crud_model->get_classes()->result_array();
              foreach ($classes as $class): ?>
                <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <label for="manage_student" style="color: white;"><?php echo get_phrase('manage_button') ?></label>
            <button type="button" class="btn btn-icon btn-secondary form-control filbtn" id="manage_student"
              onclick="manageStudent()"><?php echo get_phrase('manage_promotion'); ?></button>
          </div>
        </div>

        <div class="table-responsive-sm student_to_promote_content">
          <?php include 'list.php'; ?>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('select.select2:not(.normal)').each(function () {
      $(this).select2({ dropdownParent: '#right-modal' });
    });
  });

  function manageStudent() {
    var session_from = $('#session_from').val();
    var session_to = $('#session_to').val();
    var class_id_from = $('#class_id_from').val();
    var class_id_to = $('#class_id_to').val();
    if (session_from > 0 && session_to > 0 && class_id_from > 0 && class_id_to > 0) {
      var url = '<?php echo route('promotion/list'); ?>';
      $.ajax({
        type: 'POST',
        url: url,
        data: { session_from: session_from, session_to: session_to, class_id_from: class_id_from, class_id_to: class_id_to, _token: '{{ @csrf_token() }}' },
        success: function (response) {
          $('.student_to_promote_content').html(response);
        }
      });
    } else {
      toastr.error('<?php echo get_phrase('please_make_sure_to_fill_all_the_necessary_fields'); ?>');
    }
  }
</script>