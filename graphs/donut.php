<?php
// Assuming you have established a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "onlinefoodphp";

// Create a new connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// SQL query to retrieve the data
$sql = "
SELECT status, COUNT(*) AS order_count
FROM users_orders
WHERE status IN ('closed', 'rejected')
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

<!DOCTYPE html>
<html>
<head>
    <title>Donut Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #donutGraph {
            width: 400px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
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
</body>
</html>
