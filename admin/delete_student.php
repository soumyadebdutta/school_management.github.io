<?php
    include_once "dbconn.php";
    $id=base64_decode($_GET['id']);
echo $id;

    $delete="DELETE FROM `student_info` WHERE id=$id";
        mysqli_query($link,$delete);
//if(isset($delete)){
//    echo"yes";
//}
//else{
//    echo"no";
//}
header('location:index.php?page=all_students');
?>