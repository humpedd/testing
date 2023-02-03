<?php
$serverName = "HUMPS";
$connectionOptions = [
    "Database" => "DLSU",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false) {
    die(print_r(sqlsrv_errors(), true));
}


$sql = " SELECT * FROM THESIS_PRODUCT_DATA";
$results = sqlsrv_query($conn, $sql);

?>

<DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
            rel="stylesheet">
        <title>Report Page</title>
    </head>

    <body class="bg-white">
        <u style="text-decoration-skip-ink: none;">
            <h1 class="h2 px-3 pt-2">Reports</h1>
        </u>

        <div class="div-bottom-line">
            <div class="px-3">
                <div class="dropdown pt-1 px-1">
                    <b><a href="testReport.php" class="dropbtn">All</a></b>
                </div>
                <!-- PER CITY -->
                <div class="dropdown pt-1 px-1 dropdown-list">
                    <!-- TO ADD ORDERS PAGE -->
                    <button id="dropdown-button" onclick="window.location.href='/thesis/NEW_ORDERS/THESIS_ORDER_REPORT_PAGE.php'"
                        class="dropbtn">Orders</button>
                </div>
                <div class="dropdown pt-1 px-1 dropdown-list">
                    <!-- TO ADD CUSTOMERS PAGE -->
                    <button id="dropdown-button" onclick="window.location.href='/thesis/CUSTOMERS/THESIS_CUSTOMER_REPORT_PAGE.php'"
                        class="dropbtn">Customers</button>
                </div>
                <div class="dropdown pt-1 px-1 dropdown-list">
                    <!-- TO ADD PRODUCTS PAGE -->
                    <button id="dropdown-button"
                        onclick="window.location.href='NEW_PRODUCTS/THESIS_PRODUCT_REPORT_PAGE.php'"
                        class="dropbtn">Products</button>
                </div>
                <div class="dropdown pt-1 px-1 dropdown-list">
                    <!-- TO ADD PRODUCTS PAGE -->
                    <button id="dropdown-button" onclick="window.location.href='SUPPLIERS/THESIS_SUPPLIER_REPORT_PAGE.php'"
                        class="dropbtn">Supplier</button>
                </div>
                <div class="dropdown pt-1 px-1 dropdown-list">
                    <!-- PER BOX PAGE -->
                    <button id="dropdown-button" onclick="window.location.href='BOX_DATA/THESIS_BOX_REPORT_PAGE.php'"
                        class="dropbtn">Box</button>
                </div>
                <div class="dropdown  dropdown-list1">
                    <p class="dropbtn" style="padding:0px">Search</p>
                </div>
                <div class="dropdown ">
                    <form id="registration" action="THESIS_SEARCH_ID_SESSION.php" method="POST">
                        <input type="text" class="mb-2 full-field" name="SEARCH_ID" value="" placeholder="Enter ID" />
                        <!-- MATCH WITH ANY IDs -->
                    </form>
                </div>
            </div>
            <div class="px-3">
                <div class="dropdown px-adjust dropdown-list1">
                    <button id="dropdown-button" class="dropbtn mb-1"
                        onclick="window.location.href='SUPPLIERS/THESIS_SUPPLIER_ADD_NEW.php'">
                        Add Supplier</button>
                </div>
                <div class="dropdown px-adjust dropdown-list1">
                    <button id="dropdown-button" class="dropbtn mb-1"
                        onclick="window.location.href='NEW_PRODUCTS/THESIS_PRODUCT_ADD_NEW.php'">
                        Add Product</button>
                </div>
                <div class="dropdown px-adjust dropdown-list1">
                    <button id="dropdown-button" class="dropbtn mb-1"
                        onclick="window.location.href='NEW_ORDERS/THESIS_ORDER_ADD_NEW.php'">
                        Add Order</button>
                </div>


            </div>

        </div>
        <div class="content-center pt-1">
        </div>
        <div style="overflow-y:auto; height: 400px;" class="mx-2">
            <table>
                <tr class="bg-dark" style="color: #f0f0f0; font-family: 'Karla', sans-serif;">
                    <th>Product ID</th>
                    <th>Box ID</th>
                    <th>Supplier ID</th>
                    <th>Customer ID</th>
                    <th>Order ID</th>
                    <th>Box Content</th>
                    <th>Product Price</th>
                    <th>Date Received</th>
                    <th>Date Shipped</th>


                </tr>
                <?php
                while ($rows = sqlsrv_fetch_array($results)) {

                    $fieldname1 = $rows['PRODUCT_ID'];
                    $fieldname2 = $rows['BOX_ID'];
                    $fieldname3 = $rows['SUPPLIER_ID'];
                    $fieldname4 = $rows['CUSTOMER_ID'];

                    $fieldname5 = $rows['ORDER_ID'];
                    $fieldname6 = $rows['BOX_CONTENT'];
                    $fieldname7 = $rows['PRODUCT_PRICE'];

                    $fieldname8 = $rows['DATE_RECEIVED'];
                    $fieldname9 = $rows['DATE_SHIPPED'];
                    echo '<tr>
                         <td>' . $fieldname1 . '</td>
                         <td>' . $fieldname2 . '</td>
                         <td>' . $fieldname3 . '</td>
                         <td>' . $fieldname4 . '</td>

                         <td>' . $fieldname5 . '</td>
                         <td>' . $fieldname6 . '</td>
                         <td>' . $fieldname7 . '</td>

                         <td>' . $fieldname8?->format('d/m/Y') . '</td>
                         <td>' . $fieldname9?->format('d/m/Y') . '</td>
                        </tr>';
                }
                ?>

            </table>

        </div>

        </div>
        <a class="button-dark submit-length mt-2 " href="./testHome.php">
            Logout</a>

        <br>
        <br>
        <br>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            // dropdown1
            $(document).ready(function () {
                // Show hide popover
                $(".dropdown-list").click(function () {
                    $(this).find(".dropdown-content").slideToggle("fast");
                });
            });
            $(document).on("click", function (event) {
                var $trigger = $(".dropdown-list");
                if ($trigger !== event.target && !$trigger.has(event.target).length) {
                    $(".dropdown-content").slideUp("fast");
                }
            });

            // dropdown2
            $(document).ready(function () {
                // Show hide popover
                $(".dropdown-list1").click(function () {
                    $(this).find(".dropdown-content2").slideToggle("fast");
                });
            });
            $(document).on("click", function (event) {
                var $trigger = $(".dropdown-list1");
                if ($trigger !== event.target && !$trigger.has(event.target).length) {
                    $(".dropdown-content2").slideUp("fast");
                }
            });

            // dropdown3
            $(document).ready(function () {
                // Show hide popover
                $(".dropdown-list2").click(function () {
                    $(this).find(".dropdown-content3").slideToggle("fast");
                });
            });
            $(document).on("click", function (event) {
                var $trigger = $(".dropdown-list2");
                if ($trigger !== event.target && !$trigger.has(event.target).length) {
                    $(".dropdown-content3").slideUp("slow");
                }
            });
        </script>