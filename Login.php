<?php session_start(); ?>
<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="LoginStyle.css">
</head>
<body>

  <script type="text/javascript">

      function change(){
        var val = document.getElementById("select").value;
        if(val == "Student"){
          document.getElementById("number").innerHTML = 'Enrollment No.';
          document.getElementById("dob").style.display = 'block';
          document.getElementById("form").style = 'margin-top: 7px;';
        }
        else{
          document.getElementById("number").innerHTML = 'Employee ID';
          document.getElementById("dob").style.display = 'none';
          document.getElementById("form").style = 'margin-top: 40px;';
        }
        count++;
      }

  </script>

  <?php

        if(isset($_POST['Submit'])){

            $type = $_POST['Type'];
            $enroll = $_POST['Enrollment'];
            $password = $_POST['password'];

            $flag1 = 0;
            $flag2 = 0;
            $flag3 = 0;

            if(!is_numeric($enroll)){
                $flag1 = 1;
            }
            /*strlen((string)$enroll) != 8 &&*/


            if($connection){

                if($type == 'Student'){

                    $dob = strtotime($_POST['DOB']);
                    if($dob){
                        $dob = date('Y-m-d',$dob);
                    }
                    else{
                      $flag2 = 1;
                    }
                    if($flag1 != 1 && $flag2 != 1){

                        $query = "SELECT `Enrollment No.`,`DOB`,`Password`,`Student Name` FROM `Students`;";
                        $result = mysqli_query($connection,$query);
                        while($i = mysqli_fetch_assoc($result)){
                            if($i['Enrollment No.'] == $enroll){
                                if($i['DOB'] == $dob){
                                    if($i['Password'] === $password){
                                        $_SESSION['username'] = $enroll;
                                        $_SESSION['name'] = $i['Student Name'];
                                        header('location:welcomeStudent.php');
                                    }
                                    else{
                                        $flag3 = 1;
                                        break;
                                    }
                                }
                                else{
                                    $flag2 = 1;
                                    break;
                                }
                            }
                        }
                        if($flag2 != 1 || $flag3 != 1){
                            $flag1 = 1;
                        }

                    }

                }
                else if($type == "Employee"){

                    $query = "SELECT `Employee ID`,`Password`,`Employee Name` FROM `Employee`;";
                    $result = mysqli_query($connection,$query);
                    while($i = mysqli_fetch_assoc($result)){
                        if($i['Employee ID'] == $enroll){
                            if($i['Password'] === $password){
                                $_SESSION['username'] = $enroll;
                                $_SESSION['name'] = $i['Employee Name'];
                                header('location:welcomeEmployee.php');
                            }
                            else{
                                $flag3 = 1;
                                break;
                            }
                        }
                    }
                    if($flag3 != 1){
                        $flag1 = 1;
                    }

                }
                else{

                    $query = "SELECT `ID`,`Password`,`Name` FROM `Admin`;";
                    $result = mysqli_query($connection,$query);
                    while($i = mysqli_fetch_assoc($result)){
                        if($i['ID'] == $enroll){
                            if($i['Password'] === $password){
                                $_SESSION['username'] = $enroll;
                                $_SESSION['name'] = $i['Name'];
                                header('location:welcomeAdmin.php');
                            }
                            else{
                                $flag3 = 1;
                                break;
                            }
                        }
                    }
                    if($flag3 != 1){
                        $flag1 = 1;
                    }
                }

            }
            else{
                die("Database Connection Failed");
            }


            if($flag1 == 1 && $flag2 != 1 && $flag3 != 1){
                echo '<style type="text/css">
                       .form-group{margin-bottom: 10px;}
                       .small1{display: block;}
                       </style>';
            }
            elseif($flag1 != 1 && $flag2 == 1 && $flag3 != 1){
                echo '<style type="text/css">
                       .form-group{margin-bottom: 10px;}
                       .small2{display: block;}
                       </style>';
            }
            elseif ($flag1 != 1 && $flag2 != 1 && $flag3 == 1){
                echo '<style type="text/css">
                       .form-group{margin-bottom: 10px;}
                       .small3{display: block;}
                       </style>';
            }
            elseif($flag1 == 1 && $flag2 == 1 && $flag3 != 1){
                echo '<style type="text/css">
                       .form-group{margin-bottom: 5px;}
                       .small1{display: block;}
                       .small2{display: block;}
                       </style>';
            }
            elseif($flag1 == 1 && $flag2 != 1 && $flag3 == 1){
                echo '<style type="text/css">
                       .form-group{margin-bottom: 5px;}
                       .small1{display: block;}
                       .small3{display: block;}
                       </style>';
            }
            elseif($flag1 != 1 && $flag2 == 1 && $flag3 == 1){
                echo '<style type="text/css">
                       .form-group{margin-bottom: 5px;}
                       .small2{display: block;}
                       .small3{display: block;}
                       </style> ';
            }
            else{
                echo '<style type="text/css">
                    form{margin-top: 0px;}
                    .form-group{margin-bottom: 5px;}
                    select{margin-bottom: 10px;}
                    .small1{display: block;}
                    .small2{display: block;}
                    .small3{display: block;}
                    </style> ';
            }

        }

  ?>

    <header>
        <div class="head">
            <img class="icon" src="Screenshot (12).png" alt="">
            <h2 class="name">Jaypee Institue Of Information Technology</h2>
        </div>
    </header>

    <div class="line1"></div>

    <div class="main">

        <div class="line2"></div>

        <div class="content">

            <form action="Login.php" method="POST" id="form">
                <h5>LOGIN</h5>
                <div class="form-group">
                    <label>Member Type</label>
                    <select class="form-control" id="select" name="Type" onchange="change()">
                        <option value="Student">Student</option>
                        <option value="Employee">Employee</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label id="number">Enrollment No.</label>
                    <input name="Enrollment" type="text" class="form-control">
                    <small class="small1">*Incorrect ID</small>
                </div>
                <div class="form-group" id="dob">
                    <label>DOB</label>
                    <input name="DOB" type="date" class="form-control">
                    <small class="small2">*Incorrect Date Of Birth</small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control">
                    <small class="small3">*Incorrect Password</small>
                </div>
                <button class="btn btn-primary" name="Submit">Submit</button>
                <button class="btn btn-primary" name="Reset">Reset</button>
            </form>

            <div class="images">
                <img class="imagesize" src="Screenshot (13).jpg" alt="">
            </div>

        </div>

        <div class="line2"></div>

    </div>

    <footer></footer>

</body>
</html>
