<style>
   .title_icon {
      font-size: 1.5rem;
      color: #ff7580;
      vertical-align: middle;
   }

   .page-title {
      font-size: 20px;
      font-weight: 700;
      color: #ff7580;
      line-height: 1.5;
   }

   .ms-2 {
      margin-left: 0.5rem;
   }

   .parentbar {
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      background: #ffdfe8;
   }

   .inspiring-line {
      font-size: 16px;
      color: #2c2c2c !important;
      font-weight: 600;
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

<!--title-->
<div class="row ">
   <div class="col-xl-12">
      <div class="card parentbar">
         <div class="card-body py-2 d-flex justify-content-between align-items-center">
            <div>
               <h4 class="page-title d-flex align-items-center">
                  <i class="mdi mdi-calendar-clock title_icon"></i>
                  <span class="ms-2"><?php echo get_phrase('event_calendar'); ?></span>
               </h4>
               <p class="inspiring-line mt-2">
                  Planning today for a brighter tomorrow.
               </p>
            </div>
            <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
               onclick="rightModal('<?php echo site_url('modal/popup/event_calendar/create'); ?>', '<?php echo get_phrase('event_calendar'); ?>')">
               <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_event'); ?>
            </button>
         </div> <!-- end card body-->
      </div> <!-- end card -->
   </div><!-- end col-->
</div>


<div class="row parbox">
   <div class="col-12 event_calendar_content">
      <?php include 'list.php'; ?>
   </div>
</div>

<script>
   $(document).ready(function () {
      refreshEventCalendar();
   });

   var showAllEvents = function () {
      var url = '<?php echo route('event_calendar/list'); ?>';

      $.ajax({
         type: 'GET',
         url: url,
         success: function (response) {
            $('.event_calendar_content').html(response);
            initDataTable("basic-datatable");
            refreshEventCalendar();
         }
      });
   }

   var refreshEventCalendar = function () {
      var url = '<?php echo route('event_calendar/all_events'); ?>';
      $.ajax({
         type: 'GET',
         url: url,
         dataType: 'json',
         success: function (response) {
            var event_calendar = [];
            for (let i = 0; i < response.length; i++) {

               var obj;
               obj = { "title": response[i].title, "start": response[i].starting_date, "end": response[i].ending_date };
               event_calendar.push(obj);
            }

            $('#calendar').fullCalendar({
               disableDragging: true,
               events: event_calendar,
               displayEventTime: false
            });
         }
      });
   }
</script>