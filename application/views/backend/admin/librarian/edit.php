<?php
$users = $this->db->get_where('users', array('id' => $param1))->result_array();
foreach($users as $user){
    ?>
    <form method="POST" class="d-block ajaxForm" action="<?php echo route('librarian/update/'.$param1); ?>">
        <div class="form-row">
            <div class="form-group mb-1">
                <label for="name"><?php echo get_phrase('name'); ?></label>
                <input type="text" value="<?php echo $user['name']; ?>" class="form-control" id="name" name = "name" required>
                <small id="" class="form-text text-muted"><?php echo get_phrase('provide_name'); ?></small>
            </div>

            <div class="form-group mb-1">
                <label for="email"><?php echo get_phrase('email'); ?></label>
                <input type="email" value="<?php echo $user['email']; ?>" class="form-control" id="email" name = "email" required>
                <small id="" class="form-text text-muted"><?php echo get_phrase('provide_email'); ?></small>
            </div>

            <div class="form-group mb-1">
                <label for="phone"><?php echo get_phrase('phone'); ?></label>
                <input type="text" value="<?php echo $user['phone']; ?>" class="form-control" id="phone" name = "phone" required>
                <small id="" class="form-text text-muted"><?php echo get_phrase('provide_phone_number'); ?></small>
            </div>
            <div class="form-group mb-1">
              <label for="salary"><?php echo get_phrase('salary'); ?></label>
              <input type="text" class="form-control" id="salary" name = "salary" value="<?=$user['salary'];?>">
              <small id="" class="form-text text-muted"><?php echo get_phrase('provide_salary'); ?></small>
          </div>

            <div class="form-group mb-1">
                <label for="gender"><?php echo get_phrase('gender'); ?></label>
                <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
                    <option value=""><?php echo get_phrase('select_a_gender'); ?></option>
                    <option value="Male" <?php if($user['gender'] == 'Male') echo 'selected'; ?>><?php echo get_phrase('male'); ?></option>
                    <option value="Female" <?php if($user['gender'] == 'Female') echo 'selected'; ?>><?php echo get_phrase('female'); ?></option>
                    <option value="Others" <?php if($user['gender'] == 'Others') echo 'selected'; ?>><?php echo get_phrase('others'); ?></option>
                </select>
                <small id="" class="form-text text-muted"><?php echo get_phrase('provide_gender'); ?></small>
            </div>

            <div class="form-group mb-1">
                <label for="blood_group"><?php echo get_phrase('blood_group'); ?></label>
                <select name="blood_group" id="blood_group" class="form-control select2" data-toggle = "select2">
                    <option value=""><?php echo get_phrase('select_a_blood_group'); ?></option>
                    <option value="a+" <?php if($user['blood_group'] == 'a+') echo 'selected'; ?>>A+</option>
                    <option value="a-" <?php if($user['blood_group'] == 'a-') echo 'selected'; ?>>A-</option>
                    <option value="b+" <?php if($user['blood_group'] == 'b+') echo 'selected'; ?>>B+</option>
                    <option value="b-" <?php if($user['blood_group'] == 'b-') echo 'selected'; ?>>B-</option>
                    <option value="ab+" <?php if($user['blood_group'] == 'ab+') echo 'selected'; ?>>AB+</option>
                    <option value="ab-" <?php if($user['blood_group'] == 'ab-') echo 'selected'; ?>>AB-</option>
                    <option value="o+" <?php if($user['blood_group'] == 'o+') echo 'selected'; ?>>O+</option>
                    <option value="o-" <?php if($user['blood_group'] == 'o-') echo 'selected'; ?>>O-</option>
                </select>
                <small id="" class="form-text text-muted"><?php echo get_phrase('provide_blood_group'); ?></small>
            </div>

            <div class="form-group mb-1">
                <label for="address"><?php echo get_phrase('address'); ?></label>
                <textarea class="form-control" id="address" name = "address" rows="5" required><?php echo $user['address']; ?></textarea>
                <small id="" class="form-text text-muted"><?php echo get_phrase('provide_address'); ?></small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_librarian'); ?></button>
            </div>
        </div>
    </form>
<?php } ?>

<script>
$(document).ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#gender', '#blood_group']);
});
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, showAllLibrarians);
});
</script>
