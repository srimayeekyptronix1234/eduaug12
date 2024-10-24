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

  #map {
    height: 400px;
    /* Adjust height as needed */
    width: 100%;
    /* Full width */
    border-radius: 10px;
    /* Rounded corners */
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    /* Shadow for map */
    margin-top: 20px;
    /* Space above map */
  }
</style>

<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card adminbar">
      <div class="card-body d-flex align-items-center justify-content-between py-2">
        <div>
          <h4 class="page-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-view-dashboard title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
            <span
              style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
              <?php echo get_phrase('dashboard'); ?>
            </span>
          </h4>
          <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c;">
            Get an overview of key metrics and system status on the dashboard.
          </p>
        </div>
        <div>
          <img src="../assets/backend/images/bus.png" alt="Dashboard Image"
            style=" height: auto; width: 285px; position: absolute; top: -75px; right: 27px;}" />
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<!-- end page title -->

<div class="row ">
  <div class="col-xl-12">
    <div class="row">
      <div class="col-xl-12">
        <div class="row">
          <div class="col-lg-4">
            <div class="card widget-flat" id="student"
              style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
              <div class="card-body" style="color: #fff;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="font-size: 24px; color: #fff;"></i>
                </div>
                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;" title="Number of Students">
                  <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                  <?php echo get_phrase('students'); ?>
                  <a href="<?php echo route('student'); ?>" style="color: #fff; display: none;" id="student_list">
                    <i class="mdi mdi-export"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="font-size: 26px; color: #fff;">
                  <?php
                  $current_session_students = $this->user_model->get_transport_details('student');
                  if (isset($current_session_students) && $current_session_students != '') {
                    echo $current_session_students->num_rows();
                  }
                  ?>
                </h3>
                <p class="mb-0 text-muted" style="color: #fff;">
                  <span class="text-nowrap"
                    style="color: white; font-weight: 600; font-size: 16px;"><?php echo get_phrase('total_number_of_student'); ?></span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card widget-flat" id="teacher"
              style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
              <div class="card-body" style="color: #fff;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="font-size: 24px; color: #fff;"></i>
                </div>
                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;" title="Number of Teachers">
                  <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                  <?php echo get_phrase('teacher'); ?>
                  <a href="<?php echo route('teacher'); ?>" style="color: #fff; display: none;" id="teacher_list">
                    <i class="mdi mdi-export"></i>
                  </a>
                </h5>
                <h3 class="mt-3 mb-3" style="font-size: 26px; color: #fff;">
                  <?php
                  $teachers = $this->user_model->get_transport_details('teacher');
                  if (isset($teachers) && $teachers != '') {
                    echo $teachers->num_rows();
                  }
                  ?>
                </h3>
                <p class="mb-0 text-muted" style="color: #fff;">
                  <span class="text-nowrap"
                    style="color: white; font-weight: 600; font-size: 16px;"><?php echo get_phrase('total_number_of_teacher'); ?></span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card widget-flat" id="route"
              style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
              <div class="card-body" style="color: #fff;">
                <div class="float-end">
                  <i class="mdi mdi-account-multiple widget-icon" style="font-size: 24px; color: #fff;"></i>
                </div>
                <?php
                $driver_data = $this->user_model->get_logged_in_driver_details();
                $check_data = $this->db->get_where('routes', ['id' => $driver_data['route_id']])->result_array();
                ?>
                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;" title="Route">
                  <i class="mdi mdi-routes title_icon" style="color: #fff;"></i>
                  <?php echo get_phrase('route'); ?>
                  <?php if (count($check_data) > 0) {
                    echo '(' . count($check_data) . ')';
                  } ?>
                  <a href="<?php echo route('route'); ?>" style="color: #fff; display: none;" id="route_list">
                    <i class="mdi mdi-export"></i>
                  </a>
                </h5>

                <div class="table-responsive-sm">
                  <table class="table table-striped table-centered table-bordered mb-0 table-responsive"
                    style="width: 100%; border-collapse: collapse; color: #fff; background: linear-gradient(135deg, #4a4a4a, #2a2a2a); border: none; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
                    <thead>
                      <tr>
                        <th
                          style="color: #fff; width: 60%; padding: 15px; text-align: left; text-transform: uppercase; background-color: #053b54; border-bottom: 2px solid #666; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                          <?php echo get_phrase('Route Title'); ?>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($check_data) > 0): ?>
                        <?php foreach ($check_data as $data): ?>
                          <tr style="transition: background-color 0.3s, transform 0.3s;">
                            <td
                              style="padding: 15px; border-bottom: 1px solid #666; cursor: pointer; transition: background-color 0.3s; border-radius: 5px;"
                              onmouseover="this.style.backgroundColor='#5a5a5a'; this.style.transform='scale(1.02';"
                              onmouseout="this.style.backgroundColor=''; this.style.transform='scale(1)';">
                              <?php echo $data['route_title']; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="1"
                            style="text-align: center; padding: 15px; background-color: #3c3c3c; border-bottom: 1px solid #666; color: #000; border-radius: 0px;">
                            <?php echo get_phrase('No Data Found'); ?>
                          </td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
      <div class="col-xl-4">

        <div class="card">
        </div>
      </div>
    </div>
  </div><!-- end col-->
</div>

<!-- Map Section -->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title mb-0" style="color: #2c2c2c;">
          <i class="mdi mdi-map title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
          <span style="font-size: 1.5rem; font-weight: 700; margin-left: 10px;">
            Map View
          </span>
        </h4>
        <div id="map"></div>
      </div> <!-- end card-body -->
    </div> <!-- end card -->
  </div> <!-- end col -->
</div>

<!-- Google Maps Script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYMsSqgjmaJ5h-6CZniHdS7JRYMh5h370"></script>
<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 22.5726, lng: 88.3639 }, // Kolkata coordinates
      zoom: 12
    });
    var marker = new google.maps.Marker({
      position: { lat: 22.5726, lng: 88.3639 },
      map: map,
      title: 'Hello from Kolkata!'
    });
  }

  google.maps.event.addDomListener(window, 'load', initMap);
</script>