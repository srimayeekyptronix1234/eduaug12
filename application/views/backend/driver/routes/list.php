<?php
$driver_data = $this->user_model->get_logged_in_driver_details();
$check_data = $this->db->get_where('routes', ['id' => $driver_data['route_id']])->row_array();
?>

<style>
  /* Table Styling */
  #basic-datatable {
    width: 100%;
    border-collapse: collapse;
    background: linear-gradient(135deg, #ff758c, #ff7eb3);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    color: #fff;
    margin-top: 20px;
  }

  #basic-datatable thead {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #ffffff;
  }

  #basic-datatable th {
    padding: 15px;
    font-size: 18px;
    text-align: center;
    color: #ffffff;
  }

  #basic-datatable tbody tr {
    background: linear-gradient(135deg, #89fffd, #ef32d9);
    transition: background-color 0.3s, transform 0.3s;
    cursor: pointer;
  }

  #basic-datatable tbody tr:hover {
    background: linear-gradient(135deg, #ff512f, #dd2476);
    transform: scale(1.02);
  }

  #basic-datatable td {
    padding: 15px;
    text-align: center;
    border: none;
    font-size: 16px;
    color: #ffffff;
  }

  /* Adding slight borders for clarity */
  #basic-datatable th,
  #basic-datatable td {
    border-bottom: 2px solid rgba(255, 255, 255, 0.2);
  }
</style>

<?php if (count($check_data) > 0): ?>
  <table id="basic-datatable" class="table dt-responsive nowrap">
    <thead>
      <tr>
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
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>