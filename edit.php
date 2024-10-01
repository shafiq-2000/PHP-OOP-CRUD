<?php
include("layouts/header.php");

include "classes/Users.php";
$user = new Users();
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $data = $user->edit($id);
    $row = mysqli_fetch_assoc($data);
}

if (isset($_POST['update_user'])) {
    $user->update($_POST, $id);
}
?>





<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-3 test-upercase text-white bg-danger p-1 text-center">PHP OOP CRUD</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="mt-5">
                <form action="" method="post" class="shadow">
                    <div class="p-5">
                        <div class="text-primary mb-3">
                            <h3 class="text-center">Edit User</h3>
                        </div>
                        <div class="">
                            <span>Name</span>
                            <input name="name" class="form-control" value="<?php echo $row['name']; ?>" type="text" required>
                        </div>
                        <div class="">
                            <span>Email</span>
                            <input name="email" class="form-control" value="<?php echo $row['email']; ?>" type="email" required>
                        </div>
                        <div class="">
                            <span>Address</span>
                            <input name="address" class="form-control" value="<?php echo $row['address']; ?>" type="text" required>
                        </div>
                        <div class="">
                            <span>Phone</span>
                            <input name="phone" class="form-control" value="<?php echo $row['phone']; ?>" type="text" required>
                        </div>
                        <!-- <div class="mt-3">
                            <span>Status</span>
                            <select name="status" id="" value="" required>
                                <option value=" ">--select--</option>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div> -->

                        <div class="mt-3">
                            <button class="btn btn-outline-info form-control" name="update_user">Submit</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>

    </div>
</div>

<?php include "layouts/footer.php"; ?>