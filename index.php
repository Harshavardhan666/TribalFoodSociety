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
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">


    <style>
        ul li a:visited {
            text-decoration: none;
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

        .container .bottom-footer .row {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body class="home">

    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/tribes.ico" width="100"
                        height="40" alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span
                                    class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php"> Departments <span
                                    class="sr-only"></span></a> </li>
                        <!-- <li class="nav-item"> <a class="nav-link active" href="">About <span class="sr-only"></span></a> </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
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
                        if (empty($_SESSION["user_id"])) // if user is not login
                        {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>';
                        } else {

                            echo '<li class="nav-item"><a href="edit_profile.php" class="nav-link active">Profile</a> </li>';

                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                            echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }

                        ?>

                    </ul>

                </div>
            </div>
        </nav>

    </header>

    <section class="hero bg-image" data-image-src="images/tom.avif">
        <div class="hero-inner">
            <div class="container text-center hero-text font-white">
                <h1>Order Products in Prior & <br> Enjoy a Stress-Free Experience </h1>

                <div class="banner-form">
                    <form class="form-inline">

                    </form>
                </div>
                <div class="steps">
                    <div class="step-item step1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                            <g fill="#FFF">
                                <path
                                    d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z">
                                </path>
                                <path
                                    d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z">
                                </path>
                            </g>
                        </svg>
                        <h4><span style="color:white;">1. </span>Choose Department</h4>
                    </div>

                    <div class="step-item step2">
                        <img src="images/Order_light.svg" height="45" style="margin-bottom: 0;">
                        <h4><span style="color:white;">2. </span>Order Product</h4>
                    </div>

                    <div class="step-item step3">
                        <!-- <br> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                            <g fill="#FFF">
                                <path
                                    d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" />
                            </g>
                        </svg>
                        <h4><span style="color:white;">3. </span>Collect</h4>
                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- <script>
        const images = ["images/tom.avif", "images/tom1.webp", "images/tom2.jpg"];
        let currentImageIndex = 0;
        const timeInterval = 3000; // Change images every 5 seconds

        window.onload = function() {
            const hero = document.querySelector('.hero');
            const newBgImage = document.createElement('div');
            newBgImage.className = 'bg-image second';
            hero.appendChild(newBgImage);

            function changeImage() {
                const firstBgImage = document.querySelector('.bg-image:not(.second)');
                const secondBgImage = document.querySelector('.bg-image.second');

                secondBgImage.style.opacity = '1';
                firstBgImage.style.opacity = '0';

                // Swap classes
                firstBgImage.classList.add('second');
                secondBgImage.classList.remove('second');

                currentImageIndex = (currentImageIndex + 1) % images.length;
                secondBgImage.style.backgroundImage = `url('${images[currentImageIndex]}')`;
            }

            setInterval(changeImage, timeInterval);
        };
    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
    <script>
        $('.hero').vegas({
            slides: [{
                src: 'images/tom.avif'
            },
            {
                src: 'images/tom1.webp'
            },
            {
                src: 'images/tom2.jpg'
            },
            {
                src: 'images/tom3.jpg'
            },
            {
                src: 'images/tom4.jpeg'
            }
            ],
            transition: 'slideLeft2',
            delay: 3000
        });
    </script>



    <section class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Popular Products</h2>
                <!-- <p class="lead">Easiest way to order your favourite food among these top 6 dishes</p> -->
            </div>
            <div class="row">
                <?php
                $query_res = mysqli_query($db, "select * from dishes LIMIT 6");
                while ($r = mysqli_fetch_array($query_res)) {
                    $start_position = 0;
                    $length = 75;
                    $suffix = "...";

                    if (strlen($r['slogan']) > ($length - 3)) {
                        $print_stat = substr(strip_tags($r['slogan']), $start_position, $length) . $suffix;
                    } else {
                        $print_stat = $r['slogan'];
                    }

                    echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/' . $r['img'] . '"></div>
                                                <div class="content">
                                                    <h5><a href="dishes.php?res_id=' . $r['rs_id'] . '">' . $r['title'] . '</a></h5>
                                                    <div class="product-name">' . $print_stat . '</div>
                                                    <div class="price-btn-block"> <span class="price">Rs ' . $r['price'] . '</span> <a href="dishes.php?res_id=' . $r['rs_id'] . '" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                                                </div>
                                                
                                            </div>
                                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
            <div class="text-xs-center">
                <h2>Easy to Order</h2>
                <div class="row how-it-works-solution">
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                        <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512"
                                        height="512">
                                        <g fill="#FFF">
                                            <path
                                                d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z" />
                                            <path
                                                d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z" />
                                        </g>
                                    </svg>
                                </div>
                                <h3>Choose a Department</h3>
                                <p>We"ve got your covered all Categories</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                        <div class="step step-2">
                            <div class="icon" data-step="2">

                                <img src="images/Order_light.svg" height="50">

                            </div>
                            <h3>Choose a Product</h3>
                            <p>We"ve got your covered with Products of all Categories.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                        <div class="step step-3">
                            <div class="icon" data-step="3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512"
                                    viewbox="0 0 380.721 380.721">
                                    <g fill="#FFF">
                                        <path
                                            d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" />
                                    </g>
                                </svg>
                            </div>
                            <h3>Enjoy Your Purchase</h3>
                            <p>Skip Big Queues and Enjoy a Peacefull Shopping Experience</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="pay-info">Cash on Delivery (COD)</p>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-restaurants">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title-block pull-left">
                        <h4>Featured Categories</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="restaurant-listing">

                    <?php
                    $ress = mysqli_query($db, "select * from restaurant order by RAND() LIMIT 5");
                    while ($rows = mysqli_fetch_array($ress)) {

                        $start_position = 0;
                        $length = 95;
                        $suffix = "...";

                        

                        if (strlen($rows['address']) > ($length - 3)) {
                            $print_stat = substr(strip_tags($rows['address']), $start_position, $length) . $suffix;
                        } else {
                            $print_stat = $rows['address'];
                        }

                        echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all">
														<div class="restaurant-wrap">
															<div class="row">
																<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="restaurant-logo" href="dishes.php?res_id=' . $rows['rs_id'] . '" > <img src="admin/Res_img/' . $rows['image'] . '" alt="Restaurant logo" style="width: 125px; height: 100px;"> </a>
																</div>
													
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '" >' . $rows['title'] . '</a></h5> <span>' . $print_stat . '</span>
																</div>
													
															</div>
												
														</div>
												
													</div>';
                    }


                    ?>




                </div>
            </div>


        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-sm-2 col-xs-12 order-first text-center">
                        <a href="" target="_blank"><img src="images/masinagudi.jpg" class="payment-options color-gray"
                                style="width: 250px; height: 150px; margin-left: -75px;"></a>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="address color-gray">
                            <h5>Address</h5>
                            <p>Masinagudi Village, Tribal Cooperative Society building, Near Ooty Main Town, PIN: 643223
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="social-links color-gray">
                            <h5>Keep Connected</h5>
                            <ul style="list-style-type: disc; list-style-position: inside; line-height: 35px;">
                                <li type="none"><a href="#" class="fa fa-facebook"> Like us on Facebbok</a></li>
                                <li type="none"><a href="#" class="fa fa-twitter"> Follow us on Twitter</a></li>
                                <li type="none"><a href="#" class="fa fa-instagram"> Follow us on Instagram</a></li>
                                <li type="none"><a href="#" class="fa fa-linkedin"> Follow us on Linkedin</a></li>
                                <li type="none"><a href="#" class="fa fa-youtube"> Follow us on YouTube</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="support color-gray">
                            <h5>Support</h5>
                            <p style="line-height: 35px; color: #bbbbbb;">If you have any questions or you need our
                                help,</p>
                            <p style="line-height: 0px; color: #bbbbbb;">you can contact us through our</p>
                            <p style="line-height: 40px;"><a href="#"><input type="button" value="SUPPORT SITE"
                                        style="background-color: #303036; border: 1; border-color: white; color: white; line-height: 25px;"></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12 text-center">
                        <div class="quick link color-gray">
                            <h5>Quick links</h5>
                            <ul style="list-style-type: disc; list-style-position: inside; line-height: 35px;">
                                <li type="none"><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-sm-5 col-xs-12">
                        <div class="additional-info color-gray">
                            <h5>Additional Information</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat aliquam quam consequuntur quasi deserunt debitis, similique maiores repudiandae laborum id nulla, veritatis magni incidunt mollitia voluptatum? Perspiciatis pariatur molestiae sunt.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>





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