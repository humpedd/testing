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
$sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA";
$results = sqlsrv_query($conn, $sql);
// date ordered
if (isset($_POST['asc_date_ordered'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY DATE_ORDERED ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_date_ordered'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY DATE_ORDERED DESC";
    $results = sqlsrv_query($conn, $sql);
}

//shipped
if (isset($_POST['asc_date_shipped'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY DATE_SHIPPED ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_date_shipped'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY DATE_SHIPPED DESC";
    $results = sqlsrv_query($conn, $sql);
}
//delivered
if (isset($_POST['asc_date_delivered'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY DATE_DELIVERED ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_date_delivered'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY DATE_DELIVERED DESC";
    $results = sqlsrv_query($conn, $sql);
}
//per customer name
if (isset($_POST['asc_customer_name'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY CUSTOMER_NAME ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_customer_name'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY CUSTOMER_NAME DESC";
    $results = sqlsrv_query($conn, $sql);
}
//per product price
if (isset($_POST['asc_product_price'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY PRODUCT_PRICE ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_product_price'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY PRODUCT_PRICE DESC";
    $results = sqlsrv_query($conn, $sql);
}
//per box content
if (isset($_POST['asc_box_content'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY BOX_CONTENT ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_box_content'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY BOX_CONTENT DESC";
    $results = sqlsrv_query($conn, $sql);
}

$sql2 = "SELECT COUNT(ORDER_ID) as totalcount FROM THESIS_PER_CUSTOMER_DATA ";
$result2 = sqlsrv_query($conn, $sql2);
$totalcount = sqlsrv_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/thesis/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports per Customer</title>
    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9ab424cc56.js" crossorigin="anonymous"></script>

</head>

<body>

<!-- SORT-->
    <div class="dropdown pt-1 px-1 dropdown-list">
        <button id="dropdown-button" onclick="myFunction1()" class="dropbtn" style="padding-left:1rem"><i class="fa-solid fa-sort"></i> Filters</button>
        <form id="percity" action="./THESIS_CUSTOMER_REPORT_PAGE.php" method="POST">
            <div id="myDropdown1" class="dropdown-content">
                
                <button class="dropbtns" value="ASC" type="submit" name="asc_date_ordered">by date ordered ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_date_ordered"> by date ordered descending</button>
                <button class="dropbtns" value="ASC" type="submit" name="asc_date_shipped">by date shipped ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_date_shipped"> by date shipped descending</button>
                <button class="dropbtns" value="ASC" type="submit" name="asc_box_content">by box content ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_box_content">by box content descending</button>
                <button class="dropbtns" value="ASC" type="submit" name="asc_date_delivered">by date delivered ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_date_delivered">by date delivered descending</button>
                <button class="dropbtns" value="ASC" type="submit" name="asc_customer_name">by cutomer name ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_customer_name">by cutomer name descending</button>
                <button class="dropbtns" value="ASC" type="submit" name="asc_product_price">by product price ascending</button>
            <button class="dropbtns" value="ASC" type="submit" name="desc_product_price">by product price descending</button>
            </div>
        </form>
    </div>


    <div style="overflow-y:auto; height: 400px;" class="mx-2">
        <table>
            <tr class="bg-dark" style="color: #f0f0f0; font-family: 'Karla', sans-serif;">

                <th>Customer ID</th>
                <th>Order ID</th>

                <th>Box Content</th>
                <th>Product Price</th>

                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Address</th>

                <th>Date Ordered</th>
                <th>Date Shipped</th>
                <th>Date Delivered</th>

                <th></th>
                <th></th>
                <th></th>

            </tr>
            </thead>

            <?php
            while ($rows = sqlsrv_fetch_array($results)) {

                $fieldname1 = $rows['CUSTOMER_ID'];
                $fieldname2 = $rows['ORDER_ID'];

                $fieldname3 = $rows['BOX_CONTENT'];
                $fieldname4 = $rows['PRODUCT_PRICE'];

                $fieldname5 = $rows['CUSTOMER_NAME'];
                $fieldname6 = $rows['PHONE_NO'];
                $fieldname7 = $rows['CUSTOMER_ADDRESS'];

                $fieldname8 = $rows['DATE_ORDERED'];
                $fieldname9 = $rows['DATE_SHIPPED'];
                $fieldname10 = $rows['DATE_DELIVERED'];

                $php = '<form action="./THESIS_CUSTOMER_EDIT_ID_SESSION.php" method="post">
                <input type="hidden" name="EDIT_ID" value="' . $fieldname2 . '"> 
                <input class="edit_button" type="submit" value="Edit" name="Edit">
            </form>';

                $delete = '<form action="./THESIS_CUSTOMER_DELETE_ID_SESSION.php" method="post">
                <input type="hidden" name="DELETE_ID" value="' . $fieldname2 . '"> 
                <input  onclick="return checkDelete()"  class="edit_button" type="submit" value="Delete" name="Delete"   >
            </form>';
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
                     <td>' . $fieldname10?->format('d/m/Y') . '</td> 

                     <td>' . $php . '</td>
                     <td>' . $delete . '</td>
                   </tr>';
            }

            ?>
        </table>
        <h5 align="center">Total Records:
            <?php echo $totalcount['totalcount']; ?>
        </h5>

    </div>

    <center><a class="button-dark button-length mt-1" href="/thesis/THESIS_HOMEPAGE.PHP"> Go back </a></center>

</body>

</html>
<!-- SCRIPT FOR DELETE -->
<script language="JavaScript" type="text/javascript">
    function checkDelete() {
        return confirm('Are you sure?');
    }
</script>
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

   
</script>