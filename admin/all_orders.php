<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        table td[rowspan] {
            vertical-align: middle;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">
   
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
                            <a class="nav-link dropdown-toggle text-muted " style="padding: 0.5rem 0.5rem" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
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
           
                <div class="row">
                    <div class="col-12">
                        
                       
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">All Orders</h4>
                            </div>
                             
                            <div class="table-responsive m-t-40">
    <table id="myTable" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr style="text-align:center;">
                <th>User</th>		
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Order-Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT users.*, users_orders.* FROM users 
                INNER JOIN users_orders ON users.u_id = users_orders.u_id 
                ORDER BY users.u_id, users_orders.date DESC, users_orders.o_id";

            $query = mysqli_query($db, $sql);
            $orders = [];

            // Process rows into grouped orders
            while ($row = mysqli_fetch_assoc($query)) {
                $orderId = $row['u_id'] . '-' . $row['date'];  // Combining user and date for a unique order ID

                if (!isset($orders[$orderId])) {
                    $orders[$orderId] = [
                        'username' => $row['username'],
                        'status' => $row['status'],
                        'date' => $row['date'],
                        'items' => []
                    ];
                }

                $orders[$orderId]['items'][] = $row;
            }

            // Display the orders
            foreach ($orders as $order) {
                $itemCount = count($order['items']);

                echo '<tr style="text-align:center;">';
                echo "<td rowspan='$itemCount'>" . $order['username'] . "</td>";

                // Display the first item
                $firstItem = $order['items'][0];
                echo "<td>{$firstItem['title']}</td>";
                echo "<td>{$firstItem['quantity']}</td>";
                echo "<td>Rs {$firstItem['price']}</td>";

                $status = $firstItem['status'];
                echo "<td rowspan='$itemCount' >";
                switch ($status) {
                    case "packing":
                        echo '<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> Packing</button>';
                        break;
                    case "packed":
                        echo '<button type="button" class="btn btn-info"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Ready to pick-up</button>';
                        break;
                    case "closed":
                        echo '<button type="button" class="btn btn-primary"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>';
                        break;
                    case "rejected":
                        echo '<button type="button" class="btn btn-danger"><i class="fa fa-close"></i> Cancelled</button>';
                        break;
                }
                echo "</td>";

                echo "<td rowspan='$itemCount'>" . $order['date'] . "</td>";
                echo "<td rowspan='$itemCount'><a href='view_order.php?user_upd={$firstItem['date']}' class='btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5'><i class='fa fa-edit'></i></a></td>";
                echo '</tr>';

                // Display the remaining items in this order
                for ($i = 1; $i < $itemCount; $i++) {
                    $item = $order['items'][$i];
                    echo '<tr style="text-align:center;">';
                    echo "<td>{$item['title']}</td>";
                    echo "<td>{$item['quantity']}</td>";
                    echo "<td>Rs {$item['price']}</td>";
                    
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>
 
		
            <footer class="footer"> © 2023 - Native Nest </footer>
    
        </div>
   
    </div>
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    
</body>

</html>