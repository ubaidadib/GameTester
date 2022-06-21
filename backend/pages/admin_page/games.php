<?php

class game {

    public function display_game_area() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM game";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?><nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?p=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Available Games !</a></li>
                    <li class="breadcrumb-item"><a href="index.php?p=add_game">Add Game !</a></li>
                </ol>
            </nav>
            <div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
                <div class="row" style="margin:10px;">
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="col-md-4">
                            <div class="card  border-info " style="width: 18rem;">
                                <div class="card-img-top" style="padding: 5px;">
                                    <?php
                                    if ($row['image'] != null) {

                                        echo "<img src=\"../backend/image/gamesImage/" . $row['image'] . "\"
                                alt=\"" . $row['game_name'] . "Poster\"  class=\"\" height=\"300px;\"width=\"100%;\" name=\"output\">";
                                    }
                                    ?>
                                </div>

                                <div class="card-body text-primary">
                                    <h1 class="text-center" style="color: black;font-size: 33px;"><?php echo ucwords($row['game_name']); ?></h1><br>
                                    <p class="" style="color: black;"><b>Categories:</b> <?php echo $row['category']; ?></p>
                                    <p class="" style="color: black;"><b>Price:</b> <?php echo $row['price']; ?> $</p>
                                </div>
                                <div class="card-footer text-muted text-center">
                                    <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?= $row['gid']; ?>">
                                        <i class="fas fa-trash" aria-hidden="true"></i></a>    
                                    <a href="index.php?p=edit_game&amp;gid=<?= $row['gid'] ?>" class="btn btn-default btn-lg">
                                        <i class="fas fa-edit" aria-hidden="true"></i></a> 
                                    <div class="modal fade" id="delete_it<?php echo $row["gid"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Do you want to delete this game!</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button onclick="delete_from_table('<?php echo "game"; ?>', 'gid', '<?= $row['gid']; ?>')" class="btn btn-primary" >Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    <?php } ?>
                    <hr>
                </div>

