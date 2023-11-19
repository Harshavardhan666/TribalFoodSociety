<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if(isset($_POST['submit']))          
{
	
		if($_POST['res_name']=='')
		{	
            $error = 	'<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>All fields Must be Fillup!</strong>
                            </div>';
									
		
								
		}
	else
		{
            header("Location: add_menu_step2.php?dept=$_POST[res_name] ");

		}
}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add Menu</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
  
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
  
    <div id="main-wrapper">
      
         <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        
                        <span><img src="images/Logo.jpeg" alt="homepage" class="dark-logo" width="115" height="50" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">
       
                    <ul class="navbar-nav mr-auto mt-md-0">
              
                        
                     
                       
                    </ul>Admin
          
                    <ul class="navbar-nav my-lg-0">

                        
          
                        <li class="nav-item dropdown">
                           
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                  
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
     
        <div class="left-sidebar">
    
            <div class="scroll-sidebar">
           
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Departments</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_restaurant.php">All Departments</a></li>
								<!-- <li><a href="add_category.php">Add village</a></li> -->
                                <li><a href="add_restaurant.php">Add new Departments</a></li>
                                
                            </ul>
                        </li>
                     <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Items</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Categories</a></li>
                                <li><a href="add_foodCat.php">Add Item Category</a></li>
								<li><a href="add_menu.php">Add Item</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                         <li> <a href="reports.php"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Reports</span></a></li>
                         
                         <li> <a href="item_reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Items Report</span></a></li>

                    </ul>
                </nav>
        
            </div>
         
        </div>
      
        <div class="page-wrapper">
     
            
         
            <div class="container-fluid">
                <!-- Start Page Content -->
                  
									
									<?php  echo $error;
									        echo $success;
                                            
                                            ?>
									
									
								
								
                                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Product</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Select Department</label>
                                                        <select name="res_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                            <option>--Select Department--</option>
                                                    <?php $ssql ="select * from restaurant";
                                                        $res=mysqli_query($db, $ssql); 
                                                        while($row=mysqli_fetch_array($res))  
                                                        {
                                                        echo' <option value="'.$row['rs_id'].'">'.$row['title'].'</option>';;
                                                        }  
                                                    
                                                        ?> 
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Next"> 
                                        <a href="add_menu.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                    </div>
                                     
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <footer class="footer"> © 2023 - Native Nest </footer>
                </div>               
            </div>
        </div>    
    </div>
  
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>