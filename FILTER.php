<?php
$serverName = "HUMPS";
$connectionOptions = [
    "Database" => "DLSU",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false)
    die(print_r(sqlsrv_errors(), true));
else;
    $sql = " SELECT * FROM table_2 ";
    $results = sqlsrv_query($conn, $sql);
if(isset($_POST['DAY'])){
    $sql = "SELECT * FROM table_2 WHERE DATE_ORDERED = getdate()";
    $results = sqlsrv_query($conn, $sql);
}
if(isset($_POST['WEEK'])){
    $sql = "SELECT * FROM table_2 WHERE DATE_ORDERED BETWEEN dateadd(WEEK,-1,cast(getdate()as date)) and cast(getdate()as date)";
    $results = sqlsrv_query($conn, $sql);
}

if(isset($_POST['MONTH'])){
    $sql = "SELECT * FROM table_2 WHERE DATE_ORDERED BETWEEN dateadd(MONTH,-1,cast(getdate()as date)) and cast(getdate()as date)";
    $results = sqlsrv_query($conn, $sql);
}
if(isset($_POST['YEAR'])){
    $sql = "SELECT * FROM table_2 WHERE DATE_ORDERED BETWEEN dateadd(YEAR,-1,cast(getdate()as date)) and cast(getdate()as date)";
    $results = sqlsrv_query($conn, $sql);
    
}
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
    

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="submit" name="DAY" value="day">
        <input type="submit" name="WEEK" value="week">
        <input type="submit" name="MONTH" value="month">
        <input type="submit" name="YEAR" value="year">
        </form>

        
        <table >
            <thead class="head">
                <tr>
                    <th>date<th>
                </tr>
            </thead>
            <?php
            while ($row = sqlsrv_fetch_array($results)) {
                $date = $row['DATE_ORDERED'];
                $ndate = $date?->format('Y-m-d');
                echo '<tr>
                <td>' . $ndate . '</td>
                </tr>';

            }
            ?>
        </table>
        
    </div>

</body>

</html>