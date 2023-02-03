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
$ADMIN_ID = $_POST['ADMIN_ID'];
$ADMIN_PASSWORD = $_POST['ADMIN_PASSWORD'];


$sql = "SELECT * FROM THESIS_ADMIN_LOGINPASS_DATA
        WHERE ADMIN_ID= ('$ADMIN_ID')";
$results = sqlsrv_query($conn, $sql);
$userid=sqlsrv_fetch_array($results);

$passwordhash=md5($ADMIN_PASSWORD);

if ($passwordhash == $userid['ADMIN_PASSWORD']) {
    header("Location: THESIS_REPORT_PAGE_ADMIN.php");
    exit();
    echo 'Registration Successful';
} else {
    echo "<script>
    alert('You have entered incorrect password or Admin ID');
    window.location.href='./THESIS_LOGIN_PAGE_DATA.PHP';
    </script>";
}

?>