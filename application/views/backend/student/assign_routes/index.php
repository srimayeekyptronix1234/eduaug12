<style>
  .boxhover {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }

  .boxhover:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  .adminbar {
    background: #ffdfe8;
    border-radius: 10px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

  }

  .card {
    border: none !important;
  }
</style>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body d-flex align-items-center justify-content-between adminbar py-2">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-car-estate title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('assign_routes'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
            Efficiently manage and assign routes to ensure smooth transportation operations and streamline route
            updates.
          </p>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded mt-1"
          onclick="rightModal('<?php echo site_url('modal/popup/assign_routes/create'); ?>', '<?php echo get_phrase('update_Transport_routes'); ?>')">
          <i class="mdi mdi-plus"></i> <?php echo get_phrase('update_Transport_routes'); ?>
        </button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card boxhover">
      <div class="card-body assign_routes_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
  var showAllAssignRoutes = function () {
    $.ajax({
      url: '<?php echo route('assignroutes/list/') ?>',
      success: function (response) {
        $('.assign_routes_content').html(response);
      }
    });

  }
</script>