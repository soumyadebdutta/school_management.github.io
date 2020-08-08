<?php
session_start();
include_once "dbconn.php";

if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vandors/vandors_css/bootstrap.min.css">
    <link rel="stylesheet" href="../vandors/vandors_css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vandors/vandors_css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>SMS</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">SMS</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=dashboard"><i class="fas fa-user"></i> Wellcome Soumyadeb Dutta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i> Add User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=user_profile"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i> logout</a>
            </li>
        </ul>
    </div>
</div>
</nav>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="list-group">
                <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
                    <i class="fas fa-tachometer-alt"></i> Dashbord
                </a>
                <a href="index.php?page=add_student" class="list-group-item list-group-item-action"><i class="fas fa-user-plus"></i> Add Student</a>
                <a href="index.php?page=all_students" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All Students</a>
                <a href="index.php?page=all_users" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> Add Users</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="content">
                <?php
                if(isset($_GET['page'])){
                    $page=$_GET['page'].".php";
                    if(file_exists($page)){
                        include_once $page;
                    }
                    else{
                        include_once "404.php";
                    }
                }
                else{
                    include_once"dashboard.php";
                }

                ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer_area">
    <p>g</p>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vandors/vandors_js/jquery.min.js"></script>
<script src="../vandors/vandors_js/jquery.dataTables.min.js"></script>
<script src="../vandors/vandors_js/dataTables.bootstrap4.min.js"></script>
<script src="../vandors/vandors_js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>