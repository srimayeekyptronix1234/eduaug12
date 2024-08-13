<?php $users_details = $this->db->get_where('users', array('id' => $param1,'role'=>'hr'))->result_array(); ?>
<?php foreach($users_details as $data){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('users_list/update/'.$param1); ?>">
    <div class="form-row">
         <div class="form-group mb-1">
            <label for="name"><?php echo get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$data['name']?>"required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_user_name'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('email'); ?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$data['email']?>" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_candidate_email'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('phone_number'); ?></label>
            <input type="text" class="form-control" id="phone" value="<?=$data['phone']?>" name="phone" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_user_phone'); ?></small>
        </div>

        <div class="form-group  col-md-12">
          <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_user'); ?></button>
        </div>
 
    </div>
</form>
<?php } ?>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllUsers);
});

$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create']);
});

</script>
