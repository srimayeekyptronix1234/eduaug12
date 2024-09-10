<style>
    #basic-datatable {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        margin: 20px 0;
        border-radius: 8px;
        overflow: hidden;
    }

    #basic-datatable thead {
        background-color: #4a4a4a;
        /* Updated top bar color */
        color: #f5f5f5;
    }

    #basic-datatable th,
    #basic-datatable td {
        padding: 14px 20px;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    #basic-datatable th {
        text-align: left;
        text-transform: uppercase;
        font-weight: bold;
        background-color: #091e6c;
        /* Slightly darker for contrast */
    }

    #basic-datatable tbody tr {
        transition: background-color 0.3s ease;
    }

    #basic-datatable tbody tr:nth-child(odd) {
        background-color: #f4f4f4;
    }

    #basic-datatable tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    #basic-datatable tbody tr:hover {
        background-color: #e0e0e0;
    }

    #basic-datatable td {
        color: #333;
        /* Text color for better readability */
    }
</style>

<?php
$school_id = school_id();
$check_data = $this->db->get_where('teachers', array('school_id' => $school_id));
if ($check_data->num_rows() > 0): ?>
    <table id="basic-datatable">
        <thead>
            <tr>
                <th><?php echo get_phrase('name'); ?></th>
                <th><?php echo get_phrase('department'); ?></th>
                <th><?php echo get_phrase('designation'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $teachers = $this->db->get_where('teachers', array('school_id' => $school_id))->result_array();
            foreach ($teachers as $teacher) {
                ?>
                <tr>
                    <td><?php echo $this->db->get_where('users', array('id' => $teacher['user_id']))->row('name'); ?></td>
                    <td><?php echo $this->db->get_where('departments', array('id' => $teacher['department_id']))->row('name'); ?>
                    </td>
                    <td><?php echo $teacher['designation']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>