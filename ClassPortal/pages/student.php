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
    <title>My Grades</title>
</head>
<body>
    <div class="container w-75 mt-5">
        <?php 
            $accId = $_SESSION['accId'];
            $selectedSem = "semester1";

            if(isset($_GET['sem'])){
                $selectedSem = $_GET['sem'];
                $info = 'select * from credentials where accountId = "'.$accId.'"';
                $result = $conn->query($info);
                $name = $result->fetch_assoc();

                echo '
                    <h3>'.$name["name"].' / Semester '.substr($selectedSem, -1).'</h3>
                ';
            }
            
        ?>
        <form method="get">
            <div class="row no-gutters mb-3 mt-3">
                <select class="col form-select" aria-label="Default select example" name="sem">
                    <option selected hidden value="semester1">Select Semester</option>
                    <option value="semester1">First Semester</option>
                    <option value="semester2">Second Semester</option>
                    <option value="semester3">Third Semester</option>
                    <option value="semester4">Fourth Semester</option>
                </select>
                <button type="submit" class="col-2 btn btn-primary rounded-0">Search</button>
                <a href="../functions/LogOut.php" class="col-2 btn btn-danger rounded-0">Log Out</a>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = 'select * from '.$selectedSem.' where accountId = "'.$accId.'"';
                    $result = $conn->query($query);
                    $remarks = "";

                    while($row = $result->fetch_assoc()){
                        $remarks = $row["grade"] >= 75 ? "Passed" : ($row["grade"] == 0 ? "Not Graded" : "Failed");
                        echo '
                            <tr>
                                <td>'.$row["subject"].'</td>
                                <td>'.$row["teacher"].'</td>
                                <td>'.$row["grade"].'</td>
                                <td>'.$remarks.'</td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>