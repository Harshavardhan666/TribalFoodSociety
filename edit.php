<!DOCTYPE html>
<html lang="en">
<?php

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

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Edit</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    
    <style>

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


    </style>
   </head>
<body>
<div style=" background-image: url('images/img/pimg.jpg');">
         <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt=""> </a>
                  <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                     <ul class="nav navbar-nav">
							<li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Canteens <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>';
							}
						else
							{
									
									
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
                        <div class="widget" >
                           <div class="widget-body">
                            
							  <form action="edit.php" method="post" onsubmit="return toggle()" >
                <h2 style="text-align: center; color: #8050C7; font-family: Arial, sans-serif; font-size: 30px">Reset Your Account</h2>
                <div id="form">
                              <div class="row">
								                    <div class="form-group col-sm-7">
                                       <label for="username">User-Name</label>
                                       <input class="form-control" type="text" name="username" id="username" required> 
                                    </div>
                           
                                    <div class="form-group col-sm-6">
                                       <label for="email">Email Address</label>
                                       <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" required> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="mobile">Phone number</label>
                                       <input class="form-control" type="text" name="phone" id="mobile" required> 
                                    </div>
                                    <!-- <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                                    </div> -->
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">New Password</label>
                                       <input type="password" class="form-control" name="newpassword" id="exampleInputPassword1" onkeyup="checkPasswordStrength(this.value)" required> 
                                       <div id="password-strength"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword2">Confirm Password</label>
                                       <input type="password" class="form-control" name="confpass" id="exampleInputPassword2" required>
                                    </div>
                                   
                            </div>
                                
                                 <div class="row">
                                    <div class="col-sm-3">
                                       <input type="submit" class="btn btn-primary" name="submit" value="Send OTP">
                                    </div>

                                    <div class="col-sm-3">
                                      <button type="button" name="cancel" class="btn btn-primary" onclick="redirect()" id="canbtn">Cancel</button>
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
           
                  <div class="row bottom-footer">
                     <div class="container">
                        <div class="row">
                           <!-- <div class="col-xs-12 col-sm-3 payment-options color-gray">
                              <h5>Payment Options</h5>
                              <ul>
                                 <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                 </li>
                                 <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                 </li>
                                 <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                 </li>
                                 <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                 </li>
                                 <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                 </li>
                              </ul>
                           </div> -->
                           <a href="https://www.amrita.edu/" target="_blank"><img src="images/amrita.jpg" class="col-xs-12 col-sm-3 payment-options color-gray"></a>

<div class="col-xs-12 col-sm-4 address color-gray">
<h5>Address</h5>
            <p>Amrita Vishwa Vidyapeetham, Ettimadai, Coimbatore, Tamil Nadu, PIN: 641112 </p>
            </div>
        <div class="col-xs-12 col-sm-5 additional-info color-gray">
            <h5>Addition informations</h5>
           <!-- <p>Join thousands of other restaurants who benefit from having partnered with us.</p> -->
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat aliquam quam consequuntur quasi deserunt debitis, similique maiores repudiandae laborum id nulla, veritatis magni incidunt mollitia voluptatum? Perspiciatis pariatur molestiae sunt.</p>
        </div>
                        </div>
                     </div>
                  </div>
      
               </div>
            </footer>
         
         </div>

    <script>

        function toggle(){

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
            function settime(delayInMilliseconds){
                setTimeout(page, delayInMilliseconds);
            }

            function page(){
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
    
    <?php

        if (isset($_POST['submit'])) {
          $username = $_POST['username'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $newpassword = $_POST['newpassword'];
          $confirmpassword = $_POST['confpass'];

          if ($newpassword != $confirmpassword) {
            echo '<script>showModal("Passwords Doesn\'t Match"); redirectToPage(1000)</script>'; 
          } else {
            // Passwords match, continue with further actions

            // Check if the provided information exists in the users table
            $query = "SELECT * FROM users WHERE username='$username' AND email='$email' AND phone='$phone'";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) > 0) {
              // Information exists in the database
              // Perform further actions (e.g., send OTP, reset account, etc.)
              // Add your code here
              echo "Information Exists in the Database.";
            } else {
              // Information does not exist in the database
              echo "Invalid Credentials!";
            }
          }
        }

    ?>

</body>

</html>