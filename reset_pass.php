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
    <title>Edit</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />



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

        .btn-inverse {
            background: #2f3d4a;
            border: 1px solid #2f3d4a;
            color: #ffffff;
        }

        .btn-inverse:hover {
            background: #2f3d4a;
            opacity: 0.7;
            color: #ffffff;
            border: 1px solid #2f3d4a;
            background-color: #232a37;
            border: 1px solid #232a37;
        }

        .btn-inverse:active {
            background: #232a37;
            color: #ffffff;
            background-color: #232a37;
            border: 1px solid #232a37;
        }

        .btn-inverse:focus {
            background: #232a37;
            color: #ffffff;
            background-color: #232a37;
            border: 1px solid #232a37;
        }

        .btn-inverse.disabled {
            background: #2f3d4a;
            border: 1px solid #2f3d4a;
            color: #ffffff;
        }

        .btn-inverse.disabled:hover {
            background: #2f3d4a;
            opacity: 0.7;
            color: #ffffff;
            border: 1px solid #2f3d4a;
        }

        .btn-inverse.disabled:active {
            background: #232a37;
            color: #ffffff;
        }

        .btn-inverse.disabled:focus {
            background: #232a37;
            color: #ffffff;
        }

        .btn-inverse.active {
            background: #232a37;
            color: #ffffff;
            background-color: #232a37;
            border: 1px solid #232a37;
        }

        .btn-inverse.disabled.active {
            background: #232a37;
            color: #ffffff;
        }

        .btn-primary {
            background: #5c4ac7;
            border: 1px solid #5c4ac7;
            -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
            box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
            -webkit-transition: 0.2s ease-in;
            -o-transition: 0.2s ease-in;
            transition: 0.2s ease-in;
        }

        .btn-primary:hover {
            background: #5c4ac7;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            border: 1px solid #5c4ac7;
        }

        .btn-primary:active {
            background: #6352ce;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
        }

        .btn-primary:active:focus {
            background-color: #6352ce;
            border: 1px solid #6352ce;
        }

        .btn-primary:active:hover {
            background-color: #6352ce;
            border: 1px solid #6352ce;
        }

        .btn-primary:focus {
            background: #6352ce;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            background-color: #6352ce;
            border: 1px solid #6352ce;
        }

        .btn-primary.disabled {
            background: #5c4ac7;
            border: 1px solid #5c4ac7;
            -webkit-box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
            box-shadow: 0 2px 2px 0 rgba(116, 96, 238, 0.14), 0 3px 1px -2px rgba(116, 96, 238, 0.2), 0 1px 5px 0 rgba(116, 96, 238, 0.12);
            -webkit-transition: 0.2s ease-in;
            -o-transition: 0.2s ease-in;
            transition: 0.2s ease-in;
        }

        .btn-primary.disabled:hover {
            background: #5c4ac7;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            border: 1px solid #5c4ac7;
        }

        .btn-primary.disabled:active {
            background: #6352ce;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
        }

        .btn-primary.disabled:focus {
            background: #6352ce;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
        }

        .btn-primary.active {
            background: #6352ce;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
        }

        .btn-primary.active:focus {
            background-color: #6352ce;
            border: 1px solid #6352ce;
        }

        .btn-primary.active:hover {
            background-color: #6352ce;
            border: 1px solid #6352ce;
        }

        .btn-primary.disabled.active {
            background: #6352ce;
            -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
            box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .modal-content {
            background-color: #f9f9f9;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #ccc;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close:hover,
        .close:focus {
            color: #333;
        }

        .modal-content p {
            margin: 0;
            font-size: 18px;
            line-height: 1.5;
            color: #333;
        }

        .modal-content p:first-of-type {
            margin-bottom: 20px;
        }

        .modal-content p:last-of-type {
            text-align: center;
        }

        .modal-content p:last-of-type a {
            color: #007bff;
            text-decoration: none;
        }

        .modal-content p:last-of-type a:hover {
            text-decoration: underline;
        }

        #canbtn {
            margin-left: -140px;
        }

        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
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
        function checkPasswordMatch() {
            const password = document.getElementById('p1').value;
            const confirmPassword = document.getElementById('p2').value;
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
                        if (empty($_SESSION["user_id"])) // if user is not login
                        {
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
    <?php
    $session = $_GET['id'];
    $user = mysqli_query($db, " select * from users where u_id='$session' ");
    $rows = mysqli_fetch_array($user);
    ?>
    <div class="page-wrapper">


        <div class="container">
            <br>
            <h1>Reset password</h1>
            <hr>
            <div class="row">
                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <!-- <h3>Personal info</h3> -->
                    <form class="form-horizontal" role="form" action="" method="post" id="myForm">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="<?php echo $rows["f_name"], " ", $rows["l_name"]; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="<?php echo $rows["email"]; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="<?php echo $rows["username"]; ?>" readonly>
                            </div>
                        </div>


                        <div id="passwordFields" style="display: none;">
                            <div class="form-group">
                                <label class="col-md-3 control-label">New Password:</label>
                                <div class="col-md-8">
                                    <div class="password-container">
                                        <input class="form-control" type="password" value="" name="new_pass" id="p1" onkeyup="checkPasswordStrength(this.value)" required>
                                        <span class="toggle-password1" onclick="togglePasswordVisibility('new_pass', 'toggle-password1')">👁️‍🗨️</span>
                                    </div>
                                    <div id="password-strength"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm New password:</label>
                                <div class="col-md-8">
                                    <div class="password-container">
                                        <input class="form-control" type="password" value="" name="confirm_pass" id="p2" onkeyup="checkPasswordMatch()" required>
                                        <span class="toggle-password2" onclick="togglePasswordVisibility('confirm_pass', 'toggle-password2')">👁️‍🗨️</span>
                                    </div>
                                    <p id="password-match-text"></p>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Change Password" id="chpas" style="display: none;">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" name="cancel" onclick="cancelClick()" style="display: none;" id="canbtn">Cancel</button>
                                    </div>
                                </div>
                                <span></span>
                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <!-- <span class="close" onclick="hideModal();">&times;</span> -->
                                        <!-- <div class="modal-icon modal-success"><i class="fa-solid fa-badge-check fa-2xs"></i></div> -->

                                        <p id="modalContent">Modal Content</p>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-primary" name="editPassword" onclick="togglePasswordFields()">Edit Password</button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br>

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
    <script src="js/headroom.js"></script>x
    <script src="js/foodpicky.min.js"></script>
    <script src="https://kit.fontawesome.com/15f8b2b9b3.js" crossorigin="anonymous"></script>

    <script>
        function togglePasswordFields() {
            var passwordFields = document.getElementById("passwordFields");
            var editPasswordButton = document.getElementsByName("editPassword")[0];

            if (passwordFields.style.display === "none") {
                passwordFields.style.display = "block";
                // editPasswordButton.textContent = "Hide Password";
                editPasswordButton.style.display = "none";
                document.getElementById("chpas").style.display = "block";
                document.getElementById("canbtn").style.display = "block";
            }
        }

        function cancelClick() {
            var passwordFields = document.getElementById("passwordFields");
            var editPasswordButton = document.getElementsByName("editPassword")[0];
            editPasswordButton.style.display = "block";
            passwordFields.style.display = "none";
            document.getElementById("chpas").style.display = "none";
            document.getElementById("canbtn").style.display = "none";
        }

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
        // const delayInMilliseconds = 5000;
        function showModal(content) {
            // console.log("Showing modal with message:", content);
            document.getElementById("modalContent").textContent = content;
            document.getElementById("myModal").style.display = "block";
        }

        // function hideModal() {
        //     // console.log("Closing modal");
        //     document.getElementById("myModal").style.display = "none";
        //     // window.location.href = "edit_profile.php";
        // }

        // setTimeout(showModal, delayInMilliseconds);


        // Function to redirect to a specific page
        function redirectToPage(delayInMilliseconds) {
            settime(delayInMilliseconds);
        }

        // Set the timer to redirect after the delay
        function settime(delayInMilliseconds) {
            setTimeout(page, delayInMilliseconds);
        }

        function page() {
            window.location.href = "logout.php";
        }

        function redirectToPage1(delayInMilliseconds) {
            settime1(delayInMilliseconds);
        }

        // Set the timer to redirect after the delay
        function settime1(delayInMilliseconds) {
            setTimeout(page1, delayInMilliseconds);
        }

        function page1() {
            window.location.href = "edit_profile.php";
        }
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // $old_pass = $_POST['old_pass'];
        // $old_pass = md5($_POST['old_pass']);
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];
        $session = $_GET['id'];

        if (!empty($_POST["submit"])) {
            $session = $_GET['id'];
            // $loginquery ="SELECT password FROM users WHERE u_id='$session' "; //selecting matching records
            // $result=mysqli_query($db, $loginquery); //executing
            // $row=mysqli_fetch_array($result);
            // password='".md5($password)."'
            // if($row['password']==$old_pass){
            if ($new_pass == $confirm_pass) {
                $mql = "UPDATE users SET password=('" . md5($_POST['new_pass']) . "') WHERE u_id='$session'";
                mysqli_query($db, $mql);
                // header("refresh:0.1;url=login.php");
                // echo '<div class="modal-icon modal-success"><i class="fas fa-check-circle"></i></div>';
                echo '<script>showModal("Password Updated Successfully"); redirectToPage(1000);</script>';

                exit;
            } else {
                // echo "<script>alert('Both the passwords are not matching');</script>";
                // echo "<script>document.getElementById('myModal').style.display = 'block'; document.getElementById('modalContent').innerText = 'Pass doesn\'t match';</script>";
                // echo '<script> window.location.reload();</script>';
                // echo '<div class="modal-icon modal-success"><i class="fas fa-check-circle"></i></div>';
                echo '<script>showModal("Pass doesn\'t match"); redirectToPage1(1000)</script>';
                // console.log("Passwords don't match");\
            }
            // }

        }
    }
    ?>

</body>

</html>