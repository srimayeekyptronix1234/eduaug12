<form method="POST" class="d-block ajaxForm" action="<?php echo route('driver/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('name'); ?></label>
         <select name="name" id="name" class="form-control select6" data-toggle = "select6"  required>
                    <option value=""><?php echo get_phrase('select_a_driver'); ?></option>
                    <?php $allvehicle = $this->db->get('vehicle')->result_array(); ?>
                    <?php foreach($allvehicle as $vehicle){ ?>
                        <option value="<?php echo $vehicle['vehicle_driver']; ?>"><?php echo $vehicle['vehicle_driver']; ?></option>
                    <?php } ?>
           </select>
             <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_driver'); ?></small>
        
        </div>
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('email'); ?></label>
             <input type="email" name="email" class="form-control"  value="" placeholder="Email" required>
             <small id="class_help" class="form-text text-muted"><?php echo get_phrase('email'); ?></small>        
        </div>
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('password'); ?></label>
             <input type="password" name="password" class="form-control"  value="" placeholder="Password" required>
             <small id="class_help" class="form-text text-muted"><?php echo get_phrase('password'); ?></small>        
        </div>
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('phone'); ?></label>
             <input type="text" name="phone" class="form-control"  value="" placeholder="Phone" required>
             <small id="class_help" class="form-text text-muted"><?php echo get_phrase('phone'); ?></small>        
        </div>
       
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
                <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('add_driver'); ?></button>
            </div>
        </div>
</form>

<script>
$(document).ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#gender', '#blood_group']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllDrivers);
});
</script>
