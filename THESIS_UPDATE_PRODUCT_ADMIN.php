<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
    <title>Vaccination Registration</title>
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
$SEARCH_ID = $_SESSION['SEARCH_ID'];
$EDIT_ID=$_SESSION['EDIT_ID'];

$sql = "SELECT * FROM THESIS_PRODUCT_NEW
        WHERE ORDER_ID=('$EDIT_ID') OR PRODUCT_ID=('$SEARCH_ID') OR BOX_ID=('$SEARCH_ID') OR SUPPLIER_ID=('$SEARCH_ID') 
           OR CUSTOMER_ID=('$SEARCH_ID') OR ORDER_ID=('$SEARCH_ID')
           ";
$results = sqlsrv_query($conn, $sql);
$userid = sqlsrv_fetch_array($results);
echo $EDIT_ID;
?>

<body class="bg-white">
    <h1 class="px-2 mt-1">Edit Information(admin).</h1>
    <div class="block-weighted">
    <div class="weight-70">
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">

                <!-- PERSONAL INFO -->
                <form id="registration" action="THESIS_SUBMIT_PRODUCT_DATA.php" method="POST">
                    <b>
                        <h3 class="pt-1">Product IDs</h3>
                    </b>
                    <div class="block-weighted mb-1">
                    <div class="weight-50 mb-1">
                            <label for="BOX_ID">Box ID </label>
                            <br>
                            <input class="half-field" id="BOX_ID" name="BOX_ID" type="text" value=" <?php echo $userid['BOX_ID']; ?>">
  
                            
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="SUPPLIER_ID">Supplier ID </label>
                            <br>
                            <input class="half-field" id="SUPPLIER_ID" name="SUPPLIER_ID" type="text" value="<?php echo $userid['SUPPLIER_ID']; ?>">
                            
                        </div>
                    </div>
                    <div class="block-weighted mb-1">
                    <div class="weight-50 mb-1">
                            <label for="CUSTOMER_ID">Customer ID </label>
                            <br>
                            <input class="half-field" id="CUSTOMER_ID" name="CUSTOMER_ID" type="text" value="<?php echo $userid['CUSTOMER_ID']; ?>">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="ORDER_ID">Order ID</label>
                            <br>
                            <input class="half-field" id="ORDER_ID" name="ORDER_ID" type="text" value="<?php echo $userid['ORDER_ID']; ?>">
                        </div>
                    </div>


            </div>
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">
                <!-- ADDRESS -->

                <b>
                    <h3 class="pt-1">Product Information</h3>
                </b>
                <div class="block-weighted mb-1">
                <div class="weight-50 mb-1">
                        <label for="PRODUCT_PRICE">Product Price</label>
                        <br>
                        <input class="half-field" id="PRODUCT_PRICE" name="PRODUCT_PRICE" type="text" value="<?php echo $userid['PRODUCT_PRICE']; ?>">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="BOX_CONTENT">Box Content</label>
                        <br>
                        <input class="half-field" id="BOX_CONTENT" name="BOX_CONTENT" type="text" value="<?php echo $userid['BOX_CONTENT']; ?>">
                    </div>
                </div>
                <div class="block-weighted mb-1">
                    <div class="weight-50 mb-1">
                        <label for="DATE_SHIPPED">Date Received</label>
                        <br>
                        <input class="half-field" type="date" id="DATE_SHIPPED" name="DATE_SHIPPED" value=""
                            min="1900-1-1" max="2024-12-31">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="DATE_RECEIVED">Date Ordered</label>
                        <br>
                        <input class="half-field" type="date" id="DATE_RECEIVED" name="DATE_RECEIVED" value="<?php echo $userid['DATE_RECEIVED']->format("Y-m-d"); ?>"
                            min="1900-1-1" max="2024-12-31">
                    </div>
                   
                </div>
                <div class="block-weighted mb-1">
                    
                    <div class="weight-50 mb-1">
                        <label for="DATE_SHIPPED">Date Shipped </label>
                        <br>
                        <input class="half-field" type="date" id="DATE_SHIPPED" name="DATE_SHIPPED" value=""
                            min="1900-1-1" max="2024-12-31">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="DATE_RECEIVED">Date Delivered</label>
                        <br>
                        <input class="half-field" type="date" id="DATE_RECEIVED" name="DATE_RECEIVED" value="<?php echo $userid['DATE_RECEIVED']->format("Y-m-d"); ?>"
                            min="1900-1-1" max="2024-12-31">
                    </div>
                </div>


                <div class=" pb-1">
                        <label for="PRODUCT_PRICE">Customer Name</label>
                        <br>
                        <input class="full-field" id="PRODUCT_PRICE" name="PRODUCT_PRICE" type="text" value="<?php echo $userid['PRODUCT_PRICE']; ?>">
                    </div>
                    
            </div>
        </div>

    <div class="weight-30">
        <!-- BUTTONS -->
        <div class="ml-3 pt-1" style="width: 85%; margin-left:8rem">
            <input type="submit" value="Save Changes" name="submit"
                class="update-submit-button button-dark button-length no-border mb-2" onclick="return confirm('Save changes?')">
            <a class="button-dark update-other-button no-border mb-2"  onclick="history.go(-1)">Back
            </a>
            <a class="button update-other-button" href="./THESIS_LOGIN_PAGE_DATA.PHP">Main Page
            </a>
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

        $BOX_ID = $_POST['BOX_ID'];
        $SUPPLIER_ID = $_POST['SUPPLIER_ID'];
        $CUSTOMER_ID = $_POST['CUSTOMER_ID'];
        $ORDER_ID = $_POST['ORDER_ID'];
        $PRODUCT_ID = $_POST['PRODUCT_ID'];

        $BOX_CONTENT = $_POST['BOX_CONTENT'];
        $PRODUCT_PRICE = $_POST['PRODUCT_PRICE'];

        $DATE_RECEIVED = $_POST['DATE_RECEIVED'];
        $DATE_SHIPPED = $_POST['DATE_SHIPPED'];
        $DATE_DELIVERED = $_POST['DATE_DELIVERED'];
        $DATE_ORDERED = $_POST['DATE_ORDERED'];

        $CUSTOMER_NAME = $_POST['CUSTOMER_NAME'];
        $PHONE_NO = $_POST['PHONE_NO'];
        $CUSTOMER_ADDRESS = $_POST['CUSTOMER_ADDRESS'];

        $PRODUCT_NAME= $_POST['PRODUCT_NAME'];//FROM SUPPLIER

    $sql1 = "UPDATE THESIS_PRODUCT_ALL 
             SET 
                BOX_ID = '$BOX_ID', SUPPLIER_ID = '$SUPPLIER_ID', CUSTOMER_ID ='$CUSTOMER_ID', ORDER_ID ='$ORDER_ID', PRODUCT_ID ='$PRODUCT_ID',
                BOX_CONTENT ='$BOX_CONTENT', PRODUCT_PRICE ='$PRODUCT_PRICE', 
                DATE_RECEIVED ='$DATE_RECEIVED', DATE_SHIPPED='$DATE_SHIPPED', DATE_DELIVERED = '$DATE_DELIVERED',  DATE_ORDERED = '$DATE_ORDERED'
        WHERE ORDER_ID='$ORDER_ID'";
    $results1 = sqlsrv_query($conn, $sql1);
    
    //orders
        $sql_order = "UPDATE THESIS_PER_ORDER_DATA 
                      SET
                        ORDER_ID ='$ORDER_ID', BOX_ID = '$BOX_ID', CUSTOMER_ID ='$CUSTOMER_ID', 
                        BOX_CONTENT ='$BOX_CONTENT', PRODUCT_PRICE ='$PRODUCT_PRICE',
                        DATE_ORDERED = '$DATE_ORDERED', DATE_SHIPPED='$DATE_SHIPPED', DATE_DELIVERED = '$DATE_DELIVERED'  
                        -- DATE SHIPPED & DELIVERED IS UPDATED VIA ADMIN
                        ";
                    $results_order = sqlsrv_query($conn, $sql_order);+
        //customer
        $sql_customer = " UPDATE THESIS_PER_CUSTOMER_DATA
                          SET
                            CUSTOMER_ID ='$CUSTOMER_ID', ORDER_ID ='$ORDER_ID',
                            BOX_CONTENT ='$BOX_CONTENT', PRODUCT_PRICE ='$PRODUCT_PRICE', 
                            DATE_ORDERED = '$DATE_ORDERED', DATE_SHIPPED='$DATE_SHIPPED', DATE_DELIVERED = '$DATE_DELIVERED',
                            CUSTOMER_NAME ='$CUSTOMER_NAME',PHONE_NO = '$PHONE_NO', CUSTOMER_ADDRESS = '$CUSTOMER_ADDRESS'
                            -- DATE SHIPPED & DELIVERED IS UPDATED VIA ADMIN
                        ";
                $results_customer = sqlsrv_query($conn, $sql_customer);
        //products
        $sql_product = " UPDATE THESIS_PER_PRODUCT_DATA
                         SET
                            PRODUCT_ID ='$PRODUCT_ID',SUPPLIER_ID = '$SUPPLIER_ID',
                            PRODUCT_NAME ='$PRODUCT_NAME', PRODUCT_PRICE ='$PRODUCT_PRICE', 
                            DATE_RECEIVED ='$DATE_RECEIVED'
                       ";
        $results_product = sqlsrv_query($conn, $sql_product);
        //box
        $sql_box= " UPDATE THESIS_PER_BOX_DATA
                    SET
                        BOX_ID = '$BOX_ID', PRODUCT_ID ='$PRODUCT_ID',
                        BOX_CONTENT ='$BOX_CONTENT', PRODUCT_PRICE ='$PRODUCT_PRICE',
                  ";
        $results_box = sqlsrv_query($conn, $sql_box);
// SUPPLIER IS MANUALLY CREATED
?>

<script>
    function open1() {
        document.getElementById('boosters').style.display = 'block';
    }
    function open2() {
        document.getElementById('booster2').style.display = 'block';
    }
    function open0() {
        document.getElementById('info').style.display = 'block';
    }
</script>

</html>