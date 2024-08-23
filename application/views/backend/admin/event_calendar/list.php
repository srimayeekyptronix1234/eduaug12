<style>
	.boxbtn:hover {
		background: #0272F3;
	}

	.parbox {
		font-weight: 600;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
		border-radius: 10px;
		padding: 20px 10px 20px 10px;
	}

	.parbox:hover {
		box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
		transition: 1s ease;
	}
</style>

<div class="row">
	<div class="col-md-6">
		<div class="card parbox">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<!--<div class="alert alert-warning" role="alert">-->
		<!--	<i class="dripicons-information me-2"></i> <?php echo get_phrase('this_events_will_get_appeared_at'); ?> <strong><?php echo get_phrase('user'); ?> ( <?php echo get_phrase('backend'); ?> ) <?php echo get_phrase('panel_events'); ?></strong>.-->
		<!--</div>-->
		<div class="card parbox">
			<div class="card-body">
				<?php $school_id = school_id(); ?>
				<?php $query = $this->db->get_where('event_calendars', array('school_id' => $school_id, 'session' => active_session())); ?>
				<?php if ($query->num_rows() > 0): ?>
					<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
						<thead>
							<tr style="background-color: #0272F3; color: #fff;">
								<th><?php echo get_phrase('event_title'); ?></th>
								<th><?php echo get_phrase('from'); ?></th>
								<th><?php echo get_phrase('to'); ?></th>
								<th><?php echo get_phrase('options'); ?></th>
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
									<td>
										<div class="dropdown text-center">
											<button type="button"
												class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop boxbtn"
												data-bs-toggle="dropdown" aria-expanded="false"><i
													class="mdi mdi-dots-vertical"></i></button>
											<div class="dropdown-menu dropdown-menu-end">
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item"
													onclick="rightModal('<?php echo site_url('modal/popup/event_calendar/edit/' . $event_calendar['id']); ?>', '<?php echo get_phrase('update_event'); ?>');"><?php echo get_phrase('edit'); ?></a>
												<!-- item-->
												<a href="javascript:void(0);" class="dropdown-item"
													onclick="confirmModal('<?php echo route('event_calendar/delete/' . $event_calendar['id']); ?>', showAllEvents)"><?php echo get_phrase('delete'); ?></a>
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