<style>
    #basic-datatable {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 1.1em;
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    #basic-datatable thead tr {
        background-image: linear-gradient(to right top, #070537, #002d5e, #005075, #00737a, #009473);
        color: #fff;
        text-align: left;
    }

    #basic-datatable th,
    #basic-datatable td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }

    #basic-datatable tbody tr {
        background-color: #fff;
        transition: all 0.2s ease;
    }

    #basic-datatable tbody tr:nth-of-type(even) {
        background-color: #f9f9f9;
    }

    #basic-datatable tbody tr:hover {
        background-color: #e6f7ff;
        transform: scale(1.01);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    #basic-datatable td {
        color: #333;
        font-size: 1.05em;
    }
</style>

<?php
$school_id = school_id();
$user_id = $this->session->userdata('user_id');
$check_data = $this->db->get_where('teachers', array('school_id' => $school_id, 'user_id' => $user_id));
if ($check_data->num_rows() > 0): ?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead>
            <tr>
                <th><?php echo get_phrase('name'); ?></th>
                <th><?php echo get_phrase('department'); ?></th>
                <th><?php echo get_phrase('designation'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $teachers = $this->db->get_where('teachers', array('school_id' => $school_id, 'user_id' => $user_id))->row_array();
            ?>
            <tr>
                <td><?php echo $this->db->get_where('users', array('id' => $teachers['user_id']))->row('name'); ?></td>
                <td><?php echo $this->db->get_where('departments', array('id' => $teachers['department_id']))->row('name'); ?>
                </td>
                <td><?php echo $teachers['designation']; ?></td>
            </tr>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>