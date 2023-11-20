<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>View Order</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>+
    <script language="javascript" type="text/javascript">
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 1000 + ',height=' + 1000 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>
</head>

<body class="fix-header fix-sidebar">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="images/Logo.jpeg" alt="homepage" class="dark-logo" width="115" height="50" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">

                    </ul>Admin

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" style="padding: 0.5rem 0.5rem" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Departments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">All Departments</a></li>
                                <!-- <li><a href="add_category.php">Add village</a></li> -->
                                <li><a href="add_restaurant.php">Add new Departments</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Items</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">All Categories</a></li>
                                <li><a href="add_foodCat.php">Edit Item Category</a></li>
                                <li><a href="add_menu.php">Add Item</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                        <li> <a href="reports.php"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Reports</span></a></li>

                        <li> <a href="item_reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Items Report</span></a></li>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">



            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">


                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">View Order</h4>
                                </div>

                                <?php
                                    // Fetching the user_upd parameter from the URL
                                    $order_date = $_GET['user_upd'];

                                    // Fetching the user's details and orders
                                    $sql = "SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id WHERE users_orders.date='$order_date'";
                                    $query = mysqli_query($db, $sql);

                                    // Fetching the first row for user details
                                    $rows = mysqli_fetch_array($query);
                                    $user_name = $rows['username'];
                                    $status = $rows['status'];
                                    $user_id = $rows['u_id'];

                                    // Start rendering
                                    echo "<div class='container mt-4'>";  // Bootstrap container

                                        echo "<div class='row'>";  // Bootstrap row to contain username and status

                                            // Column for Username
                                            echo "<div class='col-md-6'>";
                                                echo "<p><strong>Username:</strong> $user_name</p>";
                                            echo "</div>";

                                            // Column for Status (aligned to the right on medium screens and above)
                                            echo "<div class='col-md-6 text-md-right'>";
                                                echo "<p><strong>Status:</strong> ";
                                                switch ($status) {
                                                    case "packing":
                                                    case "":
                                                    case "NULL":
                                                        echo "<span class='btn btn-warning btn-sm'>Packing</span>";
                                                        break;
                                                    case "packed":
                                                        echo "<span class='btn btn-info btn-sm'>Ready to pick-up</span>";
                                                        break;
                                                    case "closed":
                                                        echo "<span class='btn btn-primary btn-sm'>Delivered</span>";
                                                        break;
                                                    case "rejected":
                                                        echo "<span class='btn btn-danger btn-sm'>Cancelled</span>";
                                                        break;
                                                }
                                                echo "</p>";
                                            echo "</div>";

                                        echo "</div>";  // Close the Bootstrap row

                                        echo '<div class="table-responsive m-t-20">
                                            <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>';

                                        $totalAmount = 0;
                                        do {
                                            $item = $rows['title'];
                                            $price = $rows['price'];
                                            $quantity = $rows['quantity'];
                                            $total = $price * $quantity;

                                            echo "<tr>
                                                <td>$item</td>
                                                <td>Rs $price</td>
                                                <td>$quantity</td>
                                                <td>Rs $total</td>
                                            </tr>";

                                            $totalAmount += $total;

                                        } while ($rows = mysqli_fetch_array($query));

                                        echo "<tr>
                                            <td colspan='3'><strong>Total Amount:</strong></td>
                                            <td>Rs $totalAmount</td>
                                        </tr>";
                                        echo '</tbody></table></div>';

                                        
                                        // ... Your existing PHP code ...
                                        
                                        echo "<div class='container mt-4'>";  // Bootstrap container
                                        
                                        // ... Your existing PHP code ...
                                        
                                        echo '<div class="d-flex justify-content-center align-items-center mt-4">';  // Flex container for centering buttons
                                        echo '<a href="order_update.php?form_id=' . $order_date . '" class="btn btn-primary btn-sm mr-2">Update Order Status</a>';
                                        echo '<a href="userprofile.php?user_id=' . $user_id . '" class="btn btn-primary btn-sm">View User Details</a>';
                                        echo '<a href="all_orders.php" class="btn btn-danger btn-sm ml-2">Back</a>'; // Add the "Back" button
                                        echo '</div>';  // Close the flex container
                                        
                                        echo "</div>";  // Close the Bootstrap container
                                        
                                        

                                    echo "</div>";  // Close the Bootstrap container
                                ?>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>

    <footer class="footer"> © 2023 - Native Nest </footer>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>