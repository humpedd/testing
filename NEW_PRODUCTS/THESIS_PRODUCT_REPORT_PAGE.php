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


$sql = " SELECT * FROM THESIS_PER_PRODUCT_DATA";
$results = sqlsrv_query($conn, $sql);

$sql2 = "SELECT COUNT(PRODUCT_ID) as totalcount FROM THESIS_PER_PRODUCT_DATA";
$result2 = sqlsrv_query($conn, $sql2);
$totalcount = sqlsrv_fetch_array($result2);
//per product name
if (isset($_POST['asc_product_name'])) {
    $sql = " SELECT * FROM THESIS_PER_PRODUCT_DATA ORDER BY PRODUCT_NAME ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_product_name'])) {
    $sql = " SELECT * FROM THESIS_PER_PRODUCT_DATA ORDER BY PRODUCT_NAME DESC";
    $results = sqlsrv_query($conn, $sql);
}
//per date received
if (isset($_POST['asc_date_received'])) {
    $sql = " SELECT * FROM THESIS_PER_PRODUCT_DATA ORDER BY DATE_RECEIVED ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_date_received'])) {
    $sql = " SELECT * FROM THESIS_PER_PRODUCT_DATA ORDER BY DATE_RECEIVED DESC";
    $results = sqlsrv_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/thesis/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- ICONS -->
     <script src="https://kit.fontawesome.com/9ab424cc56.js" crossorigin="anonymous"></script>

    <title>Product Report</title>

</head>

<body>
<div class="dropdown pt-1 px-1 dropdown-list">
        <button id="dropdown-button" onclick="myFunction1()" class="dropbtn" style="padding-left:1rem"><i class="fa-solid fa-sort"></i> Filters</button>
        <form id="percity" action="./THESIS_PRODUCT_REPORT_PAGE.php" method="POST">
            <div id="myDropdown1" class="dropdown-content">
                
                <button class="dropbtns" value="ASC" type="submit" name="asc_product_name">by product name ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_product_name"> by product name descending</button>
                
                <button class="dropbtns" value="ASC" type="submit" name="asc_date_received">by date received ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_date_received"> by date received descending</button>
               
            </div>
        </form>
    </div>

    <div style="overflow-y:auto; height: 400px;" class="mx-2">
        <table>
            <tr class="bg-dark" style="color: #f0f0f0; font-family: 'Karla', sans-serif;">
                <th>Product ID</th>
                <th>Supplier ID</th>
                <th>Product Name</th>
                <th>Date Received</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <?php
            while ($rows = sqlsrv_fetch_array($results)) {

               
                $fieldname1 = $rows['PRODUCT_ID'];
                $fieldname2 = $rows['SUPPLIER_ID'];
                $fieldname3 = $rows['PRODUCT_NAME'];
                $fieldname4 = $rows['DATE_RECEIVED'];

                $php='<form id="edit_product" action="THESIS_PRODUCT_EDIT_ID_SESSION.php" method="post">
                <input type="hidden" name="EDIT_ID" value="'. $fieldname1.'"> 
                <input class="edit_button"  type="submit" value="Edit" name="Edit">
                </form>';

                $delete='<form action="./THESIS_PRODUCT_DELETE_ID_SESSION.php" method="post">
                <input type="hidden" name="DELETE_ID" value="'. $fieldname1.'"> 
                <input  onclick="return checkDelete()" class="edit_button" type="submit" value="Delete" name="Delete"   >
            </form>';
                echo '<tr>
                     <td>' . $fieldname1 . '</td>
                     <td>' . $fieldname2 . '</td>
                     <td>' . $fieldname3 . '</td>
                     <td>' . $fieldname4?->format('d/m/Y') . '</td>

                     <td>' . $php. '</td>
                     <td>' . $delete . '</td>
                   </tr>';
            }
            ?>
            
        </table>
        <h5 align="center">Total Records: <?php echo $totalcount['totalcount']; ?></h5>
        
    </div>
   
    <center><a class="button-dark button-length mt-1"href="/thesis/THESIS_HOMEPAGE.PHP">
                    Go back </a></center>
                
</body>

</html>
<!-- SCRIPT FOR DELETE -->
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // dropdown1
    $(document).ready(function () {
        // Show hide popover
        $(".dropdown-list").click(function () {
            $(this).find(".dropdown-content").slideToggle("fast");
        });
    });
    $(document).on("click", function (event) {
        var $trigger = $(".dropdown-list");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".dropdown-content").slideUp("fast");
        }
    });

   
</script>