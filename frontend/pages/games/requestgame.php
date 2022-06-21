<?php

class requestgame {

    public function display_request_games($page) {
        ?> 
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg spad" data-setbg="img/breadcrumb-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <h3>Games:</h3>
                            <div class="bt-option">
                                <a href="#">Home</a>
                                <span>REQUEST GAME</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Games list Section Begin -->
        <section class="categories-list-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 p-0"></div>
                    <!--ADD REQUEST POST BEGIN   -->
                    <div class="col-lg-6 p-0">
                        <?php
                        $display_add_post = new requestgame();
                        $display_add_post->display_add_post();
                        ?>

                        <?php
                        $display_post = new requestgame();
                        $display_post->display_user_post();
                        ?>



                    </div>
                    <!--ADD REQUEST POST END   -->







                    <!--SIDE BAR NOTIFICATIONS BEGIN  -->
                    <div class="col-lg-4 col-md-7 p-0">
                        <div class="sidebar-option">

                            <div class="hardware-guides">
                                <div class="section-title">
                                    <h5>Latest Games</h5>
                                </div>

                                <?php
                                $connect = new connect();
                                $conn = $connect->getConn();
                                $latest_game_query = "SELECT * FROM game ORDER BY gid DESC LIMIT 5 ";
                                $latest_result = $conn->query($latest_game_query);
                                if ($latest_result->num_rows > 0) {
                                    while ($latest_row = mysqli_fetch_array($latest_result)) {
                                        $image_path = $latest_row['image']
                                        ?>
                                        <div class="trending-item">
                                            <div class="ti-pic">
                                                <img src="../backend/image/gamesImage/<?= $image_path ?>" alt="<?= $image_path ?>" width="70" height="70">
                                            </div>
                                            <div class="ti-text">
                                                <h6><a href="#"><?= $latest_row['game_name'] ?></a>
                                                </h6>
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i> <?= $latest_row['post_date'] ?></li>
                                                    <li><i class="fa fa-usd"> <?= $latest_row['price'] ?></i></li>
                                                </ul>
                                            </div>

                                        </div>

                                        <?php
                                    }
                                }
                                ?>
                            </div>


                            <div class="best-of-post">
                                <div class="section-title">
                                    <h5>Best of</h5>
                                </div>
                                <div class="bp-item">
                                    <div class="bp-loader">
                                        <div class="loader-circle-wrap">
                                            <div class="loader-circle">
                                                <span class="circle-progress-1" data-cpid="id-1" data-cpvalue="95"
                                                      data-cpcolor="#c20000"></span>
                                                <div class="review-point">9.5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bp-text">
                                        <h6><a href="#">This gaming laptop with a GTX 1660...</a></h6>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i> Aug 01, 2019</li>
                                            <li><i class="fa fa-comment-o"></i> 20</li>
                                        </ul>
                                    </div>
                                </div>


                            </div>

                            <div class="social-media">
                                <div class="section-title">
                                    <h5>Social media</h5>
                                </div>
                                <ul>
                                    <li>
                                        <div class="sm-icon"><i class="fa fa-facebook"></i></div>
                                        <span>Facebook</span>
                                        <div class="follow">1,2k Follow</div>
                                    </li>
                                    <li>
                                        <div class="sm-icon"><i class="fa fa-twitter"></i></div>
                                        <span>Twitter</span>
                                        <div class="follow">1,2k Follow</div>
                                    </li>
                                    <li>
                                        <div class="sm-icon"><i class="fa fa-youtube-play"></i></div>
                                        <span>Youtube</span>
                                        <div class="follow">2,3k Subs</div>
                                    </li>
                                    <li>
                                        <div class="sm-icon"><i class="fa fa-instagram"></i></div>
                                        <span>Instagram</span>
                                        <div class="follow">2,6k Follow</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--SIDE BAR NOTIFICATIONS END  -->
                </div>
        </section>
        <!-- Categories List Section End -->  


        <?php
    }

    public function display_add_post() {
        ?><div class="card shadow p-4 mb-4 bg-light text-dark" >
        <?php
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from user where id='" . $user_id . "'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        ?>
            <div class="card-header" style="height: 30px;padding: 5px;font-size: 14px;">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;<b>Create Post </b></div>
            <div class="card-body text-primary">
                <h5 class="card-title" style="margin-top: 15px;" >
                    <a  data-toggle="modal" data-target="#Post" style=" color: lightgray;font-size: 15px;text-decoration: none;">

                        <i class="fa fa-user-circle fa-2x" aria-hidden="true"> ASK FOR YOUR GAME ,<?= ucwords($row['fname']); ?>?</i> 
                    </a>
                </h5>
            </div>
        </div>
        <br><br>
        <!-- The Modal -->
        <form method="POST" action="#">
            <div class="modal" id="Post">
                <div class="modal-dialog  ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Creating Post </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->

                        <div class="modal-body" style="color: lightgrey;font-size: 15px;">

                            <div class="row">
                                <div class="col-md-6 text-dark">
                                    <label for="post_title">Post Title:</label></div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">   
                                    <input type="text" class="form-control" id="post_title" name="post_title"></div>

                            </div><br>
                            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Whats's on your mind ,<?= ucwords($row['fname']); ?>?" name="post_content"></textarea><br>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning" name="share_btn" >
                                <i class="fa fa-paper-plane-o" aria-hidden="true" >  SHARE</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php
        $share_btn = filter_input(INPUT_POST, "share_btn");
        if (isset($share_btn)) {
            $new_post = new requestgame();
            $new_post->add_post();
        }
    }

