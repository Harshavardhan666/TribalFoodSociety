<!DOCTYPE html>
<html lang="en">
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();
error_reporting(0);
include("connection/connect.php");

// if(isset($_POST['submit'] )) 
// {

//      if(empty($_POST['username']) || 
// 		empty($_POST['email']) ||  
// 		empty($_POST['phone'])||
// 		empty($_POST['password']))
// 		{
// 			$message = "All Fields Must Be Required!";
// 		}
// 	else
// 	{

// 	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
// 	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");

// 	if($_POST['password'] != $_POST['newpassword']){

//           echo "<script>alert('Password Doesn't Match');</script>"; 
//     }
// 	elseif(strlen($_POST['password']) < 6)  
// 	{
//       echo "<script>alert('Password Must be >=6');</script>"; 
// 	}
// 	elseif(strlen($_POST['phone']) < 10)  
// 	{
//       echo "<script>alert('Invalid phone number!');</script>"; 
// 	}

//     elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
//     {
//           echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
//     }
// 	elseif(mysqli_num_rows($check_username) > 0) 
//      {
//        echo "<script>alert('Username Already exists!');</script>"; 
//      }
// 	elseif(mysqli_num_rows($check_email) > 0) 
//      {
//        echo "<script>alert('Email Already exists!');</script>"; 
//      }
// 	else{


// 	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."')";
// 	mysqli_query($db, $mql);

// 		 header("refresh:0.1;url=login.php");
//     }
// 	}

