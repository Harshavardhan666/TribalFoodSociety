<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="images/tribes2.ico">
    <title>Category</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">

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

        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item:hover {
            background-color: #abcdef;
        }

        .hero {
            position: relative;
            background-size: cover;
        }

        .hero.bg-image {
            backdrop-filter: blur(5px);
        }

        .hero-text {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Black shadow */
        }

        .hero.bg-image {
            background-image: url('images/tom.avif');
            position: relative;
        }

        .hero.bg-image::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black overlay with 50% transparency */
            transition: opacity 1s;
        }

        .bg-image.second {
            z-index: -1;
        }

        .hero-inner {
            position: relative;
            /* This ensures the text is displayed above the overlay */
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
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="#">Choose Department</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your Product</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                </ul>
            </div>
        </div>
        <section class="hero bg-image" data-image-src="images/tmc.webp" style="height: 450px;">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white"></div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
        <script>
            $('.hero').vegas({
                slides: [{
                        src: 'images/tmc.webp'
                    },
                    {
                        src: 'images/tj.avif'
                    },
                    {
                        src: 'images/tcb.jpg'
                    },
                    {
                        src: 'images/tgn.png'
                    },
                    {
                        src: 'images/tt.jpeg'
                    },
                    {
                        src: 'images/tp.jpg'
                    },
                    {
                        src: 'images/tsp.jpg'
                    },
                    {
                        src: 'images/top1.jpeg'
                    }
                ],
                transition: 'slideLeft2',
                delay: 3000
            });
        </script>

        <div class="result-show">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                <?php $ress = mysqli_query($db, "select * from restaurant");
                                while ($rows = mysqli_fetch_array($ress)) {


                                    echo ' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id=' . $rows['rs_id'] . '" > <img src="admin/Res_img/' . $rows['image'] . '" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '" >' . $rows['title'] . '</a></h5> <span>' . $rows['address'] . '</span>
																
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		
																		<a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn btn-purple">View Items</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
                                }


                                ?>

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