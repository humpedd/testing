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

//ERRORS
$BOX_ID = $_POST['BOX_ID'];
$Box_ID_Error = "";
if (empty($_POST['BOX_ID'])) {
    $Box_ID_Error = "Box ID is empty <br>";
}

$SUPPLIER_ID = $_POST['SUPPLIER_ID'];
$SUPPLIER_ID_Error = "";
if (empty($_POST['SUPPLIER_ID'])) {
    $SUPPLIER_ID_Error = "Supplier ID is empty <br>";
}

$CUSTOMER_ID = $_POST['CUSTOMER_ID'];
$CUSTOMER_ID_Error = "";
if (empty($_POST['CUSTOMER_ID'])) {
    $CUSTOMER_ID_Error = "Customer ID is empty <br>";
}

$ORDER_ID = $_POST['ORDER_ID'];
$ORDER_ID_Error = "";
if (empty($_POST['ORDER_ID'])) {
    $ORDER_ID_Error = "Order ID is empty <br>";
}
$PRODUCT_ID = $_POST['PRODUCT_ID'];
$PRODUCT_ID_Error = "";
if (empty($_POST['PRODUCT_ID'])) {
    $PRODUCT_ID_Error = "Product ID is empty <br>";
}


$BOX_CONTENT = $_POST['BOX_CONTENT'];
$BOX_CONTENT_Error = "";
if (empty($_POST['BOX_CONTENT'])) {
    $BOX_CONTENT_Error = "Box Content is empty <br>";
}

$PRODUCT_PRICE = $_POST['PRODUCT_PRICE'];
$PRODUCT_PRICE_Error = "";
if (empty($_POST['PRODUCT_PRICE'])) {
    $PRODUCT_PRICE_Error = "Product Price is empty <br>";
}

$PRODUCT_PRICE_Num_Only_Error = ""; // numbers only
if (!preg_match("/^[0-9-.]*$/", $PRODUCT_PRICE)) {
    $PRODUCT_PRICE_Num_Only_Error = "> <b>Only numeric values</b> are allowed in Product Price. <br>";
}

$DATE_RECEIVED = $_POST['DATE_RECEIVED'];
$DATE_RECEIVED_Error = "";
if (empty($_POST['DATE_RECEIVED'])) {
    $DATE_RECEIVED_Error = "Date Received is empty <br>";
}

?>


