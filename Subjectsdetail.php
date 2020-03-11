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
    <link rel="stylesheet" href="SubjectsdetailStyle.css">
</head>
<body>
    
    <h5>Subjects Overview</h5>

    <p>None of the items were selected</p>

    <div class="tools">
        <form class="file" action="Subjectdetailform.php" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
                <input name ="input" type="file" class="custom-file-input" id="customFile">
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
            <form action="Subjectdetailform.php" method="POST">
                <h5>Add Course</h5>
                <table>
                    <tr class="group">
                        <th class="th">
                            <label>Subject ID</label>
                        </th>
                        <td class="td">
                            <input name="id" class="form-control" type="text">
                        </td>
                    </tr>
                    <tr class="group">
                        <th class="th">
                            <label>Subject Name</label>
                        </th>
                        <td class="td">
                            <input name="name" class="form-control" type="text">
                        </td>
                    </tr>
                    <tr class="group">
                        <th class="th">
                            <label>Credits</label>
                        </th>
                        <td class="td">
                            <input name="credits" class="form-control" type="text">
                        </td>
                    </tr>
                </table>
                <button name="add" class="btn btn-primary button">Add</button>
            </form>
        </div>
        
        <div class="editContent">
            <img src="close_black.png" alt="" onclick="closewindow()">
            <form action="Subjectdetailform.php" method="POST">
                <h5>Edit Course</h5>
                <div class="repeat">
                    
                </div>
                <button name="edit" class="button btn btn-primary">Edit</button>
        </div>

        <div class="deleteContent">
            <img src="close_black.png" alt="" onclick="closewindow()">
            <form action="Subjectdetailform.php" method="POST">
                <div class="extra">
                    <h5>Are You Sure ?</h5>
                    <button name="delete" class="btn btn-primary button">Delete</button>
                </div>
        </div>
        
    </div>
    
    <div class="t-header">
        <table>
            <col width="35px">
            <col width="80px">
            <col width="180px">
            <col width="300px">
            <col width="150px">
            <tr>
                <th></th>
                <th>S.no.</th>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Credits</th>
            </tr>
        </table>
    </div>
    <div class="t-content">

        <?php

            $query = "SELECT * FROM Subjects";
            $result = mysqli_query($connection,$query);

        ?>

        <table>
            <col width="1px">
            <col width="80px">
            <col width="180px">
            <col width="300px">
            <col width="150px">

            <?php
                $count = 1;
                if($result){
                    while($i = mysqli_fetch_assoc($result)){
                      echo '<tr>
                                <td><input name="box[]" value="'. $i['Subject ID'] .'" type="checkbox"></td>
                                <td>' . $count . '</td>
                                <td>' . $i['Subject ID'] . '</td>
                                <td>' . $i['Subject Name'] . '</td>
                                <td>' . $i['Credits'] . '</td>
                            </tr>';
                      $count++;
                    }
                }
            ?>
            
        </table>
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
                repeat.innerHTML = '<table><tr class="group"><th class="th"><label>Subject ID</label></th><td class="td"><input name="id0" class="form-control" type="text" value="'+box[0].value+'" readonly></td></tr><tr class="group"><th class="th"><label>Subject Name</label></th><td class="td"><input name="name0" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Credits</label></th><td class="td"><input name="credits0" class="form-control" type="text"></td></tr></table>';
                for(var i = 1; i<box.length; i++){
                    repeat.innerHTML += '<table><tr class="group"><th class="th"><label>Subject ID</label></th><td class="td"><input name="id'+i+'" class="form-control" type="text" value="'+box[i].value+'" readonly></td></tr><tr class="group"><th class="th"><label>Subject Name</label></th><td class="td"><input name="name'+i+'" class="form-control" type="text"></td></tr><tr class="group"><th class="th"><label>Credits</label></th><td class="td"><input name="credits'+i+'" class="form-control" type="text"></td></tr></table>';
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

    </script>

</body>
</html>