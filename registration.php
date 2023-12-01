<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
include("connection/connect.php");
if (isset($_POST['submit'])) {
    if (
        empty($_POST['firstname']) ||
        empty($_POST['lastname']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['password']) ||
        empty($_POST['cpassword']) ||
        empty($_POST['cpassword'])
    ) {
        echo "<script>alert('All fields must be Required!');</script>";
        // $message = "All fields must be Required!";
    } else {

        $check_username = mysqli_query($db, "SELECT username FROM users where username = '" . $_POST['username'] . "' ");
        $check_email = mysqli_query($db, "SELECT email FROM users where email = '" . $_POST['email'] . "' ");



        if ($_POST['password'] != $_POST['cpassword']) {

            echo "<script>alert('Password not match');</script>";
        } elseif (strlen($_POST['password']) < 6) {
            echo "<script>alert('Password Must be >=6');</script>";
        } elseif (strlen($_POST['phone']) < 10) {
            echo "<script>alert('Invalid phone number!');</script>";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email address please type a valid email!');</script>";
        } elseif (mysqli_num_rows($check_username) > 0) {
            echo "<script>alert('Username Already exists!');</script>";
        } elseif (mysqli_num_rows($check_email) > 0) {
            echo "<script>alert('Email Already exists!');</script>";
        } else {


            $mql = "INSERT INTO users(username,f_name,l_name,email,phone,password) VALUES('" . $_POST['username'] . "','" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . md5($_POST['password']) . "')";
            mysqli_query($db, $mql);

            header("refresh:0.1;url=login.php");
        }
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
    <title>Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script>
        function redirect() {
            window.location.href = "login.php";
        }
    </script>

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

        .toggle-password1,
        .toggle-password2 {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        /* #password-match-text {
            color: green;
        } */
    </style>

    <script>
        function togglePasswordVisibility(fieldId, buttonId) {
            const passwordField = document.querySelector(`input[name="${fieldId}"]`);
            const toggleButton = document.querySelector(`.${buttonId}`);

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleButton.textContent = '👁️';
            } else {
                passwordField.type = 'password';
                toggleButton.textContent = '👁️‍🗨️';
            }
        }
    </script>

    <script>
        function checkPasswordStrength(password) {
            var strengthText = document.getElementById("password-strength");
            var strengthIndicator = document.createElement("span");

            if (password.length === 0) {
                strengthText.innerHTML = "";
                return;
            }

            var strength = 0;
            if (password.length >= 6) {
                strength += 1;
            }
            if (password.match(/[a-z]/)) {
                strength += 1;
            }
            if (password.match(/[A-Z]/)) {
                strength += 1;
            }
            if (password.match(/[0-9]/)) {
                strength += 1;
            }
            if (password.match(/[$@#&!]/)) {
                strength += 1;
            }

            switch (strength) {
                case 0:
                    strengthIndicator.innerHTML = "Weak";
                    strengthIndicator.style.color = "red";

                    break;
                case 1:
                    strengthIndicator.innerHTML = "Weak";
                    strengthIndicator.style.color = "red";
                    break;
                case 2:
                    strengthIndicator.innerHTML = "Medium";
                    strengthIndicator.style.color = "orange";
                    break;
                case 3:
                    strengthIndicator.innerHTML = "Strong";
                    strengthIndicator.style.color = "green";
                    break;
                case 4:
                    strengthIndicator.innerHTML = "Very Strong";
                    strengthIndicator.style.color = "darkgreen";
                    break;
                case 5:
                    strengthIndicator.innerHTML = "Excellent";
                    strengthIndicator.style.color = "darkgreen";
                    break;
            }

            strengthText.innerHTML = "<strong>Password Strength: </strong>";
            strengthText.appendChild(strengthIndicator);
        }
    </script>

    <script>
        function checkPasswordMatch() {
            const password = document.getElementById('exampleInputPassword1').value;
            const confirmPassword = document.getElementById('exampleInputPassword2').value;
            const matchText = document.getElementById('password-match-text');

            if (password !== '' && confirmPassword !== '') {
                if (password === confirmPassword) {
                    matchText.textContent = 'Passwords Match!';
                    matchText.style.color = 'green';
                } else {
                    matchText.textContent = "Passwords Don't Match";
                    matchText.style.color = 'red';
                }
            } else {
                matchText.textContent = '';
            }
        }
    </script>

</head>

<body>
    <div style=" background-image: url('images/img/pimg.jpg');">
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
        <div class="page-wrapper">

            <div class="container">
                <ul>


                </ul>
            </div>

            <section class="contact-page inner-page">
                <div class="container ">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-body">

                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="form-group col-sm-7">
                                                <label for="exampleInputEmail1">User-Name</label>
                                                <input class="form-control" type="text" name="username" id="example-text-input" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">First Name</label>
                                                <input class="form-control" type="text" name="firstname" id="example-text-input" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Last Name</label>
                                                <input class="form-control" type="text" name="lastname" id="example-text-input-2" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Email Address</label>
                                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputEmail1">Mobile Number</label>
                                                <input class="form-control" type="text" name="phone" id="example-tel-input-3" required>
                                            </div>
                                            <!-- <div class="form-group col-sm-6">
                                                <label for="exampleInputPassword1">Password</label>
                                                <div class="password-container">
                                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                                                    <span class="toggle-password1" onclick="togglePasswordVisibility('password', 'toggle-Password1')">👁️‍🗨️</span>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputPassword2">Confirm Password</label>
                                                <div class="password-container">
                                                    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" required>
                                                    <span class="toggle-password2" onclick="togglePasswordVisibility('cpassword', 'toggle-Password2')">👁️‍🗨️</span>
                                                </div>
                                            </div> -->

                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputPassword1">Password</label>

                                                <div class="password-container">
                                                    <input class="form-control" type="password" value="" name="password" id="exampleInputPassword1" onkeyup="checkPasswordStrength(this.value)" required>
                                                    <span class="toggle-password1" onclick="togglePasswordVisibility('password', 'toggle-password1')">👁️‍🗨️</span>


                                                </div>
                                                <div id="password-strength"></div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="exampleInputPassword2">Confirm Password</label>

                                                <div class="password-container">
                                                    <input class="form-control" type="password" value="" name="cpassword" id="exampleInputPassword2" onkeyup="checkPasswordMatch()" required>
                                                    <span class="toggle-password2" onclick="togglePasswordVisibility('cpassword', 'toggle-password2')">👁️‍🗨️</span>
                                                </div>
                                                <p id="password-match-text"></p>
                                            </div>


                                            <!-- <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Delivery Address</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div> -->

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="submit" value="Register" name="submit" class="btn theme-btn">
                                                <button type="button" name="cancel" class="btn theme-btn" onclick="redirect()" id="canbtn">Back to Login</button>

                                            </div>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </section>

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