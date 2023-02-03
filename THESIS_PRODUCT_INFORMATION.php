<DOCTYPE html>

    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link rel="stylesheet" href="reportpagestyles.css">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./style.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
            rel="stylesheet">
        <title>User Profile</title>
    </head>

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


    $SEARCH_ID=$_POST['SEARCH_ID'];
   
    $sql = "SELECT * FROM THESIS_PRODUCT_DATA
        WHERE PRODUCT_ID=('$SEARCH_ID') OR BOX_ID=('$SEARCH_ID')OR SUPPLIER_ID=('$SEARCH_ID') OR CUSTOMER_ID=('$SEARCH_ID') OR ORDER_ID=('$SEARCH_ID')";
    $results=sqlsrv_query($conn,$sql);

    $userid=sqlsrv_fetch_array($results);

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
        <title>User Profile</title>
    </head>

    <body class="bg-white bg-image h-100 content-center">
        <div class=" content-center">
            <div class="content-center">
                <div class="block-weighted shadow border bg-light box-usercomplete">
                    <div class=" weight-50 content-center">
                        <div class="bg-white border content-center p-1 pt-0 "style="margin-left:1rem;">
                            <h1 class="h2">
                                Welcome Back, 
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
                            <h2 class="h2 weight-user-info">Demographics</h2>
                            <div class=" mt-1">
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Box ID</label>
                                    </div>
                                    <div class="weight-50 text-right">
                                        <label > </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Supplier ID</label>
                                    </div>
                                    <div class="weight-50 text-right">
                                        <label>  </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Customer ID</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Order ID</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Box Content</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>

                                </div>
                                <div class="block-weighted">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Product Price</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" ml-2 weight-50 content-center">
                        <div class=" content-center "style="margin-top:0.8rem">
                            <h1 class="h2 weight-user-info">
                                Vaccination Details
                            </h1>
                        </div>
                        <div>

                            <div class=" mt-1">
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Date Received</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Date Shipped</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">Second Dose</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">First Booster</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                </div>
                                <div class="block-weighted mb-1">
                                    <div class="weight-50">
                                        <label class="weight-user-info">First Booster Name</label>
                                    </div>
                                    <div class="weight-50 ">
                                        <label> Lorem Ipsum </label>
                                    </div>
                                    
                                </div>
                                
                            </div>
                           
                            <A href="./THESIS_LOGIN_PAGE_DATA.PHP" class="button mt-1 ml-2half  no-border" style="background-color: #D1D9DF;">LogOut</A>
                            
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </body>
    </html>