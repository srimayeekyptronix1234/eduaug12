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
</style>

<?php
$school_id = school_id(); 
$login_user_id = $this->session->userdata('user_id');
$student_details = $this->db->get_where('students', ['user_id' => $login_user_id])->row_array();
$get_student_data = $this->db->get_where('enrols', ['student_id' => $student_details['id']])->row_array();
$school_id = school_id();
$manage_assignment=$this->db->get_where('assignment',['class' => $get_student_data['class_id'],'school_id' =>$school_id])->result_array();
$marks = $this->db->get_where('classwork', ['student_id' => $student_details['id'], 'class_id' => $get_student_data['class_id']])->result_array();
?>
<!--title-->
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body d-flex align-items-center justify-content-between adminbar py-2">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-format-list-numbered title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('manage_assignment'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
            Monitor and evaluate student classwork performance effortlessly.
          </p>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body boxhover">
        <?php if (count($manage_assignment) > 0): ?>
          <table class="table table-bordered table-responsive-sm" width="100%">
            <thead class="thead-dark">
              <tr>
                <th><?php echo get_phrase('Class'); ?></th>
                <th><?php echo get_phrase('section'); ?></th>
                <th><?php echo get_phrase('subject'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($manage_assignment as $data):
                  $class_data = $this->db->get_where('classes', array('id' => $data['class'],'school_id' => $school_id))->row_array();
                  $subject_data = $this->db->get_where('subjects', array('id' => $data['subject'],'school_id' => $school_id))->row_array();
                  $section_data =$this->db->get_where('sections', array('id' => $data['section']))->row_array();
               ?>
                <tr>
                    <td><?=$class_data['name'];?></td>
                    <td><?=$section_data['name']; ?></td>
                    <td><?=$subject_data['name']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <?php include APPPATH . 'views/backend/empty.php'; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>