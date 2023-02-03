<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/thesis/style.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
    <title>Update Data</title>
</head>

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
$EDIT_ID = $_SESSION['EDIT_ID'];

$sql = "SELECT * FROM THESIS_PER_SUPPLIER_DATA
        WHERE SUPPLIER_ID=('$EDIT_ID')
           ";
$results = sqlsrv_query($conn, $sql);
$userid = sqlsrv_fetch_array($results);
?>

<body class="bg-white">
    <h1 class="px-2 mt-1">Edit Information(admin).</h1>
    <div class="block-weighted">
        <div class="weight-70">
        <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">
                <form id="new_product" action="./THESIS_SUPPLIER_SUBMIT_UPDATE.php" method="POST">
                    <b>
                        <h3 class="pt-1"> IDs</h3>
                    </b>
                    <div class=" pb-1">
                            <label for="SUPPLIER_ID">Supplier ID </label>
                            <br>
                            <input class="full-field less" id="SUPPLIER_ID" name="SUPPLIER_ID" type="text" value="">
                        </div>
            </div>
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">
                <b>
                    <h3 class="pt-1">Product Information</h3>
                </b>
                <div class="block-weighted mb-1">
                    <div class="weight-50 mb-1">
                        <label for="PRODUCT_NAME">Product Name</label>
                        <br>
                        <input class="half-field" id="PRODUCT_NAME" name="PRODUCT_NAME" type="text" value="<?php echo $userid['PRODUCT_NAME']; ?>">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="PRODUCT_QUANTITY">Product Quantity</label>
                        <br>
                        <input class="half-field" id="PRODUCT_QUANTITY" name="PRODUCT_QUANTITY" type="text" value="<?php echo $userid['PRODUCT_QUANTITY']; ?>">
                    </div>
                </div>
                <div class=" pb-1">
                        <label for="SUPPLIER_PRICE">Supplier Price </label>
                        <br>
                        <input class="full-field less" type="text" id="SUPPLIER_PRICE" name="SUPPLIER_PRICE" value="<?php echo $userid['SUPPLIER_PRICE']; ?>">
                    </div>
            </div>
        </div>
        <!-- BUTTONS -->
        <div class="weight-30">
            <div class="ml-3 pt-1" style="width: 85%; margin-left:8rem">
                <input type="submit" value="Submit" name="submit" class="button-dark mb-2 no-border submit-button">
                <button type="button" onclick="history.go(-1)" class="button-dark mb-2 no-border submit-button">
                    Go back</button>

                <button type="button" onclick="location.href='/thesis/THESIS_HOMEPAGE.PHP'"
                    class="button submit-button" style="border:none">
                    Main Page</button>

            </div>
        </div>
    </div>
    </form>
</body>
<!-- PHP -->
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

$SUPPLIER_ID = $_POST['SUPPLIER_ID'];
$PRODUCT_ID = $_POST['PRODUCT_ID'];

$PRODUCT_NAME = $_POST['PRODUCT_NAME']; //FROM SUPPLIER
$PRODUCT_QUANTITY = $_POST['PRODUCT_QUANTITY']; //FROM SUPPLIER
$SUPPLIER_PRICE = $_POST['SUPPLIER_PRICE']; //FROM SUPPLIER
//products
$sql_product = " UPDATE THESIS_PER_SUPPLIER_DATA
                 SET
                      SUPPLIER_ID = '$SUPPLIER_ID'
                    , PRODUCT_NAME ='$PRODUCT_NAME'
                    , SUPPLIER_PRICE ='$SUPPLIER_PRICE'
                    , PRODUCT_QUANTITY ='$PRODUCT_QUANTITY'
                WHERE PRODUCT_ID='$EDIT_ID'";
$results_product = sqlsrv_query($conn, $sql_product);
// //COMPLETE
// $sql_product = " UPDATE THESIS_PRODUCT_COMPLETE_DATA
//                  SET
//                       SUPPLIER_ID = '$SUPPLIER_ID'
//                     , PRODUCT_NAME ='$PRODUCT_NAME'
//                     , DATE_RECEIVED ='$DATE_RECEIVED'
//                 WHERE PRODUCT_ID='$EDIT_ID'";
// $results_product = sqlsrv_query($conn, $sql_product);

?>

</html>