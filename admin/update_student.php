<h1><i class="fas fa-pencil-alt"></i> Update Student <small>Update Student Data</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="index.php?page=add_student"><i class="fas fa-user-plus"></i> Add Student</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-pencil-alt"></i> Update</li>
    </ol>
</nav>

<?php
include_once "dbconn.php";
$id=base64_decode($_GET['id']);

$db_data=mysqli_query($link,"SELECT * FROM `student_info` WHERE id=$id");
$db_row=mysqli_fetch_array($db_data);
if(isset($_POST['update_student'])){

    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $city=$_POST['city'];
    $pcontact=$_POST['pcontact'];
    $student_class=$_POST['student_class'];
//    $picture=explode('.',$_FILES['picture']['name']);
//    $picture_exten=end($picture);
    $picture_name=$roll."."."jpeg";
if($_FILES['picture']['error']==0){
            $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$student_class',`city`='$city',`pcontact`='$pcontact',`photo`='$picture_name' WHERE id=$id";
            $result=mysqli_query($link,$query);
        if($result){
            move_uploaded_file($_FILES['picture']['tmp_name'],'images/'.$picture_name);
            header('location:index.php?page=all_students');
        }
    }
    else{
        echo"no";
    }
}
?>
<div class="row">
    <div class="col-sm-12">
        <?php
        if(isset($success)){echo '<div class="alert alert-success alert-dismissible fade show text-center animated bounceIn">'.$success.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';}
        if(isset($error)){echo '<div class="alert alert-success alert-dismissible fade show text-center animated bounceIn">'.$error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';}
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name:-</label>
                <input type="text" name="name" id="name" placeholder="Type Your name" class="form-control" value="<?=$db_row['name']?>">
            </div>
            <div class="form-group">
                <label for="roll">Student Roll:-</label>
                <input type="text" name="roll" id="roll" pattern="[0-9]{6}" placeholder="Type Your Roll"  class="form-control" value="<?=$db_row['roll']?>" >
            </div>
            <div class="form-group">
                <label for="city">Student City:-</label>
                <input type="text" name="city" id="city" placeholder="Type Your City" class="form-control" value="<?=$db_row['city']?>">
            </div>
            <div class="form-group">
                <label for="pcontact">Student Pcontact:-</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="91 **********"  class="form-control" value="<?=$db_row['pcontact']?>">
            </div>
            <div class="form-group">
                <label for="class">Student Class:-</label>
                <select name="student_class" class="form-control" id="class" >
                    <option value="">Select</option>
                    <option <?php echo $db_row['class']=='infant' ? 'selected=""':'';?> value="infant">Infant</option>
                    <option <?php echo $db_row['class']=='nursary' ? 'selected=""':'';?> value="nursary">Nursary</option>
                    <option <?php echo $db_row['class']=='preparetory' ? 'selected=""':'';?> value="preparetory">Preparetory</option>
                    <option <?php echo $db_row['class']=='one' ? 'selected=""':'';?> value="one">One</option>
                    <option <?php echo $db_row['class']=='two' ? 'selected=""':'';?> value="two">Two</option>
                    <option <?php echo $db_row['class']=='three' ? 'selected=""':'';?> value="three">Three</option>
                    <option <?php echo $db_row['class']=='four' ? 'selected=""':'';?> value="four">Four</option>
                </select>
            </div>
            <div class="form-group">
                <label for="picture">Picture:-</label>
                <input type="file" name="picture" class="form-control" id="picture " value="<?=$db_row['photo']?>">
            </div>
            <div class="form-group">
                <input type="submit" name="update_student" value="Add Student" class=" btn btn-primary fa-pull-right my-3">
            </div>
        </form>
    </div>
</div>