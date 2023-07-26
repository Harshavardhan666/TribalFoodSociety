<!-- <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <title>Document</title>
        </head>
<body>
<div>
  <canvas id="myChart"></canvas>
</div>


<?php
    $con = new mysqli("localhost","root","","onlinefoodphp");
    $query = $con->query("SELECT title, price FROM users_orders ");
    foreach($query as $data)
    {
        $title[] = $data['title'];
        $price[] = $data['price'];
    }
?>

<script>
const labels = <?php echo json_encode($title) ?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config={
    type: 'bar',
    data:data,
    options: {
        scales:{
            y:{
                beginAtZero: true
            }
        }
    },
}
var mychart = new Chart(
    document.getElementById('myChart'),
    config
);

</script>
</body>
</html> -->

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <title>Document</title>
        </head>
<body>
<div>
  <canvas id="myChart" style="height: 10%; width: 400px;margin: 0px 150px;" ></canvas>
</div>

<?php
$servername = "localhost"; //server
$username = "root"; //username
$password = ""; //password
$dbname = "onlinefoodphp";  //database
    $con = new mysqli("localhost","root","","onlinefoodphp");
    $query = $con->query("
    SELECT uo.title, SUM(uo.quantity) AS total_quantity
    FROM users_orders uo
    JOIN restaurant r ON uo.rs_id = r.rs_id
    WHERE r.title = 'Main Canteen' AND DATE(uo.date) = '2023-06-03' AND uo.status = 'closed'
    GROUP BY uo.title;

    ");
    foreach($query as $data)
    {
        $title[] = $data['title'];
        $quantity[] = $data['total_quantity'];
    }
?>

<script>
const labels = <?php echo json_encode($title) ?>;
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: <?php echo json_encode($quantity) ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config={
    type: 'bar',
    data:data,
    options: {
        scales:{
            y:{
                beginAtZero: true
            }
        }

        
    },
}
var mychart = new Chart(
    document.getElementById('myChart'),
    config
);

</script>
</body>
</html>