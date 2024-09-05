<?php
$school_id = school_id();
 $all_staffs = $this->db->get_where('users', array('role' => $staff_role, 'school_id' => $school_id))->result_array();
if (count($all_staffs) > 0):
  foreach ($all_staffs as $staff): ?>
    <option value="<?php echo $staff['id']; ?>"><?php echo $staff['name']; ?></option>
  <?php endforeach; ?>
<?php else: ?>
  <option value=""><?php echo get_phrase('no_staff_found'); ?></option>
<?php endif; ?>
