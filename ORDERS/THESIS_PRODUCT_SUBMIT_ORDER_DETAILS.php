


<?php
// DATA GOES TO NEW/COMPLETE DATABASE & PER PRODUCTS DATABASE

        $serverName = "HUMPS";
        $connectionOptions = [
            "Database" => "DLSU",
            "Uid" => "",
            "PWD" => ""
        ];
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn == false)
            die(print_r(sqlsrv_errors(), true));

        $ORDER_ID = $_POST['ORDER_ID'];
        $CUSTOMER_ID = $_POST['CUSTOMER_ID'];

        $BOX_CONTENT = $_POST['BOX_CONTENT'];
        $PRODUCT_PRICE = $_POST['PRODUCT_PRICE'];

        $DATE_ORDERED = $_POST['DATE_ORDERED'];
        $DATE_SHIPPED= $_POST['DATE_SHIPPED'];
        //ORDERS
        $sql_orders = "INSERT INTO THESIS_PRODUCT_COMPLETE_DATA
                    ( ORDER_ID, CUSTOMER_ID
                    , BOX_CONTENT
                    , DATE_ORDERED, DATE_SHIPPED
                    )
                     -- DATE SHIPPED, DELIVERED, ORDERED IS UPDATED VIA ADMIN FROM ORDERS
                    --  CUSTOMER, ORDER, BOX ID IS TO BE ADDED FROM ORDERS/CUSTOMER
                VALUES 
                    ('$ORDER_ID', '$CUSTOMER_ID' 
                    ,'$BOX_CONTENT'
                    ,'$DATE_ORDERED','$DATE_SHIPPED'
                    )";
        $results_orders = sqlsrv_query($conn, $sql_orders);
        // //UPDATE COMPLETE DATABASE
        // $sql1 = "UPDATE THESIS_PRODUCT_COMPLETE_DATA 
        //      SET 
        //         BOX_ID = '$BOX_ID', SUPPLIER_ID = '$SUPPLIER_ID', CUSTOMER_ID ='$CUSTOMER_ID', ORDER_ID ='$ORDER_ID', PRODUCT_ID ='$PRODUCT_ID',
        //         BOX_CONTENT ='$BOX_CONTENT', PRODUCT_PRICE ='$PRODUCT_PRICE', 
        //         DATE_RECEIVED ='$DATE_RECEIVED', DATE_SHIPPED='$DATE_SHIPPED', DATE_DELIVERED = '$DATE_DELIVERED',  DATE_ORDERED = '$DATE_ORDERED'
        // WHERE ORDER_ID='$ORDER_ID'";
    $results1 = sqlsrv_query($conn, $sql1);

        if ($results_orders) {
            echo '<script>alert("Product Added")</script>';
            echo "<script> window.location.href='/thesis/THESIS_LOGIN_PAGE_DATA.PHP';</script>";

        } else {
            echo 'Error Occured! Kindly repeat.';
        }


?>

