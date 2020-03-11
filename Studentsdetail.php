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
    <link rel="stylesheet" href="StudentsdetailStyle.css">
</head>
<body>
    
    <h5>Students Overview</h5>

    <p>None of the items were selected</p>

    <div class="tools">
        <form class="file" action="Studentsdetailform.php" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
                <input name="input" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button name="Submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="toolset">
            <a class="add" href="javascript:popadd()"><img src="add-circle.png" alt="">Add</a>
            <a class="edit" href="javascript:popedit()"><img src="box_edit.png" alt="">Edit</a>
            <a class="delete" href="javascript:popdel()"><img src="delete-box.png" alt="">Delete</a>
        </div>
    </div>

    <div class="Pop">

        <div class="addContent">
            <img src="close_black.png" alt="" onclick="closewindow()">
            <form action="Studentsdetailform.php" method="POST">
                <h5>Add Course</h5>
                <div class="scroll">
                    <table>
                        <tr class="group">
                            <th class="th">
                                <label>Enrollment No.</label>
                            </th>
                            <td class="td">
                                <input name="Enrollment" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Student Name</label>
                            </th>
                            <td class="td">
                                <input name="StudentName" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Batch ID</label>
                            </th>
                            <td class="td">
                                <input name="BatchID" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Father's Name</label>
                            </th>
                            <td class="td">
                                <input name="Father'sName" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>DOB</label>
                            </th>
                            <td class="td">
                                <input name="DOB" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Course</label>
                            </th>
                            <td class="td">
                                <input name="Course" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Semester</label>
                            </th>
                            <td class="td">
                                <input name="Semester" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Aadhar No.</label>
                            </th>
                            <td class="td">
                                <input name="AadharNo" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Student Cell</label>
                            </th>
                            <td class="td">
                                <input name="StudCell" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Student Tel</label>
                            </th>
                            <td class="td">
                                <input name="StudTel" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Student Email</label>
                            </th>
                            <td class="td">
                                <input name="StudEmail" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Guardian Cell</label>
                            </th>
                            <td class="td">
                                <input name="GuarCell" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Guardian Tel</label>
                            </th>
                            <td class="td">
                                <input name="GuarTel" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>Guardian Email</label>
                            </th>
                            <td class="td">
                                <input name="GuarEmail" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>C-address</label>
                            </th>
                            <td class="td">
                                <input name="C-address" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>C-city</label>
                            </th>
                            <td class="td">
                                <input name="C-city" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>C-state</label>
                            </th>
                            <td class="td">
                                <input name="C-state" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>P-address</label>
                            </th>
                            <td class="td">
                                <input name="P-address" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>P-city</label>
                            </th>
                            <td class="td">
                                <input name="P-city" class="form-control" type="text">
                            </td>
                        </tr>
                        <tr class="group">
                            <th class="th">
                                <label>P-state</label>
                            </th>
                            <td class="td">
                                <input name="P-state" class="form-control" type="text">
                            </td>
                        </tr>
                    </table>
                </div>
                <button name="add" class="btn btn-primary button">Add</button>
            </form>
        </div>
        
        <div class="editContent">
            <img src="close_black.png" alt="" onclick="closewindow()">
            <form action="Studentsdetailform.php" method="POST">
                <h5>Edit Course</h5>
                <div class="repeat">
                    
                </div>
                <button name="edit" class="button btn btn-primary">Edit</button>
        </div>

        <div class="deleteContent">
            <img src="close_black.png" alt="" onclick="closewindow()">
            <form action="Studentsdetailform.php" method="POST">
                <div class="extra">
                    <h5>Are You Sure ?</h5>
                    <button name="delete" class="btn btn-primary button">Delete</button>
                </div>
        </div>
        
    </div>
    
    <div class="t-header">
        <table>
            <tr>
                <th class="c1"></th>
                <th class="c2">S.no.</th>
                <th class="c3">Enrollment No.</th>
                <th class="c4">Student Name</th>
                <th class="c5">Batch ID</th>
                <th class="c6">Father's Name</th>
                <th class="c7">DOB</th>
                <th class="c8">Course</th>
                <th class="c9">Semester</th>
                <th class="c10">Aadhar No.</th>
                <th class="c11">Student Cell</th>
                <th class="c12">Student Tel</th>
                <th class="c13">Student Email</th>
                <th class="c14">Guardian Cell</th>
                <th class="c15">Guardian Tel</th>
                <th class="c16">Guardian Email</th>
                <th class="c17">C-address</th>
                <th class="c18">C-city</th>
                <th class="c19">C-state</th>
                <th class="c20">P-address</th>
                <th class="c21">P-city</th>
                <th class="c22">P-state</th>
            </tr>
        </table>
        <div class="t-content">
    
            <?php
    
                $query = "SELECT * FROM Students";
                $result = mysqli_query($connection,$query);
    
            ?>
    
            <table>
    
                <?php
                    $count = 1;
                    if($result){
                        while($i = mysqli_fetch_assoc($result)){
                        echo '<tr>
                                    <td class="c1"><input name="box[]" value="'. $i['Enrollment No.'] .' " type="checkbox"></td>
                                    <td class="c2">' . $count . '</td>
                                    <td class="c3">' . $i['Enrollment No.'] . '</td>
                                    <td class="c4">' . $i['Student Name'] . '</td>
                                    <td class="c5">' . $i['Batch ID'] . '</td>
                                    <td class="c6">' . $i["Father's Name"] . '</td>
                                    <td class="c7">' . $i['DOB'] . '</td>
                                    <td class="c8">' . $i['Course'] . '</td>
                                    <td class="c9">' . $i['Semester'] . '</td>
                                    <td class="c10">' . $i['Aadhar No.'] . '</td>
                                    <td class="c11">' . $i['StudCell'] . '</td>
                                    <td class="c12">' . $i['StudTel'] . '</td>
                                    <td class="c13">' . $i['StudEmail'] . '</td>
                                    <td class="c14">' . $i['GuarCell'] . '</td>
                                    <td class="c15">' . $i['GuarTel'] . '</td>
                                    <td class="c16">' . $i['GuarEmail'] . '</td>
                                    <td class="c17">' . $i['C-address'] . '</td>
                                    <td class="c18">' . $i['C-city'] . '</td>
                                    <td class="c19">' . $i['C-state'] . '</td>
                                    <td class="c20">' . $i['P-address'] . '</td>
                                    <td class="c21">' . $i['P-city'] . '</td>
                                    <td class="c22">' . $i['P-state'] . '</td>
                                </tr>';
                        $count++;
                        }
                    }
                ?>
        
            </table>
        </div>
    </div>

    </form>
    </form>

    <script type="text/javascript">

        var close = document.querySelector('img'),
            dis1 = document.querySelector('.addContent'),
            dis2 = document.querySelector('.editContent'),
            dis3 = document.querySelector('.deleteContent');
        
        var add = document.querySelector('.add'),
            edit = document.querySelector('.edit'),
            del = document.querySelector('.delete');
        
        var win = document.querySelector('.Pop');

        function popadd(){

            win.style.display = 'flex';
            dis1.style.display = 'block';
        }

        function popedit(){

            var box = document.querySelectorAll('input:checked');
            if(box.length == 0){
                document.querySelector('p').style.visibility = 'visible';
            }
            else{
                document.querySelector('p').style.visibility = 'hidden';
                win.style.display = 'block';
                dis2.style.display = 'block';
                var repeat = document.querySelector('.repeat');
                repeat.innerHTML = '<table><tr class="group"><th class="th"><label>Enrollment No.</label></th><td class="td"><input name="Enrollment0" class="form-control" type="text" value="'+box[0].value+'" readonly></td></tr><tr class="group"><th class="th"><label>Student Name</label></th><td class="td"><input name="StudentName0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Batch ID</label></th><td class="td"><input name="BatchID0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Father\'s Name</label></th><td class="td"><input name="Father\'sName0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>DOB</label></th><td class="td"><input name="DOB0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Course</label></th><td class="td"><input name="Course0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Semester</label></th><td class="td"><input name="Semester0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Aadhar No.</label></th><td class="td"><input name="AadharNo0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Student Cell</label></th><td class="td"><input name="StudCell0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Student Tel</label></th><td class="td"><input name="StudTel0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Student Email</label></th><td class="td"><input name="StudEmail0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Guardian Cell</label></th><td class="td"><input name="GuarCell0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Guardian Tel</label></th><td class="td"><input name="GuarTel0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Guardian Email</label></th><td class="td"><input name="GuarEmail0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>C-address</label></th><td class="td"><input name="C-address0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>C-city</label></th><td class="td"><input name="C-city0" class="form-control" type="text"></td></tr><tr class="group"> <th class="th"><label>C-state</label></th><td class="td"><input name="C-state0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>P-address</label></th><td class="td"><input name="P-address0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>P-city</label></th><td class="td"><input name="P-city0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>P-state</label></th><td class="td"><input name="P-state0" class="form-control" type="text"></td></tr></table>';                
                for(var i = 1; i<box.length; i++){
                    repeat.innerHTML += '<table><tr class="group"><th class="th"><label>Enrollment No.</label></th><td class="td"><input name="Enrollment'+i+'" class="form-control" type="text" value="'+box[i].value+'" readonly></td></tr><tr class="group"><th class="th"><label>Student Name</label></th><td class="td"><input name="StudentName'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Batch ID</label></th><td class="td"><input name="BatchID'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Father\'s Name</label></th><td class="td"><input name="Father\'sName'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>DOB</label></th><td class="td"><input name="DOB'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Course</label></th><td class="td"><input name="Course'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Semester</label></th><td class="td"><input name="Semester'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Aadhar No.</label></th><td class="td"><input name="AadharNo'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Student Cell</label></th><td class="td"><input name="StudCell'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Student Tel</label></th><td class="td"><input name="StudTel'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Student Email</label></th><td class="td"><input name="StudEmail'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Guardian Cell</label></th><td class="td"><input name="GuarCell'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Guardian Tel</label></th><td class="td"><input name="GuarTel'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Guardian Email</label></th><td class="td"><input name="GuarEmail'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>C-address</label></th><td class="td"><input name="C-address'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>C-city</label></th><td class="td"><input name="C-city'+i+'" class="form-control" type="text"></td></tr><tr class="group"> <th class="th"><label>C-state</label></th><td class="td"><input name="C-state'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>P-address</label></th><td class="td"><input name="P-address'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>P-city</label></th><td class="td"><input name="P-city'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>P-state</label></th><td class="td"><input name="P-state'+i+'" class="form-control" type="text"></td></tr></table>';
                
                }
            }
        }

        function popdel(){
            
            var box = document.querySelectorAll('input:checked');
            if(box.length == 0){
                document.querySelector('p').style.visibility = 'visible';
            }
            else{
                document.querySelector('p').style.visibility = 'hidden';
                win.style.display = 'block';
                dis3.style.display = 'block';
            }
        }

        function closewindow(){

            win.style.display = 'none';

            if (dis1.style.display == "block") {
                dis1.style.display = "none";
            }
            else if (dis2.style.display == "block") {
                dis2.style.display = "none";
            }
            else if (dis3.style.display == "block") {
                dis3.style.display = "none";
            }
        }

        $('.t-header').scroll(function() {
            $('.t-content').width($('.t-header').width() + $('.t-header').scrollLeft());
        });

    </script>

</body>
</html>