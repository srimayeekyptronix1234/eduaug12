<?php 
$school_id = school_id(); 
?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('routes/create'); ?>">
  <div class="form-row">

    <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
    <input type="hidden" name="session" value="<?php echo active_session();?>">
   
    
    <div class="form-group mb-1">
      <label for="name">Route Title</label>
      <input type="text" class="form-control" id="route_title" name="route_title" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Fare</label>
      <input type="number" class="form-control" id="route_fare" name="route_fare" required>
    </div>
    
   
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('add_route'); ?></button>
    </div>
  </div>
</form>

<script>
$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllRoute);
});


</script>
