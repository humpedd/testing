<?php


$serverName = "HUMPS";
$connectionOptions = [
    "Database" => "DLSU",
    "Uid" => "",
    "PWD" => ""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false)
    die(print_r(sqlsrv_errors(), true));


// eto yung sa database na babaguhin
$sql = "SELECT Count(REGISTRATION_ID) as nn FROM REGISTRATIONFORM WHERE FIRST_NAME = 'test'"; //type1
$results = sqlsrv_query($conn, $sql);
$data = sqlsrv_fetch_array($results);
// eto yung hahanapin sa java script
$id = $data['nn'];

$sql2 = "SELECT Count(REGISTRATION_ID) as nn FROM REGISTRATIONFORM WHERE  FIRST_NAME = 'null'"; //type2
$results2 = sqlsrv_query($conn, $sql2);
$data2 = sqlsrv_fetch_array($results2);
$id2 = $data2['nn'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link href="./bebestyle.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
</head>

<body class="bg-white">
    <div class="topnav mb-2" style="background-color: #2a384c">
        <a class="active" href="#home">Home</a>
        <a href="/thesis/NEW_ORDERS/THESIS_ORDER_REPORT_PAGE.php">Orders</a>
        <a href="/thesis/CUSTOMERS/THESIS_CUSTOMER_REPORT_PAGE.php">Customers</a>
        <a href="/thesis/BOX_DATA/THESIS_BOX_REPORT_PAGE.php">Box</a>
        <a href="/thesis/SUPPLIERS/THESIS_SUPPLIER_REPORT_PAGE.php">Suppliers</a>
        <a href="/thesis/NEW_PRODUCTS/THESIS_PRODUCT_REPORT_PAGE.php">Products</a>

        <a href="#about">Search</a>
        <form id="registration" action="THESIS_SEARCH_ID_SESSION.php" method="POST">
            <input type="text" class="mb-2 full-field" name="SEARCH_ID" value="" placeholder="Enter ID"
                style="margin-top: 20px;" />
            <!-- MATCH WITH ANY IDs -->
        </form>
        <a href="/thesis/NEW_PRODUCTS/THESIS_PRODUCT_ADD_NEW.php">Add Product</a>
        <a href="/thesis/NEW_ORDERS/THESIS_ORDER_ADD_NEW.php">Add Order</a>
        <a href="/thesis/SUPPLIERS/THESIS_SUPPLIER_ADD_NEW.php">Add Supplier</a>


    </div>

    <div class="block-weighted">
        <div class="weight-50">
            <div class="box">
                <center>
                    <h1 class="h2 pt-2">
                        Recent Log
                    </h1>
                </center>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
                <div class="block-weighted mt-2">
                    <div class="weight-50 ml-2">
                        <label class="label">
                            ID: 1234567890
                        </label>
                    </div>
                    <div class="weight-50 ml-3">
                        <label class="label">
                            Date: 05/06/2000
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="weight-50">
            <div id="container" style="width: 100%; height: 100%" style=" background-color: #d1d9df"></div>
        </div>
    </div>
</body>

</html>
<!-- JavaScript -->
<script>
    let a = <?php echo $id ?>;
    let b = <?php echo $id2 ?>;
    anychart.onDocumentReady(function () {


        var data = [

            // name of data in shown chart
            { x: "Toys", value: a },
            { x: "Guns", value: b },

        ];

        var chart = anychart.pie();
        //title ng chart
        chart.title("Product Sales");

        chart.data(data);

        chart.container('container');
        chart.draw();
        chart.radius("50%")
        chart.background().fill("#f0f0f0");

    });
</script>