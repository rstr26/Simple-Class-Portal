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

    <title>Edit Record</title>
</head>
<body>

    <?php
        $accId = "";
        $subject = "";
        $sName = "";
        $sem1new = "";
        $sem2new = "";
        $sem3new = "";
        $sem4new = "";

        if(isset($_GET['id']) || isset($_GET['subject']) || isset($_GET['name'])){
            $accId = $_GET['id'];
            $subject = $_GET['subject'];
            $sName = $_GET['name'];
            $sem1Qry = 'select grade from semester1 where accountId = "' . $accId . '" AND subject = "' . $subject . '"';
            $sem2Qry = 'select grade from semester2 where accountId = "' . $accId . '" AND subject = "' . $subject . '"';
            $sem3Qry = 'select grade from semester3 where accountId = "' . $accId . '" AND subject = "' . $subject . '"';
            $sem4Qry = 'select grade from semester4 where accountId = "' . $accId . '" AND subject = "' . $subject . '"';
            $sem1Rslt = $conn->query($sem1Qry)->fetch_assoc();
            $sem2Rslt = $conn->query($sem2Qry)->fetch_assoc();
            $sem3Rslt = $conn->query($sem3Qry)->fetch_assoc();
            $sem4Rslt = $conn->query($sem4Qry)->fetch_assoc();
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sem1new = $_POST['sem1grade'];
            $sem2new = $_POST['sem2grade'];
            $sem3new = $_POST['sem3grade'];
            $sem4new = $_POST['sem4grade'];

            if($_POST['studentName'] == ""){
                echo '
                    <script>
                        alert("Student name should not be blank");
                    </script>
                ';
            }
            else{
                $updQuery = 'update credentials set name = "' . $_POST['studentName'] . '" where accountId = "' . $accId . '";
                             update semester1 set grade = ' . $_POST['sem1grade'] . ' where accountId = "' . $accId . '" and subject = "' . $subject . '";
                             update semester2 set grade = ' . $_POST['sem2grade'] . ' where accountId = "' . $accId . '" and subject = "' . $subject . '";
                             update semester3 set grade = ' . $_POST['sem3grade'] . ' where accountId = "' . $accId . '" and subject = "' . $subject . '";
                             update semester4 set grade = ' . $_POST['sem4grade'] . ' where accountId = "' . $accId . '" and subject = "' . $subject . '";
                             update semester1 set name = "' . $_POST['studentName'] . '" where accountId = "' . $accId . '";
                             update semester2 set name = "' . $_POST['studentName'] . '" where accountId = "' . $accId . '";
                             update semester3 set name = "' . $_POST['studentName'] . '" where accountId = "' . $accId . '";
                             update semester4 set name = "' . $_POST['studentName'] . '" where accountId = "' . $accId . '";
                             ';
                $update = $conn->multi_query($updQuery);
                
                echo '
                    <script>
                        alert("Record updated successfully!");
                        window.location.href = "teacher.php";
                    </script>
                ';
                //echo $updQuery;
            }
        }
    ?>

    <div class="container mt-5 w-50">
        <h1>Edit Record</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" name="studentName" class="form-control" placeholder="Last Name, First Name M.I." value='<?php echo $sName ?>'/>
            </div>
            <div class="mb-3">
                <h3>Semester Grade</h3>
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                        <label class="form-label">First Sem Grade</label>
                        <input type="number" name="sem1grade" class="form-control" value='<?php echo $sem1Rslt['grade'] ?>'/>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                        <label class="form-label">Second Sem Grade</label>
                        <input type="number" name="sem2grade" class="form-control" value='<?php echo $sem2Rslt['grade'] ?>'/>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                        <label class="form-label">Third Sem Grade</label>
                        <input type="number" name="sem3grade" class="form-control" value='<?php echo $sem3Rslt['grade'] ?>'/>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                        <label class="form-label">Fourth Sem Grade</label>
                        <input type="number" name="sem4grade" class="form-control" value='<?php echo $sem4Rslt['grade'] ?>'/>
                        </div>
                    </div>
                </div>
                <input class="btn btn-success" type="submit">
                <a href="teacher.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>