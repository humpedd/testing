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

$SUPPLIER_ID = $_POST['SUPPLIER_ID'];
$PRODUCT_ID = $_POST['PRODUCT_ID'];

$DATE_RECEIVED = $_POST['DATE_RECEIVED'];

$PRODUCT_NAME = $_POST['PRODUCT_NAME']; //FROM SUPPLIER

//products
$sql_product = " UPDATE THESIS_PER_PRODUCT_DATA
                 SET
                      SUPPLIER_ID = '$SUPPLIER_ID'
                    , PRODUCT_NAME ='$PRODUCT_NAME'
                    , DATE_RECEIVED ='$DATE_RECEIVED'
                WHERE PRODUCT_ID='$EDIT_ID'";
$results_product = sqlsrv_query($conn, $sql_product);
// //COMPLETE
// $sql_product = " UPDATE THESIS_PRODUCT_COMPLETE_DATA
//                  SET
//                       SUPPLIER_ID = '$SUPPLIER_ID'
//                     , PRODUCT_NAME ='$PRODUCT_NAME'
//                     , DATE_RECEIVED ='$DATE_RECEIVED'
//                 WHERE PRODUCT_ID='$EDIT_ID'";
// $results_product = sqlsrv_query($conn, $sql_product);


if ($results_product) {
    echo '<script>alert("Product Updated")</script>';
    echo "<script> window.location.href='/thesis/NEW_PRODUCTS/THESIS_PRODUCT_REPORT_PAGE.php';</script>";

} else {
    echo 'Error Occured! Kindly repeat.';
}

?>