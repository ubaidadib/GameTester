<?php

class contact_us {

    public function display_contact_us($page) {
        ?>    <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg spad" data-setbg="img/breadcrumb-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <h3>Contact us</h3>
                            <div class="bt-option">
                                <a href="../index.php">Home</a>
                                <span>Contact</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Contact Section Begin -->
        <section class="contact-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-text">
                            <div class="contact-title">
                                <h3>Contact us</h3>

                            </div>
                            <div class="contact-form">
                                <div class="dt-leave-comment">
                                    <form action="#" method="POST">
                                        <div class="input-list">
                                            <input type="text" placeholder="Name" name="sender_name">
                                            <input type="text" placeholder="Email" name="sender_email">
                                            <input type="text" placeholder="Phone number" name="sender_number">
                                        </div>
                                        <textarea placeholder="Message" name="message"></textarea>
                                        <button type="submit" name="send">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section End -->
        <?php
        $send_btn = filter_input(INPUT_POST, "send");
        if (isset($send_btn)) {
            $new_msg = new contact_us();
            $new_msg->send();
        }
    }

    public function send() {

        $connect = new connect();
        $conn = $connect->getConn();
        $sender_name = filter_input(INPUT_POST, 'sender_name');
        $sender_email = filter_input(INPUT_POST, 'sender_email');
        $sender_number = filter_input(INPUT_POST, 'sender_number');
        $message = filter_input(INPUT_POST, 'message');
        if ($message &&$sender_number && $sender_email && $sender_name && $sender_name) {

        $msg_query = "INSERT INTO `contact_us`(`msg_id`, `sender_name`, `sender_email`, `sender_number`, `message`)
        VALUES (NULL,'$sender_name','$sender_email','$sender_number','$message')";
        $msg_result = $conn->query($msg_query);
        
            echo "<script>
            Swal.fire('Good job!', 'Your Message has been sended', 'success')</script>";
        } else {
            echo "<script>
            Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})</script>";
        }
    }

   

}
?>