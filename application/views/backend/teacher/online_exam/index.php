<?php

$online_exams = $this->db->select('online_exam_details.*, exams.name')->from('online_exam_details')->join('exams', 'online_exam_details.quarter_id = exams.id')->where('online_exam_details.status', '1')->order_by('online_exam_details.id', 'desc')->get()->result_array(); 
// Debug the query
//echo $this->db->last_query();  

// $online_exams = $this->db->get_where('online_exam_details', array('status' => '1'))->result_array();
?>

<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2 parent_content">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-grease-pencil title_icon"></i> Online Exam Details </h4>
		  
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/online_exam/create')?>', 'Create exam')"> <i class="mdi mdi-plus"></i> Add exam details</button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

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
	<?php foreach($online_exams as $exam):?>
	<tr>
	    <td><?php echo $exam['online_exam_name']; ?></td>
        <td><?php echo $exam['name']; ?></td>
	    <td><?php echo $exam['exam_start_date']; ?></td>
      <td>Time: <?php echo $exam['exam_start_time'].$exam['exam_start_am_pm']."-".$exam['exam_end_time'].$exam['exam_end_am_pm']; ?></td>
	    <td><?php echo $exam['exam_duration']; ?> Min</td>
	    <td>
        <div class="dropdown text-center">
					<button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
					<div class="dropdown-menu dropdown-menu-end">
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/online_exam/edit/'.$exam['id'])?>', '<?php echo get_phrase('update_online_exam'); ?>');"><?php echo get_phrase('edit'); ?></a>
						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item" onclick="delete_online_exam_details('<?php echo $exam['id']; ?>')"><?php echo get_phrase('delete'); ?></a>
					</div>
				</div>
	    </td>
	</tr>
<?php endforeach; ?>
	</tbody>
</table>
<script>
$(document).ready(function() {
    $('#basic-datatable2').DataTable({
        "order": [[2, "desc"]]  // Order by the first column (ID) in descending order
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function delete_online_exam_details(id)
{
      $.ajax({
            type: "POST",
            url: '<?php echo route('online_exam_create/delete/'); ?>'+id,
            success: function(response)
            {
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
                else{
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
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
