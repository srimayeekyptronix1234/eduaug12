<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routine Schedule</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .dropdown-toggle::after {
            display: none;
        }

        .table-custom {
            border-collapse: collapse;
            width: 100%;
        }

        .table-custom th,
        .table-custom td {
            padding: 12px;
            text-align: left;
            vertical-align: middle;
        }

        .table-custom th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: bold;
        }

        .table-custom td {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }

        .table-custom tbody tr:hover {
            background-color: #f1f1f1;
        }

        .routine-container {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .btn-custom {
            background-color: #013a7c;
            color: #fff;
            border: none;
            border-radius: 0.25rem;
            font-size: 14px;
            text-align: left;
            padding: 10px 16px;
            transition: background-color 0.3s, box-shadow 0.3s;
            display: block;
            width: 100%;
        }

        .btn-view-more {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #000000;
            border-radius: 0px;
            font-size: 13px;
            padding: 10px 17px;
            display: none;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
        }

        .routine-container:hover .btn-view-more {
            display: inline-block;
        }

        .btn-view-more:hover {
            background-color: #ffffff;
            color: #000000;
        }

        .modal-content {
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .modal-body p {
            margin-bottom: 0.5rem;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-dialog.modal-sm {
            max-width: 300px;
        }

        p {
            font-size: 17px;
            font-weight: 400;
            text-transform: capitalize;
        }

        .center-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .routine-container:hover .btn-custom {
            background-color: #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <?php
    $user_id = $this->session->userdata('user_id');
    $student_table_data = $this->db->get_where('students', ['user_id' => $user_id])->row_array();
    $enrols_table_data = $this->db->get_where('enrols', ['student_id' => $student_table_data['id']])->row_array();
    $current_session_teachers = $this->user_model->get_total_data($enrols_table_data['class_id']);
    $school_id = school_id();
    ?>
    <?php if (isset($enrols_table_data['class_id']) && isset($enrols_table_data['section_id'])): ?>
        <table class="table table-hover table-bordered mb-0 table-custom">
            <thead class="thead-light">
                <tr>
                    <th style="width: 100px;">Day</th>
                    <th>Routine</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                foreach ($days as $day) {
                    ?>
                    <tr>
                        <td class="font-weight-bold"><?php echo get_phrase($day); ?></td>
                        <td>
                            <?php
                            $routines = $this->db->get_where('routines', array(
                                'class_id' => $enrols_table_data['class_id'],
                                'section_id' => $enrols_table_data['section_id'],
                                'session_id' => active_session(),
                                'day' => $day
                            ))->result_array();

                            foreach ($routines as $index => $routine) {
                                $subject_name = $this->db->get_where('subjects', array('id' => $routine['subject_id']))->row('name');
                                $teacher_name = $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $routine['teacher_id']))->row('user_id'), 'name');
                                $room_name = $this->db->get_where('class_rooms', array('id' => $routine['room_id']))->row('name');
                                $time_range = $routine['starting_hour'] . ':' . $routine['starting_minute'] . ' - ' . $routine['ending_hour'] . ':' . $routine['ending_minute'];
                                $modal_id = 'routineModal' . $day . $index; // Unique ID for each modal
                                ?>
                                <div class="routine-container">
                                    <button type="button" class="btn btn-custom routine-btn">
                                        <p style="margin-bottom: 0;">
                                            <i class="mdi mdi-book-open-variant"></i>
                                            <?php echo $subject_name; ?>
                                        </p>
                                        <p style="margin-bottom: 0;">
                                            <i class="mdi mdi-clock"></i>
                                            <?php echo $time_range; ?>
                                        </p>
                                    </button>
                                    <div class="center-btn">
                                        <button type="button" class="btn btn-view-more" data-toggle="modal"
                                            data-target="#<?php echo $modal_id; ?>">View More</button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $modal_id; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="<?php echo $modal_id; ?>Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="<?php echo $modal_id; ?>Label">
                                                        <?php echo $subject_name; ?> Details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><b>Subject:</b> <?php echo $subject_name; ?></p>
                                                    <p><b>Time:</b> <?php echo $time_range; ?></p>
                                                    <p><b>Teacher:</b> <?php echo $teacher_name; ?></p>
                                                    <p><b>Room:</b> <?php echo $room_name; ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php else: ?>
        <?php include APPPATH . 'views/backend/empty.php'; ?>
    <?php endif; ?>

    <!-- Include jQuery and Bootstrap JS (includes Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>