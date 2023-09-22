<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Bill</title>
    <link href="bill.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            html,
            body {
                width: 210mm;
                height: 297mm;
            }
            /* ... the rest of the rules ... */
        }

        body {
            background: #EEE;
            /* font-size:0.9em !important; */
        }

        .bigfont {
            font-size: 3rem !important;
        }

        .invoice {
            width: 970px !important;
            margin: 50px auto;
        }

        .logo {
            float: left;
            padding-right: 10px;
            margin: 10px auto;
        }

        dt {
            float: left;
        }

        dd {
            float: left;
            clear: right;
        }

        .customercard {
            min-width: 65%;
        }

        .itemscard {
            min-width: 98.5%;
            margin-left: 0.5%;
        }

        .logo {
            max-width: 5rem;
            margin-top: -0.25rem;
        }

        .invDetails {
            margin-top: 0rem;
        }

        .pageTitle {
            margin-bottom: -1rem;
        }
    </style>
</head>
<body>
    <?php
    include("connection/connect.php"); // Include your database connection script
    error_reporting(0);

    // Check if the orderID is provided as a query parameter
    if (isset($_GET['orderID']) && !empty($_GET['orderID'])) {
        $orderID = $_GET['orderID'];

        // Query the database to get order details based on orderID
        $query = "SELECT * FROM users_orders WHERE date  = '$orderID'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) > 0) {
            // Display the order details and calculate the total amount
            $totalAmount = 0;
            ?>
            <div class="invoice">
                <div class="invoice-header">
                    <div class="ui left aligned grid">
                        <div class="row">
                            <div class="left floated left aligned six wide column">
                                <div class="ui">
                                    <h1 class="ui header pageTitle">Invoice</h1>
                                    <h4 class="ui sub header invDetails">Order ID: 554775/R1 | Date: 01/01/2015</h4>
                                </div>
                            </div>
                            <div class="right floated left aligned six wide column">
                                <div class="ui">
                                    <div class="column two wide right floated">
                                        <img class="logo" src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2019/04/attachment_94168375-e1554226974295.jpg?auto=format&q=60&fit=max&w=930" />
                                        <ul class="">
                                            <li><strong>AVVP Foods</strong></li>
                                            <li>IT Canteen</li>
                                            <li>Near AB3</li>
                                            <li>amritafoods@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui segment cards">
                    <div class="ui segment itemscard">
                        <div class="content">
                            <table class="ui celled table">
                                <thead>
                                    <tr>
                                        <th>Item / Details</th>
                                        <th class="text-center colfix">Item Cost</th>
                                        <th class="text-center colfix">Quantity</th>
                                        <th class="text-center colfix">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['title']; ?></td>
                                            <td class="text-right">
                                                <span class="mono">₹<?php echo $row['price']; ?></span>
                                            </td>
                                            <td class="text-right">
                                                <small class="text-muted"><?php echo $row['quantity']; ?> Units</small>
                                            </td>
                                            <td class="text-right">
                                                <strong class="mono">₹<?php echo $row['price'] * $row['quantity']; ?></strong>
                                            </td>
                                        </tr>
                                        <?php
                                        $totalAmount += $row['price'] * $row['quantity'];
                                    }
                                    ?>
                                </tbody>
                                <tfoot class="full-width">
                                    <tr>
                                        <th>Total:</th>
                                        <th colspan="2"></th>
                                        <th colspan="1">₹<?php echo $totalAmount; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<p>Order not found.</p>";
        }
    } else {
        echo "<p>Invalid order ID.</p>";
    }

    // Close the database connection
    mysqli_close($db);
    ?>
    <div class="print-button">
        <button onclick="printBillPage()">Print Bill</button>
    </div>
</body>
</html> -->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Bill</title>
    <link href="bill.css" rel="stylesheet">
    
</head>
<body>
    <?php
    include("connection/connect.php"); // Include your database connection script
    error_reporting(0);

    // Check if the orderID is provided as a query parameter
    if (isset($_GET['orderID']) && !empty($_GET['orderID'])) {
        $orderID = $_GET['orderID'];

        // Query the database to get order details based on orderID
        $query = "SELECT * FROM users_orders WHERE date  = '$orderID'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) > 0) {
            // Display the order details and calculate the total amount
            $totalAmount = 0;
            ?>
            <h1>Order Bill</h1>
            <b>Date: </b> <?php echo $orderID; ?>
            <br><br>
            <table >
                <thead>
                    <tr>
                        <th>Item / Details</th>
                        <th>Item Cost</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td>Rs <?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>Rs <?php echo $row['price'] * $row['quantity']; ?></td>
                        </tr>
                        <?php
                        $totalAmount += $row['price'] * $row['quantity'];
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total Amount:</th>
                        <th>Rs <?php echo $totalAmount; ?></th>
                    </tr>
                </tfoot>
            </table>
            <?php
        } else {
            echo "<p>Order not found.</p>";
        }
    } else {
        echo "<p>Invalid order ID.</p>";
    }

    // Close the database connection
    mysqli_close($db);
    ?>
</body>
</html>
