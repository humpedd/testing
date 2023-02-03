<?php
    session_start();
    
    $_SESSION['EDIT_ID'] = $_POST['EDIT_ID'];


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
}


$results = sqlsrv_query($conn, $sql);
if ($results) {
    header("Location: /thesis/NEW_PRODUCTS/THESIS_PRODUCT_UPDATE.php");
    exit();
    echo 'Registration Successful';
} else {
    echo 'Error';
}

?>