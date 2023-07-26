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
    SELECT date,
        MAX(CASE WHEN title = 'Main Canteen' THEN earnings END) AS `main`,
        MAX(CASE WHEN title = 'IT Canteen' THEN earnings END) AS `it`,
        MAX(CASE WHEN title = 'MBA Canteen' THEN earnings END) AS `mba`
    FROM (
        SELECT DATE(uo.date) AS date, r.title, SUM(uo.price * uo.quantity) AS earnings
        FROM users_orders uo
        JOIN restaurant r ON uo.rs_id = r.rs_id
        WHERE uo.status = 'closed'
        GROUP BY date, r.title
    ) AS subquery
    GROUP BY date;
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

    // Extracting the dates from the query results
    $dates = array_column($data, 'date');

    // Extracting the earnings for each canteen from the query results
    $mainEarnings = array_column($data, 'main');
    $itEarnings = array_column($data, 'it');
    $mbaEarnings = array_column($data, 'mba');

    // Creating the dataset for the line plot
    $dataset = [
        'labels' => $dates,
        'datasets' => [
            [
                'label' => 'Main Canteen',
                'data' => $mainEarnings,
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
            ],
            [
                'label' => 'IT Canteen',
                'data' => $itEarnings,
                'borderColor' => 'rgba(54, 162, 235, 1)',
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
            ],
            [
                'label' => 'MBA Canteen',
                'data' => $mbaEarnings,
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
            ],
        ],
    ];

    // Converting the dataset to JSON format
    $datasetJson = json_encode($dataset);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Line Plot</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
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
                            text: 'Earnings'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
