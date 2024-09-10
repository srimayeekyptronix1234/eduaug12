<style>
    /* Include in your main stylesheet */

    .timeline-wrapper {
        max-height: 600px;
        /* Adjust height as needed */
        overflow-y: auto;
        padding: 20px;
        background: linear-gradient(180deg, #f0f4f8, #ffffff);
        border-radius: 12px;
        border: 1px solid #e0e5ec;
    }

    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline-event {
        position: relative;
        display: flex;
        align-items: center;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        background: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .timeline-event:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .timeline-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #1B81F6;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-right: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .timeline-content {
        flex: 1;
    }

    .event-title {
        color: #1B81F6;
        font-size: 18px;
        margin: 0;
        margin-bottom: 5px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .event-date {
        color: #555555;
        font-size: 14px;
        margin: 0;
        font-style: italic;
    }
</style>

<?php
$date_from = strtotime(date('m/01/Y') . " 00:00:00"); // hard-coded '01' for first day
$date_to = strtotime(date('m/t/Y') . " 23:59:59");
?>
<div class="timeline-wrapper">
    <div class="timeline">
        <?php $events = $this->crud_model->get_current_month_events()->result_array(); ?>
        <?php foreach ($events as $event): ?>
            <?php if (strtotime($event['starting_date']) >= $date_from && strtotime($event['starting_date']) <= $date_to): ?>
                <div class="timeline-event">
                    <div class="timeline-icon">
                        <i class="mdi mdi-calendar"></i>
                    </div>
                    <div class="timeline-content">
                        <h4 class="event-title"><?php echo $event['title']; ?></h4>
                        <p class="event-date"><?php echo date('D, d-M-Y', strtotime($event['starting_date'])); ?> -
                            <?php echo date('D, d-M-Y', strtotime($event['ending_date'])); ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>