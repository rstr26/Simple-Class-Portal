<?php 
    require '../connection/session.php';
    include '../connection/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Add Student</title>
</head>
<body>
    <?php
        $sName = "";
        $sUname = "";
        $sPw = "";
        $sPwC = "";
        $sem1 = 0;
        $sem2 = 0;
        $sem3 = 0;
        $sem4 = 0;
        $accountId = uniqid();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['studentName']) && isset($_POST['studentUname']) && isset($_POST['studentPw']) && isset($_POST['studentPwConfirm']) && isset($_POST['sem1grade']) && isset($_POST['sem2grade']) && isset($_POST['sem3grade']) && isset($_POST['sem4grade'])){
                $sName = $_POST['studentName'];
                $sUname = $_POST['studentUname'];
                $sPw = $_POST['studentPw'];
                $sPwC = $_POST['studentPwConfirm'];
                $sem1 = $_POST['sem1grade'];
                $sem2 = $_POST['sem2grade'];
                $sem3 = $_POST['sem3grade'];
                $sem4 = $_POST['sem4grade'];

                if($sName == "" || $sUname == "" || $sPw == "" || $sPwC == ""){
                    echo '<script type="text/javascript"> window.alert("Please fill in all fields") </script>';
                }
                else if($sPw !== $sPwC){
                    echo '<script type="text/javascript"> window.alert("Password did not match, please re-confirm") </script>';
                }
                else{
                    $credentialsQry = 'insert into credentials(name, username, pw, role, subject, accountId) values ("' . $sName . '", "' . $sUname . '","' . $sPw . '", "student", "NA", "' . $accountId . '");
                                       insert into semester1(accountId, name, subject, teacher, grade) values
                                       ("' . $accountId . '", "' . $sName . '", "Law", "Adam West", 0),
                                       ("' . $accountId . '", "' . $sName . '", "History", "Cleveland Brown", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Physical Education", "Glenn Quagmire", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Science", "Joe Swanson", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Music", "Lois Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Math", "Mort Goldman", 0),
                                       ("' . $accountId . '", "' . $sName . '", "English", "Peter Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Research", "Tom Tucker", 0);
                                       insert into semester2(accountId, name, subject, teacher, grade) values
                                       ("' . $accountId . '", "' . $sName . '", "Law", "Adam West", 0),
                                       ("' . $accountId . '", "' . $sName . '", "History", "Cleveland Brown", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Physical Education", "Glenn Quagmire", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Science", "Joe Swanson", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Music", "Lois Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Math", "Mort Goldman", 0),
                                       ("' . $accountId . '", "' . $sName . '", "English", "Peter Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Research", "Tom Tucker", 0);
                                       insert into semester3(accountId, name, subject, teacher, grade) values
                                       ("' . $accountId . '", "' . $sName . '", "Law", "Adam West", 0),
                                       ("' . $accountId . '", "' . $sName . '", "History", "Cleveland Brown", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Physical Education", "Glenn Quagmire", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Science", "Joe Swanson", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Music", "Lois Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Math", "Mort Goldman", 0),
                                       ("' . $accountId . '", "' . $sName . '", "English", "Peter Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Research", "Tom Tucker", 0);
                                       insert into semester4(accountId, name, subject, teacher, grade) values
                                       ("' . $accountId . '", "' . $sName . '", "Law", "Adam West", 0),
                                       ("' . $accountId . '", "' . $sName . '", "History", "Cleveland Brown", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Physical Education", "Glenn Quagmire", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Science", "Joe Swanson", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Music", "Lois Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Math", "Mort Goldman", 0),
                                       ("' . $accountId . '", "' . $sName . '", "English", "Peter Griffin", 0),
                                       ("' . $accountId . '", "' . $sName . '", "Research", "Tom Tucker", 0);
                                       update semester1 set grade = '.$sem1.' where accountId = "'.$accountId.'" and subject = "'.$_SESSION['subject'].'";
                                       update semester2 set grade = '.$sem2.' where accountId = "'.$accountId.'" and subject = "'.$_SESSION['subject'].'";
                                       update semester3 set grade = '.$sem3.' where accountId = "'.$accountId.'" and subject = "'.$_SESSION['subject'].'";
                                       update semester4 set grade = '.$sem4.' where accountId = "'.$accountId.'" and subject = "'.$_SESSION['subject'].'";
                                       ';
                    $result = $conn->multi_query($credentialsQry);
                    
                    if(!$result){
                        echo '<script type="text/javascript"> window.alert("Error, please try again") </script>';
                    }
                    else{
                        echo '<script type="text/javascript">
                        alert("Student added successfully!");
                        window.location.href = "teacher.php";
                        </script>';
                    }
                }
            }
        }
    ?>
    <div class="container mt-5 w-50">
        <div class="row">
            <h1>Add New Student</h1>
        </div>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" name="studentName" class="form-control" placeholder="Last Name, First Name M.I."/>
            </div>
            <div class="mb-3">
                <label class="form-label">Student Username</label>
                <input type="text" name="studentUname" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Student Password</label>
                <input type="password" name="studentPw" class="form-control"/>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Student Password</label>
                <input type="password" name="studentPwConfirm" class="form-control"/>
            </div>
            <div class="row">
                <label class="form-label">*Input 0 or leave blank if student is not graded in specified semester</label>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">First Sem Grade</label>
                    <input type="number" name="sem1grade" class="form-control"/>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Second Sem Grade</label>
                    <input type="number" name="sem2grade" class="form-control"/>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Third Sem Grade</label>
                    <input type="number" name="sem3grade" class="form-control"/>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Fourth Sem Grade</label>
                    <input type="number" name="sem4grade" class="form-control"/>
                    </div>
                </div>
            </div>
            <input class="btn btn-success" type="submit">
            <a href="teacher.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>