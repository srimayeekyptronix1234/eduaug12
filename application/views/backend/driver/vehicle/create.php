<?php 
$school_id = school_id(); 
?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('vehicle/create'); ?>">
  <div class="form-row">

    <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
    <input type="hidden" name="session" value="<?php echo active_session();?>">
   
    
    <div class="form-group mb-1">
      <label for="name">Bus Number</label>
      <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Bus Model</label>
      <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Driver</label>
      <input type="text" class="form-control" id="vehicle_driver" name="vehicle_driver" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Note</label>
      <textarea class="form-control" id="example-textarea" rows="5" name = "note" placeholder="Note"></textarea>
    </div>
    
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('add_Vehicle'); ?></button>
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
  ajaxSubmit(e, form, showAllVehicle);
});


</script>
