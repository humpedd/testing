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
$EMPLOYEE_ID = $_POST['EMPLOYEE_ID'];
$EMPLOYEE_PASSWORD = $_POST['EMPLOYEE_PASSWORD'];


$sql = "SELECT * FROM THESIS_LOGINPASS_DATA
        WHERE EMPLOYEE_ID= ('$EMPLOYEE_ID')";
$results = sqlsrv_query($conn, $sql);
$userid=sqlsrv_fetch_array($results);

$passwordhash=md5($EMPLOYEE_PASSWORD);

if ($passwordhash == $userid['EMPLOYEE_PASSWORD']) {
    header("Location: THESIS_REPORT_PAGE_REGULAR.php");
    exit();
    echo 'Registration Successful';
} else {
    echo "<script>
    alert('You have entered incorrect password or Admin ID');
    window.location.href='./THESIS_LOGIN_PAGE_DATA.PHP';
    </script>";
}

?>