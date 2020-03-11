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
    <link rel="stylesheet" href="welcomeAdminStyle.css">
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
                    <div class="drop collapse multi-collapse" id="Setting">
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
                <a data-toggle="collapse" href="#Course-Info" role="button" aria-expanded="false" aria-controls="Course-Info">
                    Subjects Info. <img class="arrow" src="Group 2@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Course-Info">
                    <ul>
                        <li><a href="Subjectsdetail.php" target="content">Subjects Details</a></li>
                        <li><a href="Faculty'sSubject.php" target="content">Faculty's Subjects</a></li>
                        <li><a href="Student'sSubject.php" target="content">Student's Subjects</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Student-Info" role="button" aria-expanded="false" aria-controls="Student-Info">
                    Student Info. <img class="arrow" src="Group 2@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Student-Info">
                    <ul>
                        <li><a href="Studentsdetail.php" target="content">Student Details</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Faculty-Info" role="button" aria-expanded="false" aria-controls="Faculty-Info">
                    Faculty Info. <img class="arrow" src="Group 2@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Faculty-Info">
                    <ul>
                        <li><a href="Facultydetail.php" target="content">Faculty Details</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Exam-Info" role="button" aria-expanded="false" aria-controls="Exam-Info">
                    Exam Info. <img class="arrow" src="Group 2@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Exam-Info">
                    <ul>
                        <li><a href="" target="content">Exam Details</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#Others" role="button" aria-expanded="false" aria-controls="Others">
                    Others <img class="arrow" src="Group 2@2x.png" alt="">
                </a>
                <div class="collapse multi-collapse" id="Others">
                    <ul>
                        <li><a href="" target="content">HI</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </aside>
    
    <iframe name="content" class="body" src="" frameborder="0"></iframe>

</body>
</html>