<?php

class home {

    public function display_home() {
        $connect = new connect();
        $conn = $connect->getConn();
        ?>

        <!-- Hero Section Begin -->
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 offset-lg-1 offset-xl-2">

                    </div>
                </div>
            </div>
            <div class="hero-slider owl-carousel">
                <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
                <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
                <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Latest Posts Section Begin -->
        <section class="latest-preview-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h5>Latest Posts</h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="lp-slider owl-carousel">
                        <?php
                        $latest_update = "SELECT * FROM game LIMIT 30";
                        $latest_result = $conn->query($latest_update);
                        if ($latest_result->num_rows > 0) {
                            while ($latest_update_row = mysqli_fetch_array($latest_result)) {
                                ?>

                                <div class="col-lg-3">
                                    <a href="index.php?p=choosen_games&amp;gid=<?= $latest_update_row['gid'] ?>">
                                        <div class="lp-item">
                                            <div class="lp-pic set-bg" data-setbg="../backend/image/gamesImage/<?= $latest_update_row['image'] ?>">
                                                <div class="review-loader">
                                                    <div class="loader-circle-wrap">
                                                        <div class="loader-circle">
                                                            <span class="circle-progress" data-cpid="id" data-cpvalue="<?= $latest_update_row['price'] ?>"
                                                                  data-cpcolor="#c20000"></span>
                                                            <div class="review-point"><?= $latest_update_row['price'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="lp-text">
                                                <h6><a href="#"><?= $latest_update_row['game_name'] ?></a></h6>
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i> <?= $latest_update_row['post_date'] ?></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                                <?php
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Posts Section End -->
        <!-- Videos Guide Section Begin -->
        <section class="video-guide-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h5>OUR GAMES</h5>
                        </div>
                    </div>
                </div>
                <div class="tab-elem">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tabs-5" role="tabpanel">

                            <div class="row">
                                <div class="vg-slider owl-carousel">




                                    <div class="col-lg-12">

                                        <div class="row">
                                            <?php
                                            $latest_update = "SELECT * FROM game ORDER BY  post_date LIMIT 2 ";
                                            $latest_result = $conn->query($latest_update);
                                            if ($latest_result->num_rows > 0) {
                                                while ($latest_update_row = mysqli_fetch_array($latest_result)) {
                                                    ?>
                                                    <div class="col-md-6">
                                                        <a href="index.php?p=choosen_games&amp;gid=<?= $latest_update_row['gid'] ?> "
                                                           style="font-size: 30px;font-weight: bold;color: darkblue;">
                                                            <div class="vg-item large-vg set-bg" data-setbg="../backend/image/gamesImage/<?= $latest_update_row['image'] ?>" > 
                                                                <?= $latest_update_row['game_name'] ?>

                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                        <div class="row">
                                            <?php
                                            $latest_update = "SELECT * FROM game LIMIT 3 OFFSET 2 ";
                                            $latest_result = $conn->query($latest_update);
                                            if ($latest_result->num_rows > 0) {
                                                while ($latest_update_row = mysqli_fetch_array($latest_result)) {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <a href= "index.php?p=choosen_games&amp;gid=<?= $latest_update_row['gid'] ?>" style="font-size: 30px;font-weight: bold;color: darkblue;">
                                                            <div class="vg-item set-bg" data-setbg="../backend/image/gamesImage/<?= $latest_update_row['image'] ?>">
                                                                <?= $latest_update_row['game_name'] ?>

                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>


                                </div>
                            </div>



                        </div>






                    </div>






                </div>
            </div>
        </div>
        </section>
        <!-- Videos Guide Section End -->




        <?php
    }

}
?>