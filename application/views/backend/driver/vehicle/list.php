<?php
    $driver_data = $this->user_model->get_logged_in_driver_details();  
    $this->db->select('d.*,v.*');
    $this->db->from('driver d');
    $this->db->join('vehicle v', 'v.id = d.vehicle_id');
    $this->db->where('d.id', $driver_data['id']);
    $check_data=$this->db->get()->row_array();

   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Vehicle Number'); ?></th>
        <th><?php echo get_phrase('Vehicle Model'); ?></th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td><?php echo $check_data['vehicle_number']; ?></td>
          <td><?php echo $check_data['vehicle_model']; ?></td>
       
        </tr>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
