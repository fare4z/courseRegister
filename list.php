<?php
// Header
  include_once "include/db_connect.php";
     include_once "include/header.php";
include "include/auth_check.php";
?>

<!-- Start Content -->
<h4>List of User</h4>

<table class="table table-bordered">
    <thead class="table-dark">
        <th>ID</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * from tblUser";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr> 
            <td><?php echo $row['id'];?></td>
            <td><?php echo htmlspecialchars($row['username']);?></td>
            <td><?php echo htmlspecialchars($row['fullname']);?></td>
            <td><?php echo $row['isActive'] ? '<span class="badge text-bg-primary">Active</span>' : '<span class="badge text-bg-danger">In-Active</span>';?></td>
            <td>
            <a href="update.php?id=<?php echo md5($row['id']);?>" class="btn btn-primary"> Update </a> &nbsp; 
            <a href ="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger"> Delete </a></td>
        </tr>

        <?php }   ?>

    </tbody>

</table>


<?php
include_once "include/footer.php";
?>