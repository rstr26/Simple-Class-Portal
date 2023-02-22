<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Log In</title>
</head>
<body>
    
    <?php 
        require '../connection/session.php';
        include '../connection/database.php';
        $user = "";
        $pass = "";
        $subject = "";
        $accId = "";
        $loginError = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $_POST["uname"];
            $pass = $_POST["pword"];

            $sql = "select * from credentials where username = '$user' && pw = '$pass'";
            $result = $conn->query($sql);

            if(!$result){
                echo "No result";
            }

            if($result->num_rows == 0){
                $loginError = "Incorrect username or password";
            }
            
            while($row = $result->fetch_assoc()){
                if($row["role"] == "teacher"){
                    $_SESSION['accId'] = $row['accountId'];
                    header('location: teacher.php');
                }
                else if($row["role"] == "student"){
                    $_SESSION['accId'] = $row['accountId'];
                    header("location: student.php");
                }
            }

            $user = "";
            $pass = "";
            $subject = "";
            $accId = "";
        }
    ?>

    <div class="container mt-5 w-25">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="uname" class="form-control" value="<?php echo $user; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="pword" class="form-control" value="<?php echo $pass; ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Log In</button>
            <?php 
                    if(!$loginError == ""){
                        echo 
                            '<div class="alert alert-danger alert-dismissible" role="alert">' .
                                $loginError .
                                '<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                    
                ?>
        </form>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>