 <?php 
    $days = $daysInMonth;
    $month = intval($selectedMonth); 
    $year = intval($selectedYear);

    //$month = 9; 
   // $year = 2024;

    $staffs=$this->db->get_where('users',['id'=>$staff_id])->row_array();

    $staffSalary = $staffs['salary'];
    $salary_per_day = $staffSalary / $days;

    $this->db->select('COUNT(*) as status_count');
    $this->db->where('staff_id', $staff_id);
    $this->db->where('status', '0');  // Check where status is 0

    // Convert Unix timestamp to year and month
    $this->db->where('YEAR(FROM_UNIXTIME(timestamp))', $year);  // Matching year
    $this->db->where('MONTH(FROM_UNIXTIME(timestamp))', $month);  // Matching month

    $query = $this->db->get('staff_attendance');
    $result = $query->row_array();

    $paid_status_count = $result['status_count'];

    $salary_deduct = $paid_status_count * $salary_per_day;
    $paid_salary_amount = $staffSalary - $salary_deduct;
 ?>
 <label for="date"><?php echo get_phrase('net_amount'); ?></label>
 <input type="number" name="paid_salary_amount" id="paid_salary_amount" class="form-control"  value="<?=$paid_salary_amount;?>">   
 