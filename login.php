<!DOCTYPE html>
<html lang="en">

<?php
ob_start();
$message = "";
$success = "";
$count = 0;
include("connection/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($_POST["submit"])) {
        $loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'";
        $result = mysqli_query($db, $loginquery);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            $_SESSION["user_id"] = $row['u_id'];

            // Check if there's a redirect URL in the session
            if (isset($_SESSION['redirect_url'])) {
                $redirect_url = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']); // Remove the stored URL
                header("Location: $redirect_url");
            } else {
                // If no redirect URL, go to the home page or any other default page
                header("Location: index.php");
            }

            ob_end_flush();
            exit();
        } else {
            $count++;
            $message = "Invalid Username or Password!";
        }
    }
}
?>


<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="images/tribes2.ico">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/login.css">
    <style type="text/css">
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

        #buttn {
            color: #fff;
            background-color: #5c4ac7;
        }

        .popover {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1060;
            display: block;
            max-width: 500px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: left;
            white-space: normal;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 60px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            height: 65px;
        }

        .my-class {
            font-size: 14px;
        }

        .popover .arrow {
            margin-left: 1px;
            position: absolute;
            display: block;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
        }

        .popover.right .arrow {
            left: -10px;
            top: 50%;
            margin-top: -10px;
            border-right-color: #999;
            border-width: 10px 10px 10px 0;
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

        .password-container {
            position: relative;
        }

        #password {
            padding-right: 30px;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/15f8b2b9b3.js" crossorigin="anonymous"></script>

    <script>
        function toggle() {
            var x = document.getElementById("password");
            var y = document.getElementById("eye1");
            var z = document.getElementById("eye2");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                y.style.color = "green";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
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
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php"> Categories <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                        } else {
                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                            echo '<li class="nav-item"><a href="edit.php" class="nav-link active">Edit</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div style=" background-image: url('images/img/pimg.jpg');">
        <div class="pen-title">
        </div>
        <div class="module form-module ">
            <div class="toggle">

            </div>
            <div class="form">
                <h2>Login to your account</h2>
                <span style="color:red;"><?php echo $message; ?></span>
                <span style="color:green;"><?php echo $success; ?></span>
                <form action="" method="post">
                    <br>
                    <table>
                        <tr>
                            <th align="center" colspan="2">
                                <input type="text" name="username" id="username" placeholder="Username" class="btn1 btn1-lg btn1-danger" data-container="body" data-placement="right" data-html="true" data-template='<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>' data-content="<p class = 'my-class'>Your Complete Roll No, <br> <strong> Example: </strong> CB.EN.U4CSE20621 </p>" style="max-width: 400px; opacity: 1;" size="35" autofocus required>
                            </th>
                        </tr>

                        <tr>
                            <th align="center" colspan="2">
                                <div class="password-container">
                                    <input type="password" name="password" id="password" placeholder="Password" size="35" required class="btn1 btn1-lg btn1-danger" data-container="body" data-placement="right" data-html="true" data-template='<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>' data-content="<p class = 'my-class'> Your domain password (or) your Amrita Wi-Fi password </p>" style="max-width: 400px; opacity: 1;" onkeydown="checkCapsLock()">
                                    <span class="toggle-password" onclick="togglePasswordVisibility()">👁️‍🗨️</span>
                                </div>
                                <div id="caps-lock-warning" class="message" style="color: red; display: none;">Caps Lock is ON</div><br>
                            </th>
                        </tr>

                    </table>
                    <input type="submit" id="buttn" name="submit" value="Login" />
                </form>
            </div>

            <script>
                function togglePasswordVisibility() {
                    const passwordInput = document.getElementById('password');
                    const toggleButton = document.querySelector('.toggle-password');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleButton.textContent = '👁️';
                    } else {
                        passwordInput.type = 'password';
                        toggleButton.textContent = '👁️‍🗨️';
                    }
                }
            </script>

            <script>
                function checkCapsLock() {
                    const password = document.querySelector('#password');
                    const message = document.querySelector('.message');

                    password.addEventListener('keydown', function(e) {
                        if (e.getModifierState('CapsLock')) {
                            message.textContent = 'Caps Lock is ON';
                            message.style.display = 'block';
                        } else {
                            message.textContent = '';
                            message.style.display = 'none';
                        }
                    });
                }
            </script>


            <div class="cta">Forgot Password?<a href="edit.php" style="color:#5c4ac7;"> Reset </a></div>
            <div class="cta">Not registered?<a href="registration.php" style="color:#5c4ac7;"> Create an account</a></div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>




        <div class="container-fluid pt-3">
            <p></p>
        </div>


        <br><br>


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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('[data-toggle="popover"]').popover({
                    trigger: 'hover'
                });
            });
        </script>

</body>

</html>