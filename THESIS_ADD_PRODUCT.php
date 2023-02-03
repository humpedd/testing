<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css    ">
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
    <title>Add Product</title>
</head>

<body class="bg-white">

    <h1 class="px-2 mt-1 h2">Please fill up the product information.</h1>
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
                            <input class="half-field" id="BOX_ID" name="BOX_ID" type="text" value="">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="SUPPLIER_ID">Supplier ID </label>
                            <br>
                            <input class="half-field" id="SUPPLIER_ID" name="SUPPLIER_ID" type="text" value="">
                        </div>
                    </div>
                    <div class="block-weighted mb-1">
                    <div class="weight-50 mb-1">
                            <label for="CUSTOMER_ID">Customer ID </label>
                            <br>
                            <input class="half-field" id="CUSTOMER_ID" name="CUSTOMER_ID" type="text" value="">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="ORDER_ID">Order ID</label>
                            <br>
                            <input class="half-field" id="ORDER_ID" name="ORDER_ID" type="text" value="">
                        </div>
                    </div>
                    <div>
                    <div class=" pb-1">
                        <label for="PRODUCT_ID">Product ID</label>
                        <br>
                        <input class="full-field" type="text" id="PRODUCT_ID" name="PRODUCT_ID" value="">
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
                        <input class="half-field" id="PRODUCT_PRICE" name="PRODUCT_PRICE" type="text" value="">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="BOX_CONTENT">Box Content</label>
                        <br>
                        <input class="half-field" id="BOX_CONTENT" name="BOX_CONTENT" type="text" value="">
                    </div>
                </div>
                <div>
                    <div class=" pb-1">
                        <label for="DATE_RECEIVED">Date Received</label>
                        <br>
                        <input class="full-field" type="date" id="DATE_RECEIVED" name="DATE_RECEIVED" value=""
                            min="1900-1-1" max="2024-12-31">
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