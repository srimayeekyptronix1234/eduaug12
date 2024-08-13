<?php
    
    $driver_data = $this->user_model->get_logged_in_driver_details(); 
    $check_data = $this->db->get_where('driver',['id'=>$driver_data['id']])->row_array();

   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Name'); ?></th>
        <th><?php echo get_phrase('Route'); ?></th>
        <th><?php echo get_phrase('Vehicle'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
          $route_data = $this->db->get_where('routes', array('id' => $check_data['route_id']))->row_array();
          $vehicle_data = $this->db->get_where('vehicle', array('id' => $check_data['vehicle_id']))->row_array();
        ?>
        <tr>
          <td><?=$check_data['name'];?></td>
          <td><?=$route_data['route_title'];?></td>
          <td><?=$vehicle_data['vehicle_model'];?></td>
        </tr>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
