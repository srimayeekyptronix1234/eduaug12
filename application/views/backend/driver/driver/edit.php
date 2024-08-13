<?php $driver_details = $this->db->get_where('driver', array('id' => $param1))->result_array(); ?>
<?php foreach($driver_details as $data){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('driver/update/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group mb-1">
            <label for=""><?php echo get_phrase('name'); ?></label>
         <select name="name" id="name" class="form-control select6" data-toggle = "select6"  required>
                    <option value=""><?php echo get_phrase('select_a_driver'); ?></option>
                    <?php $allvehicle = $this->db->get('vehicle')->result_array(); ?>
                    <?php foreach($allvehicle as $vehicle){ ?>
                        <option value="<?php echo $vehicle['vehicle_driver']; ?>"<?php if($vehicle['vehicle_driver'] == $data['name']){ echo 'selected';}?>><?php echo $vehicle['vehicle_driver']; ?></option>
                    <?php } ?>
           </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_driver'); ?></small>
        </div>
       
        <div class="form-group mb-1">
        <label for=""><?php echo get_phrase('Route'); ?></label>
        <select name="route_id" id="route_id" class="form-control select6" data-toggle = "select6"  required>
          <option value=""><?php echo get_phrase('select_a_route'); ?></option>
          <?php $allroutes = $this->db->get('routes')->result_array(); ?>
          <?php foreach($allroutes as $routes){ ?>
            <option value="<?php echo $routes['id']; ?>" <?php if($routes['id'] == $data['route_id']){ echo 'selected';}?>><?php echo $routes['route_title']; ?></option>
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
            <option value="<?php echo $vehicle['id']; ?>" <?php if($vehicle['id'] == $data['vehicle_id']){ echo 'selected';}?>><?php echo $vehicle['vehicle_model']; ?></option>
          <?php } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_vehicle'); ?></small>
      </div>

        <div class="form-group  col-md-12">
          <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_driver'); ?></button>
        </div>
 
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllDrivers);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});

</script>
