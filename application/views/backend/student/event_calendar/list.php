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


<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body boxhover">
				<div id="calendar"></div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="card-body boxhover">
				<?php $school_id = school_id(); ?>
				<?php $query = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session())); ?>
				<?php if ($query->num_rows() > 0): ?>
					<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
						<thead>
							<tr style="background-color: #0272F3; color: #fff;">
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
								<tr>
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