<<<<<<< Updated upstream
<!-- Title -->
=======
<style>


      .card-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
      }

      .id-card-holder {
        width: 225px;
        padding: 4px;
        background-color: #1f1f1f;
        border-radius: 5px;
        position: relative;
        text-align: center;
      }

      .id-card-holder:hover {
        box-shadow: rgba(5, 99, 207, 0.4) 0px 0px 0px 2px,
          rgba(2, 124, 8, 0.65) 0px 4px 6px -1px,
          rgba(29, 155, 3, 0.08) 0px 1px 0px inset;
      }

      .id-card {
        background-image: url("ICardImages/1.jpg");
        background-size: cover;
        background-position: center;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 0 1.5px 0px #b9b9b9;
        position: relative;
        overflow: hidden;
      }

      .id-card2 {
        background-image: url("ICardImages/2.jpg");
        background-size: cover;
        background-position: center;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 0 1.5px 0px #b9b9b9;
        position: relative;
        overflow: hidden;
      }

      .id-card3 {
        background-image: url("ICardImages/3.jpg");
        background-size: cover;
        background-position: center;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 0 1.5px 0px #b9b9b9;
        position: relative;
        overflow: hidden;
      }

      .id-card4 {
        background-image: url("uploads/ICardImages/4.jpg");
        background-size: cover;
        background-position: center;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 0 1.5px 0px #b9b9b9;
        position: relative;
        overflow: hidden;
      }

      .id-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.22);
        border-radius: 10px;
        z-index: 1;
      }

      .id-card img {
        margin: 0 auto;
        position: relative;
        z-index: 2;
      }

      .header img {
        width: 90px;
      }

      .photo img {
        border-radius: 5%;
        border: 3px solid #41686b;
      }

      h2 {
        font-size: 15px;
        margin: 5px 0;
        position: relative;
        z-index: 2;
      }

      h3 {
        font-size: 12px;
        margin: 2.5px 0;
        font-weight: 300;
        position: relative;
        z-index: 2;
      }

      p {
        font-size: 6px;
        margin: 3px;
        position: relative;
        z-index: 2;
      }

      /* Styling for the radio button section */
      .radio-section {
        margin-top: 10px;
      }

      /* Styling for the submit button */
      .submit-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #41686b;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .submit-button:hover {
        background-color: #34555a;
      }

      input[type="radio"] {
        display: none;
      }

      label {
        display: block;
        cursor: pointer;
        color: #fff;
      }

      label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -13px;
        left: -15px;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 38px;
        transition-duration: 0.4s;
        transform: scale(0);
        font-size: 26px;
      }

      label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
      }

      :checked + label {
        border-color: #ddd;
      }

      :checked + label:before {
        content: "✓";
        background-color: green;
        transform: scale(1);
        border: 1px solid green;
      }

      :checked + label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: -1;
      }
</style>

