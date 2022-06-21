
<?php

class lists {

    public function pc_features_list() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * from pc_features";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">PC Features </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=add_pc_features" style="text-decoration:none;color:red;">Add PC FEATURES</a></li>
            </ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
                <h2>Users</h2>
                <div class="table-responsive" >
                    <table id="dataTable" class="table  table-bordered" cellspacing="0" width="100%" style="padding:10px; margin:5px;">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>CPU</th>
                                <th>GPU</th>
                                <th>RAM</th>
                                <th>STORAGE</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>CPU</th>
                                <th>GPU</th>
                                <th>RAM</th>
                                <th>STORAGE</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody><?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["cpu"]?></td>
                                    <td><?php echo $row["gpu"]; ?></td>
                                    <td><?php echo $row["ram"]; ?></td>
                                    <td><?php echo $row["storage"]; ?></td>
                                    <td > 
                                        <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?=$row["id"]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i></a>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="delete_it<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Do you want to delete this pc feature</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button onclick="delete_from_table('<?php echo "pc_features"; ?>', 'id', '<?php echo $row["id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                        <!-- Delete Modal End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <li class="breadcrumb-item active "> <a href="index.php?p=add_pc_feature" style="text-decoration:none;color:#579E77;">Add PC FEATURE</a></li>
            </ol> <?php
            echo "<h2>No PC FEATURES Yet! </h2>";
        }
    }

    public function user_list() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * from user  where role='0'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Users List </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=add_user" style="text-decoration:none;color:red;">Add Users</a></li>
            </ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
                <h2>Users</h2>
                <div class="table-responsive" >
                    <table id="dataTable" class="table  table-bordered" cellspacing="0" width="100%" style="padding:10px; margin:5px;">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>PhoneNumber</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Phone Number</th>
                                <th>Email </th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody><?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td > 
                                        <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["id"]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i></a>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="delete_it<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Do you want to delete the user</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button onclick="delete_from_table('<?php echo "user"; ?>', 'id', '<?php echo $row["id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                        <!-- Delete Modal End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="index.php?p=appoint_admin&amp;id=<?= $row["id"]; ?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Appoint as Administrator!">
                                            <i class="fas fa-edit" aria-hidden="true"></i></a>
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
                <li class="breadcrumb-item active "> <a href="index.php?p=add_user" style="text-decoration:none;color:#579E77;">Add Users</a></li>
            </ol> <?php
            echo "<h2>No Users Yet! </h2>";
        }
    }

    public function users() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * from user ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                    <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                    </li>
                    <li class="breadcrumb-item active ">Users </li>
                </ol>   
                <div class="table-responsive" >
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>PhoneNumber</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone Number</th>

                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody><?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td>

                                    <td > 
                                        <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["id"]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i></a>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="delete_it<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Do you want to delete the user</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button onclick="delete_from_table('<?php echo "user"; ?>', 'id', '<?php echo $row["id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                        <!-- Delete Modal End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr><?php } ?>
                        </tbody>
                    </table>
                </div></div><?php } else {
            ?>  <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
            </ol> <?php
            echo "<h2>No Users Yet! </h2>";
        }
    }

    public function admin() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * from user  where role='1'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
                <h2>Administrators</h2>
                <!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                    <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                    </li>
                    <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Administrator List </a></li>
                </ol>
                <div class="table-responsive" >
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="padding:10px; margin:5px;">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>PhoneNumber</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Email </th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody><?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td > 
                                        <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["id"]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i></a>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="delete_it<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Do you want to delete the user</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button onclick="delete_from_table('<?php echo "user"; ?>', 'id', '<?php echo $row["id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                        <!-- Delete Modal End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr><?php } ?>
                        </tbody>
                    </table>
                </div></div><?php } else {
            ?>  <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
            </ol> <?php
            echo "<h2>No Administrator Yet! </h2>";
        }
    }

    public function admin_list() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * from user  where role='1'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?>
            <div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                    <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                    </li>
                    <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Admin List </a></li>
                    <li class="breadcrumb-item active "> <a href="index.php?p=add_admin" style="text-decoration:none;color:#ff0000;">Add Administrator  </a></li>
                </ol>

                <div class="table-responsive" >
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Email </th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody><?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>

                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td >   

                                        <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["id"]; ?>">
                                            <i class="fas fa-trash" aria-hidden="true"></i></a>
                                        <!-- Logout Modal-->
                                        <div class="modal fade" id="delete_it<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Do you want to delete the user</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button onclick="delete_from_table('<?php echo "user"; ?>', 'id', '<?php echo $row["id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="index.php?p=appoint_user&amp;id=<?= $row["id"]; ?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Appoint as Public User!">
                                            <i class="fas fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                </tr><?php } ?>
                        </tbody>
                    </table>
                </div></div><?php } else {
            ?><!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="index.php?p=add_admin" style="text-decoration:none;color:#007CF8;">Add Administrator  </a></li>
            </ol><?php
            echo "<h2>No Administrator Yet! </h2>";
        }
    }

}
