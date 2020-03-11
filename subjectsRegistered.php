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
    <link rel="stylesheet" href="subjectsRegisteredStyle.css">
</head>
<body>

    <?php

        $query = "SELECT `Subjects`.`Subject ID`,`Subject Name`,`Credits` FROM `Student's Subject`,`Subjects` WHERE `Student's Subject`.`Enrollment No.` = $enroll AND `Subjects`.`Subject ID` = `Student's Subject`.`Subject ID` ORDER BY `Subjects`.`Subject ID` ASC;";
        $result = mysqli_query($connection,$query);

    ?>

    <div>
        <h4>Subjects Registered</h4>
        <table>
            <col width="60px">
            <col width="135px">
            <col width="200px">
            <col width="100px">
            <tr>
                <th>S.No.</th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Credits</th>
            </tr>

            <?php
                $count = 1;
                if($result){
                    while($i = mysqli_fetch_assoc($result)){
                      echo '<tr>
                                <td>' . $count . '</td>
                                <td>' . $i['Subject ID'] . '</td>
                                <td>' . $i['Subject Name'] . '</td>
                                <td>' . $i['Credits'] . '</td>
                            </tr>';
                      $count++;
                    }
                }
            ?>
        </table>
    </div>

</body>
</html>
