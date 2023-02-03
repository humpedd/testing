


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
            session_start();

            $ADD_DETAILS_ID = $_SESSION['ADD_DETAILS_ID'];

        $PRODUCT_ID = $_POST['PRODUCT_ID'];


        $BOX_ID = $_POST['BOX_ID'];
        $BOX_CONTENT = $_POST['BOX_CONTENT'];
        $PRODUCT_PRICE = $_POST['PRODUCT_PRICE'];
        // //complete, NEW
        // $sql_complete = "UPDATE THESIS_PRODUCT_COMPLETE_DATA
        //                  SET 
        //                       BOX_ID ='$BOX_ID', BOX_CONTENT ='$BOX_CONTENT'
        //                     , PRODUCT_PRICE ='$PRODUCT_PRICE'
        //                 WHERE PRODUCT_ID = '$PRODUCT_ID'
        //             ";
        // $results_complete = sqlsrv_query($conn, $sql_complete);
        //box
        $sql_box= " UPDATE THESIS_PER_BOX_DATA
                    SET
                   BOX_ID = '$BOX_ID'
                    , BOX_CONTENT ='$BOX_CONTENT'
                    , PRODUCT_PRICE ='$PRODUCT_PRICE'
                    , PRODUCT_ID = '$PRODUCT_ID'
                WHERE PRODUCT_ID='$ADD_DETAILS_ID'";
                    // DATA IS COMPLETE IF BOX INFORMATION IS FILLED UP
        $results_box = sqlsrv_query($conn, $sql_box);

        if ($results_box) {
            echo '<script>alert("Product Added")</script>';
            echo "<script> window.location.href='/thesis/BOX_DATA/THESIS_BOX_REPORT_PAGE.php';</script>";

        } else {
            echo 'Error Occured! Kindly repeat.';
        }


?>

