<?php

    include 'connection.php';

    if(isset($_POST['Submit'])){
        $file = simplexml_load_file($_FILES['input']['name']);
        foreach($file as $i){
            $empid = $i->EmployeeID;
            $subid = $i->SubjectID;
            $batch = $i->BatchName;

            $q = "SELECT `Batch ID` FROM `Batches` WHERE `Batch Name` = '".$batch."'";
            $r = mysqli_query($connection,$q);
            $r = mysqli_fetch_row($r);

            $query = "INSERT INTO `Faculty's Subject`(`Employee ID`, `Subject ID`, `Batch ID`) VALUES ($empid,'".$subid."',$r[0]);";
            $result = mysqli_query($connection,$query);
        }
        header("location:Faculty'sSubject.php");
    }

    if(isset($_POST['add'])){
        $empid = $_POST['EmployeeID'];
        $subid = $_POST['SubjectID'];
        $batch = $_POST['BatchName'];

        $q = "SELECT `Batch ID` FROM `Batches` WHERE `Batch Name` = '".$batch."'";
        $r = mysqli_query($connection,$q);
        $r = mysqli_fetch_row($r);

        $query = "INSERT INTO `Faculty's Subject`(`Employee ID`, `Subject ID`, `Batch ID`) VALUES ($empid,'".$subid."',$r[0]);";
        $result = mysqli_query($connection,$query);
        header("location:Faculty'sSubject.php");
    }

    if(isset($_POST['delete'])){
        foreach((array)$_POST['box'] as $j){
            $s = explode(" ",$j);
            $query = "DELETE FROM `Faculty's Subject` WHERE `Employee ID` = '".$s[0]."' AND `Subject ID` = '".$s[1]."';";
            $result = mysqli_query($connection,$query);
        }
        header("location:Faculty'sSubject.php");
    }

?>