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
//gets data from database
$sql = " SELECT * FROM THESIS_PER_BOX_DATA";
$results = sqlsrv_query($conn, $sql);
//counts results
$sql2 = "SELECT COUNT(BOX_ID) as totalcount FROM THESIS_PER_BOX_DATA";
$result2 = sqlsrv_query($conn, $sql2);
$totalcount = sqlsrv_fetch_array($result2);

//per product price
if (isset($_POST['asc_product_price'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY PRODUCT_PRICE ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_product_price'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY PRODUCT_PRICE DESC";
    $results = sqlsrv_query($conn, $sql);
}
//per box content
if (isset($_POST['asc_box_content'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY BOX_CONTENT ASC";
    $results = sqlsrv_query($conn, $sql);
}
if (isset($_POST['desc_box_content'])) {
    $sql = " SELECT * FROM THESIS_PER_CUSTOMER_DATA ORDER BY BOX_CONTENT DESC";
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
    <title>Reports per Box</title>

</head>

<body>

<!-- SORT-->
<div class="dropdown pt-1 px-1 dropdown-list">
        <button id="dropdown-button" onclick="myFunction1()" class="dropbtn" style="padding-left:1rem"><i class="fa-solid fa-sort"></i> Filters</button>
        <form id="percity" action="./THESIS_CUSTOMER_REPORT_PAGE.php" method="POST">
            <div id="myDropdown1" class="dropdown-content">
             
                <button class="dropbtns" value="ASC" type="submit" name="asc_box_content">by box content ascending</button>
                <button class="dropbtns" value="DESC" type="submit" name="desc_box_content">by box content descending</button>
                <button class="dropbtns" value="ASC" type="submit" name="asc_product_price">by product price ascending</button>
            <button class="dropbtns" value="ASC" type="submit" name="desc_product_price">by product price descending</button>
            </div>
        </form>
    </div>
    <div style="overflow-y:auto; height: 400px;" class="mx-2">
        <table>
            <tr class="bg-dark" style="color: #f0f0f0; font-family: 'Karla', sans-serif;">

                <th>Box ID</th>
                <th>Product ID</th>
                <th>Box Content</th>
                <th>Product Price</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <?php
            while ($rows = sqlsrv_fetch_array($results)) {

                $fieldname1 = $rows['BOX_ID'];
                $fieldname2 = $rows['PRODUCT_ID'];

                $fieldname3 = $rows['BOX_CONTENT'];
                $fieldname4 = $rows['PRODUCT_PRICE'];
                
                // $php='<form action="THESIS_BOX_EDIT_ID_SESSION.php" method="post">
                //         <input type="hidden" name="EDIT_ID" value="'. $fieldname1.'"> 
                //         <input type="submit" value="Edit" name="Edit">
                //         </form>';
                $add_box_data ='<form id="add_box" action="./THESIS_BOX_ADD_DETAILS_ID_SESSION.php" method="post">
                        <input type="hidden" name="ADD_DETAILS_ID" value="'. $fieldname2.'"> 
                        <input class="edit_button" type="submit" value="Add/Edit Box Details" name="Add" >
                        </form>';
                 $delete='<form action="./THESIS_BOX_DELETE_ID_SESSION.php" method="post">
                <input type="hidden" name="DELETE_ID" value="'. $fieldname1.'"> 
                <input  onclick="return checkDelete()" class="edit_button" type="submit" value="Delete" name="Delete"   >
            </form>';
                echo '<tr>
                     <td>' . $fieldname1 . '</td>
                     <td>' . $fieldname2 . '</td>
                     <td>' . $fieldname3 . '</td>
                     <td>' . $fieldname4 . '</td>
                     <td>' . $add_box_data . '</td>
                     <td>' . $delete . '</td>
                   </tr>';
            }
            
            ?>
            
        </table>
        <h5 align="center">Total Records: <?php echo $totalcount['totalcount']; ?></h5>
        
    </div>
   
    <center><a class="button-dark button-length mt-1" href="/thesis/THESIS_HOMEPAGE.PHP">
                    GO BACK </a>
                </center>
                    
                
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

    // dropdown2
    $(document).ready(function () {
        // Show hide popover
        $(".dropdown-list1").click(function () {
            $(this).find(".dropdown-content2").slideToggle("fast");
        });
    });
    $(document).on("click", function (event) {
        var $trigger = $(".dropdown-list1");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".dropdown-content2").slideUp("fast");
        }
    });

    // dropdown3
    $(document).ready(function () {
        // Show hide popover
        $(".dropdown-list2").click(function () {
            $(this).find(".dropdown-content3").slideToggle("fast");
        });
    });
    $(document).on("click", function (event) {
        var $trigger = $(".dropdown-list2");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
            $(".dropdown-content3").slideUp("slow");
        }
    });
</script>