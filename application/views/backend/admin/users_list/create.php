<form method="POST" class="d-block ajaxForm" action="<?php echo route('users_list/create'); ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group mb-1">
            <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
            <label for="name"><?php echo get_phrase('name'); ?></label>
            <input type="text" class="form-control" id="name" name="name" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_user_name'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('email'); ?></label>
            <input type="email" class="form-control" id="email" name="email" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_candidate_email'); ?></small>
        </div>
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('password'); ?></label>
             <input type="password" name="password" class="form-control"  value="" placeholder="Password" required>
             <small id="class_help" class="form-text text-muted"><?php echo get_phrase('password'); ?></small>        
        </div>

        <div class="form-group mb-1">
            <label for="email"><?php echo get_phrase('phone_number'); ?></label>
            <input type="text" class="form-control" id="phone" name="phone" required>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_user_phone'); ?></small>
        </div>

        <div class="form-group mt-2 col-md-12">
            <button class="btn btn-block btn-primary" id="submitbtn" type="submit"><?php echo get_phrase('submit'); ?></button>
            <img id="loader" style="display:none; text-align:center;" src="<?php echo base_url('assets/backend/images/straight-loader.gif'); ?>" alt="Loading..." width="30px" height="30px"/>
        </div>
    </div>
</form>

<script>



$(document).ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#department', '#gender', '#blood_group', '#show_on_website']);
});


$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    e.preventDefault(); // Prevent the default form submission
    if ($(this).valid()) {
    // Show the loader
    document.getElementById('loader').style.display = 'block';
    document.getElementById('submitbtn').disabled = true;
    var form = $(this);
    ajaxSubmit(e, form, showAllUsers);
    }
});
</script>
