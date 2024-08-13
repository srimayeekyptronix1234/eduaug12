<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-car-estate title_icon"></i> <?php echo get_phrase('assign routes'); ?>
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/transport/create'); ?>', '<?php echo get_phrase('assign_routes'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('assign_routes'); ?></button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body assign_routes_content">
                <?php include 'routes_list.php'; ?>
            
           </div>
</div>
</div>
</div>

<script>

var showAllAssignRoutes = function () {
        $.ajax({
            url: '<?php echo route('assignroutes/list/') ?>',
            success: function(response){
                $('.assign_routes_content').html(response);
            }
        });
    
}

</script>
