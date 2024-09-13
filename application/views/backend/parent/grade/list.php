<style>
	#basic-datatable {
		font-family: 'Poppins', sans-serif;
		font-size: 14px;
		border-collapse: separate;
		border-spacing: 0 10px;
	}

	.table-header {
		background-color: #09236C;
		color: #ffffff;
		text-transform: uppercase;
		letter-spacing: 0.5px;
	}

	.table-row {
		background-color: #ffffff;
		transition: background-color 0.3s ease, box-shadow 0.3s ease;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}

	.table-row:hover {
		background-color: #f1f5f9;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}

	.table th,
	.table td {
		padding: 12px 15px;
		vertical-align: middle;
	}

	.table th {
		border: none;
		font-weight: bold;
	}

	.table td {
		border-bottom: 1px solid #dee2e6;
	}

	.table-striped tbody tr:nth-of-type(odd) {
		background-color: #f9f9f9;
	}
</style>

<?php $check_data = $this->db->get_where('grades', array('school_id' => school_id(), 'session' => active_session()));
if ($check_data->num_rows() > 0): ?>
	<table id="basic-datatable" class="table table-striped table-hover dt-responsive nowrap" width="100%">
		<thead>
			<tr class="table-header">
				<th><?php echo get_phrase('grade'); ?></th>
				<th><?php echo get_phrase('grade_point'); ?></th>
				<th><?php echo get_phrase('mark_from'); ?></th>
				<th><?php echo get_phrase('mark_upto'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$grades = $this->db->get_where('grades', array('school_id' => school_id(), 'session' => active_session()))->result_array();
			foreach ($grades as $grade) {
				?>
				<tr class="table-row">
					<td><?php echo $grade['name']; ?></td>
					<td><?php echo $grade['grade_point']; ?></td>
					<td><?php echo $grade['mark_from']; ?></td>
					<td><?php echo $grade['mark_upto']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<?php else: ?>
	<?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>