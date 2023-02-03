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
      
        $SUPPLIER_ID = $_POST['SUPPLIER_ID'];
        // $PRODUCT_ID = $_POST['PRODUCT_ID'];

        $PRODUCT_NAME = $_POST['PRODUCT_NAME'];
        $PRODUCT_QUANTITY = $_POST['PRODUCT_QUANTITY'];

        $SUPPLIER_PRICE = $_POST['SUPPLIER_PRICE'];



        // //complete, NEW
        // $sql_complete = "INSERT INTO THESIS_PRODUCT_COMPLETE_DATA
        //             ( SUPPLIER_ID, PRODUCT_ID
        //             , PRODUCT_NAME
        //             , DATE_RECEIVED
        //             )
        //              -- DATE SHIPPED, DELIVERED, ORDERED IS UPDATED VIA ADMIN FROM ORDERS
        //             --  CUSTOMER, ORDER, BOX ID IS TO BE ADDED FROM ORDERS/CUSTOMER
        //         VALUES 
        //             ('$SUPPLIER_ID', '$PRODUCT_ID' 
        //             ,'$PRODUCT_NAME'
        //             ,'$DATE_RECEIVED'
        //             )";
        // $results_complete = sqlsrv_query($conn, $sql_complete);
        //products
        
        $sql_supplier = " INSERT INTO THESIS_PER_SUPPLIER_DATA
                        ( 
                          SUPPLIER_ID
                        -- PRODUCT_ID
                        , PRODUCT_NAME , PRODUCT_QUANTITY
                        , SUPPLIER_PRICE
                        )
                VALUES 
                    ( '$SUPPLIER_ID'
                    -- , '$PRODUCT_ID'
                    , '$PRODUCT_NAME', '$PRODUCT_QUANTITY'
                    , '$SUPPLIER_PRICE'
                    )";
        $results_supplier = sqlsrv_query($conn, $sql_supplier);

        if ($results_supplier) {
            echo '<script>alert("Product Added")</script>';
            echo "<script> window.location.href='./THESIS_SUPPLIER_REPORT_PAGE.php';</script>";
        } else {
            echo 'Error Occured! Kindly repeat.';
        }
?>

