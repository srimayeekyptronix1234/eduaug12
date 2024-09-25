<?php
if(!empty($section_id) && !empty($class_id))
{
 $sections = $this->db->get_where('sections', array('id' => $section_id))->result_array();
}
else 
{
  $sections = $this->db->get_where('sections', array('class_id' => $class_id))->result_array();
}

if (count($sections) > 0):
  foreach ($sections as $section): ?>
    <option value="<?php echo $section['id']; ?>"><?php echo $section['name']; ?></option>
  <?php endforeach; ?>
<?php else: ?>
  <option value=""><?php echo get_phrase('no_section_found'); ?></option>
<?php endif; ?>