<?php
if (isset($_POST['submit'])) {
    if (
        $Box_ID_Error == "" && $SUPPLIER_ID_Error == "" && $CUSTOMER_ID_Error == "" && $CUSTOMER_ID_Error == ""
        && $BOX_CONTENT_Error == "" && $PRODUCT_PRICE_Error =="" && $PRODUCT_PRICE_Num_Only_Error =="" 
        && $DATE_RECEIVED_Error == "" 

    ) {
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
        // new producst
        $sql = "INSERT INTO 
                    THESIS_PRODUCT_NEW(
                    BOX_ID, SUPPLIER_ID, CUSTOMER_ID, ORDER_ID,PRODUCT_ID,
                    BOX_CONTENT, PRODUCT_PRICE,
                    DATE_RECEIVED) 
                VALUES 
                    ('$BOX_ID','$SUPPLIER_ID','$CUSTOMER_ID','$ORDER_ID', '$PRODUCT_ID', 
                    '$BOX_CONTENT', '$PRODUCT_PRICE',
                    '$DATE_RECEIVED')";
        $results = sqlsrv_query($conn, $sql);
        //complete
        $sql_complete = "INSERT INTO 
                    THESIS_PRODUCT_COMPLETE_DATA(
                    BOX_ID, SUPPLIER_ID, CUSTOMER_ID, ORDER_ID,PRODUCT_ID,
                    BOX_CONTENT, PRODUCT_PRICE,
                    DATE_RECEIVED) 
                     -- DATE SHIPPED & DELIVERED IS UPDATED VIA ADMIN
                VALUES 
                    ('$BOX_ID','$SUPPLIER_ID','$CUSTOMER_ID','$ORDER_ID', '$PRODUCT_ID', 
                    '$BOX_CONTENT', '$PRODUCT_PRICE',
                    '$DATE_RECEIVED')";
        $results_complete = sqlsrv_query($conn, $sql_complete);
        //orders
        $sql_order = " INSERT INTO
                    THESIS_PER_ORDER_DATA(
                    BOX_ID, CUSTOMER_ID, ORDER_ID,
                    BOX_CONTENT, PRODUCT_PRICE) 
                     -- DATE SHIPPED & DELIVERED IS UPDATED VIA ADMIN
                VALUES 
                    ('$BOX_ID','$CUSTOMER_ID','$ORDER_ID',
                    '$BOX_CONTENT', '$PRODUCT_PRICE')";
        $results_order = sqlsrv_query($conn, $sql_order);
        //customer
        $sql_customer = " INSERT INTO
                    THESIS_PER_CUSTOMER_DATA(
                    CUSTOMER_ID,
                    BOX_CONTENT, PRODUCT_PRICE
                    ) 
                    -- DATE SHIPPED & DELIVERED IS UPDATED VIA ADMIN
                VALUES 
                    ('$CUSTOMER_ID',
                    '$BOX_CONTENT', '$PRODUCT_PRICE')";
        $results_customer = sqlsrv_query($conn, $sql_customer);
        //products
        $sql_product = " INSERT INTO
                    THESIS_PER_PRODUCT_DATA(
                    PRODUCT_ID,SUPPLIER_ID,
                    BOX_CONTENT, PRODUCT_PRICE, DATE_RECEIVED) 
                VALUES 
                    ('$PRODUCT_ID','$SUPPLIER_ID',
                    '$BOX_CONTENT', '$PRODUCT_PRICE', '$DATE_RECEIVED')";
        $results_product = sqlsrv_query($conn, $sql_product);
        
        //box
        $sql_box= " INSERT INTO
                    THESIS_PER_BOX_DATA(
                    BOX_ID, PRODUCT_ID,
                    BOX_CONTENT, PRODUCT_PRICE,DATE_RECEIVED) 
                VALUES 
                    ('$BOX_ID', '$PRODUCT_ID'
                    '$BOX_CONTENT', '$PRODUCT_PRICE','$DATE_RECEIVED')";
        $results_box = sqlsrv_query($conn, $sql_box);

        if ($results) {
            echo '<script>alert("Product Added")</script>';
            echo "<script> window.location.href='THESIS_REPORT_PAGE_ADMIN.php';</script>";

        } else {
            echo 'Error Occured! Kindly repeat.';
        }
    }
}

?>

<!-- ERROR POP UP BOX -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link href="./style.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
</head>

<body class="bg-white bg-image h-100 content-center" onload="document.getElementById('id01').style.display='block'">
    <div class=" content-center">
        <div class="content-center">

            <!-- The Modal -->
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <!-- Modal Content -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="container">
                        <!-- ERRORS -->
                        <h3>
                            <?php if (empty($_POST['BOX_ID'])) {
                                echo $Box_ID_Error;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (empty($_POST['SUPPLIER_ID'])) {
                                echo $SUPPLIER_ID_Error;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (empty($_POST['CUSTOMER_ID'])) {
                                echo $CUSTOMER_ID_Error;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (empty($_POST['ORDER_ID'])) {
                                echo $ORDER_ID_Error;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (empty($_POST['PRODUCT_ID'])) {
                                echo $PRODUCT_ID_Error;
                            } ?>
                        </h3>

                        <h3>
                            <?php if (empty($_POST['BOX_CONTENT'])) {
                                echo $BOX_CONTENT_Error;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (empty($_POST['PRODUCT_PRICE'])) {
                                echo $PRODUCT_PRICE_Error;
                            } ?>
                        </h3>
                        <h3>
                            <?php  if (!preg_match("/^[0-9-.]*$/", $PRODUCT_PRICE)) {
                                echo $PRODUCT_PRICE_Num_Only_Error;
                            }
                             ?>
                        </h3>
                       
                        <h3>
                            <?php if (empty($_POST['DATE_RECEIVED'])) {
                                echo $DATE_RECEIVED_Error;
                            } ?>
                        </h3>
                      

                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="history.go(-1)" class="cancelbtn">Go back</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>
<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>