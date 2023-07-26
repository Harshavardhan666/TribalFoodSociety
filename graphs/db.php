<?php
$servername = "localhost"; //server
$username = "root"; //username
$password = ""; //password
$dbname = "onlinefoodphp";  //database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT rs_id, COUNT(*) as count FROM dishes GROUP BY rs_id";
$result = $conn->query($sql);

$data = array();

// Fetch data into an associative array
while ($row = $result->fetch_assoc()) {
    $data[$row['rs_id']] = $row['count'];
}

// Close the database connection
$conn->close();
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

        var options = {
            title: 'Category Distribution',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div id="piechart" style="width: 500px; height: 500px;"></div>
</body>

</html>
