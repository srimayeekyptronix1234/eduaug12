<?php $school_id = school_id(); ?>
<?php $routes_data = $this->db->get_where('routes', array('id' => $param1))->result_array(); ?>
<?php foreach($routes_data as $route){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('routes/update_route/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group mb-1">
          <label for="name">Route Title</label>
          <input type="text" class="form-control" id="route_title" name="route_title" value="<?=$route['route_title'];?>" required>
        </div>
        <div class="form-group mb-1">
          <label for="name">Fare</label>
          <input type="number" class="form-control" id="route_fare" name="route_fare" value="<?=$route['route_fare'];?>" required>
        </div>
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_route'); ?></button>
        </div>
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllRoute);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});

</script>
