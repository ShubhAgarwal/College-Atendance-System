<?php

  session_start();
  $enroll = $_SESSION['username'];

  $c = 0;

 ?>
 <?php include "connection.php"; ?>

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
    <link rel="stylesheet" href="editAttendance2Style.css">
</head>
<body>

    <form action="" method="POST">

        <h4>Update Attendance</h4>
        <h5 name='course'></h5>
        <table>
            <col width="60px">
            <col width="120px">
            <col width="180px">
            <col width="100px">
            <col width="110px">
            <tr>
                <th class="sn">S.No.</th>
                <th>Enrollment No.</th>
                <th>Names</th>
                <th>Batch</th>
                <th>Mark</th>
            </tr>

            <?php

                if(isset($_POST['show'])){

                    $previous = [];
                    $subject = $_POST['subject'];
                    $class = $_POST['class'];
                    $date = $_POST['date'];
                    $time = strtotime($_POST['time']);
                    if($time){
                        $time = strftime('%R',$time);
                    }
                    else{
                        header('location:editAttendance1.php');
                    }
                    array_push($previous,$subject);
                    array_push($previous,$date);
                    array_push($previous,$time);
                    array_push($previous,$class);
                    $batch = [];
                    if(!empty($_POST['batch'])){
                        foreach((array)$_POST['batch'] as $i)
                            array_push($batch,"'". $i ."'");
                    }
                    else{
                        header('location:editAttendance1.php');
                    }
                    $data = [];
                    $batch = implode(",",$batch);
                    $query = "SELECT `Students`.`Enrollment No.`,`Students`.`Student Name`,`Batches`.`Batch Name`,`Student's Attendance`.`P/A` FROM `Students`,`Batches`,`Subjects`,`Student's Attendance` WHERE `Student's Attendance`.`Date` = '" . $date . "' AND `Student's Attendance`.`Time` = '" . $time . "' AND `Student's Attendance`.`L/T` = '" . $class . "' AND `Subjects`.`Subject Name` = '" . $subject . "' AND `Subjects`.`Subject ID` = `Student's Attendance`.`Subject ID` AND `Batches`.`Batch Name` IN ($batch) AND  `Batches`.`Batch ID` = `Student's Attendance`.`Batch ID` AND `Students`.`Enrollment No.` = `Student's Attendance`.`Enrollment No.` AND `Students`.`Batch ID` = `Batches`.`Batch ID` AND `Student's Attendance`.`Employee ID` = $enroll;";
                    $result = mysqli_query($connection,$query);
                    $count = 0;
                    if($result){
                        while($i = mysqli_fetch_assoc($result)){
                            $markA = 'unchecked';
                            $markP = 'unchecked';
                            if($i['P/A'] == 'P'){
                                $markP = 'checked';
                            }
                            else{
                                $markA = 'checked';
                            }
                            echo 
                                '<tr>
                                    <td class="sn">'. ($count + 1) .'</td>
                                    <td class="enroll">'. $i['Enrollment No.'] .'</td>
                                    <td class="name">'. $i['Student Name'] .'</td>
                                    <td class="batch">'. $i['Batch Name'] .'</td>
                                    <td class="mark">
                                        <input type="radio" name="'. $count .'" value="P" '. $markP .'>P
                                        <input type="radio" name="'. $count .'" value="A" '. $markA .'>A
                                    </td>
                                </tr>';
                            $data[$count] = [];
                            $data[$count][0] = $i['Enrollment No.'];
                            $data[$count][1] = $i['Batch Name'];
                            $data[$count] = implode(",",$data[$count]);
                            $count++;
                        }
                    }
                    else{
                        echo 'No Students.';
                    }
                    $data = implode("-",$data);
                    $_SESSION['count'] = $count;
                    $previous = implode(",",$previous);
                }
            ?>

        </table>
        <input type="text" name="data" value="<?php echo $data; ?>" hidden>
        <input type="text" name="previous" value="<?php echo $previous; ?>" hidden>
        <button class="btn btn-secondary" target="content" name='save'>Save Attendance</button>

    </form>

    <?php
    
        if(isset($_POST['save'])){

            $enroll = $_SESSION['username'];
            $previous = $_POST['previous'];
            $previous = explode(",",$previous);
            $s = mysqli_query($connection,'SELECT `Subject ID` FROM `Subjects` WHERE `Subject Name` = "' . $previous[0] . '";');
            $s = mysqli_fetch_row($s);
            $count = $_SESSION['count'];
            $data = $_POST['data'];
            $data = explode("-",$data);
            $t = 0;
            while($t < $count){
                $data[$t] = explode(",",$data[$t]);
                $t++;
            }
            $c = 0;
            foreach($data as $i){
                $e = $i[0];
                $b = mysqli_query($connection,'SELECT `Batch ID` FROM `Batches` WHERE `Batch Name` = "' . $i[1] . '";');
                $b = mysqli_fetch_row($b);
                $m = $_POST[$c];
                $q = "UPDATE `Student's Attendance` SET `P/A` = '". $m ."' WHERE `Enrollment No.` = $e AND `Employee ID` = $enroll AND `Subject ID` = '".$s[0]."' AND `Batch ID` = $b[0] AND `Date` = '".$previous[1]."' AND `Time` = '".$previous[2]."' AND `L/T` = '".$previous[3]."';";
                $r = mysqli_query($connection,$q);
                $c++;
            }
            unset($_SESSION['count']);
            header('location:editAttendance1.php');
        }

    ?>

</body>
</html>
