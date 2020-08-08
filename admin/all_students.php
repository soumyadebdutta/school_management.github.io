<h1><i class="fas fa-users"></i> All Students <small>The all Students</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> All Students</li>
    </ol>
</nav>
<h3>All Students</h3>
<div class="table-responsive">
    <table id="data" class="table table-bordered table-hover table-striped ">
        <thead class="text-center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
            <th>Photo</th>
            <th >Action</th>

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
                <td><a href="index.php?page=update_student&id=<?php echo base64_encode($row['id']);?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                    &nbsp;&nbsp;
                    <a href="delete_student.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>