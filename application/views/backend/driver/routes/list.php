<?php
   
    $driver_data = $this->user_model->get_logged_in_driver_details();  
    $check_data = $this->db->get_where('routes',['id'=>$driver_data['route_id']])->row_array();
   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Route Title'); ?></th>
        <th><?php echo get_phrase('Route Fare'); ?></th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td><?php echo $check_data['route_title']; ?></td>
          <td><?php echo $check_data['route_fare']; ?></td>
       
        </tr>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
