<?php
include_once "include/db_connect.php";
include_once "include/header.php";
include "include/auth_check.php";

$userID = $_GET['id'];

$sql = "SELECT * FROM tblUser where md5(id)='$userID'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!isset($user)) {
    $_SESSION['_flash'] = ['type' => 'error', 'msg' => 'User not found'];
    header("location: list.php");
}

$fullname = $user['fullname'];
$email = $user['email'];
$dob = $user['dob'];
$status = $user['isActive'];
$id = $user['id'];

?>

<h4>Update User</h4>

<form method="POST" action="process_update.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="mb-3">
        <label class="form-label">Fullname</label>
        <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" required value="<?php echo $dob; ?>">
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="status" <?= $status ? 'checked' : '' ?>>
        <label class="form-check-label">Active</label>

    </div>

    <button type="submit" name="submit" class="btn btn-primary">Update</button>



</form>


<!-- End Content -->


<?php
// Footer
include "include/footer.php";
?>