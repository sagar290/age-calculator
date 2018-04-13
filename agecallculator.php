
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Age callculator</title>
   </head>
   <body>
     <h2>Age Callculator</h2>
     <?php

     


     if (!isset($_POST['submit'])) {


      ?>

      <form method="post" action="agecallculator.php">
        Enter your date of birth ,  in <strong>mm/dd/yyyy</strong> format <br> 
      	<input type="text" name="dob" value=""><br> <br>
       <input type="submit" name="submit" value="submit">
      </form>

      <?php
    }else {
          //if the from submit
          //process from input
          $d = $_POST['dob'];
          $dataArr = explode('/', $d);

          //calculate time stamp corresponding data value
          $dataTs = strtotime($d);

          //calculate time stamps corresponding to today
          $now =  strtotime('today');

        //check the value enterd is correct format
        if (sizeof($dataArr) != 3) {
          die('Error: please enter valid dae of birth');

        }

        //check the value entered is a valid date
        if (!checkdate($dataArr[0], $dataArr[1], $dataArr[2])) {
          die('Error: please enter a valid date of birth ');
        }

        //check that date entered is earlier than today
        if ($dataTs >= $now) {
          die('Error: please enter a date of birth earlier than today ');
        }

        //calculate difference between date of birth and oday in days
        //convert to years
        // convert reamining days to months
        //print output
        $ageDays = floor(($now - $dataTs) / 86400);
        $ageYears = floor($ageDays / 365);
        $ageMonths = floor(($ageDays - ($ageYears * 365)) / 30 );

        echo "You are approximatelly $ageYears years and $ageMonths months  old";




    }


      ?>










   </body>
 </html>
