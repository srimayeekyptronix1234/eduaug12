<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-routes title_icon"></i> <?php echo get_phrase('routes'); ?>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
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
            success: function(response){
                $('.route_content').html(response);
            }
        });
    
}

</script>
