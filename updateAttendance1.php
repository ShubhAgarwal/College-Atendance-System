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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="updateAttendance1Style.css">
</head>
<body>

    <?php
        $subject = [];
        $batch = array();
        $query = "SELECT DISTINCT `Subject Name` FROM `Faculty's Subject`,`Subjects` WHERE `Employee ID` = $enroll AND `Subjects`.`Subject ID` = `Faculty's Subject`.`Subject ID`;";
        $result = mysqli_query($connection,$query);
        if($result){
            while($i = mysqli_fetch_row($result)){
                array_push($subject,$i[0]);
                $q = "SELECT `Batch Name` FROM `Faculty's Subject`,`Batches`,`Subjects` WHERE `Subjects`.`Subject Name` = '" . $i[0] ."' AND `Subjects`.`Subject ID` = `Faculty's Subject`.`Subject ID` AND `Faculty's Subject`.`Employee ID` = $enroll AND `Faculty's Subject`.`Batch ID` = `Batches`.`Batch ID`;";
                $r = mysqli_query($connection,$q);
                if($r){
                    $batch["'".$i[0]."'"] = [];
                    while($j = mysqli_fetch_row($r)){
                        array_push($batch["'".$i[0]."'"],$j[0]);
                    }
                }
            }
        }
    ?>
    <script type="text/javascript">
      var batch = <?php echo json_encode($batch); ?>;
      function showBatches(){
          var val = document.getElementById("select").value;
          var number = batch["'" +val+ "'"].length;
          document.getElementById("batch").innerHTML = '';
          for(var i=0;i<number; i++){
            document.getElementById("batch").innerHTML += '<input type="checkbox" name="batch" value="'+ batch["'" +val+ "'"][i]+'">'+ batch["'" +val+ "'"][i];
          }
      }
    </script>

    <div>
        <h4>Update Attendance</h4>
        <form action="updateAttendance2.php" method="POST">

            <table>
                <tr>
                    <th>Subjects</th>
                    <td>
                        <select name="subject" id="select" onchange="showBatches()">
                            <?php
                                foreach($subject as $i){
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Type of class</th>
                    <td>
                        <input type="radio" name="class" value="L" checked>Lecture
                        <input type="radio" name="class" value="T">Tutorial
                    </td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>
                        <input type="date" name="date" value="<?php echo date('Y-m-d',strtotime("now")); ?>">
                    </td>
                </tr>
                <tr>
                    <th>Timing</th>
                    <td>
                        <input type="text" name="time">
                    </td>
                </tr>
                <tr>
                    <th>Batch</th>
                    <td id="batch">
                        <?php
                            $int = 0;
                            $string = array_keys($batch);
                            foreach($batch[$string[$int]] as $t){
                                echo '<input type="checkbox" name="batch[]" value="'.$t.'">' . $t;
                            }
                        ?>
                    </td>
                </tr>
            </table>

            <button class="btn btn-secondary" target="content" name="show">Show</button>

        </form>
    </div>

</body>
</html>
