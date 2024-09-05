<style>
    .boxbtn:hover {
        background: #0272F3;
    }
</style>

<?php $income_categories = $this->crud_model->get_income_categories()->result_array(); ?>
<?php if (count($income_categories) > 0): ?>
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th><?php echo get_phrase('name'); ?></th>
                    <th><?php echo get_phrase('option'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($income_categories as $income_category): ?>
                    <tr>
                        <td><?php echo $income_category['name']; ?></td>
                        <td>
                            <div class="dropdown text-center">
                                <button type="button"
                                    class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop boxbtn"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="mdi mdi-dots-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"
                                        onclick="rightModal('<?php echo site_url('modal/popup/income_category/edit/' . $income_category['id']) ?>', '<?php echo get_phrase('update_income_category'); ?>');"><?php echo get_phrase('edit'); ?></a>
                                    <!-- item-->
                                    <?php if($income_category['id'] != '1'){?>
                                    <a href="javascript:void(0);" class="dropdown-item"
                                        onclick="confirmModal('<?php echo route('income_category/delete/' . $income_category['id']); ?>', showAllIncomeCategories )"><?php echo get_phrase('delete'); ?></a>
                                      <?php } ?>  
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>