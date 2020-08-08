<?php
    include_once "dbconn.php";
    session_start();
    if(isset($_POST['registration'])){
//        echo "<pre>";
//        print_r($_POST);
//        print_r($_FILES);
        $name=$_POST['name'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $c_password=$_POST['c_password'];


//        $photo=explode('.',$_FILES['photo']['name']);

//        $photo=end($photo);


        $photo_name=$username.'.'."jpeg";
//        echo $photo_name;

        $input_error=array();

        if(empty($name)){
            $input_error['name']="<em>The Neme feild is required!</em>";
        }
        if(empty($email)){
            $input_error['email']="<em>The Email feild is required!</em>";
        }
        if(empty($username)){
            $input_error['username']="<em>The username feild is required!</em>";
        }
        if(empty($password)){
            $input_error['password']="<em>The password feild is required!</em>";
        }
        if(empty($c_password)){
            $input_error['c_password']="<em>The c_password feild is required!</em>";
        }
//        echo "<pre>";
//        print_r($input_error);
//        echo "</pre>";
        if(count($input_error)==0){
            $email_chack=mysqli_query($link,"SELECT * FROM `user` WHERE `email`= '$email';");
//            print_r($email_chack);
            if(mysqli_num_rows($email_chack)==0){
                $username_chack=mysqli_query($link,"SELECT * FROM `user` WHERE `username`= '$username';");
                if(mysqli_num_rows($username_chack)==0){
                    if(strlen($username)>7){
                        if(strlen($password)>7){
                            if($password==$c_password){
                                $password=md5($password);
                                if($_FILES['picture']['error']==0){
                                    $query="INSERT INTO `user`( `name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username',
                                    '$password','$photo_name','inactive')";
                                    $result=mysqli_query($link,$query);
                                        if($result) {
                                            $_SESSION['data_insert_success'] = "Data Inserted <a class='alert-link'>Succesfully</a>.";
                                            move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo_name);
                                            header('location:registration.php');
                                        }

                                        else{
                                            $error_1="File wrong";
                                            $input_error['picture']="<em>Choose the other picture!</em>";
                                        }
                                }
                                else{
                                    $_SESSION['data_insert_error']="Data Insert error!.";
                                    }
                            }
                            else{
                                $password_not_match=" Conform Password is not match";
                            }
                        }
                        else{
                            $password_l="The Password more than 8 characters";
                        }
                    }
                    else{
                        $username_l="The username more than 8 characters";
                    }
//                    $nimdd= strlen($username);
//                    echo $nimdd;
                }
                else{
                    $username_error="The username is already exists";
                }
            }
            else{
                 $email_error="The Email is already exists";
            }
//            if($email_chack){
//                echo"xyes";
//            }
//            else{
//                 echo"no";
//            }
        }
//        echo "<hr>";
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
    <link rel="icon" href="../admin/images/logo.png">
    <link rel="stylesheet" href="../vandors/vandors_css/animate.css">
    <link rel="stylesheet" href="css/style.css">

    <title>User Registration Form</title>
</head>
<body>
<div class="container">
    <a class="btn btn-success mt-3" style="color: white" href="login.php">Login</a>

    <div class="col-4 offset-4 text-center ">
        <img class="" width="120" height="120" src="../admin/images/logo.png" alt="logo.png">
    </div>
    <br>

    <h1 class="text-center my-3">User Registration Form</h1>
    <?php   if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success alert-dismissible fade show text-center animated bounceIn">'.$_SESSION['data_insert_success'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';}
            if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning text-center animated bounceIn alert-dismissible fade show">'.$_SESSION['data_insert_error'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';}
//    session_unset();
    ?>

    <hr>
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <form action="registration.php" method="post" enctype="multipart/form-data" class="">
                <div class="form-group">
                    <div class="row">
                        <label for="name" class="col-sm-2 col-12 animated bounceInLeft">Name:-</label>
                        <div class="col-sm-10 col-12">
                            <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control animated bounceInRight" value="<?php if(isset($name)){echo $name;}?>">
                        </div>
                        <label for="" style="color: red" class="error animated jello">
                            <?php
                            if(isset($input_error['name'])){echo $input_error['name'];}
//                                                    echo"<em>te</em>";
                            ?>
                        </label>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="email" class="col-sm-2 col-12  animated bounceInLeft" >Email:-</label>
                        <div class="col-sm-10 col-12">
                            <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control  animated bounceInRight" value="<?php if(isset($email)){echo $email;}?>">
                        </div>
                        <label for="" style="color: red" class="error animated jello">
                            <?php
                            if(isset($input_error['email'])){echo $input_error['email'];}
                            if(isset($email_error)){echo $email_error;}
                            ?>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="username" class="col-sm-2 col-12  animated bounceInLeft"">Username:-</label>
                        <div class="col-sm-10 col-12">
                            <input type="text" id="username" name="username" placeholder="Enter your username" class="form-control  animated bounceInRight" value="<?php if(isset($username)){echo $username;}?>">
                        </div>
                        <label for="" style="color: red" class="error animated jello">
                            <?php
                            if(isset($input_error['username'])){echo $input_error['username'];}
                            if(isset($username_error)){echo $username_error;}
                            if(isset($username_l)){echo $username_l;}
                            ?>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="password" class="col-sm-2 col-12  animated bounceInLeft"">Password:-</label>
                        <div class="col-sm-10 col-12">
                            <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control  animated bounceInRight" value="<?php if(isset($password)){echo $password;}?>">
                        </div>
                        <label for="" style="color: red" class="error animated jello">
                            <?php
                            if(isset($input_error['password'])){echo $input_error['password'];}
                            if(isset($password_l)){echo $password_l;}
                            ?>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="c_password" class="col-sm-2 col-12  animated bounceInLeft"">Conform Password:-</label>
                        <div class="col-sm-10 col-12">
                            <input type="password" id="c_password" name="c_password" placeholder="Enter your conform password" class="form-control  animated bounceInRight" value="<?php if(isset($c_password)){echo $c_password;}?>">
                        </div>
                        <label for="" style="color: red" class="error animated jello">
                            <?php
                            if(isset($input_error['c_password'])){echo $input_error['c_password'];}
                            if(isset($password_not_match)){echo $password_not_match;}
                            ?>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="photo" class="col-sm-2 col-12  animated bounceInLeft"">Photo:-</label>
                        <div class="col-sm-10 col-12">
                            <input type="file" id="photo" name="photo" class="form-control  animated bounceInRight"">
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <br><br>
                    <label for="" style="color: red" class="error animated jello">
                        <?php
                        if(isset($input_error['picture'])){echo $input_error['picture'];}
                        ?>
                    </label>
                </div>
                <div class=" text-center">
                    <input type="submit" name="registration" value="Registration" class="btn btn-primary  animated bounceIn" >
                </div>
            </form>
        </div>
    </div>
    <br>
    <hr>
    <footer class="text-center">
        <p> Copyright &copy;2016-<?= date("Y"); ?> .All Right reserved.</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vandors/vandors_js/jquery.min.js"></script>
    <script src="../vandors/vandors_js/popper.min.js"></script>
    <script src="../vandors/vandors_js/bootstrap.min.js"></script>
    <script src="../resources/js/scrept.js"></script>
</div>
</body>
</html>