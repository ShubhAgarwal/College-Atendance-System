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
    <link rel="stylesheet" href="StudentPersonaldetailsStyle.css">
</head>
<body>

    <?php

      $query = "SELECT * FROM `Students` WHERE `Enrollment No.` = $enroll;";
      $result = mysqli_query($connection,$query);
      $i = mysqli_fetch_assoc($result);

    ?>

    <div class="body">

        <h5>PERSONAL DETAILS</h5>
        <table>
            <col width="170px">
            <tr>
                <th>Name</th>
                <td colspan="3"><?php echo $i['Student Name']; ?></td>
            </tr>
            <tr>
                <th>Enrollment No.</th>
                <td colspan="3"><?php echo $i['Enrollment No.']; ?></td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td colspan="3"><?php echo $i["Father's Name"]; ?></td>
            </tr>
            <tr>
                <th>Course</th>
                <td colspan="3"><?php echo $i['Course']; ?></td>
            </tr>
            <tr>
                <th>Semester</th>
                <td colspan="3"><?php echo $i['Semester']; ?></td>
            </tr>
            <tr>
                <th>Aadhar No.</th>
                <td colspan="3"><?php echo $i['Aadhar No.']; ?></td>
            </tr>
        </table>

        <div class="flex">
            <h5>Student Contact Details</h5>
            <h5>Guardian Contact Details</h5>
        </div>

        <div class="flex">
            
            <table>
                <tr>
                    <th>Cell/Mobile</th>
                    <td><?php if(empty($i['StudCell'])){echo '-';}else{echo $i['StudCell'];} ?></td>
                </tr>
                <tr>
                    <th>Telephone</th>
                    <td><?php if(empty($i['StudTel'])){echo '-';}else{echo $i['StudTel'];} ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php if(empty($i['StudEmail'])){echo '-';}else{echo $i['StudEmail'];} ?></td>
                </tr>
            </table>
    
            <table>
                <tr>
                    <th>Cell/Mobile</th>
                    <td><?php if(empty($i['GuarCell'])){echo '-';}else{echo $i['GuarCell'];} ?></td>
                </tr>
                <tr>
                    <th>Telephone</th>
                    <td><?php if(empty($i['GuarTel'])){echo '-';}else{echo $i['GuarTel'];} ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php if(empty($i['GuarEmail'])){echo '-';}else{echo $i['GuarEmail'];} ?></td>
                </tr>
            </table>
        </div>

        <div class="flex">
            <h5>Corresponding Address</h5>
            <h5>Permanent Address</h5>
        </div>

        <div class="flex">
            
            <table>
                <tr>
                    <th>Address</th>
                    <td><?php if(empty($i['C-address'])){echo '-';}else{echo $i['C-address'];} ?></td>
                </tr>
                <tr>
                    <th>City/Pin</th>
                    <td><?php if(empty($i['C-city'])){echo '-';}else{echo $i['C-city'];} ?></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><?php if(empty($i['C-state'])){echo '-';}else{echo $i['C-state'];} ?></td>
                </tr>
            </table>
    
            <table>
                <tr>
                    <th>Address</th>
                    <td><?php if(empty($i['P-address'])){echo '-';}else{echo $i['P-address'];} ?></td>
                </tr>
                <tr>
                    <th>City/Pin</th>
                    <td><?php if(empty($i['P-city'])){echo '-';}else{echo $i['P-city'];} ?></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><?php if(empty($i['P-state'])){echo '-';}else{echo $i['P-state'];} ?></td>
                </tr>
            </table>
        </div>


        <h5>QUALIFICATION DETAILS</h5>
        <table>
            <tr>
                <th>Name of the board</th>
                <th>Exam Passed</th>
                <th>Year of Passing</th>
                <th>Max Marks</th>
                <th>Marks Obtained</th>
                <th>% of Marks</th>
            </tr>
            <tr>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
            </tr>
            <tr>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
                <td><?php echo $i['Student Name'] ?></td>
            </tr>
        </table>

    </div>

</body>
</html>
