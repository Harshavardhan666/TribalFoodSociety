<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/x-icon" href="images/tribes2.ico">
        <title>My Orders</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <style>
            a {
                transition: all 0.3s ease;
                padding: 8px;
                text-decoration: none;
                color: #bbbbbb;
            }

            a:hover {
                color: #0000FF;
            }

            .rowss {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .col-xs-12,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-1 {
                box-sizing: border-box;
                flex: 1;
                padding: 10px;
            }

            .address,
            .additional-info {
                text-align: center;
            }

            .no-hover:hover {
                /* Disable hover effects */
                background-color: transparent !important;
                /* You can set this to any desired style */
                /* Add any other style adjustments as needed */
            }
        </style>
        <style type="text/css" rel="stylesheet">
            .nav-item.dropdown:hover .dropdown-menu {
                display: block;
            }

            .dropdown-item:hover {
                background-color: #abcdef;
            }

            .indent-small {
                margin-left: 5px;
            }

            .form-group.internal {
                margin-bottom: 0;
            }

            .dialog-panel {
                margin: 10px;
            }

            .datepicker-dropdown {
                z-index: 200 !important;
            }

            .icon {
                font-size: 20px;
            }

            .panel-body {
                background: #e5e5e5;
                /* Old browsers */
                background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* FF3.6+ */
                background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
                /* Chrome,Safari4+ */
                background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* Chrome10+,Safari5.1+ */
                background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* Opera 12+ */
                background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* IE10+ */
                background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
                /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
                font: 600 15px "Open Sans", Arial, sans-serif;
            }

            label.control-label {
                font-weight: 600;
                color: #777;
            }

            #footer-bottom {
                background: #343A40;
                color: #686868;
                height: 50px;
                width: 100%;
                text-align: center;
                position: absolute;
                bottom: 0px;
                left: 0px;
                padding-top: 15px;
            }

            #footer-bottom {
                display: block;
            }

            /* 
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
            /* tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #404040; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	} */
            @media only screen and (max-width: 760px),
            (min-device-width: 768px) and (max-device-width: 1024px) {

                /* table { 
	  	width: 100%; 
	}

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	} */


                /* thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; } */

                /* td { 
		
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		
		position: absolute;
	
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	} */

            }
        </style>

    </head>

    <body>


        <header id="header" class="header-scroll top-header headrom">

            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/Logo.jpeg" width="115" height="40" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Departments <span class="sr-only"></span></a> </li>
                            <!-- <li class="nav-item"> <a class="nav-link active" href="">About <span class="sr-only"></span></a> </li> -->

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                    About
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="about_tribal/abouttribal.html">Tribals</a>
                                    <a class="dropdown-item" href="products/products.html">Products</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="approval_page/app.html">Developers</a>
                                </div>
                            </li>

                            <?php
                            if (empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>';
                            } else {

                                echo '<li class="nav-item"><a href="edit_profile.php" class="nav-link active">Profile</a> </li>';
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                            }

                            ?>

                        </ul>
                        
                    </div>
                </div>
            </nav>

        </header>
        <div class="page-wrapper">



            <div class="inner-page-hero bg-image" data-image-src="images/ts2.jpeg" style="height: 400px;">
                <div class="container"> </div>

            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">


                    </div>
                </div>
            </div>

            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                        </div>
                        <div class="col-xs-12">
                            <div class="bg-gray">
                                <div class="row">

                                    <!-- <table class="table table-bordered table-hover" >
                                    <thead style="background: #404040; color:white;" >
                                        <tr>
                                            <th>Date</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
                                        $prevDate = null; // Initialize previous date
                                        while ($row = mysqli_fetch_array($query_res)) {
                                            $date = $row['date'];
                                            $status = $row['status'];

                                            // Check if the date is different from the previous row
                                            if ($date != $prevDate) {
                                                // Count how many rows have the same date and time
                                                $rowCount = mysqli_num_rows(mysqli_query($db, "SELECT * FROM users_orders WHERE date = '$date'"));

                                                // Display date with rowspan
                                                echo '<tr>';
                                                echo '<td rowspan="' . $rowCount . '">' . $date . '</td>';
                                                echo '<td data-column="Item">' . $row['title'] . '</td>';
                                                echo '<td data-column="Quantity">' . $row['quantity'] . '</td>';
                                                echo '<td data-column="price">Rs ' . $row['price'] . '</td>';
                                                echo '<td data-column="status">';

                                                // Display status buttons
                                                if ($status == "packing" || $status == "" || $status == "NULL") {
                                                    echo '<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> Preparing</button>';
                                                } elseif ($status == "packed") {
                                                    echo '<button type="button" class="btn btn-info"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Ready for pick-up</button>';
                                                } elseif ($status == "closed") {
                                                    echo '<button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>';
                                                } elseif ($status == "rejected") {
                                                    echo '<button type="button" class="btn btn-danger"><i class="fa fa-close"></i> Cancelled</button>';
                                                }

                                                echo '</td>';
                                                echo '</tr>';
                                                $prevDate = $date; // Update previous date
                                            } else {
                                                // For rows with the same date, only display order details without date
                                                echo '<tr>';
                                                echo '<td data-column="Item">' . $row['title'] . '</td>';
                                                echo '<td data-column="Quantity">' . $row['quantity'] . '</td>';
                                                echo '<td data-column="price">Rs ' . $row['price'] . '</td>';
                                                echo '<td data-column="status">';

                                                // Display status buttons
                                                if ($status == "packing" || $status == "" || $status == "NULL") {
                                                    echo '<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> Preparing</button>';
                                                } elseif ($status == "packed") {
                                                    echo '<button type="button" class="btn btn-info"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Ready for pick-up</button>';
                                                } elseif ($status == "closed") {
                                                    echo '<button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>';
                                                } elseif ($status == "rejected") {
                                                    echo '<button type="button" class="btn btn-danger"><i class="fa fa-close"></i> Cancelled</button>';
                                                }

                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        }
                                        if (!mysqli_num_rows($query_res) > 0) {
                                            echo '<tr>';
                                            echo '<td colspan="5"><center>You have No orders Placed yet.</center></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table> -->
                                    <div class="table-responsive" >
                                        <table class="table table-bordered table-hover">
                                            <thead style="background: #404040; color:white;">
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <!-- <th>Date</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
                                                $prevDate = null; // Initialize previous date
                                                $orderCounter = 0; // Initialize order counter

                                                while ($row = mysqli_fetch_array($query_res)) {
                                                    $date = $row['date'];
                                                    $status = $row['status'];

                                                    // Check if the date is different from the previous row
                                                    if ($date != $prevDate) {
                                                        // Increment the order counter for each new date
                                                        $orderCounter++;
                                                        // Display date with order number
                                                        echo '<tr>';
                                                        echo '<td colspan="5"><a href="bill.php?orderID=' . $date . '" target="_blank" style="color: #0000FF;text-decoration: underline;"> Order-' . $orderCounter . ' on Date: ' . $date . '</a></td>';
                                                        echo '</tr>';
                                                        $prevDate = $date; // Update previous date
                                                    }

                                                    // Display order details
                                                    echo '<tr class="no-hover">';
                                                    echo '<td data-column="Item">' . $row['title'] . '</td>';
                                                    echo '<td data-column="Quantity">' . $row['quantity'] . '</td>';
                                                    echo '<td data-column="price">Rs ' . $row['price'] . '</td>';
                                                    echo '<td data-column="status">';

                                                    // Display status buttons
                                                    if ($status == "packing" || $status == "" || $status == "NULL") {
                                                        echo '<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> Preparing</button>';
                                                    } elseif ($status == "packed") {
                                                        echo '<button type="button" class="btn btn-info"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Ready for pick-up</button>';
                                                    } elseif ($status == "closed") {
                                                        echo '<button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>';
                                                    } elseif ($status == "rejected") {
                                                        echo '<button type="button" class="btn btn-danger"><i class="fa fa-close"></i> Cancelled</button>';
                                                    }

                                                    echo '</td>';
                                                    // Display the date as "Order-x date"
                                                    // echo '<td data-column="Date">Order-' . $orderCounter . ' date: ' . $row['date'] . '</td>';
                                                    echo '</tr>';
                                                }
                                                if (!mysqli_num_rows($query_res) > 0) {
                                                    echo '<tr>';
                                                    echo '<td colspan="5"><center>You have No orders Placed yet.</center></td>';
                                                    echo '</tr>';
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>











                                </div>

                            </div>



                        </div>



                    </div>
                </div>
        </div>
        </section>




        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3" style="margin-left: 0px;">
                        <a href="#" target="_blank">
                            <img src="images/masinagudi.jpg" class="img-responsive" alt="Masinagudi Image" style="height: 180px; width: 100%; margin-bottom: 10px;">
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 address">
                                <h5 class="text-center">Address</h5>
                                <p class="text-center">Masinagudi Village, Tribal Cooperative Society building, Near Ooty Main Town, PIN: 643223</p>
                            </div>

                            <div class="col-xs-12 col-sm-5 additional-info">
                                <h5 class="text-center">Contact</h5>
                                <p class="text-center">Tribal Research Center, Nanjanad Road, Muttorai Palada, Ooty, Tamil Nadu, 634004, India</p>

                                <div class="faicons text-center">
                                    <a href="#" class="fa fa-facebook icon"></a>
                                    <a href="#" class="fa fa-twitter icon"></a>
                                    <a href="#" class="fa fa-instagram icon"></a>
                                    <a href="#" class="fa fa-linkedin icon"></a>
                                    <a href="#" class="fa fa-youtube icon"></a>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3">
                                <a href="#" target="_blank">
                                    <img src="images/TRC.jpg" class="img-responsive" alt="TRC Image" style="height: 165px; width: 100%;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer-bottom">
                Copyright © 2023 Native Nest All Rights Reserved
            </div>
        </footer>

        <style>
            /* Adjust styles for smaller screens */
            @media (max-width: 767px) {

                .address,
                .additional-info,
                .faicons {
                    margin-top: 10px;
                }

                .faicons a {
                    font-size: 24px;
                    /* Adjust icon size for better visibility */
                    margin-right: 10px;
                    /* Add space between icons */
                }
            }
        </style>










        </div>


        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
    </body>

</html>
<?php
}
?>