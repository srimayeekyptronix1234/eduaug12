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
    padding: 20PX;
  }

  .parbox:hover {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transition: 1s ease;
  }

  .boxbtn {
    background: #0272f3;
    color: white;
    padding-left: 30px;
    padding-right: 30px;
  }
</style>

<!--title-->
<div class="row">
  <div class="col-xl-12">
    <div class="card parentbar">
      <div class="card-body py-2 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="page-title d-inline-block">
            <i class="mdi mdi-routes title_icon"></i> <?php echo get_phrase('routes'); ?>
          </h4>
          <p class="inspiring-line">
            Charting the path to new possibilities and smoother journeys.
          </p>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
          onclick="rightModal('<?php echo site_url('modal/popup/routes/create'); ?>', '<?php echo get_phrase('add_routes'); ?>')">
          <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_routes'); ?>
        </button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card parbox">
      <div class="card-body route_content">
        <?php include 'list.php'; ?>

      </div>
    </div>
  </div>
</div>

<script>

  var showAllRoute = function () {
    $.ajax({
      url: '<?php echo route('routes/list/') ?>',
      success: function (response) {
        $('.route_content').html(response);
      }
    });

  }

</script>