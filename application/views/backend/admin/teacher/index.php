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

  .teacherbox {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    background: #ffdfe8;
  }

  .inspiring-line {
    font-size: 16px;
    font-weight: 600;
    color: #2c2c2c !important;
  }

  .btn-outline-primary {
    color: #536de6;
    margin-top: 27px;
    border-color: #536de6;
  }

  .teacherbar {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

  }
</style>

<!--title-->
<div class="row">
  <div class="col-xl-12">
    <div class="card teacherbox">
      <div class="card-body d-flex justify-content-between align-items-start">
        <div class="text-content">
          <div class="d-flex align-items-center mb-2">
            <i class="mdi mdi-account-circle title_icon"></i>
            <h4 class="page-title ms-2 mb-0">
              <?php echo get_phrase('teachers_panel'); ?>
            </h4>
          </div>
          <p class="inspiring-line mb-2">
            Guiding every step towards a brighter and more successful future.
          </p>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded"
          onclick="rightModal('<?php echo site_url('modal/popup/teacher/create'); ?>', '<?php echo get_phrase('create_teacher'); ?>')">
          <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_teacher'); ?>
        </button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>



<div class="row">
  <div class="col-12">
    <div class="card teacherbar">
      <div class="card-body teacher_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
  var showAllTeachers = function () {
    var url = '<?php echo route('teacher/list'); ?>';

    $.ajax({
      type: 'GET',
      url: url,
      success: function (response) {
        $('.teacher_content').html(response);
        initDataTable('basic-datatable');
      }
    });
  }
</script>