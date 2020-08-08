<h1><i class="fas fa-user-plus"></i> Add Student <small>Add New Student</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus"></i> Add Student</li>
    </ol>
</nav>
<?php
if(isset($_POST['add_student'])){
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $city=$_POST['city'];
    $pcontact=$_POST['pcontact'];
    $student_class=$_POST['student_class'];

//    $picture=explode('.',$_FILES['picture']['name']);

//    $picture_exten=end($picture);
    $picture_name=$roll."."."jpeg";
//    echo $picture_name;

    if($_FILES['picture']['error']==0){
        $query="INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`)VALUES ('$name','$roll','$student_class','$city','$pcontact','$picture_name')";
        $result=mysqli_query($link,$query);
        if($result){
            move_uploaded_file($_FILES['picture']['tmp_name'],'images/'.$picture_name);
            $success="DATA inserted successfully";
        }
        else{
            $error="wrong";
        }
    }
    else{
            $error_1="File wrong";
            $input_error['picture']="<em>Choose the other picture!</em>";
            $input_error['class']="<em>Further Choose the class!</em>";
    }
}

?>
<div class="row">
    <div class="col-sm-12">
        <?php
        if(isset($success)){echo '<div class="alert alert-success alert-dismissible fade show text-center animated bounceIn">'.$success.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';}
        if(isset($error_1)){echo '<div class="alert alert-warning alert-dismissible fade show text-center animated bounceIn">'.$error_1.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';}
        if(isset($error)){echo '<div class="alert alert-warning alert-dismissible fade show text-center animated bounceIn">'.$error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';}
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name:-</label>
                <input type="text" name="name" id="name" placeholder="Type Your name" class="form-control" value="<?php if(isset($input_error['picture'])){echo $name;}?>" required>
            </div>
            <div class="form-group">
                <label for="roll">Student Roll:-</label>
                <input type="text" name="roll" id="roll" pattern="[0-9]{6}" placeholder="Type Your Roll"  class="form-control"  value="<?php if(isset($input_error['picture'])){echo $roll;}?>" required>
            </div>
            <div class="form-group">
                <label for="city">Student City:-</label>
                <input type="text" name="city" id="city" placeholder="Type Your City" class="form-control" value="<?php if(isset($input_error['picture'])){echo $city;}?>" required>
            </div>
            <div class="form-group">
                <label for="pcontact">Student Pcontact:-</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="91 **********"  class="form-control" value="<?php if(isset($input_error['picture'])){echo $pcontact;}?>" required>
            </div>
            <div class="row">
                <div class="col-sm-7">
            <div class="form-group">
                <label for="class">Student Class:-</label>
                <select name="student_class" class="form-control" id="class">
                    <option value="">Select</option>
                    <option value="infant">Infant</option>
                    <option value="nursary">Nursary</option>
                    <option value="preparetory">Preparetory</option>
                    <option value="one">One</option>
                    <option value="two">Two</option>
                    <option value="three">Three</option>
                    <option value="four">Four</option>
                </select>
            </div>
                </div>
                    <div class="col-sm-5">
                        <br><br>
                <label for="" style="color: red" class="error animated jello">
                    <?php
                    if(isset($input_error['class'])){echo $input_error['class'];}
                    ?>
                </label>
                    </div>

            </div>
            <div class="row">
            <div class="form-group col-sm-7">
                <label for="picture">Picture:-</label>
                <input type="file" name="picture" class="form-control" id="picture">
            </div>
                <div class="col-sm-5">
                    <br><br>
                <label for="" style="color: red" class="error animated jello">
                    <?php
                    if(isset($input_error['picture'])){echo $input_error['picture'];}
                    ?>
                </label>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="add_student" value="Add Student" class=" btn btn-primary fa-pull-right my-3">
            </div>
        </form>
    </div>
</div>