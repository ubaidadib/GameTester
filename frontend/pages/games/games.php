<?php

class games {

    public function display_games($page) {
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
                                <span>Games</span>
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
                    <div class="col-lg-8 p-0">
                        <?php
                        $connect = new connect();
                        $conn = $connect->getConn();
                        $game_query = "SELECT * FROM game ORDER BY gid DESC";
                        $result = $conn->query($game_query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $image_path = $row['image'];
                                $game_id = $row['gid'];
                                ?>
                                <div class="cl-item">
                                    <div class="cl-pic">
                                        <img src="../backend/image/gamesImage/<?= $image_path ?>" alt="<?= $image_path ?>">
                                    </div>
                                    <div class="cl-text">
                                        <h5><a href="index.php?p=choosen_games&amp;gid=<?= $game_id ?>"> <?= $row['game_name'] ?></a></h5>
                                        <ul>
                                            <li>
                                                <i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-clock-o"></i> <?= $row['post_date'] ?></li>
                                            <li><i class="fa fa-usd"> <?= $row['price'] ?></i></li>
                                        </ul>
                                        <p><i class="fa fa-list-alt"> <?= $row['category'] ?></i></p><br><br>
                                        <p>
                                            <?php if (!isset($_SESSION["isUserloggedin"])) { ?>

                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleLogin" >Test Compatability</button>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="index.php?p=show_result&amp;gid=<?= $row['gid'] ?>">
                                                    <button type="button" class="btn btn-danger">Test Compatability</button></a>

                                                <?php
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

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
                </div>
        </section>
        <!-- Categories List Section End -->  


        <?php
    }

    public function test() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $game_id = $_GET['gid'];
        //getting user pc features
        $user_feature = "SELECT * FROM user_features where uid='$user_id' ";
        $user_feature_result = $conn->query($user_feature);



        $user_feature_row = mysqli_fetch_array($user_feature_result);
        $user_cpu = $user_feature_row['cpu'];
        $user_gpu = $user_feature_row['gpu'];
        $user_ram = $user_feature_row['ram'];
        $user_storage = $user_feature_row['storage'];


        //getting game & recommended pc features
        $game_pc_feature = "SELECT * FROM game NATURAL JOIN pc_features where game.recpid=pc_features.id and game.gid='$game_id' ";
        $game_pc_feature_result = $conn->query($game_pc_feature);
        $game_pc_feature_row = mysqli_fetch_array($game_pc_feature_result);
        $game_name = $game_pc_feature_row['game_name'];
        $game_image = $game_pc_feature_row['image'];

        $rec_cpu = $game_pc_feature_row['cpu'];
        $rec_gpu = $game_pc_feature_row['gpu'];
        $rec_ram = $game_pc_feature_row['ram'];
        $rec_storage = $game_pc_feature_row['storage'];
        ?>
        <section class="categories-list-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <?php
                        if (empty($user_cpu) || empty($user_gpu) || empty($user_ram) || empty($user_storage)) {
                            $header_process = new header_process();
                            $header_process->header("index.php?p=profile");
                              ?>
                            <div class="alert alert-danger" role="alert">
                                Sorry ! You have to fill your PC Features before TESTING  .. 
                            </div>
                            <?php
                        }
                        else{
                        if (($user_cpu >= $rec_cpu) && ($user_gpu >= $rec_gpu) && ($user_ram >= $rec_ram) && ($user_storage >= $rec_storage)) {
                            ?>
                            <div class = "alert alert-success" role = "alert">
                                Congratulation ! You Can Run this Game
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Sorry ! Your PC is incompatible.. 
                                Please Check The Recommended Features In The Table Below 
                            </div>
                            <?php
                        }
                        }
                        ?>   
                    </div>
                    <div class="col-1"></div>


                </div>
                <br><br><br>

                <div class="row">
                    <div class="col-4">
                        <img src="../backend/image/gamesImage/<?= $game_image ?>" alt="<?= $game_name ?>" class="img-thumbnail" >
                    </div>
                    <div class="col-8 align-middle " >
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark ">
                                <caption>Recommended PC Features For <?= $game_pc_feature_row['game_name'] ?> Game </caption>
                                <tbody>
                                    <tr>
                                        <th scope="row">CPU</th>
                                        <td><?= $rec_cpu ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">GPU</th>
                                        <td><?= $rec_gpu ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">RAM</th>
                                        <td colspan="2"><?= $rec_ram ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Storage</th>
                                        <td colspan="2"><?= $rec_storage ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }

    public function dispaly_choosen_game() {
        $connect = new connect();
        $conn = $connect->getConn();
        //$user_id = $_SESSION['user_id'];
        $game_id = $_GET['gid'];
        //getting game & recommended pc features
        $game_feature = "SELECT * FROM game where game.gid='$game_id'";
        $game_feature_result = $conn->query($game_feature);
        $game_feature_row = mysqli_fetch_array($game_feature_result);
        $game_name = $game_feature_row['game_name'];
        $game_image = $game_feature_row['image'];
        $game_category = $game_feature_row['category'];
        $game_price = $game_feature_row['price'];
        $game_rate = $game_feature_row['rate'];
        ?>
        <section class="categories-list-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img src="../backend/image/gamesImage/<?= $game_image ?>" alt="<?= $game_name ?>" class="img-thumbnail" >
                    </div>
                    <div class="col-8 align-middle " >
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark ">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td><?= $game_name ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Category</th>
                                        <td><?= $game_category ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td colspan="2"><?= $game_price ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Rating</th>
                                        <td colspan="2"><?= $game_rate ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-4 float-right">
                        <?php if ((isset($_SESSION['isUserloggedin']) && ($_SESSION['isUserloggedin'] == 1))) { ?>
                            <a href="index.php?p=show_result&amp;gid=<?= $game_id ?>">
                                <button type="button" class="btn btn-danger">Test Compatability</button></a>
                        <?php } else {
                            ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TestFailed">
                                Test Compatability
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="TestFailed" tabindex="-1" role="dialog" aria-labelledby="TestFailed" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">SIGN IN BEFORE!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Oops! Sorry Dear You Have to Sign In Before
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="index.php?p=login">
                                                <button type="button" class="btn btn-primary">SIGN IN </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </section>

        <?php
    }

}
?>