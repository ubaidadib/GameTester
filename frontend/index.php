<?php
include 'config/included_functions.php';
$ob_start = ob_start();
$session_start = session_start();
$ob_end_flush = ob_end_flush();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Amin Template">
        <meta name="keywords" content="Amin, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Game Tester </title>
        <link rel="icon" href="img/icontabbar.png">


        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/barfiller.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/login.css" type="text/css">
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Humberger Menu Begin -->
        <div class="humberger-menu-overlay"></div>
        <div class="humberger-menu-wrapper">
            <div class="hw-logo">
                <a href="#"><img src="img/f-logo.png" alt=""></a>
            </div>
            <div class="hw-menu mobile-menu">
                <ul>
                    <li class="active"><a href="../index.php"><span>Home</span></a></li>

                    <li>
                        <a href="index.php?p=games"><span>Games</span></a>
                    </li>
                    <li><a href="#"><span>Request Game </span></a></li>
                    <li><a href="index.php?p=contact"><span>Contact</span></a></li>

                </ul>
            </div>
            <div id="mobile-menu-wrap"></div>
            <div class="hw-copyright">
                Copyright © 2020 Rashed Hasan. All rights reserved
            </div>
            <div class="hw-social">
                <a href="https://www.facebook.com/FexorX-106005011085248/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.twitch.tv/fex0rx"><i class="fa fa-twitch"></i></a>
                                <a href="https://www.youtube.com/channel/UCP1Jc5GOqwqDXyyH8_XEXug?view_as=subscriber"><i class="fa fa-youtube-play"></i></a>
                                <a href="https://www.instagram.com/fexorx0/"><i class="fa fa-instagram"></i></a>
            </div>

        </div>
        <!-- Humberger Menu End -->

        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="ht-options">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="ht-widget">
                                <ul>
                                    <?php if (!(isset($_SESSION['isUserloggedin']) && ($_SESSION['isUserloggedin'] == 1))) { ?>
                                        <li class="<?php
                                        if ($page == "login") {
                                            echo "active";
                                        }
                                        ?>" ><a href="index.php?p=login"><i class="fa fa-sign-in"></i> Log In / Sign Up</a></li> 


                                    <?php } if (isset($_SESSION["isUserloggedin"])) { ?>
                                        <li class="<?php
                                        if ($page == "logout") {
                                            echo "active";
                                        }
                                        ?>" ><a href="index.php?p=logout"> logout   <i class="fa fa-sign-in"></i> </a></li>
                                        <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="ht-social">
                                <a href="https://www.facebook.com/FexorX-106005011085248/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.twitch.tv/fex0rx"><i class="fa fa-twitch"></i></a>
                                <a href="https://www.youtube.com/channel/UCP1Jc5GOqwqDXyyH8_XEXug?view_as=subscriber"><i class="fa fa-youtube-play"></i></a>
                                <a href="https://www.instagram.com/fexorx0/"><i class="fa fa-instagram"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="../index.php"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-options">
                <div class="container">
                    <div class="humberger-menu humberger-open">
                        <i class="fa fa-bars"></i>
                    </div>



                    <?php if ((isset($_SESSION['isUserloggedin']) && ($_SESSION['isUserloggedin'] == 1))) {
                        ?>
                        <div class="nav-search search-">
                            <a href="index.php?p=profile" style="color: white ;text-decoration:none" >

                                <i class="fa fa-user-circle-o ">
                                    Welcome  <?= ucwords($_SESSION['fname']) ?> 

                                </i>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="nav-menu">
                        <ul>
                            <li class="active"><a href="index.php?p=home"><span>Home</span></a></li>

                            <li>
                                <a href="index.php?p=games" ><span>Games</span></a>
                            </li>
                            <li>



                                <?php if ((isset($_SESSION['isUserloggedin']) && ($_SESSION['isUserloggedin'] == 1))) {
                                    ?>
                                    <a href="index.php?p=requestgame"><span>Request Game </span></a>
                                <?php } else { ?>
                                    <a data-toggle="modal" href="#requestgame"><span>Request Game </span></a>

                                <?php } ?>



                            </li>
                            <li><a href="index.php?p=contact"><span>Contact</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
        <!-- Switch pages begin   -->
        <section class="breadcrumb-section">
            <?php
            $switch_pages = new switch_pages();
            $switch_pages->pages($page);
            ?>
        </section>

        <!-- Switch pages end    -->



        <!-- Footer Section Begin -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-about">
                            <div class="fa-logo">
                                <a href="#"><img src="img/f-logo.png" alt=""></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua lacus vel facilisis.</p>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6"></div>
                    <div class="col-lg-4 col-md-6">
                        <div class="tags-cloud">
                            <div class="footer-about">

                                <div class="fa-social">
                                    <a href="https://www.facebook.com/FexorX-106005011085248/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.twitch.tv/fex0rx"><i class="fa fa-twitch"></i></a>
                                    <a href="https://www.youtube.com/channel/UCP1Jc5GOqwqDXyyH8_XEXug?view_as=subscriber"><i class="fa fa-youtube-play"></i></a>
                                    <a href="https://www.instagram.com/fexorx0/"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="copyright-area">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ca-text">
                                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block" style="font-size:15px;">Copyright © 2020
                                    <a href="#">Game Tester</a>. All rights reserved.</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Modal Login Begin -->
        <div class="modal fade" id="exampleLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sign in Reminder</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Oop's , dear client you have to Sign in Before Testing  ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="index.php?p=login"><button type="button" class="btn btn-primary">Sign in </button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Login END -->

        <!-- Test model Begin -->
        <div class="modal fade" id="testCompatability" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Test model end -->






        <!-- REQUEST GAME  Modal -->
        <div class="modal fade" id="requestgame" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">SIGN IN </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        OOP's , DEAR CLIENT YOU HAVE TO SIGN IN BEFORE 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="index.php?p=login">
                            <button type="button" class="btn btn-primary">SIGN IN</button></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Js Plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/circle-progress.min.js"></script>
        <script src="js/jquery.barfiller.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

</html>