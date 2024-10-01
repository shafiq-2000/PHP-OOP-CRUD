<?php
include("config/config.php");

class Users extends connnection
{
    //========================================ADD USER========================================
    public function add_user($data)
    {

        $name = ucwords($data['name']);
        $email = $data['email'];
        $address = ucwords($data['address']);
        $phone = $data['phone'];
        $status = $data['status'];

        $sql = "INSERT INTO `users`(`name`, `email`, `address`, `phone`, `status`) VALUES ('$name','$email','$address','$phone','$status')";

        $result = $this->con->query($sql); //OOp style

        //Procedural Style:oporer line er poriborte avabe dilew hobe
        //$result = mysqli_query($this->con, $sql);

        if ($result) {
            echo "<script>localStorage.setItem('data_insert', 'true'); window.location.href='index.php';</script>";
        } else {
            echo "Error deleting record: " . $this->con->error;
        }
    }

    //=======================================FETCH USER=======================================

    public function show()
    {
        $sql = "SELECT * FROM users";
        $result = $this->con->query($sql);

        //Procedural Style:oporer line er poriborte avabe dilew hobe
        //$result = mysqli_query($this->con, $sql);
        return $result;
    }

    //========================================EDIT PRODUCT=======================================
    public function edit($id)
    {
        $sql = "SELECT *FROM users WHERE id = '$id'";
        $result = $this->con->query($sql);
        return ($result);
    }


    //========================================UPDATE PRODUCT=======================================
    public function update($all_user, $id)
    {
        $name = ucwords($all_user['name']);
        $email = $all_user['email'];
        $address = ucwords($all_user['address']);
        $phone = $all_user['phone'];

        $sql = "UPDATE `users` SET `name`='$name ',`email`='$email',`address`='$address',`phone`='$phone' WHERE id='$id'";

        $result = $this->con->query($sql);


        // toastr
        if ($result) {
            echo "<script>localStorage.setItem('update_msg', 'true'); window.location.href='index.php';</script>";
        } else {
            echo "Error deleting record: " . $this->con->error;
        }
    }


    //=======================================DELETE USER=======================================
    public function delete($id)
    {
        $sql = "DELETE FROM `users` WHERE id='$id'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "<script>localStorage.setItem('delete_msg', 'true'); window.location.href='index.php';</script>";
        } else {
            echo "Error deleting record: " . $this->con->error;
        }
    }
}
