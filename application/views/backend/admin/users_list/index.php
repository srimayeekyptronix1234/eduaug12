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
  }

  .parbox:hover {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transition: 1s ease;
  }
</style>

<!--title-->
<div class="row">
  <div class="col-xl-12">
    <div class="card parentbar">
      <div class="card-body py-2 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="page-title d-flex align-items-center">
            <i class="mdi mdi-account-circle title_icon"></i>
            <span class="ms-2"><?php echo get_phrase('user'); ?></span>
          </h4>
          <p class="inspiring-line mt-2">
            Empowering your team with tools for success.
          </p>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
          onclick="rightModal('<?php echo site_url('modal/popup/users_list/create'); ?>', '<?php echo get_phrase('create_HR'); ?>')">
          <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_HR'); ?>
        </button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
  <div class="col-12">
    <div class="card parbox">
      <div class="card-body user_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
  var showAllUsers = function () {
    var url = '<?php echo route('users_list/list'); ?>';

    $.ajax({
      type: 'GET',
      url: url,
      success: function (response) {
        // Hide the loader
        document.getElementById('loader').style.display = 'none';
        document.getElementById('submitbtn').disabled = false;
        $('.user_content').html(response);
        initDataTable('basic-datatable');
      }
    });
  }
</script>