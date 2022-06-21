<?php

class profile {

    public function display_profile() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $game_query = "SELECT * FROM user NATURAL JOIN user_features where user.id=user_features.uid  AND user.id='$user_id'";
        $result = $conn->query($game_query);
        ?>
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg spad" data-setbg="img/breadcrumb-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <h3>Profile:</h3>
                            <div class="bt-option">
                                <a href="#">Home</a>
                                <span>Profile</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <?php
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            ?>

            <section class="categories-list-section spad">
                <div class="container">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Security</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">PC Features</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <br>
                                    <form method="POST" action="#">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputfname">First name</label>
                                                <input type="text" class="form-control" id="inputfname" placeholder="First name" value="<?= $row['fname'] ?>" name="fname">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputlname">Last name</label>
                                                <input type="text" class="form-control" id="inputlname" placeholder="Last name"  value="<?= $row['lname'] ?>" name="lname">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"  value="<?= $row['email'] ?>" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNumber">Phone number</label>
                                            <input type="text" class="form-control" id="inputNumber" placeholder="Phone number"  value="<?= $row['phone'] ?>" name="phonenumber">
                                        </div>
                                        <div class="col ">
                                            <button class="btn btn-primary float-right" type="submit"  name ="general">Update </button>

                                        </div>
                                    </form>



                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <br>
                                    <form method="POST" action="#">

                                        <div class="form-group">
                                            <label for="inputusername">Username</label>
                                            <input type="text" class="form-control" id="inputusername" placeholder="Username" required=""  value="<?= $row['username'] ?>" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input type="text" class="form-control" id="inputPassword" placeholder="**********" required=""  value="<?= $row['password'] ?>" name="password">
                                        </div>
                                        <div class="col ">
                                            <button class="btn btn-primary float-right" type="submit"  name ="security">Update </button>

                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <br>
                                    <form method="POST" action="#">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCPU">CPU</label>

