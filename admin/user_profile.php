<h1><i class="fas fa-user"></i> User Profile <small>My Profile</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="breadcrumb-item " aria-current="page"><i class="fas fa-user"></i> Profile</li>
    </ol>
</nav>
<?php
$session_user=$_SESSION['user_login'];
$user_data=mysqli_query($link,"SELECT * FROM `user` WHERE `username`= '$session_user'");
$user_row=mysqli_fetch_array($user_data);
?>
<div class="row">
    <div class="col-sm-8">
        <table class="table-bordered table">
            <tr>
                <td>User ID</td>
                <td><?= $user_row['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= ucwords($user_row['name']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= ucwords($user_row['username']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $user_row['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= ucwords($user_row['status']); ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?= $user_row['date_time']; ?></td>
            </tr>
        </table>
        <a href="" class="btn btn-info fa-pull-right">Edit Profile</a>
    </div>
    <div class="col-sm-4">
        <a href="">
            <img  class="img-thumbnail" src="images/<?= $user_row['photo']; ?>" alt="">
        </a>
        <br><br>
        <?php
            if(isset($_POST['uplode'])){
//                print_r($_FILES);
                $photo=explode('.',$_FILES['photo']['name']);
                $photo=end($photo);
                $photo_name=$session_user.'.'.$photo;
//                echo $photo_name;
               $upload_image= mysqli_query($link,"UPDATE `user` SET `photo`='$photo_name' WHERE `username`='$session_user'");
                if($upload_image){
                    move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                }
                else{
                    echo "no";
                }
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="photo">Profile Picture</label><br>
            <input type="file"  name="photo"  id="photo" required>
            <br><br>
            <input type="submit" class="btn btn-sm btn-success" name="uplode"  value="Uplode">
        </form>
    </div>
</div>
}