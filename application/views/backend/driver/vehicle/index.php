<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-car-estate title_icon"></i> <?php echo get_phrase('vehicle'); ?>
        </h4>
        <!--<button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/vehicle/create'); ?>', '<?php echo get_phrase('add_vehicle'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_Vehicle'); ?></button>-->
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body vehicle_content">
                <?php include 'list.php'; ?>
            
           </div>
         </div>
     </div>
</div>

<script>

var showAllVehicle = function () {
        $.ajax({
            url: '<?php echo route('vehicle/list/') ?>',
            success: function(response){
                $('.vehicle_content').html(response);
            }
        });
    
}

</script>
