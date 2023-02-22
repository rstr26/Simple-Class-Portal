<?php 
    require '../connection/session.php';
    include '../connection/database.php';
    $selectedSem = "semester1";
    $nameSearch = "";

    if(isset($_GET['sem']) || isset($_GET['stdntSearch'])){
        $nameSearch = $_GET['stdntSearch'];
        $selectedSem = $_GET['sem'];
    }
    else if(!isset($_GET['sem'])){
        $selectedSem = "semester1";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Student Grades</title>
</head>
<body>
    <div class="container w-75 mt-5">
        <!-- displays teacher's name, subject and selected semester -->
        <div class="row mb-2">
            <?php 
                $query = 'select * from credentials where accountId = "' . $_SESSION['accId'] . '"';
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $subject = "";

                if($result->num_rows != 0){
                    $subject = $row["subject"];
                    $_SESSION['subject'] = $subject;
                    $_SESSION['teacher'] = $row['name'];
                    echo '<h3>' . $row["name"] . ' - ' . $row["subject"] . ' / ' . 'Semester ' . substr($selectedSem, -1) . '</h3>';
                }
            ?>
        </div>

        <form method="get" class="row no-gutters justify-content-center">
            <div class="col-6">
                <select class="form-select" aria-label="Default select example" name="sem">
                    <option selected hidden value="semester1">Select Semester</option>
                    <option value="semester1">First Semester</option>
                    <option value="semester2">Second Semester</option>
                    <option value="semester3">Third Semester</option>
                    <option value="semester4">Fourth Semester</option>
                </select>  
            </div>  
            <button type="submit" class="col btn btn-primary rounded-0">Search</button>
            <a href="addStudent.php" class="col btn btn-success rounded-0">Add Student</a>                 
            <a href="../functions/LogOut.php" class="col btn btn-warning rounded-0">Log Out</a>
            <div class="row input-group mt-2">
                <input type="search" class="col-8 form-control rounded" placeholder="Student Name" name="stdntSearch" value="<?php echo $nameSearch ?>" />
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Grades</th>
                    <th>Remarks</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $gradesQry = 'select * from ' . $selectedSem . ' where subject = "' . $subject . '"';
                    $searchQry = 'select * from ' . $selectedSem . ' where subject = "' . $subject . '" && name LIKE "%' . $nameSearch . '%"';
                    $count = 1;
                    $remarks = "";
                    
                    if($nameSearch == ""){
                        $result = $conn->query($gradesQry);

                        while($gradesRow = $result->fetch_assoc()){
                            $remarks = $gradesRow["grade"] == 0 ? "-" : ($gradesRow["grade"] > 75 ? "Passed" : "Failed");

                            echo '
                            <tr>
                                <td>' . $count++ . '</td>
                                <td>' . $gradesRow["name"] . '</td>
                                <td>' . $gradesRow["grade"] . '</td>
                                <td>' . $remarks . '</td>
                                <td>
                                    <a href="edit.php?id=' . $gradesRow["accountId"] . '&subject=' . $subject . '&name=' . $gradesRow["name"] . '" class="btn btn-info">Edit</a>
                                    <button onclick="deleteFunc(\''.$gradesRow["accountId"].'\', \''.$subject.'\')" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            ';
                        }
                    }
                    else{
                        $result = $conn->query($searchQry);

                        while($searchRow = $result->fetch_assoc()){
                            $remarks = $searchRow["grade"] == 0 ? "-" : ($searchRow["grade"] > 75 ? "Passed" : "Failed");

                            echo '
                            <tr>
                                <td>' . $count++ . '</td>
                                <td>' . $searchRow["name"] . '</td>
                                <td>' . $searchRow["grade"] . '</td>
                                <td>' . $remarks . '</td>
                                <td>
                                    <a href="edit.php?id=' . $searchRow["accountId"] . '&subject=' . $subject . '&name=' . $searchRow["name"] . '" class="btn btn-info">Edit</a>
                                    <button onclick="deleteFunc(\''.$searchRow["accountId"].'\', \''.$subject.'\')" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            ';
                        }
                    }
                ?>
                <script>
                    function deleteFunc(id, subject){
                        var conf = confirm("Do you want to delete this record?");
                        conf ? window.location.href="../functions/Delete.php?id=" + id + "&subject=" + subject : alert("Not deleted");
                    }
                </script>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>