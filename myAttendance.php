<?php

  session_start();
  $enroll = $_SESSION['username'];

 ?>
 <?php include "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="myAttendanceStyle.css">
</head>
<body>

    <div>
        <h4>My Attendance</h4>
        <table>
            <col width="60px">
            <col width="135px">
            <col width="200px">
            <col width="100px">
            <col width="100px">
            <tr>
                <th>S.No.</th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Lectures(%)</th>
                <th>Tutorials(%)</th>
            </tr>

            <?php

                $query = "SELECT `Subjects`.`Subject ID`,`Subject Name` FROM `Student's Subject`,`Subjects` WHERE `Student's Subject`.`Enrollment No.` = $enroll AND `Subjects`.`Subject ID` = `Student's Subject`.`Subject ID` ORDER BY `Subjects`.`Subject ID` ASC;";
                $result = mysqli_query($connection,$query);
                if($result){
                  $count = 1;
                  while($i = mysqli_fetch_row($result)){
                    $q = "SELECT `P/A`,`L/T` FROM `Student's Attendance` WHERE `Enrollment No.` = $enroll AND `Subject ID` = '". $i[0]."';";
                    $r = mysqli_query($connection,$q);
                    $Lpresent = 0;
                    $Labsent = 0;
                    $Tpresent = 0;
                    $Tabsent = 0;
                    while($j = mysqli_fetch_assoc($r)){
                      if($j['L/T'] == 'L'){
                          if($j['P/A'] == 'P'){
                            $Lpresent++;
                          }
                          else{
                            $Labsent++;
                          }
                      }
                      else{
                        if($j['P/A'] == 'P'){
                          $Tpresent++;
                        }
                        else{
                          $Tabsent++;
                        }
                      }
                    }
                    if($Lpresent + $Labsent == 0){
                        $Lpercent = '-';
                    }
                    else{
                        $Lpercent = ($Lpresent/($Lpresent + $Labsent))*100;
                    }

                    if($Tpresent + $Tabsent == 0){
                        $Tpercent = '-';
                    }
                    else{
                        $Tpercent = ($Tpresent/($Tpresent + $Tabsent))*100;
                    }

                    echo '<tr>
                              <td>' . $count . '</td>
                              <td>' . $i[0] . '</td>
                              <td>' . $i[1] . '</td>
                              <td>' . $Lpercent . '</td>
                              <td>' . $Tpercent . '</td>
                          </tr>';
                    $count++;
                  }
                }

            ?>

        </table>
    </div>

</body>
</html>
