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
    // $PRODUCT_ID = $_POST['PRODUCT_ID'];

    $PRODUCT_NAME = $_POST['PRODUCT_NAME'];
    $PRODUCT_QUANTITY = $_POST['PRODUCT_QUANTITY'];

    $SUPPLIER_PRICE = $_POST['SUPPLIER_PRICE'];

//suppliers
$sql_supplier = " UPDATE THESIS_PER_SUPPLIER_DATA
                 SET
                      SUPPLIER_ID = '$SUPPLIER_ID'
                    , PRODUCT_NAME ='$PRODUCT_NAME'
                    , PRODUCT_QUANTITY ='$PRODUCT_QUANTITY'
                    , SUPPLIER_PRICE = '$SUPPLIER_PRICE'
                WHERE SUPPLIER_ID='$EDIT_ID'";
$results_supplier = sqlsrv_query($conn, $sql_supplier);
// //COMPLETE
// $sql_supplier = " UPDATE THESIS_PRODUCT_COMPLETE_DATA
//                  SET
//                       SUPPLIER_ID = '$SUPPLIER_ID'
//                     , PRODUCT_NAME ='$PRODUCT_NAME'
//                     , DATE_RECEIVED ='$DATE_RECEIVED'
//                 WHERE PRODUCT_ID='$EDIT_ID'";
// $results_supplier = sqlsrv_query($conn, $sql_supplier);


if ($results_supplier) {
    echo '<script>alert("Product Updated")</script>';
    echo "<script> window.location.href='.//THESIS_SUPPLIER_REPORT_PAGE.php';</script>";

} else {
    echo 'Error Occured! Kindly repeat.';
}

?>