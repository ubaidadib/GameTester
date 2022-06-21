<?php

class contact_us {

    public function message_number() {
        $connect = new connect();
        $conn = $connect->getConn();
        $new_query = "SELECT * FROM `contact_us` WHERE status=0 ";
        $count = 0;
        $result = $conn->query($new_query);
        if ($result->num_rows > 0) {

            while ($row = mysqli_fetch_array($result)) {
                $count++;
            }
            echo $count;
        }
    }

    public function message_list() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * from contact_us";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Message List </a></li>
            </ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
                <h2>Messages</h2>
                <div class="table-responsive" >
                    <table id="dataTable" class="table  table-bordered" cellspacing="0" width="100%" style="padding:10px; margin:5px;">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Sender Name</th>
                                <th>Sender Email</th>
                                <th>Sender Number</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Sender Name</th>
                                <th>Sender Email</th>
                                <th>Sender Number</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody><?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["msg_id"]; ?></td>
                                    <td><?php echo $row["sender_name"] ?></td>
                                    <td><?php echo $row["sender_email"]; ?></td>
                                    <td><?php echo $row["sender_number"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
                                    <td><?php echo $row["message"]; ?></td>
                                    <td > 
                                        <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["msg_id"]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i></a>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="delete_it<?php echo $row["msg_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Do you want to delete this message</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button onclick="delete_from_table('<?php echo "contact_us"; ?>', 'msg_id', '<?php echo $row["msg_id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                        <!-- Delete Modal End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="index.php?p=reply&amp;msg_id=<?= $row["msg_id"]; ?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="reply">
                                            <i class="fas fa-reply" aria-hidden="true"></i></a>
                                    </td>
                                </tr><?php } ?>
                        </tbody>
                    </table>
                </div></div><?php } else {
            ?>	<!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
            </ol> <?php
            echo "<h2>No Messages  Yet! </h2>";
        }
    }

    public function display_reply() {
        $connect = new connect();
        $conn = $connect->getConn();
        $msg_id = $_GET['msg_id'];
        $user_query = "SELECT * from contact_us where msg_id='$msg_id'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <b><?= ucwords($row['sender_name']) ?></b>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><b>Email :</b>  <?= $row['sender_email'] ?> </p>
                            <p class="card-text"><b>Phone Number:</b>  <?= $row['sender_number'] ?></p>
                            <p class="card-text"><b>Message:</b>  <?= $row['message'] ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            <form method="POST" action="#">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="reply" name="reply_msg">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary" name="reply">Submit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
                <div class="col-4"></div>

            </div> 
        </div>









        <?php
        $reply = filter_input(INPUT_POST, "reply");
        if (isset($reply)) {
            $reply_msg = new contact_us();
            $reply_msg->reply();
        }
    }

    public function reply() {
        
        $connect = new connect();
        $conn = $connect->getConn();
        $msg_id = $_GET['msg_id'];
        $user_query = "SELECT * from contact_us where msg_id='$msg_id'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0)
            $row = mysqli_fetch_assoc($result);
        
        $to = $row['sender_email'];
        $sub = 'RE: '. $row['sender_name'];
        $msg = filter_input(INPUT_POST, 'reply_msg');
        $headers = 'From: Game Tester <hamzah-1999@hotmail.com>';
        if (mail($to,$sub,$msg,$headers)){
        echo "Your Mail is sent successfully.";
        $update_status="UPDATE `contact_us` SET `status`='1' WHERE msg_id='$msg_id'";
        $result = $conn->query($update_status);
        
        
        }
        else
            echo "Your Mail is not sent. Try Again.";
    }
}
?>