<!--title-->
>>>>>>> Stashed changes
<div class="row">
  <div class="col-xl-12">
    <div class="card parentbar">
      <div class="card-body py-2 d-flex justify-content-between align-items-center" style="padding: 0;">
        <div>
          <h4 class="page-title d-inline-block" style="font-size: 24px;">
            <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('I-card-Choose'); ?>
          </h4>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <form id="card-selection-form" method="post">
      <div class="card-container" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        
        <!-- Card 1 -->
        <div class="id-card-holder" style="width: 280px; padding: 4px; background-color: #1f1f1f; border-radius: 5px; position: relative; text-align: center;">
          <div class="id-card" style="background-image: url('<?php echo site_url(); ?>uploads/ICardImages/1.jpg'); background-size: cover; background-position: center; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 0 1.5px 0px #b9b9b9; position: relative; overflow: hidden;">
            <div class="header">
              <img src="<?php echo site_url(); ?>uploads/ICardImages/logo.png" alt="University Logo" style="width: 90px;" />
            </div>
            <div class="photo">
              <label for="card1">
                <img src="<?php echo site_url(); ?>uploads/ICardImages/user.jpeg" alt="Student Photo" style="border-radius: 5%; border: 3px solid #41686b;width: 100px; margin: 6px;" />
              </label>
            </div>
            <h2 style="font-size: 18px; margin: 5px 0; position: relative; z-index: 2; color: #000;">Prabsaran Singh</h2>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Student</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Class-VI</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">BT19GCS121</h3>
            <hr style="border: 1px dashed #0000003b;">
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;"><strong>Eduquest University</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">3068 Conaway Street, Houston.</p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Texas, United States <strong>301705</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Ph: 01494-660600, 7073222393</p>
          </div>
          <div class="radio-section" style="margin-top: 10px;">
            <input type="radio" name="cardSelection" value="1" id="card1" <?php if ($selectedICardNo == 1) { ?>checked<?php } ?> required />
            <label for="card1" style="display: block; cursor: pointer; color: #fff;">Choose Card 1</label>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="id-card-holder" style="width: 280px; padding: 4px; background-color: #1f1f1f; border-radius: 5px; position: relative; text-align: center;">
          <div class="id-card" style="background-image: url('<?php echo site_url(); ?>uploads/ICardImages/2.jpg'); background-size: cover; background-position: center; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 0 1.5px 0px #b9b9b9; position: relative; overflow: hidden;">
            <div class="header">
              <img src="<?php echo site_url(); ?>uploads/ICardImages/logo.png" alt="University Logo" style="width: 90px;" />
            </div>
            <div class="photo">
              <label for="card2">
                <img src="<?php echo site_url(); ?>uploads/ICardImages/user.jpeg" alt="Student Photo" style="border-radius: 5%; border: 3px solid #41686b; width: 100px; margin: 6px;" />
              </label>
            </div>
            <h2 style="font-size: 18px; margin: 5px 0; position: relative; z-index: 2; color: #000;">Alex Johnson</h2>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Student</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Class-VII</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">BT19GCS122</h3>
            <hr style="border: 1px dashed #0000003b;">
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;"><strong>Eduquest University</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">3068 Conaway Street, Houston.</p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Texas, United States <strong>301705</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Ph: 01494-660600, 7073222393</p>
          </div>
          <div class="radio-section" style="margin-top: 10px;">
            <input type="radio" name="cardSelection" value="2" id="card2" <?php if ($selectedICardNo == 2) { ?>checked<?php } ?> required />
            <label for="card2" style="display: block; cursor: pointer; color: #fff;">Choose Card 2</label>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="id-card-holder" style="width: 280px; padding: 4px; background-color: #1f1f1f; border-radius: 5px; position: relative; text-align: center;">
          <div class="id-card" style="background-image: url('<?php echo site_url(); ?>uploads/ICardImages/3.jpg'); background-size: cover; background-position: center; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 0 1.5px 0px #b9b9b9; position: relative; overflow: hidden;">
            <div class="header">
              <img src="<?php echo site_url(); ?>uploads/ICardImages/logo.png" alt="University Logo" style="width: 90px;" />
            </div>
            <div class="photo">
              <label for="card3">
                <img src="<?php echo site_url(); ?>uploads/ICardImages/user.jpeg" alt="Student Photo" style="border-radius: 5%; border: 3px solid #41686b; width: 100px; margin: 6px;" />
              </label>
            </div>
            <h2 style="font-size: 18px; margin: 5px 0; position: relative; z-index: 2; color: #000;">Maria Garcia</h2>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Student</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Class-VIII</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">BT19GCS123</h3>
            <hr style="border: 1px dashed #0000003b;">
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;"><strong>Eduquest University</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">3068 Conaway Street, Houston.</p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Texas, United States <strong>301705</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Ph: 01494-660600, 7073222393</p>
          </div>
          <div class="radio-section" style="margin-top: 10px;">
            <input type="radio" name="cardSelection" value="3" id="card3" <?php if ($selectedICardNo == 3) { ?>checked<?php } ?> required />
            <label for="card3" style="display: block; cursor: pointer; color: #fff;">Choose Card 3</label>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="id-card-holder" style="width: 280px; padding: 4px; background-color: #1f1f1f; border-radius: 5px; position: relative; text-align: center;">
          <div class="id-card" style="background-image: url('<?php echo site_url(); ?>uploads/ICardImages/4.jpg'); background-size: cover; background-position: center; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 0 1.5px 0px #b9b9b9; position: relative; overflow: hidden;">
            <div class="header">
              <img src="<?php echo site_url(); ?>uploads/ICardImages/logo.png" alt="University Logo" style="width: 90px;" />
            </div>
            <div class="photo">
              <label for="card4">
                <img src="<?php echo site_url(); ?>uploads/ICardImages/user.jpeg" alt="Student Photo" style="border-radius: 5%; border: 3px solid #41686b; width: 100px; margin: 6px;" />
              </label>
            </div>
            <h2 style="font-size: 18px; margin: 5px 0; position: relative; z-index: 2; color: #000;">John Doe</h2>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Student</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Class-IX</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">BT19GCS124</h3>
            <hr style="border: 1px dashed #0000003b;">
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;"><strong>Eduquest University</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">3068 Conaway Street, Houston.</p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Texas, United States <strong>301705</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Ph: 01494-660600, 7073222393</p>
          </div>
          <div class="radio-section" style="margin-top: 10px;">
            <input type="radio" name="cardSelection" value="4" id="card4" <?php if ($selectedICardNo == 4) { ?>checked<?php } ?> required />
            <label for="card4" style="display: block; cursor: pointer; color: #fff;">Choose Card 4</label>
          </div>
        </div>

      </div>
      <div class="form-group mt-3 text-center">
        <button type="submit" class="btn btn-primary" style="padding: 10px 60px;">Submit</button>
      </div>
    </form>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

$(document).ready(function() {
    $('#card-selection-form').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var url = '<?php echo route('icard_choose/update'); ?>';
        $.ajax({
            type: 'POST', // Specify the request type
            url: url, // Use the form's action attribute
            data: $(this).serialize(), // Serialize the form data
            success: function(response) {
              console.log(response);
              const responseObject = JSON.parse(response);
              if (responseObject.status === true) {
                  Swal.fire({
                      title: 'Success!',
                      text: responseObject.notification,
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then(() => {
                      // Reload the page after the user clicks "OK"
                      location.reload();
                  });
              } else {
                  Swal.fire({
                      title: 'Error!',
                      text: 'An error occurred',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  }).then(() => {
                      // Optionally, you can reload the page or handle it differently
                      location.reload();
                  });
              }
              //$('#response').html('<p>Success: ' + response + '</p>');
            },
            error: function(xhr, status, error) {
                $('#response').html('<p>Error: ' + error + '</p>');
            }
        });
    });
});

</script>