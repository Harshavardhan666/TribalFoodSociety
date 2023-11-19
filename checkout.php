<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert()
{
    echo "<script>alert('Thank you. Your Order has been placed!');</script>";
    echo "<script>window.location.replace('your_orders.php');</script>";
}

if (empty($_SESSION["user_id"])) {
    $_SESSION['redirect_url'] = 'checkout.php';
    header('location:login.php');
    exit();
} else {
    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = date('Y-m-d H:i:s');
    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {
            $session = $_SESSION["user_id"];

            $SQL = "insert into users_orders(u_id,title,quantity,price,date) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "','$currentTimestamp')";
            mysqli_query($db, $SQL);
            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Thank you. Your order has been placed!";
            function_alert();
        }
    }
?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>Checkout</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <style>
            .faicons a {
                transition: all 0.3s ease;
                padding: 8px;
                text-decoration: none;
                color: #bbbbbb;
            }

            .faicons a:hover {
                color: #0000FF;
            }

            .icon {
                font-size: 20px;
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

            .order-table {
                width: 100%;
                border-collapse: collapse;
            }

            .order-table th,
            .order-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .order-table th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>

        <div class="site-wrapper">
            <header id="header" class="header-scroll top-header headrom">
                <nav class="navbar navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                        <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/Logo.jpeg" alt="" width="115" height="40"> </a>
                        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Departments <span class="sr-only"></span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="edit_profile.php">Profile <span class="sr-only"></span></a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link active" href="">About <span class="sr-only"></span></a> </li> -->

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                        About
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Tribals</a>
                                        <a class="dropdown-item" href="#">Products</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Developers</a>
                                    </div>
                                </li>

                                <?php
                                if (empty($_SESSION["user_id"])) {
                                    echo '<li class="nav-item"><a href="edit.php" class="nav-link active">Profile</a> </li>
                                <li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>';
                                } else {
                                    echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                                    echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                                }

                                ?>

                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="page-wrapper">
                <div class="top-links">
                    <div class="container">
                        <ul class="row links">

                            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Department</a></li>
                            <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your Product</a></li>
                            <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Order and Pay</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container">

                    <span style="color:green;">
                        <?php echo $success; ?>
                    </span>

                </div>




                <div class="container m-t-30">
                    <form action="" method="post">
                        <div class="widget clearfix">

                            <div class="widget-body">
                                <form method="post" action="#">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="cart-totals margin-b-20">
                                                <div class="cart-totals-title">
                                                    <h4>Cart Summary</h4>
                                                </div>
                                                <div class="widget-body">
                                                    <table class="order-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $item_total = 0;
                                                            foreach ($_SESSION["cart_item"] as $item) {
                                                                $user = mysqli_query($db, "SELECT * FROM dishes WHERE title='$item[title]'");
                                                                $rows = mysqli_fetch_array($user);
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $item["title"]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo "Rs " . $item["price"]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $item["quantity"]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo "Rs " . ($item["price"] * $item["quantity"]); ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                $item_total += ($item["price"] * $item["quantity"]);
                                                            }
                                                            ?>

                                                        </tbody>

                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="3" style="text-align:right">Total
                                                                    Amount:</th>
                                                                <th style="text-align:left">
                                                                    <?php echo "Rs " . $item_total; ?>
                                                                </th>
                                                            </tr>
                                                        </tfoot>


                                                    </table>
                                                    <!-- </div> -->
                                                    <!-- </div> -->

                                                </div>
                                            </div>

                                            <div class="payment-option">
                                                <ul class=" list-unstyled">
                                                    <div class="cart-totals-title">
                                                        <h4>Payment Methods</h4>
                                                    </div>
                                                    <hr style="width:100%;text-align:left;margin-left:0">
                                                    <li>
                                                        <label for="radioStacked1" class="custom-control custom-radio  m-b-20">
                                                            <input name="Amrita wallet" id="radioStacked1" checked value="Amrita wallet" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash On delivery</span>
                                                        </label>
                                                    </li>


                                                </ul>
                                                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" class="btn btn-success btn-block" value="Order Now"> </p>
                                            </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>

        <br><br><br>

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