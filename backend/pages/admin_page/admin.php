
<?php

class admin {

    public function display_overview() {
        ?><div class="card mb-4">
            <div class="card-header ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php?p=home" style="text-decoration: none;">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Overview !</li></ol>
            </div>
            <div class="card-body">
                <!-- Icon Cards row 1-->
                <div class="row">
                    <div class="col-xl-4 col-sm-8 mb-4">
                        <a class="text-white clearfix  z-1" href="index.php?p=admins" style="text-decoration:none;">
                            <div class="card text-white  bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-user-secret"></i>
                                    </div>
                                    <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Administrator's!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="index.php?p=admins">
                                    <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Admin Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-sm-8 mb-4">
                        <a class="text-white clearfix  z-1" href="index.php?p=UsersList" style="text-decoration:none;">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-user "></i>
                                    </div>
                                    <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Public Users!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="index.php?p=UsersList">
                                    <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Users</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-sm-8 mb-4">
                        <a class="text-white clearfix  z-1" href="index.php?p=pc_features" style="text-decoration:none;">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                       <i class="fas fa-desktop"></i>
                                    </div>
                                    <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">PC Features!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="index.php?p=pc_features">
                                    <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">add a new pc features</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </a>
                    </div>

                </div>
                <!-- Icon Cards row 2-->
                <div class="row">


                    <div class="col-xl-4 col-sm-8 mb-4">
                        <a class="text-white clearfix  z-1" href="index.php?p=show_games" style="text-decoration:none;">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-gamepad"></i>                                    </div>
                                    <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:white;font-size:18px;">Games!</div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="index.php?p=show_games">
                                    <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">shared games </span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </a>
                    </div>




                </div>
            </div>

        </div><?php
    }

    public function logout() {
        unset($_SESSION['isAdminloggedin']);
        $header_process = new header_process();
        $header_process->header("../frontend/index.php");
        exit;
    }

    public function appoint_admin() {
        $connect = new connect();
        $id = $_GET['id'];
        $conn = $connect->getConn();
        $appoint_admin_query = "UPDATE `user` SET `role`='1' WHERE `id`='" . $id . "'";
        $result = $conn->query($appoint_admin_query);
        if ($result) {
            echo "<script>
                Swal.fire('Good job!','A new admininstrator is appointed','success')</script>";
            echo "<a href='index.php?p=admins' style='text-center'>Admin Tables</a>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function appoint_user() {
        $connect = new connect();
        $id = $_GET['id'];
        $conn = $connect->getConn();
        $appoint_admin_query = "UPDATE `user` SET `role`='0' WHERE `id`='" . $id . "'";
        $result = $conn->query($appoint_admin_query);
        if ($result) {
            echo "<script>
                Swal.fire('Good job!','A new user is appointed','success')</script>";
            echo "<a href='index.php?p=UsersList' style='text-center'>User Tables</a>";
            //$header_process=new header_process();
            //$header_process->header("index.php?p=UsersList");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_add_user() {
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
            <li class="breadcrumb-item active">
                <a href="index.php?p=UsersList" style="text-decoration:none;color:black;">Home</a>
            </li>
            <li class="breadcrumb-item active "> Add User</li>
        </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
            <form method="POST" action="#">
                <h3>New User</h3><br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="f_name" placeholder="first name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="l_name" placeholder="last name" >
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="user_name" placeholder="username">
                    </div>
                    <div class="col">
                        <input type="password"  class="form-control"  name="password" placeholder="password">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"  name="email" id="" placeholder="email">       </div>
                    <div class="col">
                        <input type="text"  class="form-control"  name="phone_number" placeholder="phone number">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary float-right " name="register" id="register">Register<i class="fas fa-arrow-right"></i> </button>

                    </div>
                </div>

            </form> 
        </div> <?php
        $user_register = filter_input(INPUT_POST, "register");
        if (isset($user_register)) {
            $user = new admin();
            $user->add_user();
        }
    }

    public function display_add_admin() {
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;margin: 7px;">
            <li class="breadcrumb-item active"><a href="index.php?p=admins" style="text-decoration:none;color:black;">Home</a> </li>
            <li class="breadcrumb-item active "> Add Administrator</li></ol>
        <div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
            <form method="POST" action="#">
                <h3>New Admin</h3><br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="f_name" placeholder="first name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="l_name" placeholder="last name" >
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="user_name" placeholder="username">
                    </div>
                    <div class="col">
                        <input type="password"  class="form-control"  name="password" placeholder="password">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"  name="email" id="" placeholder="email">       </div>
                    <div class="col">
                        <input type="text"  class="form-control"  name="phone_number" placeholder="phone number">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary float-right " name="register" id="register">Register<i class="fas fa-arrow-right"></i> </button>

                    </div>
                </div>

            </form>
        </div><?php
        $user_register = filter_input(INPUT_POST, "register");
        if (isset($user_register)) {
            $user = new admin();
            $user->add_admin();
        }
    }

    public function add_user() {
        $connect = new connect();
        $conn = $connect->getConn();
        $f_name = filter_input(INPUT_POST, 'f_name');
        $l_name = filter_input(INPUT_POST, 'l_name');
        $email = filter_input(INPUT_POST, 'email');
        $user_name = filter_input(INPUT_POST, 'user_name');
        $password = filter_input(INPUT_POST, 'password');
        $user_nb = filter_input(INPUT_POST, 'phone_number');

        $new_user_query = "INSERT INTO `user`(`id`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `role`) "
                . "VALUES (NULL,'" . $f_name . "', '" . $l_name . "', '" . $user_name . "', '" . $password . "', '" . $email . "','" . $user_nb . "','0')";
        $new_result = $conn->query($new_user_query);
        if ($new_result) {
            echo "<script>
                Swal.fire('Good job!','A New User is Added','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function add_admin() {
        $connect = new connect();
        $conn = $connect->getConn();
        $f_name = filter_input(INPUT_POST, 'f_name');
        $l_name = filter_input(INPUT_POST, 'l_name');
        $user_name = filter_input(INPUT_POST, 'user_name');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email');

        $user_nb = filter_input(INPUT_POST, 'phone_number');
        $new_user_query = "INSERT INTO `user`(`id`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `role`) "
                . "VALUES (NULL,'" . $f_name . "', '" . $l_name . "', '" . $user_name . "', '" . $password . "', '" . $email . "', '" . $user_nb . "','1')";
        $new_result = $conn->query($new_user_query);
        if ($new_result) {
            echo "<script>
                Swal.fire('Good job!','A New Administrator is Added','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function userRegisterd() {
        $connect = new connect();
        $conn = $connect->getConn();
        $count = 0;
        $query = "SELECT * from user";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;
            }
            echo $count;
        } else {
            echo "0";
        }
    }

    public function messagesCount() {
        $connect = new connect();
        $conn = $connect->getConn();
        $count = 0;
        $admin_id = $_SESSION['admin_id'];
        $query = "SELECT * from messages where receiver_id='$admin_id' and type='new'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;
            }
            echo $count;
        } else {
            echo "0";
        }
    }

}
