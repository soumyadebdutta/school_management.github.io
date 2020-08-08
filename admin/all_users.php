<h1><i class="fas fa-users"></i> All Users <small>The all Users</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> All Users</li>
    </ol>
</nav>
<h3>All Users</h3>
<div class="table-responsive">
    <table id="data" class="table table-bordered table-hover table-striped ">
        <thead class="text-center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Photo</th>

        </tr>
        </thead>
        <tbody>
        <?php
		$si=1;
        $db_sinfo=mysqli_query($link,"SELECT * FROM `user`");
        while($row=mysqli_fetch_array($db_sinfo)){
            ?>
            <tr>
                <td><?php echo $si++;?></td>
                <td><?php echo ucwords($row['name']);?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><img style="width: 100px" src="images/<?php echo $row['photo'];?>" alt="<?php echo $row['photo'];?>"></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>