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

$SUPPLIER_ID = $_POST['SUPPLIER_ID'];
$PRODUCT_ID = $_POST['PRODUCT_ID'];

$PRODUCT_NAME = $_POST['PRODUCT_NAME'];

$DATE_RECEIVED = $_POST['DATE_RECEIVED'];

// //complete, NEW
// $sql_complete = "INSERT INTO THESIS_PRODUCT_COMPLETE_DATA
//             ( SUPPLIER_ID, PRODUCT_ID
//             , PRODUCT_NAME
//             , DATE_RECEIVED
//             )
//              -- DATE SHIPPED, DELIVERED, ORDERED IS UPDATED VIA ADMIN FROM ORDERS
//             --  CUSTOMER, ORDER, BOX ID IS TO BE ADDED FROM ORDERS/CUSTOMER
//         VALUES 
//             ('$SUPPLIER_ID', '$PRODUCT_ID' 
//             ,'$PRODUCT_NAME'
//             ,'$DATE_RECEIVED'
//             )";
// $results_complete = sqlsrv_query($conn, $sql_complete);

//bocx
$sql_box = " INSERT INTO THESIS_PER_BOX_DATA
                    (PRODUCT_ID) 
                VALUES 
                    ('$PRODUCT_ID')";
// DATA IS COMPLETE IF BOX INFORMATION IS FILLED UP
$results_box = sqlsrv_query($conn, $sql_box);
//products
$sql_product = " INSERT INTO THESIS_PER_PRODUCT_DATA
                        ( PRODUCT_ID
                        , SUPPLIER_ID
                        , PRODUCT_NAME
                        , DATE_RECEIVED
                        )
                VALUES 
                    ( '$PRODUCT_ID'
                    , '$SUPPLIER_ID'
                    , '$PRODUCT_NAME'
                    , '$DATE_RECEIVED'
                    )";
$results_product = sqlsrv_query($conn, $sql_product);
//update supplier with product id
$sql_product = " UPDATE THESIS_PER_SUPPLIER_DATA
        SET
             PRODUCT_ID = '$PRODUCT_ID'
       WHERE SUPPLIER_ID='$SUPPLIER_ID'";
$results_product = sqlsrv_query($conn, $sql_product);
if ($results_product) {
    echo '<script>alert("Product Added")</script>';
    echo "<script> window.location.href='/thesis/NEW_PRODUCTS/THESIS_PRODUCT_REPORT_PAGE.php';</script>";
} else {
    echo 'Error Occured! Kindly repeat.';
}
?>