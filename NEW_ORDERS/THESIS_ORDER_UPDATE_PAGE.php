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

$sql = "SELECT * FROM THESIS_PER_ORDER_DATA
         WHERE ORDER_ID=('$EDIT_ID')";
$results = sqlsrv_query($conn, $sql);
$userid = sqlsrv_fetch_array($results);

$sql1 = "SELECT * FROM THESIS_PER_CUSTOMER_DATA
         WHERE ORDER_ID=('$EDIT_ID')";
$results1 = sqlsrv_query($conn, $sql1);
$userid1 = sqlsrv_fetch_array($results1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/thesis/style.css    ">
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
    <title>Add order</title>
</head>

<body class="bg-white">

    <h1 class="px-2 mt-1 h2">Please fill up the product information.</h1>
    <div class="block-weighted">
        <div class="weight-70">
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">

                <!-- PERSONAL INFO -->
                <form id="new_product" action="./THESIS_ORDER_SUBMIT_UPDATE.php" method="POST">
                    <b>
                        <h3 class="pt-1">Product IDs</h3>
                    </b>
                    <div class="block-weighted mb-1">
                        <div class="weight-50 mb-1">
                            <label for="ORDER_ID">Order ID </label>
                            <br>
                            <input class="half-field" type="text" id="ORDER_ID" name="ORDER_ID"
                                value="<?php echo $userid['ORDER_ID']; ?>">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="CUSTOMER_ID">Customer ID </label>
                            <br>
                            <input class="half-field" id="CUSTOMER_ID" name="CUSTOMER_ID" type="text"
                                value="<?php echo $userid['CUSTOMER_ID']; ?>">
                        </div>
                    </div>
                    <div class=" pb-1">
                        <label for="BOX_ID">Box ID </label>
                        <br>
                        <input class="full-field less" type="text" id="BOX_ID" name="BOX_ID"
                            value="<?php echo $userid['BOX_ID']; ?>">
                    </div>
            </div>
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">
                <b>
                    <h3 class="pt-1">Order Details</h3>
                </b>
                <div class="block-weighted mb-1">
                    <div class="weight-50 mb-1">
                        <label for="BOX_CONTENT">Box Content</label>
                        <br>
                        <input class="half-field" id="BOX_CONTENT" name="BOX_CONTENT" type="text"
                            value="<?php echo $userid['BOX_CONTENT']; ?>">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="PRODUCT_PRICE">Product Price</label>
                        <br>
                        <input class="half-field" id="PRODUCT_PRICE" name="PRODUCT_PRICE" type="text"
                            value="<?php echo $userid['PRODUCT_PRICE']; ?>">
                    </div>
                </div>
                <!-- dates -->
                <div class="block-weighted mb-1">
                    <div class="weight-50 mb-1">
                        <label for="DATE_ORDERED">Date Ordered</label>
                        <br>
                        <input class="half-field" type="date" id="DATE_ORDERED" name="DATE_ORDERED" value="<?php echo $userid['DATE_ORDERED']?->format("Y-m-d");
                        ; ?>" min="1900-1-1" max="2024-12-31">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="DATE_SHIPPED">Date Shipped</label>
                        <br>
                        <input class="half-field" type="date" id="DATE_SHIPPED" name="DATE_SHIPPED" value="<?php echo $userid['DATE_SHIPPED']?->format("Y-m-d");
                        ; ?>" min="1900-1-1" max="2024-12-31">
                    </div>
                </div>
                <div class=" pb-1">
                    <label for="DATE_DELIVERED">Date Delivered</label>
                    <br>
                    <input class="full-field" type="date" id="DATE_DELIVERED" name="DATE_DELIVERED" value="<?php echo $userid['DATE_DELIVERED']?->format("Y-m-d");
                    ; ?>" min="1900-1-1" max="2024-12-31">
                </div>
            </div>
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">
                <form id="new_product" action="./THESIS_ORDER_ADD_NEW_SUBMIT.php" method="POST">
                    <!-- PERSONAL INFO -->
                    <b>
                        <h3 class="pt-1">Customer Details</h3>
                    </b>
                    <div class="block-weighted mb-1">
                        <div class="weight-50 mb-1">
                            <label for="CUSTOMER_NAME">Customer Name </label>
                            <br>
                            <input class="half-field" type="text" id="CUSTOMER_NAME" name="CUSTOMER_NAME"
                                value="<?php echo $userid1['CUSTOMER_NAME']; ?>">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="PHONE_NO">Phone Number </label>
                            <br>
                            <input class="half-field" type="tel" id="contact" name="PHONE_NO"
                                value="<?php echo $userid1['CUSTOMER_ADDRESS']; ?>">
                        </div>
                    </div>
                    <div class=" pb-1">
                        <label for="CUSTOMER_ADDRESS">Customer Address</label>
                        <br>
                        <input class="full-field" type="text" id="CUSTOMER_ADDRESS" name="CUSTOMER_ADDRESS"
                            value="<?php echo $userid1['PHONE_NO']; ?>">
                    </div>

            </div>
        </div>

        <!-- BUTTONS -->
        <div class="weight-30">
            <div class="ml-3 pt-1">
                <input type="submit" value="Submit" name="submit" class="button-dark mb-2 no-border submit-button">
                <button type="button" onclick="location.href='/thesis/THESIS_HOMEPAGE.PHP'"
                    class="button submit-button" style="border:none">
                    Main Page</button>
            </div>
        </div>
    </div>
    </form>

</body>

</html>
<script>
    function open0() {
        document.getElementById('info').style.display = 'block';
    }
    function close0() {
        document.getElementById('info').style.display = 'none';
    }
</script>