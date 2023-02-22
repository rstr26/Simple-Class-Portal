<?php
require '../connection/session.php';
include '../connection/database.php';

$accId = $_GET['id'];
$subj = $_GET['subject'];
$decision = false;

if($accId != "" && $subj != ""){
    $query = 'delete from semester1 where accountId="'.$accId.'";
              delete from semester2 where accountId="'.$accId.'";
              delete from semester3 where accountId="'.$accId.'";
              delete from semester4 where accountId="'.$accId.'";
              delete from credentials where accountId="'.$accId.'";
    ';
    $conn->multi_query($query);

    echo '
        <script>
            alert("Record Deleted");
            window.location.href="../pages/teacher.php"
        </script>
    ';
}
?>