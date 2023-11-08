<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['update'])) {
  $form_id = $_GET['form_id'];
  $status = $_POST['status'];
  $remark = $_POST['remark'];
  date_default_timezone_set('Asia/Kolkata');
  $currentTimestamp = date('Y-m-d H:i:s');
  $query = mysqli_query($db, "insert into remark(date,status,remark,remarkDate) values('$form_id','$status','$remark','$currentTimestamp')");
  $sql = mysqli_query($db, "update users_orders set status='$status' , date='$form_id' where date='$form_id'");
  header('Location: all_orders.php');
  exit;
  echo '<script>showModal("User Status Updated Successfully"); redirectToPage(1000);</script>';
  }

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>Order Update</title>
  <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="css/helper.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
  </style>
  <script>
    function goBack() {
        window.history.back();
    }
  </script>
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

            <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>
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
                <li><a href="add_foodCat.php">Add Item Category</a></li>
                <li><a href="add_menu.php">Add Item</a></li>


              </ul>
            </li>
            <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
            <li> <a href="reports.php"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Reports</span></a></li>

            <li> <a href="item_reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Items report</span></a></li>

          </ul>
        </nav>

      </div>

    </div>

    <div class="page-wrapper">



      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <form name="updateticket" id="updatecomplaint" method="post">




              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><b>Ordered Date</b></td>
                  <td><?php echo htmlentities($_GET['form_id']); ?></td>
                </tr>
                

                <tr>
                  <td><b>Status</b></td>
                  <td><select name="status" required="required">
                      <option value="">Select Status</option>
                      <option value="packing">Preparing</option>
                      <option value="packed">Packed</option>
                      <option value="closed">Delivered</option>
                      <option value="rejected">Cancelled</option>

                    </select></td>
                </tr>


                <tr>
                  <td><b>Message</b></td>
                  <td><textarea name="remark" cols="50" rows="10" ></textarea></td>
                </tr>



                <tr>
                  <td><b>Action</b></td>
                  <td>
                  <a href="view_order.php?user_upd=<?php echo $_GET['form_id']; ?>">
                    <input type="button" class="btn btn-danger" value="Back" style="cursor: pointer;" />
                  </a>
                  <input type="submit" name="update" class="btn btn-primary" value="Submit">

                  
                  </td>
                </tr>

                <div id="myModal" class="modal">
                  <div class="modal-content">
                    <!-- <span class="close" onclick="hideModal();">&times;</span> -->
                    <!-- <div class="modal-icon modal-success"><i class="fa-solid fa-badge-check fa-2xs"></i></div> -->

                    <p id="modalContent">Modal Content</p>
                  </div>

                </div>








              </table>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  </div>

  <footer class="footer"> © 2023 - TribalFoodSociety </footer>

  </div>

  </div>
  <script>
    function showModal(content) {
      // console.log("Showing modal with message:", content);
      document.getElementById("modalContent").textContent = content;
      document.getElementById("myModal").style.display = "block";
    }

    function redirectToPage(delayInMilliseconds) {
      settime(delayInMilliseconds);
    }

    // Set the timer to redirect after the delay
    function settime(delayInMilliseconds) {
      setTimeout(page, delayInMilliseconds);
    }

    function page() {
      window.location.href = "order_update.php";
    }
  </script>
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