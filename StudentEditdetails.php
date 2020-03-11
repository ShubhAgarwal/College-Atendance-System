<?php

    include "connection.php";
    session_start();
    $enroll = $_SESSION['username'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="StudentEditdetailsStyle.css">
</head>
<body>

    <?php

        $query = "SELECT * FROM `Students` WHERE `Enrollment No.` = $enroll;";
        $result = mysqli_query($connection,$query);
        $i = mysqli_fetch_assoc($result);

    ?>

    <form action="StudentEditdetails2.php" method="POST">
        <h2>Edit Personal Details</h2>
        <div class="div">
            <div>
                <label class="active">Cell Number</label>
                <input name="StudCell" class="form-control div1" type="text" value="<?php if(empty($i['StudCell'])){echo '-';}else{echo $i['StudCell'];} ?>">
            </div>
            <div>
                <label class="active">Telephone</label>
                <input name="StudTel" class="form-control div1" type="text" value="<?php if(empty($i['StudTel'])){echo '-';}else{echo $i['StudTel'];} ?>">
            </div>
        </div>
        <div class="special div">
            <div>
                <label class="active">Email</label>
                <input name="StudEmail" class="form-control div1" type="text" value="<?php if(empty($i['StudEmail'])){echo '-';}else{echo $i['StudEmail'];} ?>">
            </div>
        </div>
        <div class="special div">
            <div>
                <label class="active">Aadhar No.</label>
                <input name="Aadhar" class="form-control div1" type="text" value="<?php if(empty($i['Aadhar No.'])){echo '-';}else{echo $i['Aadhar No.'];} ?>">
            </div>
        </div>
        <div class="special div">
            <div>
                <label class="active">Corresponding Address</label>
                <input name="C-address" class="form-control div1" type="text" value="<?php if(empty($i['C-address'])){echo '-';}else{echo $i['C-address'];} ?>">
            </div>
        </div>
        <div class="div">
            <div>
                <label class="active">State</label>
                <input name="C-state" class="form-control div1" type="text" value="<?php if(empty($i['C-state'])){echo '-';}else{echo $i['C-state'];} ?>">
            </div>
            <div>
                <label class="active">City/Pin</label>
                <input name="C-city" class="form-control div1" type="text" value="<?php if(empty($i['C-city'])){echo '-';}else{echo $i['C-city'];} ?>">
            </div>
        </div>
        <h2>Guardian Contact Details</h2>
        <div class="div">
            <div>
                <label class="active">Cell Number</label>
                <input name="GuarCell" class="form-control div1" type="text" value="<?php if(empty($i['GuarCell'])){echo '-';}else{echo $i['GuarCell'];} ?>">
            </div>
            <div>
                <label class="active">Telephone</label>
                <input name="GuarTel" class="form-control div1" type="text" value="<?php if(empty($i['GuarTel'])){echo '-';}else{echo $i['GuarTel'];} ?>">
            </div>
        </div>
        <div class="special">
            <div>
                <label class="active">Email</label>
                <input name="GuarEmail" class="form-control div1" type="text" value="<?php if(empty($i['GuarEmail'])){echo '-';}else{echo $i['GuarEmail'];} ?>">
            </div>
        </div>

        <button name="Save" class="a">Save</button>
    </form>

    
</body>
</html>