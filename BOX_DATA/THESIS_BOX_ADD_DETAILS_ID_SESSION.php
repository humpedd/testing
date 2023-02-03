<?php
    session_start();
    
    $_SESSION['ADD_DETAILS_ID'] = $_POST['ADD_DETAILS_ID'];



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
    header("Location: /thesis/BOX_DATA/THESIS_BOX_ADD_DETAILS.php");
    exit();
    echo 'Registration Successful';
} else {
    echo 'Error';
}

?>