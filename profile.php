<?php
// Header
include_once "include/db_connect.php";
include_once "include/header.php";
include "include/auth_check.php";

$username = $_GET['id'];

$sql = "SELECT * FROM tblUser where username = '$username'";
$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);

$username = $data['username'];
$fullname = $data['fullname'];
$email = $data['email'];
$dp_path = $data['dp'];

?>

<!-- Start Content -->
<h4>Profile</h4>

<div class="container">
    <div class="card shadow-sm" style="max-width: 540px; margin: 0 auto;">
        <div class="row g-0">
            <div class="col-md-4 p-3 text-center">
           
            <?php if ($dp_path) { ?>
            <img src="<?=$dp_path?>" class="rounded-circle img-thumbnail" alt="Profile Picture">
            <?php } else {  ?>
            <img src="https://randomuser.me/api/portraits/men/64.jpg" class="rounded-circle img-thumbnail" alt="Profile Picture">
            <?php } ?>


                <div class="mt-2">
                    <span class="badge bg-success">Online</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        <?=$username?>
                        <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                    </h5>
                    <p class="card-text text-muted">
                        <i class="fas fa-briefcase"></i> <?=$fullname?>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i> <?=$email?>
                            </small>
                    </p>
                    <div class="border-top pt-2">
                        <div class="row text-center">
                            <div class="col">
                                <h6>Projects</h6>
                                <strong>25</strong>
                            </div>
                            <div class="col border-start">
                                <h6>Following</h6>
                                <strong>142</strong>
                            </div>
                            <div class="col border-start">
                                <h6>Followers</h6>
                                <strong>289</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-around">
                <button class="btn btn-link text-decoration-none">
                        <i class="fas fa-user-plus"></i> Follow
                    </button>
                <button class="btn btn-link text-decoration-none">
                        <i class="fas fa-envelope"></i> Message
                    </button>
                <button class="btn btn-link text-decoration-none">
                        <i class="fas fa-share"></i> Share
                    </button>
            </div>
        </div>
    </div>
</div>


<h3>Upload</h3>
<form method="POST" action="process_upload.php" enctype="multipart/form-data">
    <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
    <input type="file" name="photo" class="form-control">
    <br>
    <button type="submit" name="btnSubmit" class="btn btn-primary btn-sm">Upload</button>

</form>


<?php 
include_once "include/footer.php";
?>