<?php

class login {

    public function display_login() {
        ?> 
        <!-- Login  Section Begin -->
        <section style="background-color: black">
            <div class="container login-text">
                <div class="row">
                    <div class="col-sm">
                        <div class="login-title">
                            <h2>Sign in </h2>
                            <p>Fill out the form below </p>
                            <form action="#" method="POST" class="login-form">
                                <div class="sf-input-list">
                                    <input type="text" class="input-value" placeholder="User Name" name="username">
                                    <input type="password" class="input-value" placeholder="Password" name="password">
                                </div>

                                <button type="submit" name="user_login"><span>Sign In</span></button>
                            </form>
                        </div>  




                    </div>
                    <div class="col-sm">
                    </div>
                    <div class="col-sm">
                        <div class="login-title">
                            <h2>Sign Up </h2>
                            <p>Fill out the form below to get access to our website  </p>
                            <form action="#" method="POST" class="login-form">
                                <div class="sf-input-list">
                                    <input type="text" class="input-value" placeholder="First name" name="fname" required>
                                    <input type="text" class="input-value" placeholder="Last name" name="lname" required>
                                    <input type="text" class="input-value" placeholder="User Name" name="username" required>
                                    <input type="password" class="input-value" placeholder="Password" name="password" required>
                                    <input type="password" class="input-value" placeholder="Repeat Password" name="Rpassword" required>
                                    <input type="text" class="input-value" placeholder="Email" name="email" required>
                                    <input type="text" class="input-value" placeholder="Phone number (00-000000)" name="phonenumber" pattern="^\d{2}-\d{6}" required>
									

								
								
                                </div>

                                <br><br>
                                <button type="" name="user_signup"><span>Sign Up</span></button>
                            </form>
							<script>
							
							
							</script>

                        </div>
                    </div>
                </div>
            </div>

        </section>


        <!-- Login Section End -->
        <?php
        $user_login = filter_input(INPUT_POST, "user_login");
        $user_signup = filter_input(INPUT_POST, "user_signup");

        if (isset($user_login)) {
            $login = new login();
            $login->Login_page(); //execute function login to sign in 
        }
        if (isset($user_signup)) {
            $signup = new login();
            $signup->Signup(); //execute function signup 
        }
    }

    public function Login_page() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_name = filter_input(INPUT_POST, 'username');
        $user_password = filter_input(INPUT_POST, 'password');
      
        $user_query = "SELECT * FROM user WHERE username='" . $user_name . "' AND password='" . $user_password . "'";
        $result = $conn->query($user_query);
        if ($result->num_rows == 1) {
            while ($row = mysqli_fetch_array($result)) {
                $user_id = $row['id'];
                $user_role = $row['role'];
                $fname = ucwords($row['fname']);
                $fullname = $row['fname'] . ' ' . $row['lname'];
            }

            switch ($user_role) {
                case '0':
                    session_start();
                    $_SESSION['isUserloggedin'] = 1;
                    $_SESSION["fname"] = $fname;
                    $_SESSION["user_id"] = $user_id;
                    $_SESSION['fullname'] = $fullname;
                    $header_process = new header_process();
                    $header_process->header("index.php?p=profile");
                    
                    
                    
                    break;
                case '1':
                    session_start();
                    $_SESSION["isAdminloggedin"] = 1;
                    $_SESSION["admin_name"] = $fname;
                    $_SESSION["admin_id"] = $user_id;
                    $_SESSION['fullname'] = $fullname;
                    $header_process = new header_process();
                    $header_process->header("../backend/index.php");
                    break;

                default:
                    break;
            }
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Username or Password is Incorrect.'})</script>";
        }
        
    }

    public function Signup() {
        $connect = new connect();
        $conn = $connect->getConn();
        $f_name = filter_input(INPUT_POST, 'fname');
        $l_name = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $user_name = filter_input(INPUT_POST, 'username');
        $user_password = filter_input(INPUT_POST, 'password');
        $user_Rpassword = filter_input(INPUT_POST, 'Rpassword');
        $user_nb = filter_input(INPUT_POST, 'phonenumber');
        //$password = md5($user_password);
        if($user_password==$user_Rpassword ){

        $new_user_query = "INSERT INTO `user`(`id`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `role`)"
                . "VALUES (NULL,'" . $f_name . "', '" . $l_name . "', '" . $user_name . "', '" . $user_password . "','$email', '" . $user_nb . "','0')";
        $new_result = $conn->query($new_user_query);
        if ($new_result) {
            echo "<script>
                Swal.fire('Good job!','Now Your are ready to try our Game Tester Website.. ','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }
    else {
        echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Passwords are not same!'})</script>";
    }
    }
    

    public function logout() {
        $header_process = new header_process();
        session_unset();
        // destroy the session 
        session_destroy();
        $header_process->header("index.php");
    }

}
?>
