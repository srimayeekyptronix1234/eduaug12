<?php $school_id = school_id(); ?>
<?php $vehicle_data = $this->db->get_where('vehicle', array('id' => $param1))->result_array(); ?>
<?php foreach($vehicle_data as $vehicle){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('vehicle/update_vehicle/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group mb-1">
          <label for="name">Bus Number</label>
          <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" value="<?=$vehicle['vehicle_number']?>" required>
        </div>
        <div class="form-group mb-1">
          <label for="name">Bus Model</label>
          <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" value="<?=$vehicle['vehicle_model']?>" required>
        </div>
        <div class="form-group mb-1">
          <label for="name">Driver</label>
          <select name="vehicle_driver" id="vehicle_driver" class="form-control select6" data-toggle = "select6">
            <option value=""><?php echo get_phrase('select_a_driver'); ?></option>
            <?php 
            $this->db->select('u.name');
            $this->db->where('u.role','driver');
            $all_drivers=$this->db->get('users u')->result_array();

            ?>
            <?php foreach($all_drivers as $drivers){ ?>
              <option value="<?php echo $drivers['name']; ?>" <?php if($vehicle['vehicle_driver'] == $drivers['name']){echo 'selected';}?>><?php echo $drivers['name']; ?></option>
            <?php } ?>
          </select>

        </div>

        <div class="form-group mb-1">
          <label for="name">Note</label>
          <textarea class="form-control" id="example-textarea" rows="5" name = "note" placeholder="Note"><?=$vehicle['note']?></textarea>
        </div>
        <div class="form-group  col-md-12">
          <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_Vehicle'); ?></button>
        </div>
 
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllVehicle);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});

</script>
