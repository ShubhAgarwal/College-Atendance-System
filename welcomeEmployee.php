<?php

  session_start();
  
  if(isset($_SESSION['username'])){
    $enroll = $_SESSION['username'];
    $name = $_SESSION['name'];
  }
  else{
    header('location:Login.php');
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="welcomeEmployeeStyle.css">
</head>
<body>

    <header>
        <div class="head">
            <img class="icon" src="Screenshot (12).png" alt="">
            <div class="name">
                <p>Jaypee Institue Of</p>
                <p>Information Technology</p>
            </div>
        </div>
        <div>
            <ul>
                <li>
                    <a data-toggle="collapse" href="#Setting" aria-expanded="false" aria-controls="Setting">
                        Setting <img class="arrow" src="Group 2@2x.png" alt="">
                    </a>
                    <div class="collapse multi-collapse drop" id="Setting">
                        <ul>
                            <li><a href="signOut.php">Change Pin</a></li>
                            <li><a href="signOut.php">Sign Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <aside>
        <div class="title">
            <p class="welcome">Welcome,</p>
            <p><?php echo $name; ?></p>
        </div>
        <ul>
            <li>
                <a data-toggle="collapse" href="#Personal-Info" role="button" aria-expanded="false" aria-controls="Personal-Info">
                    Personal Info. <img class="arrow" src="Group 7@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Personal-Info">
                    <ul>
                        <li><a href="StudentPersonaldetails.php" target="content">Personal Details</a></li>
                        <li><a href="StudentEditdetails.php" target="content">Edit Details</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Attendance" role="button" aria-expanded="false" aria-controls="Attendance">
                    Attendance <img class="arrow" src="Group 7@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Attendance">
                    <ul>
                        <li><a href="updateAttendance1.php" target="content">Update Attendance</a></li>
                        <li><a href="editAttendance1.php" target="content">Edit Attendance</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Exam-Record" role="button" aria-expanded="false" aria-controls="Exam-Record">
                    Exam Record <img class="arrow" src="Group 7@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Exam-Record">
                    <ul>
                        <li><a href="" target="content">HI</a></li>
                        <li><a href="" target="content">HI</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Others" role="button" aria-expanded="false" aria-controls="Others">
                    Others <img class="arrow" src="Group 7@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Others">
                    <ul>
                        <li><a href="" target="content">HI</a></li>
                        <li><a href="" target="content">HI</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </aside>
    
    <iframe name="content" class="body"></iframe>

</body>
</html>