<style>
    .text-muted {
        text-align: left;
        text-transform: capitalize;
        font-weight: 500;
        color: #000 !important;
    }

    .boxhover {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 10px;
    }

    .boxhover:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    #myLineChart {
        width: 100% !important;
    }

    .adminbar {
        background: #ffdfe8;
        border-radius: 10px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .filbtn {
        background-color: #091E6C;
    }
</style>

<!--title-->
<div class="row">
    <div class="col-12">
        <div class="card adminbar">
            <div class="card-body d-flex flex-column py-2">
                <h4 class="page-title mb-0 d-flex align-items-center">
                    <i class="mdi mdi-grease-pencil title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
                    <span
                        style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
                        <?php echo get_phrase('Grade'); ?>
                    </span>
                </h4>
                <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c;">
                    View and manage student grading criteria efficiently.
                </p>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card boxhover">
            <div class="card-body grade_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    var showAllGrades = function () {
        var url = '<?php echo route('grade/list'); ?>';

        $.ajax({
            type: 'GET',
            url: url,
            success: function (response) {
                $('.grade_content').html(response);
                initDataTable('basic-datatable');
            }
        });
    }
</script>