// }

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  // $newpassword = $_POST['newpassword'];
  // $confirmpassword = $_POST['confpass'];

  // if ($newpassword != $confirmpassword) {
  //   echo '<script>showModal("Passwords Doesn\'t Match"); redirectToPage(1000)</script>'; 
  // } else {
  // Passwords match, continue with further actions 

  // Check if the provided information exists in the users table
  $query = "SELECT * FROM users WHERE username='$username' AND email='$email' AND phone='$phone'";
  $result = mysqli_query($db, $query);
  $rows = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) > 0) {
    // Information exists in the database
    // Perform further actions (e.g., send OTP, reset account, etc.)
    // Add your code here
    $mail = new PHPMailer(true);

    $link = "http://localhost/tribalFoodSociety/reset_pass.php?id=$rows[u_id]";

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'canteenavvp@gmail.com'; // Your geatt
    // $mail->Password = 'jmrknaiiwtjlcfiq';
    // $mail->Password = 'jogqrsiyblybugel';
    $mail->Password = 'ktmsqdslfssuczgi';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('canteenavvp@gmail.com'); // Your gmail

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "Reset Password Link";
    $bodyContent = '
                    <!doctype html>
                    <html lang="en-US">
                    
                    <head>
                        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                        <title>Reset Password Email Template</title>
                        <meta name="description" content="Reset Password Email Template.">
                        <style type="text/css">
                            a:hover {text-decoration: underline !important;}
                        </style>
                    </head>
                    
                    <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                        <!--100% body table-->
                        <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                            style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                            <tr>
                                <td>
                                    <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                                        align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="height:80px;">&nbsp;</td>
                                        </tr>
                    <!--                     <tr>
                                            <td style="text-align:center;">
                                              <a href="https://rakeshmandal.com" title="logo" target="_blank">
                                                <img width="60" src="https://i.ibb.co/hL4XZp2/android-chrome-192x192.png" title="logo" alt="logo">
                                              </a>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <td style="height:20px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                                    style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                    <tr>
                                                        <td style="height:40px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0 35px;">
                                                          <h2 style="color:#1e1e2d; margin:0;font-family:"Rubik",sans-serif;">Dear ' . $username . '</h2> <br>
                                              
                                                            <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have
                                                                requested to reset your password</h1><br> <br> 
                    <!--                                         <span
                                                                style="display:inline-block; vertical-align:middle; margin:35px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span> -->
                                                            <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                                We cannot simply send you your old password. A link to reset your
                                                                password has been generated for you. To reset your password, click the
                                                                following link and follow the instructions.
                                                            </p>
                                                            <a href=' . $link . '
                                                                style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                                                Password</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="height:40px;">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        <tr>
                                            <td style="height:20px;">&nbsp;</td>
                                        </tr>
                    <!--                     <tr>
                                            <td style="text-align:center;">
                                                <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.rakeshmandal.com</strong></p>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <td style="height:80px;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!--/100% body table-->
                    </body>
                    
                    </html>

              ';
    // $mail->Body = "<h1>Dear " .$username . "\nTap the click below to reset your user account password. If you didn't request a new password, you can safely delete this email. \n".$link."</h1>";
    $mail->Body = $bodyContent;
    $mail->send();
    echo
    "
                  <script>
                  alert('Sent Successfully');
                  document.location.href = 'edit.php';
                  </script>
                  ";
  } else {
    // Information does not exist in the database
    // echo "Account Doesn't Exist!";
    echo
    "
                  <script>
                  alert('Account Does not Exist!');
                  document.location.href = 'edit.php';
                  </script>
                  ";
  }
}

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/x-icon" href="images/tribes2.ico">
  <title>Edit</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animsition.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/helper.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

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

    /* Base styles */
    /* Base styles */
    /* Base styles */
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Button styles */

    #closeButton {
      position: fixed;
      top: 69px;
      right: 0px;
    }

    #closeButton {
      display: none;
      background-color: red;
    }

    #canbtn {
      margin-left: -190px;
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
  </style>
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

                  <form action="" method="post" onsubmit="return toggle()">
                    <h2 style="text-align: center; color: #8050C7; font-family: Arial, sans-serif; font-size: 30px">Reset Your Account</h2>
                    <div id="form">
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="username">User-Name</label>
                          <input class="form-control" type="text" name="username" id="username" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="email">Email Address</label>
                          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                        </div>

                      </div>

                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="mobile">Mobile Number</label>
                          <input class="form-control" type="text" name="phone" id="mobile" required>
                        </div>
                        <!-- <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                                    </div> -->
                        <!-- <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">New Password</label>
                                       <input type="password" class="form-control" name="newpassword" id="exampleInputPassword1" onkeyup="checkPasswordStrength(this.value)" required> 
                                       <div id="password-strength"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword2">Confirm Password</label>
                                       <input type="password" class="form-control" name="confpass" id="exampleInputPassword2" required>
                                    </div> -->

                      </div>

                      <div class="row">
                        <div class="col-sm-3">
                          <input type="submit" class="btn btn-primary" name="submit" value="Reset">
                        </div>
                        <div class="col-sm-3">
                          <button type="button" name="cancel" class="btn btn-primary" onclick="redirect()" id="canbtn">Back to Login</button>
                        </div>
                      </div>

                      <div id="myModal" class="modal">
                        <div class="modal-content">
                          <!-- <span class="close" onclick="hideModal();">&times;</span> -->
                          <!-- <div class="modal-icon modal-success"><i class="fa-solid fa-badge-check fa-2xs"></i></div> -->

                          <p id="modalContent">Modal Content</p>
                        </div>

                      </div>

                    </div>

                    <!-- <div id="inputOTP" style="display: none;">
                            <div class="row">
                                  <div class="form-group col-sm-6">
                                       <label for="otp">Enter OTP: </label>
                                       <input type="text" class="form-control" name="otp" id="otp" required style="width: 180px;">
                                  </div>
                                
                                <div class="form-group col-sm-7">
                                  <button type="button" class="btn btn-primary" name="chpassbtn" id="chpass"> Change Password </button>
                                </div>
                            </div>
                          </div> -->
                  </form>


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

    <script>
      function toggle() {

        document.getElementById("form").style.display = "none";
        document.getElementById("inputOTP").style.display = "block";
      }
    </script>

    <script>
      function redirect() {
        window.location.href = "login.php";
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
        window.location.href = "edit.php";
      }
    </script>


    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



</body>

</html>