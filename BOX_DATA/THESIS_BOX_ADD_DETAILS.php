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

$ADD_DETAILS_ID = $_SESSION['ADD_DETAILS_ID'];


$sql = "SELECT * FROM THESIS_PER_BOX_DATA
         WHERE PRODUCT_ID=('$ADD_DETAILS_ID')";
$results = sqlsrv_query($conn, $sql);
$userid = sqlsrv_fetch_array($results);

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
    <title>Add Product</title>
</head>

<body class="bg-white">

    <h1 class="px-2 mt-1 h2">Please fill up the product information.</h1>
    <div class="block-weighted">
        <div class="weight-70">


                <!-- PERSONAL INFO -->
                <form id="new_product" action="./THESIS_BOX_SUBMIT_DETAILS.php" method="POST">
                   
                    <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">
                    <b>
                        <h3 class="pt-1">Product IDs</h3>
                    </b>
                        <div class="block-weighted mb-1">
                            <div class="weight-50 mb-1">
                                <label for="BOX_ID">Box ID</label>
                                <br>
                                <input class="half-field" id="BOX_ID" name="BOX_ID" type="text" value="<?php echo $userid['BOX_ID']; ?>">
                            </div>
                            <div class="weight-50 mb-1">
                                <label for="BOX_CONTENT">Box Content</label>
                                <br>
                                <input class="half-field" id="BOX_CONTENT" name="BOX_CONTENT" type="text" value="<?php echo $userid['BOX_CONTENT']; ?>">
                            </div>
                        </div>
                        <div class="block-weighted mb-1">
                            <div class="weight-50 mb-1">
                            <label for="PRODUCT_PRICE">Product Price</label>
                        <input class="half-field" id="PRODUCT_PRICE" name="PRODUCT_PRICE" type="text" value="<?php echo $userid['PRODUCT_PRICE']; ?>">
                            </div>
                            <div class="weight-50 mb-1">
                            <label for="PRODUCT_ID">Product ID</label>
                        <input class="half-field" id="PRODUCT_ID" name="PRODUCT_ID" type="text" value="<?php echo $userid['PRODUCT_ID']; ?>" READONLY>
                            </div>
                        </div>
                       
                    </div>

        </div>

        <!-- BUTTONS -->
        <div class="weight-30">
            <div class="ml-3 pt-1">
                <input type="submit" value="Submit" name="submit" class="button-dark mb-2 no-border submit-button">
                <button type="button"  onclick="history.go(-1)"class="button-dark mb-2 no-border submit-button">
                        Go back</button>
                <a class="button button-length" href="./THESIS_LOGIN_PAGE_DATA.PHP">
                    Main Page</a>
                    
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