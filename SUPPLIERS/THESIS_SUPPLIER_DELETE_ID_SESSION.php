<?php
    session_start();
    
    $_SESSION['DELETE_ID'] = $_POST['DELETE_ID'];



$serverName = "HUMPS";
$connectionOptions =
    [
        "Database" => "DLSU",
        "Uid" => "",
        "PWD" => ""
    ];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false) {
    echo 'error';
    die(print_r(sqlsrv_errors(), true));
}else {
    echo "<script> window.location.href='/thesis/SUPPLIERS/delete.php';</script>";

}


?>

