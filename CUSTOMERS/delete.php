<!-- GET USER ID FROM SESSION -->
<?php
error_reporting(0);
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

session_start();

$DELETE_ID = $_SESSION['DELETE_ID'];
echo $CONFIRM;

    $sql = "DELETE FROM THESIS_PER_CUSTOMER_DATA
         WHERE ORDER_ID=('$DELETE_ID')
         DELETE FROM THESIS_PER_ORDER_DATA
         WHERE ORDER_ID=('$DELETE_ID')";
    $results = sqlsrv_query($conn, $sql);
    if ($results) {
        echo "<script> window.location.href='./THESIS_CUSTOMER_REPORT_PAGE.php';</script>";
    } else {
        echo 'Error';
    }

?>

