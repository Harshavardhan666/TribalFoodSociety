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
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Items Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    .chart-container {
        display: flex;
        justify-content: space-around;
        margin: 50px;
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
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                                notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted " style="padding: 0.5rem 0.5rem" href="#"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
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
                        <li> <a href="all_users.php"> <span><i
                                        class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i
                                    class="fa fa-archive f-s-20 color-warning"></i><span
                                    class="hide-menu">Departments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_restaurant.php">All Departments</a></li>
                                <!-- <li><a href="add_category.php">Add village</a></li> -->
                                <li><a href="add_restaurant.php">Add new Departments</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery"
                                    aria-hidden="true"></i><span class="hide-menu">Items</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">All Categories</a></li>
                                <li><a href="add_foodCat.php">Add Item Category</a></li>
                                <li><a href="add_menu.php">Add Item</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span>Orders</span></a></li>
                        <li> <a href="reports.php"><i class="fa fa-file-text-o"
                                    aria-hidden="true"></i><span>Reports</span></a></li>

                        <li> <a href="item_reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Items
                                    report</span></a></li>

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
                                    <h4 class="m-b-0 text-white">Reports</h4>
                                </div>
                                <button onClick="window.print()">Print Report</button>

                                <div class="table-responsive m-t-40">
                                    <div>
                                        <h2>Sales Comparison between Departments</h2>
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "tribalfoodphp";
                                        $con = new mysqli($servername, $username, $password, $dbname);

                                        // Check the connection
                                        if ($con->connect_error) {
                                            die("Connection failed: " . $con->connect_error);
                                        }

                                        // Create a list of all department rs_ids and their corresponding titles
                                        $allDepartmentsQuery = $con->query("SELECT rs_id, title FROM restaurant");
                                        $departmentTitles = [];
                                        foreach ($allDepartmentsQuery as $data) {
                                            $departmentTitles[$data['rs_id']] = htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8');
                                        }

                                        // Initialize arrays to store data for each department
                                        $departmentData = [];

                                        // Loop through each department and fetch data
                                        foreach ($departmentTitles as $rs_id => $title) {
                                            $query = $con->query("
            SELECT
                d.d_id,
                COALESCE(SUM(uo.quantity), 0) AS total_quantity
            FROM
                dishes AS d
            LEFT JOIN
                users_orders AS uo ON d.title = uo.title AND uo.status = 'closed'
            WHERE
                d.rs_id = '$rs_id'
            GROUP BY
                d.d_id
        ");

                                            $departmentData[$rs_id]['title'] = $title;
                                            $departmentData[$rs_id]['labels'] = [];
                                            $departmentData[$rs_id]['quantities'] = [];

                                            foreach ($query as $data) {
                                                $departmentData[$rs_id]['labels'][] = $data['d_id'];
                                                $departmentData[$rs_id]['quantities'][] = $data['total_quantity'];
                                            }
                                        }

                                        $con->close();
                                        ?>

                                        <?php foreach ($departmentTitles as $rs_id => $title): ?>
                                        <div class="chart-container">
                                            <h3>
                                                <?= $title ?>
                                            </h3>
                                            <div>
                                                <canvas id="myChart<?= $rs_id ?>"
                                                    style="height: 300px; width: 600px;"></canvas>
                                            </div>
                                        </div>

                                        <script>
                                        // Chart for Department <?= $title ?>
                                        <?php if (!empty($departmentData[$rs_id]['labels'])): ?>
                                        const data<?= $rs_id ?> = {
                                            labels: <?php echo json_encode($departmentData[$rs_id]['labels']) ?>,
                                            datasets: [{
                                                label: 'Item vs Quantity (<?= $title ?>)',
                                                data: <?php echo json_encode($departmentData[$rs_id]['quantities']) ?>,
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgb(75, 192, 192)',
                                                borderWidth: 1
                                            }]
                                        };

                                        const config<?= $rs_id ?> = {
                                            type: 'bar',
                                            data: data<?= $rs_id ?>,
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        };

                                        var myChart<?= $rs_id ?> = new Chart(
                                            document.getElementById('myChart<?= $rs_id ?>'),
                                            config<?= $rs_id ?>
                                        );
                                        <?php else: ?>
                                        // Create an empty chart if there is no data
                                        var myChart<?= $rs_id ?> = new Chart(
                                            document.getElementById('myChart<?= $rs_id ?>'), {
                                                type: 'bar',
                                                data: {
                                                    labels: [],
                                                    datasets: []
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    }
                                                }
                                            }
                                        );
                                        <?php endif; ?>
                                        </script>
                                        <?php endforeach; ?>
                                    </div>
                                    <br>

                                </div>
                                <br>

                            </div>
                            <br>



                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    </div>
    </div>

    </div>

    <footer class="footer"> © 2023 - TribalFoodSociety </footer>

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
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>