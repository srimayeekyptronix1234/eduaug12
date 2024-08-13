<?php $school_id = school_id(); ?>
<?php $assign_routes_data = $this->db->get_where('assign_routes', array('id' => $param1))->result_array(); ?>
<?php foreach($assign_routes_data as $routes_data){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('assignroutes/update_assign_route/'.$param1); ?>">
    <div class="form-row">
        
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('Route'); ?></label>
          <select name="route_id" id="route_id" class="form-control select6" data-toggle = "select6"  required>
            <option value=""><?php echo get_phrase('select_a_route'); ?></option>
            <?php $allroutes = $this->db->get('routes')->result_array(); ?>
            <?php foreach($allroutes as $routes){ ?>
              <option value="<?php echo $routes['id']; ?>"<?php if($routes['id'] == $routes_data['route_id']){ echo 'selected';}?>><?php echo $routes['route_title']; ?></option>
            <?php } ?>
          </select>
          <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_route'); ?></small>
        </div>

  
        <div class="form-group  col-md-12">
          <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_assign_route'); ?></button>
        </div>
 
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllAssignRoutes);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});

</script>
