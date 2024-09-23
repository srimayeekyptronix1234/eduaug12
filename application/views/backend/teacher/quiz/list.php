<style>
  .table {
    border-collapse: collapse;
    width: 100%;
  }

  .table thead {
    background: linear-gradient(195deg, #ff00c3, #d123ba, #a42dab, #7b2f97, #552b80, #342465, #181a48, #050b2b);
    color: #ffffff;
  }

  .table th,
  .table td {
    padding: 12px;
    border-bottom: 1px solid #dee2e6;
  }

  .table tbody tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
  }

  td {
    color: #000;
    font-weight: 600;
    font-size: 16px;
  }

  .dropdown-btn {
    background-color: #007bff;
    color: white;
  }

  .dropdown-menu {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .dropdown-item {
    padding: 10px 15px;
    color: #333;
  }

  .dropdown-item:hover {
    background-color: #007bff;
    color: white;
  }

  .btn-success {
    background-color: #28a745;
    color: white;
  }
</style>

<?php
if (isset($class_id) && isset($exam) && isset($subject_id)):
  $school_id = school_id();
  $check_data = $this->db->get_where('quiz', array('school_id' => $school_id, 'class_id' => $class_id, 'quarter_id' => $exam, 'subject_id' => $subject_id))->result_array();

  if (count($check_data) > 0): ?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap">
      <thead>
        <tr>
          <th><?php echo get_phrase('Questions'); ?></th>
          <th><?php echo get_phrase('Actions'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $quiz_data = $this->db->get_where('quiz', array('school_id' => $school_id, 'class_id' => $class_id, 'quarter_id' => $exam, 'subject_id' => $subject_id))->result_array();
        foreach ($quiz_data as $quiz): ?>
          <tr>
            <td><?php echo $quiz['questions']; ?></td>
            <td>
              <div class="dropdown text-center">
                <button type="button" class="btn btn-sm btn-icon btn-rounded dropdown-btn dropdown-toggle"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="javascript:void(0);" class="dropdown-item"
                    onclick="rightModal('<?php echo site_url('modal/popup/quiz/edit/' . $quiz['id']) ?>', '<?php echo get_phrase('update_Quiz'); ?>');">
                    <?php echo get_phrase('edit'); ?>
                  </a>
                  <a href="javascript:void(0);" class="dropdown-item"
                    onclick="confirmModal('<?php echo route('quiz/delete/' . $quiz['id']); ?>', showAllQuiz)">
                    <?php echo get_phrase('delete'); ?>
                  </a>
                </div>
              </div>
            </td>
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