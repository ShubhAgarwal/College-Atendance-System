<?php

    include 'connection.php';

    if(isset($_POST['Submit'])){
        $file = simplexml_load_file($_FILES['input']['name']);
        foreach($file as $i){
            $id = $i->id;
            $name = $i->name;
            $credits = $i->credits;

            $query = "INSERT INTO `Subjects` VALUES ('".$id."','".$name."','".$credits."');";
            $result = mysqli_query($connection,$query);
        }
        header('location:Subjectsdetail.php');
    }

    if(isset($_POST['add'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $credits = $_POST['credits'];

        $query = "INSERT INTO `Subjects` VALUES ('".$id."','".$name."',$credits);";
        $result = mysqli_query($connection,$query);
        header('location:Subjectsdetail.php');
    }

    if(isset($_POST['edit'])){
        $i = 0;
        foreach((array)$_POST['box'] as $j){
            $id = $_POST['id'.$i];
            $name = $_POST['name'.$i];
            $credits = $_POST['credits'.$i];

            $query = "UPDATE `Subjects` SET `Subject Name` = '".$name."' , `Credits` = $credits WHERE `Subject ID` = '".$id."'; ";
            $result = mysqli_query($connection,$query);
            $i++;
        }
        header('location:Subjectsdetail.php');
    }

    if(isset($_POST['delete'])){
        foreach((array)$_POST['box'] as $j){
            $query = "DELETE FROM `Subjects` WHERE `Subject ID` = '".$j."';";
            $result = mysqli_query($connection,$query);
        }
        header('location:Subjectsdetail.php');
    }

?>