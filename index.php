<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="admin/images/logo.png">
    <link rel="stylesheet" href="vandors/vandors_css/bootstrap.min.css">
    <link rel="stylesheet" href="vandors/vandors_css/animate.css">
    <title>Shikshaduyar: School Mannagement</title>
</head>
<body>
<div class="container">
    <br>
    <div class="text-right">
        <a href="admin/login.php" class="btn btn-primary">Login</a>
    </div>
    <div class="col-4 offset-4 text-center ">
        <img class="" width="120" height="120" src="admin/images/logo.png" alt="logo.png">
    </div>
    <br>
    <h1 class="text-center">Shikshaduyar: School Mannagement</h1>
    <form action="" method="post" name="student_data_form" onsubmit="return validateForm()">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3  col-8 offset-2">
                <table class="table table-bordered animated bounce ">
                    <tr>
                        <th colspan="2" class="text-center">
                            <h4 ><em>Student Information</em> </h4>
                        </th>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><label for="choose">Student Class</label></td>
                        <td>
                            <select name="student_class" class="form-control" id="">
                                <option value="">Select</option>
                                <option value="infant">Infant</option>
                                <option value="nursary">Nursary</option>
                                <option value="preparetory">Preparetory</option>
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Student Roll No.</label></td>
                        <td><input type="text" name="roll_no" class="form-control" placeholder="Type he Roll No." required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class=" text-center">
                            <input type="submit" class="btn btn-outline-dark" onclick="return val()" value="Show Info" name="show_info"></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <br>
        <?php
        include_once "admin/dbconn.php";
        if(isset($_POST['show_info'])){
            $student_class=$_POST['student_class'];
            $roll_no=$_POST['roll_no'];
            $result=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$student_class' AND `roll`='$roll_no'");
//            print_r($result);
            if(mysqli_num_rows($result)==1) {
                $row=mysqli_fetch_assoc($result);
            ?>
            <div class="row">
                <div class="col-sm-8 offset-md-3">
                    <table class="table-bordered table">
                        <tr>
                            <td rowspan="6" class="text-center">
                                <img src="admin/images/<?=$row['photo'];?>"class="img-thumbnail " style="width: 169px" alt="">
                            </td>

                        <tr>
                            <td>Name:-</td>
                            <td><?=$row['name'];?></td>
                        </tr>
                        <tr>
                            <td>Roll:-</td>
                            <td><?=$row['roll'];?></td>
                        </tr>
                        <tr>
                            <td>Class:-</td>
                            <td><?=$row['class'];?></td>
                        </tr>
                        <tr>

                            <td>City</td>
                            <td><?=$row['city'];?></td>
                        </tr>
                        <tr>
                            <td>Pcontact</td>
                            <td><?=$row['pcontact'];?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php }else{
                ?>
                <script>
                    alert('Data Not Found!');
                </script>
                <?php
            }}
        ?>

    </form>
</div>

<script>
    function val(){
        if(student_data_form.student_class.selectedIndex==0){
            alert("Student Class must be seleted");
            student_data_form.student_class.focus();
                return false;
        }
        return true;
    }
</script>
</body>
</html>