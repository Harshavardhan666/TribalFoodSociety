<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (!(isset($_GET['user_id'])) ){
  header('location:../login.php');
}

?>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <title>User Profile</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
          function goBack() {
              window.history.back();
          }
        </script>
        <style type="text/css" rel="stylesheet">
            .indent-small {
                margin-left: 5px;
            }

            .form-group.internal {
                margin-bottom: 0;
            }

            .dialog-panel {
                margin: 10px;
            }

            .datepicker-dropdown {
                z-index: 200 !important;
            }

            .panel-body {
                background: #e5e5e5;
                background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
                background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
                font: 600 15px "Open Sans", Arial, sans-serif;
            }

            label.control-label {
                font-weight: 600;
                color: #777;
            }

            table {
                width: 650px;
                border-collapse: collapse;
                margin: auto;
                margin-top: 50px;
            }

            tr:nth-of-type(odd) {
                background: #eee;
            }

            th {
                background: #004684;
                color: white;
                font-weight: bold;
            }

            td,
            th {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
                font-size: 14px;
            }
        </style>
    </head>

<body class="fix-header fix-sidebar">

  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
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
              <a class="nav-link dropdown-toggle text-muted" style="padding: 0.5rem 0.5rem" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
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
            <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
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
                <li><a href="add_foodCat.php">Edit Item Category</a></li>
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
          <table border="0" cellspacing="0" cellpadding="0">

          <?php

          
          $ret2 = mysqli_query($db, "select * FROM users where u_id='" . $_GET['user_id'] . "'");

          $row = mysqli_fetch_array($ret2)
          ?>
              <tr >
                  <td colspan="2" style="text-align: center;"><b><?php echo $row['f_name']; ?>'s profile</b></td>

              </tr>
              
              <tr height="50">
                  <td><b>Reg Date:</b></td>
                  <td><?php echo htmlentities($row['date']); ?></td>
              </tr>

              <tr height="50">
                  <td><b>First Name:</b></td>
                  <td><?php echo htmlentities($row['f_name']); ?></td>
              </tr>
              <tr height="50">
                  <td><b>Last Name:</b></td>
                  <td><?php echo htmlentities($row['l_name']); ?></td>
              </tr>



              <tr height="50">
                  <td><b>User Email:</b></td>
                  <td><?php echo htmlentities($row['email']); ?></td>
              </tr>

              <tr height="50">
                  <td><b>User Phone:</b></td>
                  <td><?php echo htmlentities($row['phone']); ?></td>
              </tr>

              <tr height="50">
                  <td><b>Status:</b></td>
                  <td><?php if ($row['status'] == 1) {
                          echo "<div class='btn btn-primary'>Active</div>";
                      } else {
                          echo "<div class='btn btn-danger'>Block</div>";
                      }
                      ?></td>
              </tr>

              <tr>
                  <td colspan="2">
                      <input name="Submit2" type="submit" class="btn btn-danger" value="Back" onclick="goBack()" style="cursor: pointer;" />
                  </td>
              </tr>
          </table>
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
  <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>