<?php
// DATA GOES TO NEW/COMPLETE DATABASE & PER PRODUCTS DATABASE
$serverName = "HUMPS";
$connectionOptions = [
    "Database" => "DLSU",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false)
    die(print_r(sqlsrv_errors(), true));

session_start();
$ORDER_ID = $_SESSION['ORDER_ID'];
$CUSTOMER_ID = $_SESSION['CUSTOMER_ID'];
$BOX_ID = $_SESSION['BOX_ID'];

$BOX_CONTENT = $_SESSION['BOX_CONTENT'];
$PRODUCT_PRICE = $_SESSION['PRODUCT_PRICE'];
$DATE_ORDERED = $_SESSION['DATE_ORDERED'];

$CUSTOMER_NAME = $_POST['CUSTOMER_NAME'];
$PHONE_NO = $_POST['PHONE_NO'];
$CUSTOMER_ADDRESS = $_POST['CUSTOMER_ADDRESS'];



// //complete, NEW
// $sql_complete = "INSERT INTO THESIS_PRODUCT_COMPLETE_DATA
//             ( BOX_ID, ORDER_ID
//             , CUSTOMER_ID
//             , BOX_CONTENT
//             )
//              -- DATE SHIPPED, DELIVERED, ORDERED IS UPDATED VIA ADMIN FROM ORDERS
//             --  CUSTOMER, ORDER, BOX ID IS TO BE ADDED FROM ORDERS/CUSTOMER
//         VALUES 
//             ('$BOX_ID', '$ORDER_ID' 
//             ,'$CUSTOMER_ID'
//             ,'$BOX_CONTENT'
//             )";
// $results_complete = sqlsrv_query($conn, $sql_complete);

$sql_order = " INSERT INTO THESIS_PER_ORDER_DATA
                        ( ORDER_ID, BOX_ID, CUSTOMER_ID
                        , BOX_CONTENT, PRODUCT_PRICE, DATE_ORDERED
                        )
                VALUES 
                    ( '$ORDER_ID', '$BOX_ID', '$CUSTOMER_ID'
                    , '$BOX_CONTENT', '$PRODUCT_PRICE', '$DATE_ORDERED'
                    )";
$results_order = sqlsrv_query($conn, $sql_order);

$sql_customer = " INSERT INTO THESIS_PER_CUSTOMER_DATA
        ( CUSTOMER_NAME
        , PHONE_NO
        , CUSTOMER_ADDRESS
        , ORDER_ID, CUSTOMER_ID
        , BOX_CONTENT, PRODUCT_PRICE, DATE_ORDERED
        )
VALUES 
    ( '$CUSTOMER_NAME'
    , '$PHONE_NO'
    , '$CUSTOMER_ADDRESS'
    , '$ORDER_ID', '$CUSTOMER_ID'
    , '$BOX_CONTENT', '$PRODUCT_PRICE', '$DATE_ORDERED'
    )";
$results_customer = sqlsrv_query($conn, $sql_customer);


if ($results_order) {
    echo '<script>alert("Product Added")</script>';
    echo "<script> window.location.href='/thesis/NEW_ORDERS/THESIS_ORDER_REPORT_PAGE.php';</script>";
} else {
    echo 'Error Occured! Kindly repeat.';
}
?>