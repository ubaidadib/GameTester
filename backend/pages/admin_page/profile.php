<?php

class profile {

    public function display_account() {

        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['admin_id'];
        $user_query = "SELECT * from user where id='$user_id'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="index.php?p=profile" style="text-decoration:none;color:#007CF8;"><?= ucwords($row['fname'])?> Information </a></li>
            </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
                <div class="container-fluid">
                    <br><br>
                    <form method="POST" action="#">
                        <div class="form-row">
                            <div class="col-6">
                                <label for="inputEmail4"><b>First name </b></label>
                                <input type="text" value="<?= $row['fname'] ?>"  class="form-control" name="fname" id="inputEmail4"/>
                            </div>
                            <div class="col-6">
                                <label for="inputEmail4"><b>Last name </b></label>
                                <input type="text" value="<?= $row['lname'] ?>"  class="form-control" id="inputEmail4"  name="lname"  />
                            </div>
                        </div>
                         <br><br>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="inputEmail4"><b>Phone number</b></label>
                                <input type="text" value="<?= $row['phone'] ?>"id="inputEmail4"   class="form-control" name="phonenumber" />
                            </div>
                            <div class="col-6">
                                <label for="inputPassword4">Email</label>
                                <input type="text" value="<?= $row['email'] ?>" class="form-control" name="email" id="inputEmail4"/>
                            </div>
                        </div>
                         <br><br>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="inputEmail4">New Username</label>
                                <input type="text" value="<?= $row['username'] ?>"  class="form-control" name="new_username" id="inputEmail4" value="<?=$row['username']?>"  />
                            </div>
                            <div class="col-6">
                                <label for="inputEmail4">New Password</label>
                                <input type="password" placeholder="********************" class="form-control" name="new_password" id="inputEmail4"  value="<?=$row['password']?>" />
                            </div>
                        </div>

                        <br><br>
                        <div class="form-row">
                            <div class="col-6">
                            </div>
                            <div class="col-6 float-right">
                                <button type="submit" class="btn btn-primary float-right" name="update_info" >UPDATE
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>




            </div>

            <?php
            $update_info = filter_input(INPUT_POST, "update_info");
            if (isset($update_info)) {
                $admin = new profile();
                $admin->update_profile();
            }
        }
    }

    public function update_profile() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["admin_id"];
        $f_name = filter_input(INPUT_POST, 'fname');
        $l_name = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $phone_number = filter_input(INPUT_POST, 'phonenumber');
        $username = filter_input(INPUT_POST, 'new_username');
        $password = filter_input(INPUT_POST, 'new_password');
        $query = "UPDATE `user` SET `fname`='$f_name',`lname`='$l_name',`username`='$username',`password`='$password',`email`='$email',`phone`='$phone_number'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                Swal.fire('Good job!','Your  Information is updated','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

}
