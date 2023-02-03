<?php
    $serverName="HUMPS";
    $connectionOptions=[
        "Database"=>"DLSU",
        "Uid"=>"",
        "PWD"=>""
    ];
    $conn=sqlsrv_connect($serverName, $connectionOptions);
    if($conn==false){
        die(print_r(sqlsrv_errors(),true));
    }

    session_start();
    $EDIT_ID=$_SESSION['EDIT_ID'];
    $SEARCH_ID=$_SESSION['SEARCH_ID'];
    $sql = "SELECT * FROM THESIS_PRODUCT_NEW
        WHERE 
            ORDER_ID=('$EDIT_ID')
            OR BOX_ID=('$SEARCH_ID') OR CUSTOMER_ID=('$SEARCH_ID')
            OR SUPPLIER_ID=('$SEARCH_ID') OR ORDER_ID=('$SEARCH_ID')
          
        ";
    $results=sqlsrv_query($conn,$sql);
    $userid=sqlsrv_fetch_array($results);

    $sql1 = "SELECT * FROM THESIS_PER_CUSTOMER_DATA  WHERE 
    CUSTOMER_ID=('$SEARCH_ID')
";
    $results1=sqlsrv_query($conn,$sql1);
    $userid1=sqlsrv_fetch_array($results1);

    $date_received= $userid['DATE_RECEIVED']->format('d/m/Y');
?> 

<DOCTYPE html>

    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link rel="stylesheet" href="reportpagestyles.css">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./style.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
            rel="stylesheet">
        <title>ID Information</title>
    </head>

    <body class="bg-white bg-image h-100 content-center">
        <div class=" content-center">
            <div class="content-center">
                <div class="block-weighted shadow border bg-light box-usercomplete">
                    <div class=" weight-50 content-center">
                        <div class="bg-white border content-center p-1 pt-0 "style="margin-left:1rem;">
                            <h1 class="h2">
                               ID Information
                            </h1>
                            <div class="block-weighted">
                                <div class="weight-50  mr-1half">
                                    <a class="user-link">  <a>
                                </div>
                                <div class="weight-50">
                                    <a class="user-link"> </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="h2 weight-user-info">ID Details</h2>
                            <div class=" mt-1">
                                <div class="block-weighted mb-1">
                                    <div class="weight-90">
                                        <label class="weight-user-info">Box ID:</label>
                                        <label class="product-details"> <?php echo $userid['BOX_ID']; ?>  </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-90">
                                        <label class="weight-user-info">Supplier ID:</label>
                                        <label class="product-details"><?php echo $userid['SUPPLIER_ID']; ?>  </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-90">
                                        <label class="weight-user-info">Customer ID:</label>
                                        <label class="product-details"><?php echo $userid['CUSTOMER_ID']; ?>  </label>
                                    </div>
                                    
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-90">
                                        <label class="weight-user-info">Order ID:</label>
                                        <label class="product-details"><?php echo $userid['ORDER_ID']; ?>  </label>
                                    </div>
                                    <div class="weight-50 text-right">
                                        <label>  </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-80">
                                        <label class="weight-user-info">Box Content:</label>
                                        <label class="product-details"><?php echo $userid['BOX_CONTENT']; ?> </label>
                                    </div>
                                </div>
                                <div class="block-weighted">
                                    <div class="weight-80">
                                        <label class="weight-user-info">Product Price:</label>
                                        <label class="product-details"><?php echo $userid['PRODUCT_PRICE']; ?></label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" ml-2 weight-50 content-center">
                        <div class=" content-center "style="margin-top:0.8rem">
                            <h1 class="h2 weight-user-info">
                                Order Details
                            </h1>
                        </div>
                        <div>

                            <div class=" mt-1">
                                <div class="block-weighted mb-1">
                                    <div class="weight-80">
                                        <label class="weight-user-info">Date Received:</label>
                                        <label class="product-details mt-1"><?php echo $date_received; ?></label>
                                    </div>
                                    
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-80">
                                        <label class="weight-user-info">Date Shipped:</label>
                                        <label class="product-details "><?php echo $date_received; ?></label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-80">
                                        <label class="weight-user-info">Date Delivered:</label>
                                        <label class="product-details "><?php echo $date_received; ?></label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-80">
                                        <label class="weight-user-info">Date Ordered:</label>
                                        <label class="product-details "><?php echo $date_received; ?></label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-80">
                                        <label class="weight-user-info">Customer Name:</label>
                                        <label class="product-details "><?php echo $userid1['CUSTOMER_NAME']; ?></label>
                                    </div>
                                </div>

                            </div>
                            <form action="THESIS_UPDATE_PRODUCT_ADMIN.php" method="POST">
                            <input type="submit" value="Change Data" class="button mt-1 ml-2half w-button no-border " />
                            <A href="./THESIS_REPORT_PAGE_ADMIN.php" class="button mt-1 ml-2half  no-border" style="background-color: #D1D9DF;">Go Back</A>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </body>
    </html>