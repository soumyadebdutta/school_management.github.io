<h1><i class="fas fa-tachometer-alt"></i> Dashbord <small>Statistics Overview</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tachometer-alt"></i> Dashbord</li>
    </ol>
</nav>

<?php
$count_student=mysqli_query($link,"SELECT * FROM `student_info`");
//print_r($count_student);
$total_students=mysqli_num_rows($count_student);
?>
<?php
$count_users=mysqli_query($link,"SELECT * FROM `user`");
//print_r($count_student);
$total_users=mysqli_num_rows($count_users);
?>

<div class="row">
    <div class="col-sm-4" >
        <div class="card ">
            <div class="card-heading text-white bg-primary">
                <div class="row">
                    <div class="col-xl-3 ml-2"><i class="fas fa-users fa-5x"></i></div>
                    <div class="col-xl-8">
                        <div class="fa-pull-right" style="font-size: 45px;"><?=$total_students;?></div>
                        <div class="clearfix"></div>
                        <div class="fa-pull-right" >All student</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all_students">
                <div class="card-footer ">
                    <span class="fa-pull-left">All Students</span>
                    <span class="fa-pull-right"><i class="fas fa-arrow-alt-circle-right"></i></span>
                    <br>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="card ">
            <div class="card-heading text-white bg-primary">
                <div class="row">
                    <div class="col-xl-3 ml-2"><i class="fas fa-users fa-5x"></i></div>
                    <div class="col-xl-8">
                        <div class="fa-pull-right" style="font-size: 45px;"><?=$total_users;?></div>
                        <div class="clearfix"></div>
                        <div class="fa-pull-right" >All Users</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all_users">
                <div class="card-footer ">
                    <span class="fa-pull-left">All Users</span>
                    <span class="fa-pull-right"><i class="fas fa-arrow-alt-circle-right"></i></span>
                    <br>
                </div>
            </a>
        </div>
    </div>

</div>
<hr>
<h3>New Student</h3>
<div class="table-responsive">
    <table id="data" class="table table-bordered table-hover table-striped ">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
            <th>Photo</th>
        </tr>
        </thead>
        <tbody>
            <?php
			$si=1;
            $db_sinfo=mysqli_query($link,"SELECT * FROM `student_info`");
            while($row=mysqli_fetch_array($db_sinfo)){
            ?>
                <tr>
                    <td><?php echo $si++;?></td>
                    <td><?php echo ucwords($row['name']);?></td>
                    <td><?php echo $row['roll'];?></td>
                    <td><?php echo $row['class'];?></td>
                    <td><?php echo ucwords($row['city']);?></td>
                    <td><?php echo $row['pcontact'];?></td>
                    <td><img style="width: 100px" src="images/<?php echo $row['photo'];?>" alt="<?php echo $row['photo'];?>"></td>
                    <!--                <p class="text-center">--><?php //echo $row['photo'];?><!--</p>-->
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>