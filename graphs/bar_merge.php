<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Bar plot</title>
    <style>
      .chart-container {
        display: flex;
        justify-content: space-around;
        margin: 50px;
      }
    </style>
  </head>
  <body>
    <div class="chart-container">
      <div>
        <canvas id="myChart1" style="height: 300px; width: 600px;"></canvas>
      </div>
      <div>
        <canvas id="myChart3" style="height: 300px; width: 600px;"></canvas>
      </div>
      <div>
        <canvas id="myChart4" style="height: 300px; width: 600px;"></canvas>
      </div>
    </div>
    <div class="chart-container">
      <div>
        <canvas id="myChart2" style="height: 300px; width: 600px;"></canvas>
      </div>
      <div>
        <canvas id="myChart5" style="height: 300px; width: 600px;"></canvas>
      </div>
      <div>
        <canvas id="myChart6" style="height: 300px; width: 600px;"></canvas>
      </div>
    </div>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "onlinefoodphp";
    $con = new mysqli($servername, $username, $password, $dbname);

    // Query 1
    $query1 = $con->query("
    SELECT u.title, SUM(u.quantity) AS total_quantity
    FROM users_orders u
    JOIN restaurant r ON u.rs_id = r.rs_id
    WHERE r.title = 'Main Canteen' AND u.status = 'closed'
    GROUP BY u.title;
    ");

    $title1 = [];
    $quantity1 = [];

    foreach ($query1 as $data) {
      $title1[] = $data['title'];
      $quantity1[] = $data['total_quantity'];
    }

    // Query 2
    $query2 = $con->query("
    SELECT r.title AS res_title, SUM(uo.price * uo.quantity) AS total_earnings
    FROM restaurant AS r
    INNER JOIN users_orders AS uo ON r.rs_id = uo.rs_id
    WHERE uo.status = 'closed'
    GROUP BY r.title;
    ");

    $title2 = [];
    $earnings2 = [];

    foreach ($query2 as $data) {
      $title2[] = $data['res_title'];
      $earnings2[] = $data['total_earnings'];
    }

    // Query 3
    $query3 = $con->query("
    SELECT u.title, SUM(u.quantity) AS total_quantity
    FROM users_orders u
    JOIN restaurant r ON u.rs_id = r.rs_id
    WHERE r.title = 'IT Canteen' AND u.status = 'closed'
    GROUP BY u.title;
    ");

    $title3 = [];
    $quantity3 = [];

    foreach ($query3 as $data) {
      $title3[] = $data['title'];
      $quantity3[] = $data['total_quantity'];
    }

    // Query 4
    $query4 = $con->query("
    SELECT u.title, SUM(u.quantity) AS total_quantity
    FROM users_orders u
    JOIN restaurant r ON u.rs_id = r.rs_id
    WHERE r.title = 'MBA Canteen'  AND u.status = 'closed'
    GROUP BY u.title;
    ");

    $title4 = [];
    $quantity4 = [];

    foreach ($query4 as $data) {
      $title4[] = $data['title'];
      $quantity4[] = $data['total_quantity'];
    }

    // Query 5
    $query5 = $con->query("
    SELECT r.title AS restaurant_title, SUM(uo.price * uo.quantity) AS total_earnings
    FROM users_orders uo
    JOIN restaurant r ON uo.rs_id = r.rs_id
    WHERE uo.date BETWEEN (
        SELECT MAX(date) - INTERVAL 7 DAY
        FROM users_orders
    ) AND (
        SELECT MAX(date)
        FROM users_orders
    )
    AND uo.status = 'closed'
    GROUP BY r.title;
    ");

    $title5 = [];
    $earnings5 = [];

    foreach ($query5 as $data) {
      $title5[] = $data['restaurant_title'];
      $earnings5[] = $data['total_earnings'];
    }

    // Query 6
    $query6 = $con->query("
    SELECT r.title AS restaurant_title, SUM(uo.price * uo.quantity) AS total_earnings
FROM users_orders uo
JOIN restaurant r ON uo.rs_id = r.rs_id
WHERE uo.date BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE()
  AND uo.status = 'closed'
GROUP BY r.title;

    ");

    $title6 = [];
    $earnings6 = [];

    foreach ($query6 as $data) {
      $title6[] = $data['restaurant_title'];
      $earnings6[] = $data['total_earnings'];
    }

    $con->close();
    ?>

    <script>
      // Chart 1
      const labels1 = <?php echo json_encode($title1) ?>;
      const data1 = {
        labels: labels1,
        datasets: [
          {
            label: 'Item vs Quantity (Main Canteen)',
            data: <?php echo json_encode($quantity1) ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1
          }
        ]
      };

      const config1 = {
        type: 'bar',
        data: data1,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      var myChart1 = new Chart(
        document.getElementById('myChart1'),
        config1
      );

      // Chart 2
      const labels2 = <?php echo json_encode($title2) ?>;
      const data2 = {
        labels: labels2,
        datasets: [
          {
            label: 'Canteen vs Earnings',
            data: <?php echo json_encode($earnings2) ?>,
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgb(255, 159, 64)',
            borderWidth: 1
          }
        ]
      };

      const config2 = {
        type: 'bar',
        data: data2,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      var myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
      );

      // Chart 3
      const labels3 = <?php echo json_encode($title3) ?>;
      const data3 = {
        labels: labels3,
        datasets: [
          {
            label: 'Item vs Quantity (IT Canteen)',
            data: <?php echo json_encode($quantity3) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 1
          }
        ]
      };

      const config3 = {
        type: 'bar',
        data: data3,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      var myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
      );

      // Chart 4
      const labels4 = <?php echo json_encode($title4) ?>;
      const data4 = {
        labels: labels4,
        datasets: [
          {
            label: 'Item vs Quantity (MBA Canteen)',
            data: <?php echo json_encode($quantity4) ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgb(75, 192, 192)',
            borderWidth: 1
          }
        ]
      };

      const config4 = {
        type: 'bar',
        data: data4,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      var myChart4 = new Chart(
        document.getElementById('myChart4'),
        config4
      );

      // Chart 5
      const labels5 = <?php echo json_encode($title5) ?>;
      const data5 = {
        labels: labels5,
        datasets: [
          {
            label: 'Canteen vs Earnings (Last 7 Days)',
            data: <?php echo json_encode($earnings5) ?>,
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgb(153, 102, 255)',
            borderWidth: 1
          }
        ]
      };

      const config5 = {
        type: 'bar',
        data: data5,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      var myChart5 = new Chart(
        document.getElementById('myChart5'),
        config5
      );

      // Chart 6
      const labels6 = <?php echo json_encode($title6) ?>;
      const data6 = {
        labels: labels6,
        datasets: [
          {
            label: 'Canteen vs Earnings (Last Month)',
            data: <?php echo json_encode($earnings6) ?>,
            backgroundColor: 'rgba(255, 205, 86, 0.2)',
            borderColor: 'rgb(255, 205, 86)',
            borderWidth: 1
          }
        ]
      };

      const config6 = {
        type: 'bar',
        data: data6,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      var myChart6 = new Chart(
        document.getElementById('myChart6'),
        config6
      );
    </script>
  </body>
</html>
