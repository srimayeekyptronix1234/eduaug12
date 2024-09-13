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

	#basic-datatable {
		font-family: 'Poppins', sans-serif;
		font-size: 14px;
		border-collapse: separate;
		border-spacing: 0 10px;
	}

	.table-header {
		background-color: #092670;
		color: #ffffff;
		text-transform: uppercase;
		letter-spacing: 1px;
	}

	.table-row {
		background-color: #f8f9fa;
		transition: background-color 0.3s ease;
		box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
	}

	.table-row:hover {
		background-color: #e8ebf1;
	}

	.table th,
	.table td {
		padding: 15px 10px;
		vertical-align: middle;
	}

	.table th {
		border: none;
	}

	.table td {
		border-bottom: 1px solid #e9ecef;
	}
</style>

<div class="row">
	<div class="col-md-6">
		<div class="card boxhover">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card boxhover">
			<div class="card-body">
				<?php $school_id = school_id(); ?>
				<?php $query = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session())); ?>
				<?php if ($query->num_rows() > 0): ?>
					<table id="basic-datatable"
						class="table table-hover table-striped table-borderless dt-responsive nowrap" width="100%">
						<thead>
							<tr class="table-header">
								<th><?php echo get_phrase('event_title'); ?></th>
								<th><?php echo get_phrase('from'); ?></th>
								<th><?php echo get_phrase('to'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$event_calendars = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session()))->result_array();
							foreach ($event_calendars as $event_calendar) {
								?>
								<tr class="table-row">
									<td><?php echo $event_calendar['title']; ?></td>
									<td><?php echo date('D, d M Y', strtotime($event_calendar['starting_date'])); ?></td>
									<td><?php echo date('D, d M Y', strtotime($event_calendar['ending_date'])); ?></td>
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