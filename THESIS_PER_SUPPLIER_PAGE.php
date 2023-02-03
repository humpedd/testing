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


$sql = " SELECT * FROM THESIS_PER_ORDER_DATA";
$results = sqlsrv_query($conn, $sql);

$sql2 = "SELECT COUNT(ORDER_ID) as totalcount FROM THESIS_PER_ORDER_DATA";
$result2 = sqlsrv_query($conn, $sql2);
$totalcount = sqlsrv_fetch_array($result2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports per CITY</title>

</head>

<body>

    <div style="overflow-y:auto; height: 400px;" class="mx-2">
        <table>
            <tr class="bg-dark" style="color: #f0f0f0; font-family: 'Karla', sans-serif;">
                <th>Supplier ID</th>
                <th>Product ID</th>
                <th>Box Content</th>
                <th>Product Price</th>
            </tr>
            </thead>

            <?php
            while ($rows = sqlsrv_fetch_array($results)) {

               
                $fieldname1 = $rows['SUPPLIER_ID'];
                $fieldname2 = $rows['PRODUCT_ID'];
                $fieldname3 = $rows['BOX_CONTENT'];
                $fieldname4 = $rows['PRODUCT_PRICE'];

                $php='<form action="./THESIS_EDIT_ID_SESSION.php" method="post">
                <input type="hidden" name="EDIT_ID" value="'. $fieldname1.'"> 
                <input type="submit" value="Edit" name="Edit">
            </form>';
                echo '<tr>
                     <td>' . $fieldname1 . '</td>
                     <td>' . $fieldname2 . '</td>
                     <td>' . $fieldname3 . '</td>
                     <td>' . $fieldname4 . '</td>

                     <td>' . $php . '</td>
                   </tr>';
            }
            
            ?>
            
        </table>
        <h5 align="center">Total Records: <?php echo $totalcount['totalcount']; ?></h5>
        
    </div>
   
    <center><a class="button-dark button-length mt-1" href="./THESIS_REPORT_PAGE_ADMIN.php">
                    Go back </a></center>
                
</body>

</html>