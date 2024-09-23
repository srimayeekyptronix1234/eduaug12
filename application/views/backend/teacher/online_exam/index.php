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

  .filbtn {
    color: #fff;
    background-color: #00398f;
    border-color: #00398f;
    padding: 6px 50px;
  }
</style>

<?php
$online_exams = $this->db->select('online_exam_details.*, exams.name')->from('online_exam_details')->join('exams', 'online_exam_details.quarter_id = exams.id')->where('online_exam_details.status', '1')->order_by('online_exam_details.id', 'desc')->get()->result_array();
// Debug the query
//echo $this->db->last_query();  
// $online_exams = $this->db->get_where('online_exam_details', array('status' => '1'))->result_array();
$user_id = $this->session->userdata('user_id');
$teacher_table_data = $this->db->get_where('teachers', ['user_id' => $user_id])->row_array();
$check_permission = has_permission($teacher_table_data['class_id'], $teacher_table_data['section_id'], 'online_exam', $teacher_table_data['id']);
?>

<div class="row">
  <div class="col-xl-12">
    <div class="card adminbar">
      <div class="card-body d-flex align-items-center justify-content-between py-2 parent_content">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-grease-pencil title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              Online Exam Details
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
            Manage and track online exam details efficiently.
          </p>
        </div>
        <?php if (isset($check_permission) && $check_permission == '1') { ?>
          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
            onclick="rightModal('<?php echo site_url('modal/popup/online_exam/create') ?>', 'Create exam')">
            <i class="mdi mdi-plus"></i> Add exam details
          </button>
        <?php } ?>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<?php if ($check_permission): ?>
  <?php if (count($online_exams) > 0): ?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead>
        <tr style="background-color: #313a46; color: #ababab;">
          <th><?php echo get_phrase('exam_name'); ?></th>
          <th><?php echo get_phrase('quarter_name'); ?></th>
          <th><?php echo get_phrase('starting_date'); ?></th>
          <th><?php echo get_phrase('exam_time'); ?></th>
          <th><?php echo get_phrase('exam_duration'); ?></th>
          <th><?php echo get_phrase('options'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($online_exams as $exam): ?>
          <tr>
            <td><?php echo $exam['online_exam_name']; ?></td>
            <td><?php echo $exam['name']; ?></td>
            <td><?php echo $exam['exam_start_date']; ?></td>
            <td>Time:
              <?php echo $exam['exam_start_time'] . $exam['exam_start_am_pm'] . "-" . $exam['exam_end_time'] . $exam['exam_end_am_pm']; ?>
            </td>
            <td><?php echo $exam['exam_duration']; ?> Min</td>
            <td>
              <div class="dropdown text-center">
                <button type="button"
                  class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop"
                  data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item"
                    onclick="rightModal('<?php echo site_url('modal/popup/online_exam/edit/' . $exam['id']) ?>', '<?php echo get_phrase('update_online_exam'); ?>');"><?php echo get_phrase('edit'); ?></a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item"
                    onclick="delete_online_exam_details('<?php echo $exam['id']; ?>')"><?php echo get_phrase('delete'); ?></a>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <script>
      $(document).ready(function () {
        $('#basic-datatable2').DataTable({
          "order": [[2, "desc"]]  // Order by the first column (ID) in descending order
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function delete_online_exam_details(id) {
        $.ajax({
          type: "POST",
          url: '<?php echo route('online_exam_create/delete/'); ?>' + id,
          success: function (response) {
            console.log(response);
            if (typeof response === 'string') {
              response = JSON.parse(response);
            }

            // Check the status value
            if (response.status === true) {

              Swal.fire({
                title: 'Success!',
                text: response.notification,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.isConfirmed) {
                  // Redirect to another URL
                  window.location.href = '<?php echo route('online_exam_create'); ?>'; // Replace with your actual URL
                }
              });

            }
            else {
              Swal.fire({
                title: 'Error!',
                text: 'An error occurred',
                icon: 'error',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.isConfirmed) {
                  // Redirect to another URL (optional, you can remove this if you don't want to redirect on error)
                  window.location.href = '<?php echo route('online_exam_create'); ?>'; // Replace with your actual URL
                }
              });
            }

          }
        });

      }


    </script>

  <?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
  <?php endif; ?>
<?php else: ?>
  <div class="col-md-12 text-center">
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading"><?php echo get_phrase('access_denied'); ?>!</h4>
      <hr>
      <p class="mb-0">
        <?php echo get_phrase('sorry_you_are_not_permitted_to_access_this_view') . '. <br/>' . get_phrase('admin_handles_it'); ?>.
      </p>
    </div>
  </div>
<?php endif; ?>