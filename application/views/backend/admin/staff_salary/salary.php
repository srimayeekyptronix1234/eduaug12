 <?php 
 $staffs=$this->db->get_where('users',['id'=>$staff_id])->row_array();
 ?>
 <label for="date"><?php echo get_phrase('salary_amount'); ?></label>
 <input type="number" name="salary_amount" id="salary_amount" class="form-control"  value="<?=$staffs['salary'];?>">   
 