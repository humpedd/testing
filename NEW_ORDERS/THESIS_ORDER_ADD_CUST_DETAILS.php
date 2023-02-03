<?php
//let's start the session
session_start();

//finally, let's store our posted values in the session variables
$_SESSION['ORDER_ID'] = $_POST['ORDER_ID'];
$_SESSION['CUSTOMER_ID'] = $_POST['CUSTOMER_ID'];
$_SESSION['BOX_ID'] = $_POST['BOX_ID'];

$_SESSION['BOX_CONTENT'] = $_POST['BOX_CONTENT'];

$_SESSION['PRODUCT_PRICE'] = $_POST['PRODUCT_PRICE'];
$_SESSION['DATE_ORDERED'] = $_POST['DATE_ORDERED'];

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
    <title>Add Customer Details</title>
</head>

<body class="bg-white">

    <h1 class="px-2 mt-1 h2">Please fill up the customer information.</h1>
    <div class="block-weighted">
        <div class="weight-70">
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
                            <input class="half-field" type="text" id="CUSTOMER_NAME" name="CUSTOMER_NAME" value="">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="PHONE_NO">Phone Number </label>
                            <br>
                            <input class="half-field" type="tel" id="contact" name="PHONE_NO" value="" >
                        </div>
                    </div>
                    <div class=" pb-1">
                    <label for="CUSTOMER_ADDRESS">Customer Address</label>
                    <br>
                    <input class="full-field" type="text" id="CUSTOMER_ADDRESS" name="CUSTOMER_ADDRESS" value="">
                </div>
     
            </div>
            
        </div>

        <!-- BUTTONS -->
        <div class="weight-30">
            <div class="ml-3 pt-1">
                <input type="submit" value="Submit" name="submit" class="button-dark mb-2 no-border submit-button">
                <button type="button" onclick="history.go(-1)"class="button-dark mb-2 no-border submit-button">Go back</button>
                <a class="button button-length" href="./THESIS_LOGIN_PAGE_DATA.PHP">
                    Main Page</a>
            </div>
        </div>
    </div>
    </form>

</body>

</html>
