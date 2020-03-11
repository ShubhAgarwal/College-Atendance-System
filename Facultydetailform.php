<?php

    include 'connection.php';

    if(isset($_POST['Submit'])){
        $file = simplexml_load_file($_FILES['input']['name']);
        foreach($file as $i){
            $id = $i->EmployeeID;
            $name = $i->EmployeeName;
            $contact = $i->Contact;
            $email = $i->Email;
            $address = $i->Address;

            $query = "INSERT INTO `Employee`(`Employee ID`, `Employee Name`, `Contact`, `Email`, `Address`) VALUES ($id,'".$name."',$contact,'".$email."','".$address."');";
            $result = mysqli_query($connection,$query);
        }
        header('location:Facultydetail.php');
    }

    if(isset($_POST['add'])){
        $id = $_POST['EmployeeID'];
        $name = $_POST['EmployeeName'];
        $contact = $_POST['Contact'];
        $email = $_POST['Email'];
        $address = $_POST['Address'];

        $query = "INSERT INTO `Employee`(`Employee ID`, `Employee Name`, `Contact`, `Email`, `Address`) VALUES ($id,'".$name."',$contact,'".$email."','".$address."');";
        $result = mysqli_query($connection,$query);
        header('location:Facultydetail.php');
    }

    if(isset($_POST['edit'])){
        $i = 0;
        foreach((array)$_POST['box'] as $j){
            $id = $_POST['EmployeeID'.$i];
            $name = $_POST['EmployeeName'.$i];
            $contact = $_POST['Contact'.$i];
            $email = $_POST['Email'.$i];
            $address = $_POST['Address'.$i];
            
            $query = "UPDATE `Employee` SET `Employee Name` = '".$name."' , `Contact` = $contact , `Email` = '".$email."' ,`Address` = '".$address."' WHERE `Employee ID` = $id; ";
            $result = mysqli_query($connection,$query);
            $i++;
        }
        header('location:Facultydetail.php');
    }

    if(isset($_POST['delete'])){
        foreach((array)$_POST['box'] as $j){
            $query = "DELETE FROM `Employee` WHERE `Employee ID` = '".$j."';";
            $result = mysqli_query($connection,$query);
        }
        header('location:Facultydetail.php');
    }

?>