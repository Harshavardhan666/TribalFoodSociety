
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
