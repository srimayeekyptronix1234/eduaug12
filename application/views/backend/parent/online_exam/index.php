<style>
    .title_icon {
        font-size: 1.5rem;
        color: #ff7580;
        vertical-align: middle;
    }

    .page-title {
        font-size: 20px;
        font-weight: 700;
        color: #ff7580;
        line-height: 1.5;
    }

    .ms-2 {
        margin-left: 0.5rem;
    }

    .parentbar {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        background: #ffdfe8;
    }

    .inspiring-line {
        font-size: 16px;
        color: #2c2c2c !important;
        font-weight: 600;
    }

    .parbox {
        font-weight: 600;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 10px;
        padding: 20PX;
    }

    .parbox:hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transition: 1s ease;
    }

    .boxbtn {
        background: #0272f3;
        color: white;
    }
</style>

<?php
$parent_id = $this->session->userdata('user_id');
$school_id  = school_id();
$parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();


$online_exams = $this->db->select('online_exam_details.*, exams.name')->from('online_exam_details')->join('exams', 'online_exam_details.quarter_id = exams.id')->where('online_exam_details.status', '1')->order_by('online_exam_details.id', 'desc')->get()->result_array();
// Debug the query
//echo $this->db->last_query();  

// $online_exams = $this->db->get_where('online_exam_details', array('status' => '1'))->result_array();
?>

<div class="row">
    <div class="col-xl-12">
        <div class="card parentbar">
            <div class="card-body py-2 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="page-title d-inline-block">
                        <i class="mdi mdi-grease-pencil title_icon"></i> Online Exam Details
                    </h4>
                    <p class="inspiring-line">
                        Transforming assessments into opportunities for growth and learning.
                    </p>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<?php if (count($online_exams) > 0): ?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap parbox" width="100%">
        <thead>
            <tr style="background-color: #0272F3; color: #FFF;">
                <th><?php echo get_phrase('exam_name'); ?></th>
                <th><?php echo get_phrase('quarter_name'); ?></th>
                <th><?php echo get_phrase('class'); ?></th>
                <th><?php echo get_phrase('starting_date'); ?></th>
                <th><?php echo get_phrase('exam_time'); ?></th>
                <th><?php echo get_phrase('exam_duration'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($online_exams as $exam): ?>
                <tr>
                    <td><?php echo $exam['online_exam_name']; ?></td>
                    <td><?php echo $exam['name']; ?></td>
                    <td><?php 
                           $class_details=$this->db->get_where('classes',['id'=>$exam['class_id']])->row_array();
                           echo $class_details['name'];
                        ?>
                    </td>
                    <td><?php echo $exam['exam_start_date']; ?></td>
                    <td>Time:
                        <?php echo $exam['exam_start_time'] . $exam['exam_start_am_pm'] . "-" . $exam['exam_end_time'] . $exam['exam_end_am_pm']; ?>
                    </td>
                    <td><?php echo $exam['exam_duration']; ?> Min</td>
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