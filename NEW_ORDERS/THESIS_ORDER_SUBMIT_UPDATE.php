<!-- PHP -->
<?php

session_start();
$EDIT_ID = $_SESSION['EDIT_ID'];

$serverName = "HUMPS";
$connectionOptions = [
    "Database" => "DLSU",
    "Uid" => "",
    "PWD" => ""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false)
    die(print_r(sqlsrv_errors(), true));

$ORDER_ID = $_POST['ORDER_ID'];
$CUSTOMER_ID = $_POST['CUSTOMER_ID'];
$BOX_ID = $_POST['BOX_ID'];

$BOX_CONTENT = $_POST['BOX_CONTENT'];
$PRODUCT_PRICE = $_POST['PRODUCT_PRICE'];

$DATE_ORDERED = $_POST['DATE_ORDERED'];
$DATE_SHIPPED = $_POST['DATE_SHIPPED'];
$DATE_DELIVERED = $_POST['DATE_DELIVERED'];

$CUSTOMER_NAME = $_POST['CUSTOMER_NAME'];
$PHONE_NO = $_POST['PHONE_NO'];
$CUSTOMER_ADDRESS = $_POST['CUSTOMER_ADDRESS'];

// //COMPLETE
// $sql_order = " UPDATE THESIS_PRODUCT_COMPLETE_DATA
//                  SET
//                      ORDER_ID = '$SUPPLIER_ID'
//                     , PRODUCT_NAME ='$PRODUCT_NAME'
//                     , DATE_RECEIVED ='$DATE_RECEIVED'
//                 WHERE PRODUCT_ID='$EDIT_ID'";
// $results_order = sqlsrv_query($conn, $sql_order);

//orders
$sql_order = " UPDATE THESIS_PER_ORDER_DATA
                 SET
                     ORDER_ID = '$ORDER_ID', CUSTOMER_ID ='$CUSTOMER_ID', BOX_ID ='$BOX_ID'
                   , BOX_CONTENT = '$BOX_CONTENT', PRODUCT_PRICE = '$PRODUCT_PRICE'
                   , DATE_ORDERED = '$DATE_ORDERED', DATE_SHIPPED = '$DATE_SHIPPED' , DATE_DELIVERED  = '$DATE_DELIVERED'
                WHERE ORDER_ID='$EDIT_ID'";
$results_order = sqlsrv_query($conn, $sql_order);
//customer
$sql_customer = " UPDATE THESIS_PER_CUSTOMER_DATA
                  SET
                    CUSTOMER_NAME = '$CUSTOMER_NAME'
                    , PHONE_NO = '$PHONE_NO'
                    , CUSTOMER_ADDRESS = '$CUSTOMER_ADDRESS'
                    , ORDER_ID = '$ORDER_ID', CUSTOMER_ID = '$CUSTOMER_ID'
                    , BOX_CONTENT = '$BOX_CONTENT', PRODUCT_PRICE = '$PRODUCT_PRICE'
                    , DATE_ORDERED = '$DATE_ORDERED' , DATE_SHIPPED = '$DATE_SHIPPED' , DATE_DELIVERED  = '$DATE_DELIVERED'
                WHERE ORDER_ID='$EDIT_ID'";
$results_customer = sqlsrv_query($conn, $sql_customer);
if ($results_order) {
    echo '<script>alert("Product Updated")</script>';
    echo "<script> window.location.href='/thesis/NEW_ORDERS/THESIS_ORDER_REPORT_PAGE.php';</script>";

} else {
    echo 'Error Occured! Kindly repeat.';
}

?>