    public function add_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $publisher_id = $_SESSION['user_id'];
        $post_content = filter_input(INPUT_POST, 'post_content');
        $post_title = filter_input(INPUT_POST, 'post_title');

        date_default_timezone_set("Asia/Beirut");
        $post_date = date("Y-m-d H:i:s");
//echo 'Date '.$post_date;

        $new_post_query = "INSERT INTO `posts`(`post_id`, `publisher_id`, `post_title`, `post_content`, `publish_date`) VALUES (NULL,'$publisher_id','$post_title','$post_content','$post_date')";
        $new_result = $conn->query($new_post_query);

        if ($new_result) {
            $header_process = new header_process();
            $header_process->header("index.php?p=requestgame");
        } else {

            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_user_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
       // $publisher_name="SELECT username FROM user  JOIN posts WHERE user.id=posts.publisher_id ";
        //$result_name= $conn->query($publisher_name);
        $query = "SELECT * FROM posts  JOIN user WHERE user.id=posts.publisher_id ORDER BY publish_date DESC ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            ?>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="card border-info mb-3" style="max-width: 100%">
                    <div class="card-header bg-transparent border-info"> 
                        <i class="fa fa-user-circle" aria-hidden="true"
                           style="font-size: 24px;"
                           
                           ><?= ucwords($row['username']) ?></i>
                        

                       <?php if ($row['publisher_id']==$user_id) { ?>
                        <div class="float-right">
                            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#deleteModal">
                                <i class="fa fa-trash-o" aria-hidden="true"></i></a>

                            <a href="" class="btn btn-default" data-toggle="modal" data-target="#edit_Post">
                                <i class="fa fa-edit" aria-hidden="true"></i></a>
                            <!-- The Modal -->
                            <form method="POST" action="#">
                                <div class="modal" id="edit_Post">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Post </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->

                                            <div class="modal-body" style="color: lightgrey;font-size: 15px;">

                                                <div class="row">
                                                    <div class="col-md-6 text-dark">
                                                        <label for="post_title">Post Title:</label></div>
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">   
                                                        <input type="text" class="form-control" id="post_title" name="post_title" value="<?= $row["post_title"]; ?>">
                                                        <input type="hidden" value="<?= $row["post_id"]; ?>" name="post_id">
                                                    </div>

                                                </div><br>
                                                <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="<?= $row["post_content"]; ?>" name="post_content"></textarea><br>

                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning" name="edit_btn" >
                                                    <i class="fa fa-paper-plane-o" aria-hidden="true" >  EDIT</i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <br><br>

                       <?php }?>



                        <div class="float-right">
                            <i class="fa fa-clock-o" aria-hidden="true"> <?= $row['publish_date']; ?> </i> </div><br>   


                    </div>
                    <div class="card-body text-success">
                        <h5 class="card-title"><?php echo $row['post_title']; ?> </h5>
                        <p class="card-text text-dark"><?= $row['post_content'] ?></p>

                    </div>
                    <div class="card-footer bg-transparent border-info ">
                        <p class="card-text text-dark">PLEASE CONTACT ME ON THIS PHONE NUMBER : <b style="color: blue"><?= $row['phone'] ?></b></p>
                    </div>
                </div>

                <form method="POST" action="#">
                    <!-- DELETE POST Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deletePost" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deletePost">DELETE POST</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are You Sure To Delete This Post !! ..
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="delete_btn">Delete </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $row['post_id'] ?>" name="post_id">
                    
                    
                </form>
                <?php
                      
            }
        }

        $edit_btn = filter_input(INPUT_POST, "edit_btn");
        $del_btn = filter_input(INPUT_POST, "delete_btn");
        if (isset($edit_btn)) {
            $edit_btn = new requestgame();
            $edit_btn->edit_post();
        }
        if (isset($del_btn)) {
            $del_btn = new requestgame();
            $del_btn->delete_post();
        }
    }

    public function edit_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $publisher_id = $_SESSION['user_id'];
        $post_content = filter_input(INPUT_POST, 'post_content');
        $post_title = filter_input(INPUT_POST, 'post_title');
        $post_id = filter_input(INPUT_POST, 'post_id');
        date_default_timezone_set("Asia/Beirut");
        $post_date = date("Y-m-d");

        $edit_post_query = "UPDATE `posts` SET `post_title`='$post_title',`post_content`='$post_content',`publish_date`='$post_date' WHERE post_id='$post_id'";
        $new_result = $conn->query($edit_post_query);

        if ($new_result) {
            $header_process = new header_process();
            $header_process->header("index.php?p=requestgame");
        } else {

            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function delete_post() {
        
        $connect = new connect();
        $conn = $connect->getConn();
        $post_id = filter_input(INPUT_POST, 'post_id');
        
        $publisher_id=$_SESSION['user_id'];
        
        $edit_post_query = "DELETE FROM `posts`  WHERE post_id='$post_id' AND publisher_id='$publisher_id'";
        $new_result = $conn->query($edit_post_query);

        if ($new_result) {
            $header_process = new header_process();
            $header_process->header("index.php?p=requestgame");
        } else {

            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

}
