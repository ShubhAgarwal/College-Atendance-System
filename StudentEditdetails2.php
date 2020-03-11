<?php

    include "connection.php";
    session_start();
    $enroll = $_SESSION['username'];

    if(isset($_POST['Save'])){

        if($connection){

            $StudCell = $_POST['StudCell'];
            $StudTel = $_POST['StudTel'];
            $Aadhar = $_POST['Aadhar'];
            $StudEmail = $_POST['StudEmail'];
            $Caddress = $_POST['C-address'];
            $Ccity = $_POST['C-city'];
            $Cstate = $_POST['C-state'];
            $GuarCell = $_POST['GuarCell'];
            $GuarTel = $_POST['GuarTel'];
            $GuarEmail = $_POST['GuarEmail'];

            $query = "UPDATE Students SET `Aadhar No.` = '".$Aadhar."', `StudCell` = '".$StudCell."',`StudTel` = '".$StudTel."',`StudEmail` = '".$StudEmail."',`C-address` = '".$Caddress."',`C-city` = '".$Ccity."',`C-state` = '".$Cstate."',`GuarCell` = '".$GuarCell."',`GuarTel` = $GuarTel,`GuarEmail` = '".$GuarEmail."' WHERE `Enrollment No.` = $enroll;";
            $result = mysqli_query($connection,$query);
            header('location:StudentEditdetails.php');
        }
        else{
            die("Database Connection Failed");
        }
    }

 ?>