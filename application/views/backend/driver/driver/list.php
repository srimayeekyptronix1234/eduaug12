<?php

$driver_data = $this->user_model->get_logged_in_driver_details();
$check_data = $this->db->get_where('driver', ['id' => $driver_data['id']])->row_array();
?>

<style>
  /* Table Styles */
  #basic-datatable {
    border-collapse: collapse;
    width: 100%;
    background: linear-gradient(135deg, #4a4a4a, #2a2a2a);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    color: #fff;
  }

  #basic-datatable thead {
    background-color: #1e1e2f;
    color: #ffffff;
  }

  #basic-datatable th,
  #basic-datatable td {
    padding: 15px;
    border: none;
    text-align: center;
    font-size: 16px;
    color: #fff;
  }

  #basic-datatable tbody tr {
    transition: background-color 0.3s, transform 0.3s;
    cursor: pointer;
  }

  #basic-datatable tbody tr:hover {
    background-color: #3c3c3c;
    transform: scale(1.02);
  }

  #basic-datatable tbody tr td {
    border-bottom: 1px solid #666;
  }
</style>

<?php if (count($check_data) > 0): ?>
  <table id="basic-datatable">
    <thead>
      <tr>
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
        <td><?= $check_data['name']; ?></td>
        <td><?= $route_data['route_title']; ?></td>
        <td><?= $vehicle_data['vehicle_model']; ?></td>
      </tr>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>