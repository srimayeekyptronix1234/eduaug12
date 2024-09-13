<style>
  .text-muted {
    text-align: left;
    text-transform: capitalize;
    font-weight: 500;
    color: #000 !important;
  }

  .boxhover {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }

  .boxhover:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  #myLineChart {
    width: 100% !important;
  }

  .adminbar {
    background: #ffdfe8;
    border-radius: 10px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .filbtn {
    background-color: #091E6C;
  }
</style>

<?php
$parent_id = $this->session->userdata('user_id');
$parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();
$this->db->select('c.*');
$this->db->from('students s');
$this->db->join('complaint c', 'c.student_id = s.user_id');
$this->db->where('s.parent_id', $parent_data['id']);
$check_data = $this->db->get()->result_array();

?>
<!--title-->
<div class="row">
  <div class="col-xl-12">
    <div class="card adminbar">
      <div class="card-body d-flex flex-column py-2">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-comment title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('complaint / actions'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c;">
            Manage and review complaints and corresponding actions efficiently.
          </p>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card boxhover">
      <div class="row mt-3">
        <div class="col-md-1 mb-1"></div>
      </div>
      <div class="card-body complaint_content">
        <?php

        if (count($check_data) > 0): ?>
          <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead>
              <tr style="background-color: #313a46; color: #ababab;">
                <th><?php echo get_phrase('Class'); ?></th>
                <th><?php echo get_phrase('Student'); ?></th>
                <th><?php echo get_phrase('Teacher'); ?></th>
                <th><?php echo get_phrase('Status'); ?></th>
                <th><?php echo get_phrase(''); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($check_data as $data) {
                $student_data = $this->db->get_where('users', array('id' => $data['student_id'], 'role' => 'student'))->row_array();
                $teacher_data = $this->db->get_where('users', array('id' => $data['teacher_id'], 'role' => 'teacher'))->row_array();
                $section_data = $this->db->get_where('sections', array('id' => $data['section_id'], 'class_id' => $data['class_id']))->row_array();

                ?>
                <tr>
                  <td><?php echo 'class' . $data['class_id'] . '(' . $section_data['name'] . ')'; ?></td>
                  <td><?php echo $student_data['name']; ?></td>
                  <td><?php echo $teacher_data['name']; ?></td>
                  <td><?php if (isset($data['status']) && $data['status'] == '1') {
                    echo "Active";
                  } else if (isset($data['status']) && $data['status'] == '0') {
                    echo "Inctive";
                  }
                  ?>
                  </td>

                  <td>

                    <div class="dropdown text-center">
                      <button type="button"
                        class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item"
                          onclick="previewModal('<?php echo site_url('modal/popup/complaintsactions/view/' . $data['id']) ?>', '<?php echo get_phrase('Complaint'); ?>');"><?php echo get_phrase('view'); ?></a>

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


      </div>
    </div>
  </div>
</div>