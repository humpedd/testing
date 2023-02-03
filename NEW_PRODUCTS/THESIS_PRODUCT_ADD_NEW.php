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
            <div class="weight-50 bg-light border px-1 mx-5 dual-content-left">

                <!-- PERSONAL INFO -->
                <form id="new_product" action="./THESIS_PRODUCT_ADD_NEW_SUBMIT_test.php" method="POST">
                    <b>
                        <h3 class="pt-1">Product IDs</h3>
                    </b>
                    <div class="block-weighted mb-1">
                        <div class="weight-50 mb-1">
                            <label for="PRODUCT_ID">Product ID </label>
                            <br>
                            <input class="half-field" type="text" id="PRODUCT_ID" name="PRODUCT_ID" value="">
                        </div>
                        <div class="weight-50 mb-1">
                            <label for="SUPPLIER_ID">Supplier ID </label>
                            <br>
                            <input class="half-field" id="SUPPLIER_ID" name="SUPPLIER_ID" type="text" value="">
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
                        <label for="PRODUCT_NAME">Product Name</label>
                        <br>
                        <input class="half-field" id="PRODUCT_NAME" name="PRODUCT_NAME" type="text" value="">
                    </div>
                    <div class="weight-50 mb-1">
                        <label for="DATE_RECEIVED">Date Received</label>
                        <br>
                        <input class="half-field" type="date" id="DATE_RECEIVED" name="DATE_RECEIVED" value=""
                            min="1900-1-1" max="2024-12-31">
                    </div>
                </div>
            </div>

            
        </div>

        <!-- BUTTONS -->
        <div class="weight-30">
            <div class="ml-3 pt-1">
                <input type="submit" value="Submit" name="submit" class="button-dark mb-2 no-border submit-button">
                <a class="button button-length" href="/thesis/THESIS_HOMEPAGE.PHP">
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