<?php
$driver_data = $this->user_model->get_logged_in_driver_details();
$this->db->select('d.*,v.*');
$this->db->from('driver d');
$this->db->join('vehicle v', 'v.id = d.vehicle_id');
$this->db->where('d.id', $driver_data['id']);
$check_data = $this->db->get()->row_array();
?>

<style>
  /* Dark Gradient Table Styling */
  #basic-datatable {
    width: 100%;
    border-collapse: collapse;
    background: linear-gradient(135deg, #121212, #1c1c1c);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
    color: #ffffff;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
  }

  #basic-datatable thead {
    background: linear-gradient(135deg, #333333, #444444);
    color: #ffffff;
  }

  #basic-datatable th {
    padding: 15px;
    font-size: 16px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  #basic-datatable tbody tr {
    background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
    transition: all 0.3s ease;
    cursor: pointer;
  }

  #basic-datatable tbody tr:hover {
    background: linear-gradient(135deg, #292929, #383838);
    transform: scale(1.01);
  }

  #basic-datatable td {
    padding: 15px;
    text-align: center;
    border: none;
    font-size: 14px;
    color: #e0e0e0;
  }

  /* Borders and Hover */
  #basic-datatable th,
  #basic-datatable td {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  /* Hover effect on table cells */
  #basic-datatable tbody tr:hover td {
    color: #ffffff;
  }
</style>

<?php if (count($check_data) > 0): ?>
  <table id="basic-datatable" class="table dt-responsive nowrap">
    <thead>
      <tr>
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
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>