                                                <select class="browser-default custom-select" name="cpu">
                                                    <option selected disabled><?= $row['cpu'] ?></option>
                                                    <?php
                                                    $connect = new connect();
                                                    $conn = $connect->getConn();
                                                    $user_query = "SELECT DISTINCT cpu FROM `pc_features` WHERE 1";
                                                    $result = $conn->query($user_query);
                                                    if ($result->num_rows > 0) {
                                                        while ($pc_features_row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?= $pc_features_row['cpu'] ?>"><?php
                                                                echo $pc_features_row['cpu'];
                                                                ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputGPU">GPU</label>
                                                <select class="browser-default custom-select" name="gpu">
                                                    <option selected disabled><?= $row['gpu'] ?></option>
                                                    <?php
                                                    $connect = new connect();
                                                    $conn = $connect->getConn();
                                                    $user_query = "SELECT DISTINCT  gpu FROM `pc_features` WHERE 1";
                                                    $result = $conn->query($user_query);
                                                    if ($result->num_rows > 0) {
                                                        while ($pc_features_row2 = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?= $pc_features_row2['gpu'] ?>"><?php
                                                                echo $pc_features_row2['gpu'];
                                                                ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>




                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputRAM">RAM</label>
                                                <select class="browser-default custom-select" name="ram">
                                                    <option selected disabled><?= $row['ram'] ?></option>
                                                    <?php
                                                    $connect = new connect();
                                                    $conn = $connect->getConn();
                                                    $user_query = "SELECT DISTINCT ram FROM `pc_features` WHERE 1";
                                                    $result = $conn->query($user_query);
                                                    if ($result->num_rows > 0) {
                                                        while ($pc_features_row3 = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?= $pc_features_row3['ram'] ?>"><?php
                                                                echo $pc_features_row3['ram'];
                                                                ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputRAM">Storage</label>
                                                <select class="browser-default custom-select" name="storage">
                                                    <option selected disabled><?= $row['storage'] ?></option>
                                                    <?php
                                                    $connect = new connect();
                                                    $conn = $connect->getConn();
                                                    $user_query = "SELECT DISTINCT storage FROM `pc_features` WHERE 1";
                                                    $result = $conn->query($user_query);
                                                    if ($result->num_rows > 0) {
                                                        while ($pc_features_row4 = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?= $pc_features_row4['storage'] ?>"><?php
                                                                echo $pc_features_row4['storage'];
                                                                ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="col ">
                                            <button class="btn btn-primary float-right" type="submit"  name ="pc_feature">Update </button>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>

                    </div>
                </div>
            </section>


            <?php
            $update_general = filter_input(INPUT_POST, "general");
            $update_security = filter_input(INPUT_POST, "security");
            $update_features = filter_input(INPUT_POST, "pc_feature");
            if (isset($update_general)) {

                $new_generalInfo = new profile();
                $new_generalInfo->updateGeneralInfo();
            }
            if (isset($update_security)) {
                $new_securityInfo = new profile();
                $new_securityInfo->updateSecureInfo();
            }
            if (isset($update_features)) {
                $new_pc_feature = new profile();
                $new_pc_feature->updatePCInfo();
            }
        }

        //if user does not enter his pc features follow that 
        else {
            ?>
            <section class="categories-list-section spad">
                <div class="container">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <form method="POST" action="#">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCPU">CPU</label>
                                        <select class="browser-default custom-select" name="cpu">
                                            <option selected disabled>Select your CPU </option>
                                            <?php
                                            $connect = new connect();
                                            $conn = $connect->getConn();
                                            $user_query = "SELECT DISTINCT cpu  FROM `pc_features` ";
                                            $result = $conn->query($user_query);
                                            if ($result->num_rows > 0) {
                                                while ($pc_features_row = mysqli_fetch_array($result)) {
                                                    ?>

                                                    <option value="<?= $pc_features_row['cpu'] ?>"><?php
                                                        echo $pc_features_row['cpu'];
                                                        ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputRAM">GPU</label>

                                        <select class="browser-default custom-select" name="gpu">
                                            <option selected disabled>Select your GPU </option>
                                            <?php
                                            $connect = new connect();
                                            $conn = $connect->getConn();
                                            $user_query = "SELECT DISTINCT gpu FROM `pc_features` ";
                                            $result = $conn->query($user_query);
                                            if ($result->num_rows > 0) {
                                                while ($pc_features_row2 = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $pc_features_row2['gpu'] ?>"><?php
                                                        echo $pc_features_row2['gpu'];
                                                        ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputRAM">RAM</label>
                                        <select class="browser-default custom-select" name="ram">
                                            <option selected disabled>Select your RAM </option>
                                            <?php
                                            $connect = new connect();
                                            $conn = $connect->getConn();
                                            $user_query = "SELECT DISTINCT ram FROM `pc_features` ";
                                            $result = $conn->query($user_query);
                                            if ($result->num_rows > 0) {
                                                while ($pc_features_row3 = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $pc_features_row3['ram'] ?>"><?php
                                                        echo $pc_features_row3['ram'];
                                                        ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputGPU">Storage</label>

                                        <select class="browser-default custom-select" name="storage">
                                            <option selected disabled>Select your STORAGE </option>
                                            <?php
                                            $connect = new connect();
                                            $conn = $connect->getConn();
                                            $user_query = "SELECT DISTINCT storage FROM `pc_features` ";
                                            $result = $conn->query($user_query);
                                            if ($result->num_rows > 0) {
                                                while ($pc_features_row4 = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $pc_features_row4['storage'] ?>"><?php
                                                        echo $pc_features_row4['storage'];
                                                        ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col ">
                                    <button class="btn btn-primary float-right" type="submit"  name ="add_pc_feature">Submit </button>


                                </div>

                            </form>    
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </section>

            <?php
            $add_pc_feature = filter_input(INPUT_POST, "add_pc_feature");
            if (isset($add_pc_feature)) {
                $add_pc_feature = new profile();
                $add_pc_feature->add_pc_feature();
            }
        }
    }

    public function add_pc_feature() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $new_cpu = filter_input(INPUT_POST, "cpu");
        $new_gpu = filter_input(INPUT_POST, "gpu");
        $new_ram = filter_input(INPUT_POST, "ram");
        $new_storage = filter_input(INPUT_POST, "storage");




        $new_pcf_query = "INSERT INTO `user_features`(`pid`, `cpu`, `gpu`, `ram`, `storage`, `uid`) VALUES (NULL,'$new_cpu','$new_gpu','$new_ram','$new_storage','$user_id')";

        if ( !(empty($new_cpu)) && !(empty($new_gpu)) && !(empty($new_ram)) && !(empty($new_storage))) {
            $new_result = $conn->query($new_pcf_query);



            if ($new_result) {
                echo "<script>
                Swal.fire('Good job!','Your General Information is updated','success')</script>";
               
                
            } else {
                echo "<script>
            Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})</script>";
            }
        } else {
            echo "<script>
            Swal.fire({type: 'error', title: 'Oops...', text: 'You have to fill  that field !'})</script>";
        }
    }

    public function updateGeneralInfo() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $f_name = filter_input(INPUT_POST, 'fname');
        $l_name = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $phone_number = filter_input(INPUT_POST, 'phonenumber');
      
        $query = "UPDATE `user` SET `fname`='$f_name',`lname`='$l_name',`email`='$email',`phone`='$phone_number' WHERE id='$user_id'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                Swal.fire('Good job!','Your General Information is updated','success')</script>";
        } else {
            echo("Error description: " . $conn->error);
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function updateSecureInfo() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $query = "UPDATE `user` SET `username`='$username',`password`='$password' WHERE id='$user_id'";
        $result = $conn->query($query);
        if ($result) {

            echo "<script>
                Swal.fire('Good job!','Your Security Information is updated','success')</script>";
        } else {
            echo 'error:' . error_reporting();
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function updatePCInfo() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $cpu = filter_input(INPUT_POST, 'cpu');
        $gpu = filter_input(INPUT_POST, 'gpu');
        $ram = filter_input(INPUT_POST, 'ram');
        $storage = filter_input(INPUT_POST, 'storage');
        
        $query = "UPDATE `user_features` SET";
        if (!(empty($cpu)))
            $query .= " `cpu`='$cpu',";
        if (!(empty($gpu)))
            $query .= " `gpu`='$gpu',";
        if (!(empty($ram)))
            $query .= " `ram`='$ram',";
        if (!(empty($storage)))
            $query .= " `storage`='$storage'";
        if(substr($query, -1) == ",")
            $query = substr($query,0, strlen($query) - 1);
        $query .= " WHERE uid='$user_id'";
        if(!empty($query)){
            $result = $conn->query($query);
            $header_process = new header_process();
            $header_process->header("?p=profile");
            if ($result) {
                echo "<script>
                    Swal.fire('Good job!','Your PC Features   updated','success')</script>";
            } else {
                echo "<script>
                   Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
            }
        }
        else{
              echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Dear you have to update one field atleast !'})</script>";
        }
    }

}
