<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

include_once 'product-action.php';

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="images/tribes2.ico">
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/input-spinner/dist/input-spinner.min.css">
    <script src="https://cdn.jsdelivr.net/npm/input-spinner/dist/input-spinner.min.js"></script>
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

        .collapsible {
            background-color: #FAFAF8;
            color: white;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            text-align: left;
            outline: none;
            font-size: 15px;
            color: #25282B;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
            /* Adjust the color as needed */
        }

        /* .collapsible .row {
                background-color: #777;
            } */
        .collapsible:hover {
            background-color: #F1F1F1;
        }

        .content {
            padding: 0 18px;
            /* display: none; */
            overflow: hidden;
            background-color: #f1f1f1;
        }

        .menu-btn {
            background-color: #007BFF;
            /* Button background color */
            color: #fff;
            /* Button text color */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .menu-btn:hover {
            background-color: #0056b3;
            /* Hover background color */
        }


        .dropdown-menu1 {
            position: relative;
            display: inline-block;
        }

        .menu-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            text-align: left;
        }

        .links-hidden {
            display: block;
            padding: 12px 16px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .links-hidden {
            display: block;
        }

        .links-hidden:hover {
            background-color: #f2f2f2;
            /* Hover background color */
        }

        /* .links:hover {
            background-color: black;
            color: white;
        } */

        .dropdown-menu:hover .menu-content {
            display: block;
        }

        .dropdown-menu1:hover .menu-content {
            display: block;
        }

        /* .dropdown-menu:hover .menu-btn {
            background-color: #669999;
        } */

        #nav:hover #dm {
            display: block;
        }

        #dm {
            display: none;
        }

        .dropdown-item:hover {
            background-color: #abcdef;
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

        /* .dropdown-menu1:hover+.content-below {
            margin-top: 20px;
        } */
    </style>

</head>

<body>

    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/Logo.jpeg" alt="" width="115" height="40"> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Departments <span class="sr-only"></span></a> </li>
                        <!-- <li class="nav-item"> <a class="nav-link active" href="">About <span class="sr-only"></span></a> </li> -->

                        <li class="nav-item dropdown" id="nav">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                About
                            </a>
                            <div class="dropdown-menu" id="dm" aria-labelledby="navbarDropdown">
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
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Department</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your Product</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>

                </ul>
            </div>
        </div>
        <?php $ress = mysqli_query($db, "select * from restaurant where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);

        ?>
        <section class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Restaurant logo">'; ?></figure>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <div class="breadcrumb">
            <div class="container">

            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Cart
                            </h3>


                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">


                                <?php

                                $item_total = 0;

                                foreach ($_SESSION["cart_item"] as $item) {
                                    $user = mysqli_query($db, " select * from dishes where title='$item[title]' ");
                                    $rows = mysqli_fetch_array($user);
                                ?>

                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>

                                    </div>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "Rs" . $item["price"]; ?> readonly id="exampleSelect1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>

                                        <a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=decrement&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-minus pull-right"></i></a>

                                    </div>

                                <?php
                                    $item_total += ($item["price"] * $item["quantity"]);
                                }
                                ?>

                            </div>
                        </div>



                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <!-- <p style="margin-bottom: 0px;">TOTAL CALORIES <br>of items in this cart</p> -->
                                <h3 class="value"></h3>
                                <br>
                                <p style="margin-bottom: 0px;">TOTAL BIll</p>
                                <h3 class="value"><strong><?php echo "Rs " . $item_total; ?></strong></h3>


                                <?php
                                if ($item_total == 0) {
                                ?>


                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn btn-danger btn-lg disabled">Checkout</a>

                                <?php
                                } else {
                                ?>
                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn btn-success btn-lg active">Checkout</a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>




                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">

                    <div>
                        <h1>Items</h1>
                        <div class="dropdown-menu1">
                            <button class="menu-btn">Sort by < </button>
                                    <div class="menu-content">
                                        <?php echo '<a class="links-hidden" href="dishes.php?res_id=' . $_GET['res_id'] . '">Dish Name</a>'; ?>

                                        <!-- <a class="links-hidden" href="#">Visit Us</a>

                                        <a class="links-hidden" href="#">About Us</a> -->
                                    </div>
                        </div>
                    </div><br>

                    <?php
                    $qur = $db->prepare("select * from food_category where rs_id='$_GET[res_id]'");
                    $qur->execute();
                    $categorys = $qur->get_result();
                    if ($categorys->num_rows > 0) {
                        foreach ($categorys as $category) {

                    ?>
                            <button type="button" class="collapsible" style="text-align: center;"><?php echo $category['fc_name']; ?></button>

                            <div class="content">
                                <div class="collapse in" id="popular2">
                                    <?php
                                    $stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]' and fc_id='$category[fc_id]' ORDER BY price");
                                    $stmt->execute();
                                    $products = $stmt->get_result();
                                    // echo $products;
                                    if ($products->num_rows > 0) {
                                        foreach ($products as $product) {

                                    ?> <div class="menu-widget">
                                                <div class="food-item">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                                            <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                                <div class="rest-logo pull-left">
                                                                    <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo" >'; ?></a>
                                                                </div>

                                                                <div class="rest-descr">
                                                                    <h6><a href="#"><?php echo $product['title']; ?> </a> </h6>
                                                                    <p> <?php echo $product['slogan']; ?></p>
                                                                </div>

                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-lg-3  item-cart-info">
                                                            <span class="price ">Rs <?php echo $product['price']; ?></span>
                                                            <input class="b-r-0" type="number" name="quantity" style="margin-left:20px;width:40%; padding: 2px 0 2px 4px ;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;" value="1" size="1" min="0" />

                                                            <input type="submit" class="btn theme-btn" style="margin-left:40px;margin-top:10px;" value="Add To Cart" />
                                                        </div>



                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div style="margin:5px">
                                            <h6>Currently Items are not available in this Category</h6>
                                        </div>
                                    <?php
                                    }

                                    ?>



                                </div>

                            </div>

                            <br>

                        <?php
                        }
                    } else {
                        ?>
                        <div style="margin:5px;text-align:center;">
                            <h6>No Products</h6>
                        </div>
                    <?php
                    }

                    ?>

                </div>
            </div>

        </div>
        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }
        </script>


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

    </div>


    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                <div class="modal-body cart-addon">
                    <div class="food-item white">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect2">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-2">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.49</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect3">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 1.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect5">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-4">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>

                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 3.15</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect6">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-5">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-btn">Add To Cart</button>
                </div>
            </div>
        </div>
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