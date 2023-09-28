<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css">
    <title>Order Bill</title>

    <style>
        /* h1 {
            text-align: center;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot th {
            background-color: #f2f2f2;
            text-align: right;
        }

        b {
            font-weight: bold;
        }

        p {
            text-align: center;
        }

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

        .print-button {
            text-align: center;
            margin-top: 20px;
            margin-left: center;
        }
    </style>

    <script>
        function printBillPage() {
            window.print();
        }

        function populateInvoiceDetails() {
            const companyName = "TFS Products";
            const companyAddress = "Masunagudi Village, Near Ooty";
            const companyEmail = "tribalproducts@gmail.com";

            document.getElementById("company-name").textContent = companyName;
            document.getElementById("company-address").textContent = companyAddress;
            document.getElementById("company-email").textContent = companyEmail;

        }

        // Call the function when the page loads
        window.onload = populateInvoiceDetails;
    </script>

</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="container invoice">


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
                <div class="invoice-header">
                    <div class="ui left aligned grid">
                        <div class="row">
                            <div class="left floated left aligned six wide column">
                                <div class="ui">
                                    <h1 class="ui header pageTitle">Order Bill </h1>
                                    <h4 class="ui sub header invDetails">
                                        <b>Date: </b>
                                        <?php echo $orderID; ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="right floated left aligned six wide column">
                                <div class="ui">
                                    <div class="column two wide right floated">
                                        <img class="logo"
                                            src="https://png.pngtree.com/png-clipart/20191121/original/pngtree-tribal-logo-vector-png-image_5146122.jpg" />
                                        <ul class="">
                                            <li id="company-name"></li>
                                            <li id="company-address"></li>
                                            <li id="company-email"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui segment cards">
                    <table>
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
                                    <td>
                                        <?php echo $row['title']; ?>
                                    </td>
                                    <td>Rs
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['quantity']; ?>
                                    </td>
                                    <td>Rs
                                        <?php echo $row['price'] * $row['quantity']; ?>
                                    </td>
                                </tr>
                                <?php
                                $totalAmount += $row['price'] * $row['quantity'];
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total Amount:</th>
                                <th style="text-align:left">Rs
                                    <?php echo $totalAmount; ?>
                                </th>
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



            <div class="ui card">
                <div class="content center aligned text segment">
                    <small class="ui sub header"> Amount to be Paid: </small>

                    <p class="bigfont">Rs
                        <?php echo $totalAmount; ?>
                    </p>
                </div>
            </div>
            <div class="ui card">
                <div class="content center aligned text segment">
                    <div class="header">Payment Details</div>
                </div>
                <div class="content">
                    <p> <strong> Account Name: </strong> <span id="payment-account"></span> </p>

                </div>
            </div>
            <div class="ui card">
                <div class="content center aligned text segment">
                    <div class="header">Notes</div>
                </div>
                <div class="content center aligned text segment">
                    Your order is successful!!!
                </div>
            </div>



        </div>
        <div class="print-button">
            <button onclick="printBillPage()">Print Bill</button>
        </div>
    </div>

</body>

</html>