            </div><?php } else { ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="index.php?p=display_add_game" style="text-decoration:none;color:red;">Add Game </a>
                </li>

            </ol><?php
            echo "<h2>No Games Yet! </h2>       ";
        }
    }

    public function display_add_game() {
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=show_games">Home</a>
            </li><li class="breadcrumb-item active">Add Game</li>
        </ol>
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="form-group">
                <img id="output" width="250" />
            </div> 
            <br><br>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Game Title" name="game_title">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Game Category such as : action , adventure , sport etc .." name="game_category">
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Game Price " name="game_price" >
                </div>
                <div class="col">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="uploadedImage" 
                               accept="image/*"  onchange="loadFile(event)" >
                        <label class="custom-file-label" for="customFile">choose image</label>
                    </div>
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <select class="custom-select" name="features">
                            <option selected>Choose CPU...</option>
                            <?php
                            $connect = new connect();
                            $conn = $connect->getConn();
                            $user_query = "SELECT * FROM `pc_features` WHERE 1";
                            $result = $conn->query($user_query);
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?= $row['id'] ?>"><?php
                                        echo $row['cpu'];
                                        echo ' ';
                                        echo $row['gpu'];
                                        echo ' ';
                                        echo $row['ram'];
                                        echo ' ';
                                        echo $row['storage']
                                        ?></option>
                                    <?php
                                }
                            }
                            ?>

                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div>
                    </div>
                </div>
                <div class="col ">
                    <button class="btn btn-primary float-right" type="submit"  name = "publish_btn">Publish Game </button>

                </div>
            </div>
            <br><br>

        </form>


        <script>
            var loadFile = function (event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <?php
        $publish_btn = filter_input(INPUT_POST, "publish_btn");
        if (isset($publish_btn)) {
            $new_game = new game();
            $new_game->add_game();
        }
    }

    public function add_game() {
        $connect = new connect();
        $conn = $connect->getConn();
        $game_title = filter_input(INPUT_POST, 'game_title');
        $game_category = filter_input(INPUT_POST, 'game_category');
        $game_price = filter_input(INPUT_POST, 'game_price');
        $game_features = filter_input(INPUT_POST, 'features');
        $game_rate = filter_input(INPUT_POST, 'rate');


        //uploaded Game image
        $n = $_FILES['uploadedImage']['name'];
        $t = $_FILES['uploadedImage']['tmp_name'];
        $path = $n;
        $post_date = date("Y-m-d");


        $new_game_query = "INSERT INTO `game`(`gid`, `game_name`, `category`, `price`, `post_date`, `rate`, `image`, `recpid`)
        VALUES (NULL,'$game_title','$game_category','$game_price','$game_rate','$post_date','$path','$game_features')";
        $new_result = $conn->query($new_game_query);
        if ($new_result) {
            move_uploaded_file($t, "../backend/image/gamesImage/" . $n);
            echo "<script>
            Swal.fire('Good job!', 'Your game is added', 'success')</script>";
        } else {
            echo "<script>
            Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})</script>";
        }
    }

    public function display_edit_game() {
        $connect = new connect();
        $conn = $connect->getConn();
        $game_id = $_GET['gid'];
        $new_query = "select * from game where gid=$game_id";
        $result = $conn->query($new_query);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=show_games" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">Update Game Details </a></li>
            </ol><div class="container-fluid">
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php
                            $row = mysqli_fetch_array($result);
                            if ($row['image'] != null) {
                                echo "<img src=\"..\backend\image\gamesImage/" . $row['image'] . "\"
                                alt=\"Image\" style=\"padding:3px;height:200px;width:200px;\" id=\"output\">";
                            }
                            ?>
                        </div>

                    </div>
                    <br><br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><b>Game Title </b></label>
                            <input type="text" value="<?= $row['game_name'] ?>" class="form-control" name="game_title" >
                        </div>
                        <div class="form-group col-md-6">
                            <label ><b>Game Price </b></label>
                            <input type="text" value="<?= $row['price'] ?>"  class="form-control" name="game_price"  >
                        </div>
                    </div>
                    <br><br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label ><b>Game Category</b></label>
                            <input type="text" value="<?= $row['category'] ?>" class="form-control" name="game_category">
                        </div>
                        <div class="form-group col-md-6">
                            <label ><b>Game Poster</b></label>
                            <div class="custom-file">

                                <input type="file" class="custom-file-input" id="customFile" name="uploadedImage" 
                                       accept="image/*"  onchange="loadFile(event)"  value="<?= $row['image']; ?>">
                                <label class="custom-file-label" for="customFile">choose image</label>

                                <input type="hidden" name="game_id" value="<?= $row['gid']; ?>" />

                            </div>
                        </div> 
                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col">
                            
                        <div class="col ">

                            <button class="btn btn-primary float-right" type="submit"  name = "update_info">UPDATE Game Details </button>

                        </div>
                    </div>


                </form></div>

            <script>
                var loadFile = function (event) {
                    var image = document.getElementById('output');
                    image.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>
            <?php
            $game_update = filter_input(INPUT_POST, "update_info");
            if (isset($game_update)) {
                $new_game = new game();
                $new_game->update_game_info();
            }
        }
    }

    public function update_game_info() {
        $connect = new connect();
        $conn = $connect->getConn();
        $game_id = $_POST['game_id'];
        $new_title = filter_input(INPUT_POST, 'game_title');
        $new_price = filter_input(INPUT_POST, 'game_price');
        $new_category = filter_input(INPUT_POST, 'game_category');
        $new_rate= filter_input(INPUT_POST, 'rate');


        $n = $_FILES['uploadedImage']['name'];
        $t = $_FILES['uploadedImage']['tmp_name'];

        $path = $n;

        $new_post_date = date("Y-m-d");

        $query = "UPDATE `game` SET `game_name`='$new_title',`category`='$new_category',`price`='$new_price',`rate`='$new_rate',`post_date`='$new_post_date',`image`='$path' WHERE gid='$game_id'";
        $result = $conn->query($query);
        if ($result) {
            move_uploaded_file($t, "../backend/image/gamesImage/" . $n);
            echo "<script>
                    Swal.fire('Good job!','Your game details  is updated','success')</script>";
        } else {
            echo $conn->error;
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_pc_features() {
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=home">Home</a>
            </li><li class="breadcrumb-item active">Add PC Feature</li>
        </ol>
        <form method="POST" action="#" enctype="multipart/form-data">

            <br><br>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="CPU" name="cpu">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="GPU" name="gpu">
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="RAM" name="ram" >
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="storage" name="storage" >

                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                </div>
                <div class="col ">
                    <button class="btn btn-primary float-right" type="submit"  name = "add_features">ADD FEATURES </button>

                </div>
            </div>
            <br><br>

        </form>

        <?php
        $add_features = filter_input(INPUT_POST, "add_features");
        if (isset($add_features)) {
            $new_pc_feature = new game();
            $new_pc_feature->add_features();
        }
    }

    public function add_features() {
        $connect = new connect();
        $conn = $connect->getConn();
        $cpu = filter_input(INPUT_POST, 'cpu');
        $gpu = filter_input(INPUT_POST, 'gpu');
        $ram = filter_input(INPUT_POST, 'ram');
        $storage = filter_input(INPUT_POST, 'storage');


        $new_features_query = "INSERT INTO `pc_features`(`id`, `cpu`, `gpu`, `ram`, `storage`) VALUES (NULL,'$cpu','$gpu','$ram','$storage')";
        $new_result = $conn->query($new_features_query);
        if ($new_result) {

            echo "<script>
            Swal.fire('Good job!', 'Your PC Features ADDED', 'success')</script>";
        } else {
            echo "<script>
            Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})</script>";
        }
    }

}
