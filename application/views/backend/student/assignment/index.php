<style>
  .progress {
    margin: 20px auto;
    padding: 0;
    width: 90%;
    background: #e5e5e5;
    border-radius: 6px;
    position: relative;
  }

  p {
    text-align: left;
    text-transform: capitalize;
    font-weight: 500;
  }

  .progress-header {
    text-align: center;
    margin-bottom: 5px;
    font-size: 14px;
    color: black;
  }

  .bar-container {
    position: relative;
    width: 100%;
    height: 30px;
    background: #e5e5e5;
    border-radius: 6px;
    overflow: hidden;
  }

  .bar {
    height: 100%;
    background: cornflowerblue;
    border-radius: 6px 0 0 6px;
  }

  .percent-outside {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    margin: 0;
    font-family: tahoma, arial, helvetica;
    font-size: 12px;
    color: black;
  }

  .bar-box {
    background: #fff;
    border-radius: 10px;
    padding: 20px 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .bar-box:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  .linebar {
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .linebar:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  .boxhover {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }

  .boxhover:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  .colhover {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    border-radius: 10px;
  }

  .colhover:hover {
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    transition: 1s ease;
  }

  #myLineChart {
    width: 100% !important;
  }

  .adminbar {
    background: #ffdfe8;
    border-radius: 10px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

  }

  .table-responsive {
    display: revert !important;
  }

  .card {
    border: none !important;
  }

  .boxbtn {
    background: #0272F3;
    color: #fff;
  }

  .boxbtn:hover {
    background: #000;
    color: #fff;
  }

  /* Table Container Styling */
  .table-container {
    margin: 20px;
  }

  /* Table Styling */
  .modern-datatable {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: #333;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
  }

  /* Table Header Styling */
  .modern-datatable thead {
    background: linear-gradient(135deg, #2d3a4a, #1a1f2e);
    color: #f8f9fa;
  }

  .modern-datatable th {
    padding: 12px 15px;
    text-align: left;
    text-transform: uppercase;
    font-weight: 600;
    border-bottom: 2px solid #444;
  }

  /* Table Row Styling */
  .modern-datatable tbody tr {
    background-color: #ffffff;
    transition: background-color 0.3s ease, transform 0.3s ease;
    border-bottom: 1px solid #e0e0e0;
  }

  .modern-datatable tbody tr:hover {
    background-color: #f5f5f5;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .modern-datatable td {
    padding: 12px 15px;
  }

  /* Dropdown Button Styling */
  .dropdown-btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 6px 12px;
    transition: background-color 0.3s ease;
    cursor: pointer;
  }

  .dropdown-btn:hover {
    background-color: #0056b3;
  }

  .dropdown-menu {
    border-radius: 8px;
    padding: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  .dropdown-item {
    padding: 10px 20px;
    font-size: 14px;
    color: #333;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .dropdown-item:hover {
    background-color: #f0f0f0;
    color: #000;
  }

  .dropdown button.show {
    display: inline-block !important;
    background: #013A7C;
  }

  /* Responsive Design */
  @media (max-width: 768px) {

    .modern-datatable th,
    .modern-datatable td {
      padding: 8px;
      font-size: 12px;
    }

    .dropdown-btn {
      padding: 4px 8px;
      border-radius: 0px !important;
    }

    .dropdown-item {
      font-size: 12px;
    }
  }
</style>

<?php
$school_id = school_id(); 
$login_user_id = $this->session->userdata('user_id');
$student_details = $this->db->get_where('students', ['user_id' => $login_user_id])->row_array();
$get_student_data = $this->db->get_where('enrols', ['student_id' => $student_details['id']])->row_array();
$school_id = school_id();
$manage_assignment=$this->db->get_where('assignment',['class' => $get_student_data['class_id'],'school_id' =>$school_id])->result_array();

?>
<!--title-->
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body d-flex align-items-center justify-content-between adminbar py-2">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-comment title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('assignment'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
            Manage assignment.
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

        if (count($manage_assignment) > 0): ?>
          <div class="table-container">
            <table id="basic-datatable" class="modern-datatable dt-responsive nowrap" width="100%">
              <thead>
                <tr>
                  <th><?php echo get_phrase('Class'); ?></th>
                  <th><?php echo get_phrase('section'); ?></th>
                  <th><?php echo get_phrase('subject'); ?></th>
                  <th><?php echo get_phrase('Actions'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($manage_assignment as $data) {
                  $class_data = $this->db->get_where('classes', array('id' => $data['class'],'school_id' => $school_id))->row_array();
                  $subject_data = $this->db->get_where('subjects', array('id' => $data['subject'],'school_id' => $school_id))->row_array();
                  $section_data =$this->db->get_where('sections', array('id' => $data['section']))->row_array();
                  ?>
                  <tr>
                    <td><?=$class_data['name'];?></td>
                    <td><?=$section_data['name']; ?></td>
                    <td><?=$subject_data['name']; ?></td>

                  </td>
                    <td>
                      <div class="dropdown text-center">
                        <button type="button" class="btn dropdown-btn dropdown-toggle" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="mdi mdi-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="javascript:void(0);" class="dropdown-item"
                            onclick="previewModal('<?php echo site_url('modal/popup/assignment/view/' . $data['id']) ?>', '<?php echo get_phrase('assignment'); ?>');"><?php echo get_phrase('view'); ?></a>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <?php include APPPATH . 'views/backend/empty.php'; ?>
        <?php endif; ?>


      </div>
    </div>
  </div>
</div>