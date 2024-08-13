<?php 
$school_id = school_id(); 
?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('assignvehicle/create'); ?>">
  <div class="form-row">

    <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
    <input type="hidden" name="session" value="<?php echo active_session();?>">
   
    
    <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('Route'); ?></label>
     <select name="route_id" id="route_id" class="form-control select6" data-toggle = "select6"  required>
                <option value=""><?php echo get_phrase('select_a_route'); ?></option>
                <?php $allroutes = $this->db->get('routes')->result_array(); ?>
                <?php foreach($allroutes as $routes){ ?>
                    <option value="<?php echo $routes['id']; ?>"><?php echo $routes['route_title']; ?></option>
                <?php } ?>
       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_route'); ?></small>
    </div>
    <div class="form-group mb-1">
      <label for=""><?php echo get_phrase('vehicle'); ?></label>
     <select name="vehicle_id" id="vehicle_id" class="form-control select6" data-toggle = "select6"  required>
                <option value=""><?php echo get_phrase('select_a_vehicle'); ?></option>
                <?php $allvehicle = $this->db->get('vehicle')->result_array(); ?>
                <?php foreach($allvehicle as $vehicle){ ?>
                    <option value="<?php echo $vehicle['id']; ?>"><?php echo $vehicle['vehicle_model']; ?></option>
                <?php } ?>
       </select>
         <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_vehicle'); ?></small>
    </div>
    
    <div class="form-group  col-md-12">
      <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('assign_Vehicle'); ?></button>
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
  ajaxSubmit(e, form, showAllAssignVehicle);
});


</script>
