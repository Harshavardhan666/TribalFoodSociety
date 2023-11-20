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
    <title>All Menu</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    #donutGraph {
        width: 400px;
        height: 400px;
        margin: 0 auto;
    }

    .chart-container {
        display: flex;
        justify-content: space-around;
        margin: 10px;
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
                                <!-- <li><a href="add_category.php">Add Canteen Category</a></li> -->
                                <li><a href="add_restaurant.php">Add new Departments</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery"
                                    aria-hidden="true"></i><span class="hide-menu">Items</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">All Categories</a></li>
                                <li><a href="add_foodCat.php">Edit Item Category</a></li>
                                <li><a href="add_menu.php">Add Item</a></li>


                            </ul>
                        </li>
                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span>Orders</span></a></li>
                        <li> <a href="reports.php"><i class="fa fa-file-text-o"
                                    aria-hidden="true"></i><span>Reports</span></a></li>

                        <li> <a href="item_reports.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span>Items
                                    Report</span></a></li>

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

                                <br>

                                <!-- LINE Chart -->

                                <div>
                                    <h2>Sales Trend Over Time (All Items)</h2>
                                    <?php
                                    $sql = "
                                    SELECT
                                    MAX(rm.remarkDate) AS remarkDate,
                                        SUM(uo.quantity*uo.price) AS total_earnings
                                        
                                    FROM
                                        users_orders uo
                                    JOIN
                                        remark rm ON uo.date = rm.date
                                    WHERE
                                        uo.status = 'closed'
                                    GROUP BY
                                        uo.date;
                                    ";

                                    // Execute the query
                                    $result = $db->query($sql);

                                    // Fetch the query results and store them in $data variable
                                    $data = [];
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        }
                                    }

                                    // Close the database connection
                                   

                                    // Extracting the dates from the query results
                                    $dates = array_column($data, 'remarkDate');

                                    // Extracting the total earnings for all items from the query results
                                    $totalEarnings = array_column($data, 'total_earnings');

                                    // Creating the dataset for the line plot
                                    $dataset = [
                                        'labels' => $dates,
                                        'datasets' => [
                                            [
                                                'label' => 'Total Earnings (All Items)',
                                                'data' => $totalEarnings,
                                                'borderColor' => 'rgba(255, 99, 132, 1)',
                                                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                                            ],
                                        ],
                                    ];

                                    // Converting the dataset to JSON format
                                    $datasetJson = json_encode($dataset);
                                    ?>
                                    <div style="width: 800px; height: 400px;">
                                        <canvas id="linePlot"></canvas>
                                    </div>
                                    <script>
                                    // Parsing the dataset JSON
                                    var dataset = <?php echo $datasetJson; ?>;

                                    // Creating the line plot
                                    var ctx = document.getElementById('linePlot').getContext('2d');
                                    new Chart(ctx, {
                                        type: 'line',
                                        data: dataset,
                                        options: {
                                            responsive: true,
                                            scales: {
                                                x: {
                                                    display: true,
                                                    title: {
                                                        display: true,
                                                        text: 'Date'
                                                    }
                                                },
                                                y: {
                                                    display: true,
                                                    title: {
                                                        display: true,
                                                        text: 'Total Earnings'
                                                    }
                                                }
                                            }
                                        }
                                    });
                                    </script>
                                </div>

                                <br>
                                <!-- bar plots -->
                                <div>
                                    <h2>Sales Comparison between Departments</h2>
                                    <?php
                                    
                                    // Create a list of all department names
                                    $allDepartmentsQuery = $db->query("SELECT title FROM restaurant");
                                    $allDepartments = [];
                                    foreach ($allDepartmentsQuery as $data) {
                                        $allDepartments[] = $data['title'];
                                    }

                                    // Query to get sales for each department (rs_id) based on the 'closed' status in the 'users_orders' table
                                    $query = $db->query("
                                        SELECT
                                            r.title AS department_name,
                                            COALESCE(SUM(uo.quantity * uo.price), 0) AS total_earnings
                                        FROM
                                            restaurant AS r
                                        INNER JOIN
                                            dishes AS d ON r.rs_id = d.rs_id
                                        INNER JOIN
                                            users_orders AS uo ON d.title = uo.title
                                        INNER JOIN
                                            remark AS rm ON uo.date = rm.date AND rm.status = 'closed'
                                        GROUP BY
                                            r.rs_id;
                                    ");

                                    $departmentNames = [];
                                    $departmentEarnings = [];

                                    // Merge the result with the list of all department names
                                    foreach ($allDepartments as $department) {
                                        $departmentNames[] = $department;
                                        $departmentEarnings[] = 0; // Default earnings to 0
                                    
                                        foreach ($query as $data) {
                                            if ($data['department_name'] === $department) {
                                                $departmentEarnings[count($departmentEarnings) - 1] = $data['total_earnings'];
                                                break;
                                            }
                                        }
                                    }

                                    ?>
                                    <div class="chart-container">
                                        <div>
                                            <canvas id="myChart" style="height: 300px; width: 600px;"></canvas>
                                        </div>
                                    </div>

                                    <script>
                                    // Chart
                                    const departmentData = {
                                        labels: <?php echo json_encode($departmentNames) ?>,
                                        datasets: [{
                                            label: 'Department vs Earnings',
                                            data: <?php echo json_encode($departmentEarnings) ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgb(75, 192, 192)',
                                            borderWidth: 1
                                        }]
                                    };

                                    const departmentConfig = {
                                        type: 'bar',
                                        data: departmentData,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    };

                                    var myChart = new Chart(
                                        document.getElementById('myChart'),
                                        departmentConfig
                                    );
                                    </script>
                                </div>
                                <br>


                                <br>

                                <br>
                                <!-- donut chart -->
                                <div>
                                    <h2> Distribution of Orders - Delivered vs. Cancelled</h2>
                                    <?php
                                    // Assuming you have established a database connection

                                    $sql = "
                                    SELECT status, COUNT(*) AS order_count
                                    FROM users_orders
                                    WHERE status IN ('packed','packing','closed', 'rejected')
                                    GROUP BY status;
                                    ";

                                    // Execute the query
                                    $result = $db->query($sql);

                                    // Fetch the query results and store them in $data variable
                                    $data = [];
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $data[] = $row;
                                        }
                                    }

                                    // Close the database connection
                                    $db->close();

                                    // Extracting the statuses and order counts from the query results
                                    $statuses = array_column($data, 'status');
                                    $orderCounts = array_column($data, 'order_count');

                                    // Creating the dataset for the donut graph
                                    $dataset = [
                                        'labels' => $statuses,
                                        'datasets' => [
                                            [
                                                'data' => $orderCounts,
                                                'backgroundColor' => [
                                                    'rgba(255, 99, 132, 0.5)',
                                                    'rgba(54, 162, 235, 0.5)',
                                                    'rgba(255, 205, 86, 0.5)',
                                                    'rgba(75, 192, 192, 0.5)',
                                                    'rgba(153, 102, 255, 0.5)',
                                                ],
                                                'hoverBackgroundColor' => [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 205, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                ],
                                            ],
                                        ],
                                    ];

                                    // Converting the dataset to JSON format
                                    $datasetJson = json_encode($dataset);
                                    ?>



                                    <canvas id="donutGraph"></canvas>

                                    <script>
                                    // Parsing the dataset JSON
                                    var dataset = <?php echo $datasetJson; ?>;

                                    // Creating the donut graph
                                    var ctx = document.getElementById('donutGraph').getContext('2d');
                                    new Chart(ctx, {
                                        type: 'doughnut',
                                        data: dataset,
                                        options: {
                                            responsive: true,
                                            plugins: {
                                                legend: {
                                                    position: 'bottom',
                                                },
                                            },
                                        },
                                    });
                                    </script>
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
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>