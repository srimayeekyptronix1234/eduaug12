<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<!-- Calendar Section -->
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<?php $school_id = school_id(); ?>
				<?php $query = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session())); ?>
				<?php if ($query->num_rows() > 0): ?>
					<!-- Enhanced Table Style -->
					<style>
						.enhanced-table {
							width: 100%;
							border-collapse: collapse;
							background-color: #fff;
							border-radius: 8px;
							overflow: hidden;
							box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
						}

						.enhanced-table thead tr {
							background: linear-gradient(195deg, #ff00c3, #d123ba, #a42dab, #7b2f97, #552b80, #342465, #181a48, #050b2b);
							color: #fff;
							text-transform: uppercase;
							letter-spacing: 0.05em;
						}

						.enhanced-table thead th {
							padding: 12px 15px;
							text-align: left;
							font-weight: 600;
						}

						.enhanced-table tbody tr {
							border-bottom: 1px solid #ddd;
							transition: background-color 0.3s ease;
						}

						.enhanced-table tbody tr:hover {
							background-color: #f0f0f0;
							cursor: pointer;
						}

						.enhanced-table tbody td {
							padding: 10px 15px;
							color: #333;
							font-size: 14px;
						}
					</style>

					<!-- Event Calendar Table -->
					<table id="basic-datatable" class="table enhanced-table dt-responsive nowrap">
						<thead>
							<tr>
								<th><?php echo get_phrase('event_title'); ?></th>
								<th><?php echo get_phrase('from'); ?></th>
								<th><?php echo get_phrase('to'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$event_calendars = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session()))->result_array();
							foreach ($event_calendars as $event_calendar): ?>
								<tr>
									<td><?php echo $event_calendar['title']; ?></td>
									<td><?php echo date('D, d M Y', strtotime($event_calendar['starting_date'])); ?></td>
									<td><?php echo date('D, d M Y', strtotime($event_calendar['ending_date'])); ?></td>
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