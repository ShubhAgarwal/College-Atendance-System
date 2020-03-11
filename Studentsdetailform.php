<?php

    include 'connection.php';

    if(isset($_POST['Submit'])){
        $file = simplexml_load_file($_FILES['input']['name']);
        foreach($file as $i){
            $id = $i->Enrollment;
            $name = $i->StudentName;
            $BatchID = $i->BatchID;
            $Father = $i->FatherName;
            $DOB = $i->DOB;
            $Course = $i->Course;
            $Sem = $i->Semester;
            $Aadhar = $i->AadharNo;
            $StudCell = $i->StudCell;
            $StudTel = $i->StudTel;
            $StudEmail = $i->StudEmail;
            $GuarCell = $i->GuarCell;
            $GuarTel = $i->GuarTel;
            $GuarEmail = $i->GuarEmail;
            $Caddress = $i->Caddress;
            $Ccity = $i->Ccity;
            $Cstate = $i->Cstate;
            $Paddress = $i->Paddress;
            $Pcity = $i->Pcity;
            $Pstate = $i->Pstate;

            $query = "INSERT INTO `Students`(`Enrollment No.`, `Student Name`, `Batch ID`, `Father's Name`, `DOB`, `Course`, `Semester`, `Aadhar No.`, `StudCell`, `StudTel`, `StudEmail`, `GuarCell`, `GuarTel`, `GuarEmail`, `C-address`, `C-city`, `C-state`, `P-address`, `P-city`, `P-state`) VALUES ('".$id."','".$name."','".$BatchID."','".$Father."','".$DOB."','".$Course."','".$Sem."','".$Aadhar."','".$StudCell."','".$StudTel."','".$StudEmail."','".$GuarCell."','".$GuarTel."','".$GuarEmail."','".$Caddress."','".$Ccity."','".$Cstate."','".$Paddress."','".$Pcity."','".$Pstate."');";
            $result = mysqli_query($connection,$query);
        }
        header('location:Studentsdetail.php');
    }

    if(isset($_POST['add'])){
        $id = $_POST['Enrollment'];
        $name = $_POST['StudentName'];
        $BatchID = $_POST['BatchID'];
        $Father = $_POST["Father'sName"];
        $DOB = $_POST['DOB'];
        $Course = $_POST['Course'];
        $Sem = $_POST['Semester'];
        $Aadhar = $_POST['AadharNo'];
        $StudCell = $_POST['StudCell'];
        $StudTel = $_POST['StudTel'];
        $StudEmail = $_POST['StudEmail'];
        $GuarCell = $_POST['GuarCell'];
        $GuarTel = $_POST['GuarTel'];
        $GuarEmail = $_POST['GuarEmail'];
        $Caddress = $_POST['C-address'];
        $Ccity = $_POST['C-city'];
        $Cstate = $_POST['C-state'];
        $Paddress = $_POST['P-address'];
        $Pcity = $_POST['P-city'];
        $Pstate = $_POST['P-state'];

        $query = "INSERT INTO `Students`(`Enrollment No.`, `Student Name`, `Batch ID`, `Father's Name`, `DOB`, `Course`, `Semester`, `Aadhar No.`, `StudCell`, `StudTel`, `StudEmail`, `GuarCell`, `GuarTel`, `GuarEmail`, `C-address`, `C-city`, `C-state`, `P-address`, `P-city`, `P-state`) VALUES ('".$id."','".$name."','".$BatchID."','".$Father."','".$DOB."','".$Course."','".$Sem."','".$Aadhar."','".$StudCell."','".$StudTel."','".$StudEmail."','".$GuarCell."','".$GuarTel."','".$GuarEmail."','".$Caddress."','".$Ccity."','".$Cstate."','".$Paddress."','".$Pcity."','".$Pstate."');";
        $result = mysqli_query($connection,$query);
        header('location:Studentsdetail.php');
    }

    if(isset($_POST['edit'])){
        $i = 0;
        foreach((array)$_POST['box'] as $j){
            $id = $_POST['Enrollment'.$i];
            $name = $_POST['StudentName'.$i];
            $BatchID = $_POST['BatchID'.$i];
            $Father = $_POST["Father'sName".$i];
            $DOB = $_POST['DOB'.$i];
            $Course = $_POST['Course'.$i];
            $Sem = $_POST['Semester'.$i];
            $Aadhar = $_POST['AadharNo'.$i];
            $StudCell = $_POST['StudCell'.$i];
            $StudTel = $_POST['StudTel'.$i];
            $StudEmail = $_POST['StudEmail'.$i];
            $GuarCell = $_POST['GuarCell'.$i];
            $GuarTel = $_POST['GuarTel'.$i];
            $GuarEmail = $_POST['GuarEmail'.$i];
            $Caddress = $_POST['C-address'.$i];
            $Ccity = $_POST['C-city'.$i];
            $Cstate = $_POST['C-state'.$i];
            $Paddress = $_POST['P-address'.$i];
            $Pcity = $_POST['P-city'.$i];
            $Pstate = $_POST['P-state'.$i];
            
            $query = "UPDATE `Students` SET `Student Name` = '".$name."', `Batch ID` = '".$BatchID."', `Father's Name` = '".$Father."', `DOB` = '".$DOB."', `Course` = '".$Course."', `Semester` = '".$Sem."', `Aadhar No.` = '".$Aadhar."', `StudCell` = '".$StudCell."', `StudTel` = '".$StudTel."', `StudEmail` = '".$StudEmail."', `GuarCell` = '".$GuarCell."', `GuarTel` = '".$GuarTel."', `GuarEmail` = '".$GuarEmail."', `C-address` = '".$Caddress."', `C-city` = '".$Ccity."', `C-state` = '".$Cstate."', `P-address` = '".$Paddress."', `P-city` = '".$Pcity."', `P-state` = '".$Pstate."' WHERE `Enrollment No.` = $id";
            $result = mysqli_query($connection,$query);
            $i++;
            header('location:Studentsdetail.php');
        }
        
    }

    if(isset($_POST['delete'])){
        foreach((array)$_POST['box'] as $j){
            $query = "DELETE FROM `Students` WHERE `Enrollment No.` = $j";
            $result = mysqli_query($connection,$query);
            header('location:Studentsdetail.php');
        }
    }

?>