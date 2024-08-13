<?php 
// $check_data = $this->db->get_where('online_exam_details', array(
//     'status' => '1'
// ))->row_array();

$getquarter_id = $get_quarter_id ? $get_quarter_id : "";
$getclass_id = $get_quize_class_id ? $get_quize_class_id : "";
$getsubject_id = $get_quize_subject_id ? $get_quize_subject_id : "";

$get_quize_first_row = $this->db->order_by('id', 'ASC')->get_where('quiz', array(
    'class_id' => $getclass_id,
    'subject_id' => $getsubject_id,
    'quarter_id' => $getquarter_id
))->row_array();

// $get_quize = $this->db->order_by('id', 'ASC')->get_where('quiz', array(
//     'class_id' => 1,
//     'quarter_id' => $getquarter_id
// ))->result_array();
?>

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block"> <i class="mdi mdi-grease-pencil title_icon"></i> <?php echo get_phrase('online_exam_page'); ?> </h4>
        <div id="clock">00:00:00</div>
        <button id="startTimer"></button>
        <script src="timer.js"></script>
        </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
       <form id="examForm">
        <input type="hidden" name="hid_result_value" id="hid_result_value" value="">
            <div class="question">
                <?php if ($get_quize_first_row && $exam_start_status!="notstart"):?>
                <label id="questionLabel">1. <?php echo $get_quize_first_row['questions'];?></label>
                <div class="options">
                    <input type="radio" id="option1" name="answer" value="<?php echo $get_quize_first_row['answers1'];?>">
                    <label for="option1"><?php echo $get_quize_first_row['answers1'];?></label><br>
                    <input type="radio" id="option2" name="answer" value="<?php echo $get_quize_first_row['answers2'];?>">
                    <label for="option2"><?php echo $get_quize_first_row['answers2'];?></label><br>
                    <input type="radio" id="option3" name="answer" value="<?php echo $get_quize_first_row['answers3'];?>">
                    <label for="option3"><?php echo $get_quize_first_row['answers3'];?></label><br>
                    <input type="radio" id="option4" name="answer" value="<?php echo $get_quize_first_row['answers4'];?>">
                    <label for="option4"><?php echo $get_quize_first_row['answers4'];?></label><br>
                </div>
               <?php endif; ?>
            </div>
            <div class="btn-container">
                <?php if ($exam_start_status!="notstart"):?>
                <button type="button" class="btn" id="prevBtn" onclick="prevQuestion()" disabled>Previous</button>
                <button type="button" class="btn" id="nextBtn" onclick="nextQuestion()">Next</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            var examStartStatus = '<?php echo $exam_start_status; ?>';
            var getexam_start_date = '<?php echo $getexam_start_date; ?>';
            var getexam_start_time = '<?php echo $getexam_start_time; ?>';
            // Sweet alert will be shown if exam is not start 
            if (examStartStatus === 'notstart') {
                //alert("Exam Not strted till now");
                alert("The exam is not started.\Your exam will be started on "+getexam_start_date+" at "+getexam_start_time+".");
                window.location.href = '<?php echo base_url("student/student_online_exam"); ?>';
                // Swal.fire({
                // title: 'Exam Not Started',
                // text: 'The exam has not started yet.',
                // icon: 'info',
                // confirmButtonText: 'OK'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         window.location.href = '<?php //echo base_url("student/student_online_exam"); ?>';
                //     }
                // });
            }
            
        });
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .question {
            margin: 20px 0;
        }
        .question label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .options {
            margin-bottom: 20px;
        }
        .options input[type="radio"] {
            margin-right: 10px;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        var showAllGrades = function () {
            var url = '<?php echo route('grade/list'); ?>';

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('.grade_content').html(response);
                    initDataTable('basic-datatable');
                }
            });
        }
    </script>

  <!---- Clock start and stop function ----> 
  <script>
  $(document).ready(function() {
    
    // $('#startTimer').click(function() {
    //     // Delay before starting the clock (e.g., 5 seconds)
    //     //var startDelay = 5000;
    //      var examDurations = '<?php echo $actual_exam_duration; ?>';

    //     // Duration for which the clock should run (e.g., 10 seconds)
    //     //var runDuration = 100000;
    //     var runDuration = examDurations * 60000;

    //    // setTimeout(function() {
    //         var startTime = Date.now();
    //         var interval = setInterval(function() {
    //             var elapsed = Date.now() - startTime;
    //             var seconds = Math.floor(elapsed / 1000) % 60;
    //             var minutes = Math.floor(elapsed / (1000 * 60)) % 60;
    //             var hours = Math.floor(elapsed / (1000 * 60 * 60)) % 24;

    //             $('#clock').text(
    //                 (hours < 10 ? '0' : '') + hours + ':' +
    //                 (minutes < 10 ? '0' : '') + minutes + ':' +
    //                 (seconds < 10 ? '0' : '') + seconds
    //             );

    //             if (elapsed >= runDuration) {
    //                 alert("Your time has been finished");
    //                 clearInterval(interval);
    //                 handleSubmit();
    //                 //hitFunction();
    //             }
    //         }, 1000);
    //    // }, startDelay);
    // });

    // Back tracking countring
    $('#startTimer').click(function() {
    // The duration of the exam in minutes, passed from the server-side PHP variable
    var examDurations = '<?php echo $actual_exam_duration; ?>';

    // Convert the duration from minutes to milliseconds
    var runDuration = examDurations * 60000;

    // Calculate the end time
    var endTime = Date.now() + runDuration;

    // Set up an interval that runs every second (1000 milliseconds)
    var interval = setInterval(function() {
        // Calculate the remaining time in milliseconds
        var remaining = endTime - Date.now();
        
        // If remaining time is less than or equal to zero, clear the interval and handle the timer end
        if (remaining <= 0) {
            $('#clock').text('00:00:00');
            alert("Your exam time has been finished!");
            clearInterval(interval);
            handleSubmit();
            return;
        }

        // Calculate hours, minutes, and seconds from the remaining time
        var seconds = Math.floor(remaining / 1000) % 60;
        var minutes = Math.floor(remaining / (1000 * 60)) % 60;
        var hours = Math.floor(remaining / (1000 * 60 * 60)) % 24;

        // Update the clock display with leading zeros for single-digit values
        $('#clock').text(
            (hours < 10 ? '0' : '') + hours + ':' +
            (minutes < 10 ? '0' : '') + minutes + ':' +
            (seconds < 10 ? '0' : '') + seconds
        );
        }, 1000);
    });

   });
  </script>

   
  <!------- This is One Process----->
    <!-- <script>
        const questions = [
            {
                question: "1. What is the capital of France?",
                options: ["Paris", "London", "Berlin", "Madrid"]
            },
            {
                question: "2. Solve: 5 + 3 = ?",
                options: ["6", "7", "8", "9"]
            },
            {
                question: "3. Who wrote 'Hamlet'?",
                options: ["William Shakespeare", "Charles Dickens", "J.K. Rowling", "Mark Twain"]
            }
        ];

        let currentQuestionIndex = 0;
        const answers = Array(questions.length).fill(null);

        function loadQuestion(index) {
            const questionLabel = document.getElementById('questionLabel');
            const options = document.querySelectorAll('.options input');
            questionLabel.textContent = questions[index].question;
            options.forEach((option, idx) => {
                option.value = questions[index].options[idx];
                option.nextElementSibling.textContent = questions[index].options[idx];
                option.checked = answers[index] === questions[index].options[idx];
            });

            document.getElementById('prevBtn').disabled = index === 0;
            document.getElementById('nextBtn').textContent = index === questions.length - 1 ? 'Submit' : 'Next';
        }

        function nextQuestion() {
            saveAnswer();
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                loadQuestion(currentQuestionIndex);
            } else {
                handleSubmit();
            }
        }

        function prevQuestion() {
            saveAnswer();
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                loadQuestion(currentQuestionIndex);
            }
        }

        function saveAnswer() {
            const options = document.querySelectorAll('.options input');
            options.forEach(option => {
                if (option.checked) {
                    answers[currentQuestionIndex] = option.value;
                }
            });
        }

        function handleSubmit() {
            saveAnswer();
            let result = '';
            questions.forEach((question, index) => {
                result += `${question.question} Answer: ${answers[index]}\n`;
            });
            alert(result);
            console.log(result);
            return false; // Prevent default form submission for demonstration purposes
        }

        // Initial load
        loadQuestion(currentQuestionIndex);
    </script> -->

    <!----- This is second process -----> 
    <script>
        // const questions = [
        //     {
        //         question: "1. What is the capital of France?",
        //         options: ["Paris", "London", "Berlin", "Madrid"]
        //     },
        //     {
        //         question: "2. Solve: 5 + 3 = ?",
        //         options: ["6", "7", "8", "9"]
        //     },
        //     {
        //         question: "3. Who wrote 'Hamlet'?",
        //         options: ["William Shakespeare", "Charles Dickens", "J.K. Rowling", "Mark Twain"]
        //     }
        // ];

        const questions = <?php echo $js_array; ?>;

        let currentQuestionIndex = 0;
        const answers = Array(questions.length).fill(null);

        function loadQuestion(index) {
            const questionLabel = document.getElementById('questionLabel');
            const options = document.querySelectorAll('.options input');
            questionLabel.textContent = questions[index].question;
            options.forEach((option, idx) => {
                option.value = questions[index].options[idx];
                option.nextElementSibling.textContent = questions[index].options[idx];
                option.checked = answers[index] === questions[index].options[idx];
            });

            document.getElementById('prevBtn').disabled = index === 0;
            document.getElementById('nextBtn').textContent = index === questions.length - 1 ? 'Submit' : 'Next';
        }

        function nextQuestion() {
            saveAnswer();
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                loadQuestion(currentQuestionIndex);
            } else {
                handleSubmit();
            }
        }

        function prevQuestion() {
            saveAnswer();
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                loadQuestion(currentQuestionIndex);
            }
        }

        function saveAnswer() {
            const options = document.querySelectorAll('.options input');
            options.forEach(option => {
                if (option.checked) {
                    answers[currentQuestionIndex] = option.value;
                }
            });
        }

        function handleSubmit() {

           //alert(JSON.stringify(answers));
            var studentAns = JSON.stringify(answers);
            console.log(studentAns);
            var url = '<?php echo route('updateExamStatus'); ?>';
            var getexam_id = '<?php echo $getexam_id; ?>';
            var getclass_id = '<?php echo $getclass_id; ?>';
            var getsubject_id = '<?php echo $getsubject_id; ?>';
            var getquarter_id = '<?php echo $getquarter_id; ?>';
            $.ajax({
                url: url,
                method: 'POST',
                data: { quarter_id: getquarter_id, exam_id: getexam_id, class_id: getclass_id, subject_id: getsubject_id, student_answers: studentAns },
                //contentType: 'application/json', // Ensuring content type is JSON
                // data: JSON.stringify({ 
                //     quarter_id: getquarter_id, 
                //     exam_id: getexam_id, 
                //     student_answers: studentAns 
                // }),
                success : function(response) {
                    console.log(response);
                    if (typeof response === 'string') {
                    response = JSON.parse(response);
                    }
                    // Check the status value
                    if (response.status === true) {
                     $('#startTimer').click(); 
                    }
                    
                   
                }
            });

           Swal.fire({
            title: 'Success!',
            text: "Thank you. Your exam successfully submitted.",
            icon: 'success',
            confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to another URL
                    window.location.href = '<?php echo route('student_online_exam'); ?>'; // Replace with your actual URL
                }
            });
            return false; // Prevent default form submission for demonstration purposes
        }

        // Initial load
        loadQuestion(currentQuestionIndex);
    </script>

    <script>
    $(document).ready(function() {

        var examStartStatus = '<?php echo $exam_start_status; ?>';
        var getexam_id = '<?php echo $getexam_id; ?>';
        var getclass_id = '<?php echo $getclass_id; ?>';
        var getsubject_id = '<?php echo $getsubject_id; ?>';
        var getquarter_id = '<?php echo $getquarter_id; ?>';
        // Timer automatically run
        if (examStartStatus === 'start') {

            var url = '<?php echo route('updateExamStatus'); ?>';

            $.ajax({
                url: url,
                method: 'POST',
                data: { quarter_id: getquarter_id, exam_id: getexam_id , class_id: getclass_id, subject_id: getsubject_id , student_answers: ""},
                success : function(response) {
                    console.log(response);
                    if (typeof response === 'string') {
                    response = JSON.parse(response);
                    }
                    // Check the status value
                    if (response.status === true) {
                     $('#startTimer').click(); 
                    }
                    
                   
                }
            });
            
        }
     
    });
   </script>
