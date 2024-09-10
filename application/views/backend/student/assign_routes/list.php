<style>
  .table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1rem;
    color: #333;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius: 10PX;
  }

  .table-header {
    background-color: #013A7C;
    /* Blue background for header */
    color: #fff;
    /* White text color for header */
  }

  .table th,
  .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
  }

  .table-hover tbody tr:hover {
    background-color: #f1f1f1;
    /* Light grey background on hover */
  }

  .table .dropdown-menu {
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .table .dropdown-item {
    padding: 10px;
    color: #333;
  }

  .table .dropdown-item:hover {
    background-color: #f5f5f5;
    color: #007bff;
  }

  .table .btn-outline-secondary {
    border-color: #007bff;
    color: #007bff;
  }

  .table .btn-outline-secondary:hover {
    background-color: #007bff;
    color: #fff;
  }
</style>

<?php
$student_data = $this->user_model->get_logged_in_student_details();
$check_data = $this->db->get_where('assign_routes', ['user_id' => $student_data['user_id']])->result_array();


if (count($check_data) > 0): ?>
  <table id="basic-datatable" class="table table-hover dt-responsive nowrap" width="100%">
    <thead>
      <tr class="table-header">
        <th><?php echo get_phrase('Route'); ?></th>
        <th><?php echo get_phrase('Vehicle'); ?></th>
        <th><?php echo get_phrase('Driver Name'); ?></th>
        <th><?php echo get_phrase('Actions'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($check_data as $data) {
        $assign_vehicle_data = $this->db->get_where('assignvehicle', array('route_id' => $data['route_id']))->row_array();
        $route_data = $this->db->get_where('routes', array('id' => $assign_vehicle_data['route_id']))->row_array();
        $vehicle_data = $this->db->get_where('vehicle', array('id' => $assign_vehicle_data['vehicle_id']))->row_array();
        ?>
        <tr>
          <td><?php echo $route_data['route_title']; ?></td>
          <td><?php echo $vehicle_data['vehicle_model']; ?></td>
          <td><?php echo $vehicle_data['vehicle_driver']; ?></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn btn-icon btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:void(0);" class="dropdown-item"
                  onclick="rightModal('<?php echo site_url('modal/popup/assign_routes/edit/' . $data['id']) ?>', '<?php echo get_phrase('update_assign_route'); ?>');"><?php echo get_phrase('edit'); ?></a>
                <a href="javascript:void(0);" class="dropdown-item"
                  onclick="confirmModal('<?php echo route('assignroutes/delete/' . $data['id']); ?>', showAllAssignRoutes)"><?php echo get_phrase('delete'); ?></a>
              </div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

<?php else: ?>
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>