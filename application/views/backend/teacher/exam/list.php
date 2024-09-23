<?php
$school_id = school_id();
$exams = $this->db->get_where('exams', array('school_id' => $school_id, 'session' => active_session()))->result_array();

if (count($exams) > 0): ?>
    <div class="table-responsive">
        <table id="basic-datatable" class="table custom-table">
            <thead>
                <tr>
                    <th><?php echo get_phrase('exam_name'); ?></th>
                    <th><?php echo get_phrase('starting_date'); ?></th>
                    <th><?php echo get_phrase('ending_date'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exams as $exam): ?>
                    <tr>
                        <td><?php echo $exam['name']; ?></td>
                        <td><?php echo date('D, d-M-Y', $exam['starting_date']); ?></td>
                        <td><?php echo date('D, d-M-Y', $exam['ending_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>

<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-table thead {
        background: linear-gradient(195deg, #ff00c3, #d123ba, #a42dab, #7b2f97, #552b80, #342465, #181a48, #050b2b);
        color: #ffffff;
    }

    .custom-table th,
    .custom-table td {
        padding: 15px;
        text-align: left;
    }

    .custom-table th {
        font-weight: bold;
        text-transform: uppercase;
    }

    .custom-table tbody tr {
        transition: background-color 0.3s, transform 0.3s;
        color: #000;
        font-size: 16px;
        font-weight: 700;
    }

    .custom-table tbody tr:hover {
        background-color: #f1f1f1;
        transform: scale(1.02);
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .custom-table tbody tr td {
        border-bottom: 1px solid #dddddd;
    }
</style>