<?php
if (isset($class_id)):
  $school_id = school_id();
  $check_data = $this->db->get_where('subjects', array('school_id' => $school_id, 'session' => active_session(), 'class_id' => $class_id))->result_array();
  if (count($check_data) > 0): ?>
    <style>
      /* Cool table styles */
      .cool-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #f8f9fa;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
      }

      .cool-table thead tr {
        background-color: #00398F;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: bold;
      }

      .cool-table thead th {
        padding: 12px 15px;
        text-align: left;
      }

      .cool-table tbody tr {
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s ease;
      }

      .cool-table tbody tr:hover {
        background-color: #eaf4fc;
        cursor: pointer;
      }

      .cool-table tbody td {
        padding: 10px 15px;
        font-size: 16px;
        color: #333;
        font-weight: 600;
      }

      /* Responsive design */
      @media screen and (max-width: 768px) {
        .cool-table tbody td {
          display: block;
          width: 100%;
          text-align: right;
          position: relative;
          padding-left: 50%;
        }

        .cool-table tbody td:before {
          content: attr(data-label);
          position: absolute;
          left: 15px;
          width: 50%;
          padding-right: 15px;
          font-weight: bold;
          text-transform: uppercase;
        }
      }
    </style>

    <table id="basic-datatable" class="table cool-table dt-responsive nowrap" width="100%">
      <thead>
        <tr>
          <th><?php echo get_phrase('Name'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $school_id = school_id();
        $subjects = $this->db->get_where('subjects', array('school_id' => $school_id, 'session' => active_session(), 'class_id' => $class_id))->result_array();
        foreach ($subjects as $subject): ?>
          <tr>
            <td data-label="<?php echo get_phrase('Name'); ?>"><?php echo $subject['name']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
  <?php endif; ?>
<?php else: ?>
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>