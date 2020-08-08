<?php
    include_once"dbconn.php";
    session_start();
//if(isset($link)){
//    echo"dbyes";
//}
//else{
//    echo"dbno";
//}

if(isset($_SESSION['user_login'])){
    header('location:index.php');
}

if(isset($_POST['login'])){
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    $username=$_POST['username'];
    $password=$_POST['password'];

    $username_check=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$username'");
//    echo $username_check;
    if(mysqli_num_rows($username_check)>0){
        $row=mysqli_fetch_array($username_check);
//        echo "<pre>";
//        print_r($row);
//        echo "</pre>";
        if($row['password']==md5($password)){
            if($row['status']=='active'){
                $_SESSION['user_login']=$username;
                header('location:index.php');
            }
            else{
                $status_inactive="Your Status <b>Inactive</b>";
            }
        }
        else{
            $wrong_password="This Password is not found";
        }
    }
    else{
        $username_not_found="This Username is not found";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="../admin/images/logo.png">
    <link rel="stylesheet" href="../vandors/vandors_css/bootstrap.min.css">
    <link rel="stylesheet" href="../vandors/vandors_css/animate.css">
    <title>Login Page</title>
</head>
<body>
<div class="container">
    <br>
    <div>
        <div class="row">
            <div class="col-md-10 col-sm-9 col-8"><a class="btn btn-success" style="color: white" href="../index.php">Student info</a></div>
            <div class="col-md-2 col-sm-3 col-4"><a class="btn btn-primary" style="color: white" href="registration.php">Registration</a></div>
        </div>
<!--        <div class="text-left"></div>-->
    </div>
    <div class="col-4 offset-4 text-center ">
        <img class="" width="120" height="120" src="../admin/images/logo.png" alt="logo.png">
    </div>
    <br>
    <h1 class="text-center my-3">Shikshaduyar</h1>
    <br>
    <div class="row">
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3  col-8 offset-2">
            <form action="login.php" method="post">
                <table class="table table-bordered animated shake">
                    <tr>
                        <td>
                            <h2 class="text-center"><em>Login Page</em></h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="Username" name="username" class="form-control" value="<?php if(isset($username)){echo $username; }  ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="Password" name="password"  class="form-control" value="<?php if(isset($password)){echo $password; }?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <input type="submit" name="login" value="login" class="btn btn-info">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php   if(isset($username_not_found)){
    echo '<div class="alert alert-danger alert-dismissible fade show text-center animated bounceIn col-sm-4 offset-sm-4">'.$username_not_found
            .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
           </div>';}
        if(isset($wrong_password)){
            echo '<div class="alert alert-danger alert-dismissible fade show text-center animated bounceIn col-sm-4 offset-sm-4">'.$wrong_password
            .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';}
        if(isset($status_inactive)){
            echo '<div class="alert alert-danger alert-dismissible fade show text-center animated bounceIn col-sm-4 offset-sm-4">'.$status_inactive
            .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vandors/vandors_js/jquery.min.js"></script>
    <script src="../vandors/vandors_js/popper.min.js"></script>
    <script src="../vandors/vandors_js/bootstrap.min.js"></script>
    <script src="../resources/js/scrept.js"></script>
</div>
</body>
</html>