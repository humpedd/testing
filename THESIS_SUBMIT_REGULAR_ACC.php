<?php
$serverName = "HUMPS";
$connectionOptions = [
    "Database" => "DLSU",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn == false)
    die(print_r(sqlsrv_errors(), true));

//ERRORS

// EMPLOYEE ID
$EMPLOYEE_ID = $_POST['EMPLOYEE_ID'];
$EmployeeIDErr = "";
if (empty($_POST['EMPLOYEE_ID'])) {
    $EmployeeIDErr = "Employee ID is empty <br>";
}

// FIRST NAME
$FIRST_NAME = $_POST['FIRST_NAME'];
$firstnameErr = "";
$first_noSpecial = "";
if (empty($_POST['FIRST_NAME'])) {
    $firstnameErr = "FIRST NAME is empty <br>";
}
if (!preg_match("/^[a-zA-z]*$/", $FIRST_NAME)) {
    $first_noSpecial = "> Only <b>alphabets and whitespaces</b> are allowed in FIRST NAME <br>";
}
// MIDDLE NAME
$MIDDLE_NAME = $_POST['MIDDLE_NAME'];
$midnameErr = "";
$mid_noSpecial = "";
if (empty($_POST['MIDDLE_NAME'])) {
    $midnameErr = "MIDDLE NAME is empty <br>";
}
if (!preg_match("/^[a-zA-z]*$/", $MIDDLE_NAME)) {
    $mid_noSpecial = "> Only <b>alphabets and whitespaces</b> are allowed in MIDDLE NAME <br>";
}
// LAST NAME
$LAST_NAME = $_POST['LAST_NAME'];
$lastnameErr = "";
$last_noSpecial = "";
if (empty($_POST['LAST_NAME'])) {
    $lastnameErr = "LAST NAME is empty <br>";
}
if (!preg_match("/^[a-zA-z]*$/", $LAST_NAME)) {
    $last_noSpecial = "> Only <b>alphabets and whitespaces</b> are allowed in LAST NAME <br>";
}
// BIRTHDAY
$bdayErr = "";
if (empty($_POST['BIRTHDAY'])) {
    $bdayErr = "Please input your BIRTHDAY";
}
// CONTACT INFORMATION
$PHONE_NUMBER = $_POST['PHONE_NUMBER'];
$phone_no_Empty = ""; // empty form
if (empty($_POST['PHONE_NUMBER'])) {
    $phone_no_Empty = "> PHONE NUMBER is <b>required</b> <br>";
}
$phone_nolenErr = ""; //11 is the max
if (strlen($_POST['PHONE_NUMBER']) != 11) {
    $phone_nolenErr = "> PHONE NUMBER only accepts <b>11 digits</b> <br>";
}
$phone_LimitInput = ""; // numbers only
if (!preg_match("/^[0-9]*$/", $PHONE_NUMBER)) {
    $phone_LimitInput = "> <b>Only numeric values</b> are allowed in PHONE NUMBER<br>";
}
// already exists
$mobileExist = "";
$checkphone_no = "SELECT* FROM THESIS_EMPLOYEE_LOGIN_DATA WHERE PHONE_NUMBER = '$PHONE_NUMBER'";
$phone_noDuplicate = sqlsrv_query($conn, $checkphone_no);
while ($fetchedphone_no = sqlsrv_fetch_array($phone_noDuplicate)) {
    if ($fetchedphone_no['PHONE_NUMBER']) 
        $mobileExist = "PHONE NUMBER <b>already exists.</b> <br>";
    
}

// LANDLINE NUMBER
$LANDLINE_NUMBER = $_POST['LANDLINE_NUMBER'];
$land_no_Empty = ""; //empty form
if (empty($_POST['LANDLINE_NUMBER'])) {
    $land_no_Empty = "> LANDLAND NUMBER is <b>required</b> <br>";
}
$land_LimitInput = ""; // numbers only
if (!preg_match("/^[0-9]*$/", $LANDLINE_NUMBER)) {
    $land_LimitInput = "> <b>Only numeric values</b> are allowed in LANDLINE NUMBER. <br>";
}
$land_nolenErr = ""; //10 is the max
if (strlen($_POST['LANDLINE_NUMBER']) != 10) {
    $land_nolenErr = "> LANDLINE NUMBER only accepts <b>10 digits</b> <br>";
}
// EMAIL INFORMATION
$emailErr = "";
$emailExist = "";
$EMAIL_ADDRESS = $_POST['EMAIL_ADDRESS'];
if (empty($_POST['EMAIL_ADDRESS'])) {
    $emailErr = "Email is required.";
}
$checkEmail = "SELECT * FROM THESIS_EMPLOYEE_LOGIN_DATA WHERE EMAIL_ADDRESS = '$EMAIL_ADDRESS'";
$emailFiltered = sqlsrv_query($conn, $checkEmail);
while ($fetchedEmail = sqlsrv_fetch_array($emailFiltered)) {
    if ($fetchedEmail['EMAIL_ADDRESS'] == $EMAIL_ADDRESS) {
        $emailExist = "EMAIL <b>already exists.</b> <br>";
    }
}
// ADDRESS
$housenoErr = "";
if (empty($_POST['HOUSE_NUMBER'])) {
    $housenoErr = "> HOUSE NUMBER is <b>empty</b> <br>";
}
$streetErr = "";
if (empty($_POST['STREET'])) {
    $streetErr = "> STREET/SUBDIVISION is <b>empty</b> <br>";
}
$brgyErr = "";
if (empty($_POST['BRGY'])) {
    $brgyErr = "> BRGY/MUNICIPALITY is <b>empty</b> <br>";
}
?>


<?php
if (isset($_POST['submit'])) {
    if (
        // $emailExist == "" && $mobileExist == "" &&
         $firstnameErr == "" && $first_noSpecial == ""
        && $midnameErr == "" && $mid_noSpecial == ""
        && $lastnameErr == "" && $last_noSpecial == ""
        && $bdayErr == ""
        && $phone_nolenErr == "" && $phone_no_Empty == "" && $phone_LimitInput == ""
        && $land_no_Empty == "" && $land_LimitInput == "" && $land_nolenErr == ""
        && $emailErr == ""
        && $housenoErr == "" && $streetErr == "" && $brgyErr == ""
    ) {
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
        $_SESSION['EMPLOYEE_ID'] = $_POST['EMPLOYEE_ID'];
        $FIRST_NAME = $_POST['FIRST_NAME'];
        $MIDDLE_NAME = $_POST['MIDDLE_NAME'];
        $LAST_NAME = $_POST['LAST_NAME'];
        $BIRTHDAY = $_POST['BIRTHDAY'];


        $HOUSE_NUMBER = $_POST['HOUSE_NUMBER'];
        $STREET = $_POST['STREET'];
        $BRGY = $_POST['BRGY'];

        $PHONE_NUMBER = $_POST['PHONE_NUMBER'];
        $LANDLINE_NUMBER = $_POST['LANDLINE_NUMBER'];
        $EMAIL_ADDRESS = $_POST['EMAIL_ADDRESS'];


        $sql = "INSERT INTO
            THESIS_EMPLOYEE_LOGIN_DATA(
                EMPLOYEE_ID,FIRST_NAME,MIDDLE_NAME,LAST_NAME, BIRTHDAY,
                HOUSE_NUMBER,STREET,BRGY,
                LANDLINE_NUMBER,EMAIL_ADDRESS,PHONE_NUMBER) 
             VALUES 
                ('$EMPLOYEE_ID','$FIRST_NAME','$MIDDLE_NAME','$LAST_NAME','$BIRTHDAY',
                '$HOUSE_NUMBER','$STREET','$BRGY',
                '$LANDLINE_NUMBER','$EMAIL_ADDRESS','$PHONE_NUMBER')";

        $results = sqlsrv_query($conn, $sql);
        if ($results) {
            header("Location: THESIS_REGULAR_LOGINPASS_DATA.php");
            echo 'Registration Successful<br>';
        } else {
            echo 'Error<br>';
        }
    }
}

?>

<!-- ERROR POP UP BOX -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link href="./style.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
        rel="stylesheet">
</head>

<body class="bg-white bg-image h-100 content-center" onload="document.getElementById('id01').style.display='block'">
    <div class=" content-center">
        <div class="content-center">

            <!-- The Modal -->
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <!-- Modal Content -->
                <form class="modal-content animate" action="/action_page.php">
                    <div class="container">

                        <h3>
                            <?php if (empty($_POST['EMPLOYEE_ID'])) {
                                echo $EmployeeIDErr;
                            } ?>
                        </h3>
                        <!-- FIRST NAME ERRORS -->
                        <h3>
                            <?php if (empty($_POST['FIRST_NAME'])) {
                                echo $firstnameErr;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (!preg_match("/^[a-zA-z]*$/", $FIRST_NAME)) {
                                echo $first_noSpecial;
                            } ?>
                        </h3>
                        <!-- MIDDLE NAME ERRORS -->
                        <h3>
                            <?php if (empty($_POST['MIDDLE_NAME'])) {
                                echo $midnameErr;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (!preg_match("/^[a-zA-z]*$/", $MIDDLE_NAME)) {
                                echo $mid_noSpecial;
                            } ?>
                        </h3>
                        <!-- LAST NAME ERRORS -->
                        <h3>
                            <?php if (empty($_POST['LAST_NAME'])) {
                                echo $lastnameErr;
                            } ?>
                        </h3>
                        <h3>
                            <?php if (!preg_match("/^[a-zA-z]*$/", $LAST_NAME)) {
                                echo $last_noSpecial;
                            } ?>
                        </h3>
                        <!-- BIRTHDAY ERRORS -->
                        <h3>
                            <?php if (empty($_POST['BIRTHDAY'])) {
                                echo $bdayErr;
                            } ?>
                        </h3>
                        <!--PHONE NUMBER ERRORS -->
                        <h3>
                            <?php if (strlen($_POST['PHONE_NUMBER']) != 11) {
                                echo $phone_nolenErr;
                            } ?>
                        </h3>
                        <h3><!-- PHONE NUMBER IF EMPTY -->
                            <?php if (empty($_POST['PHONE_NUMBER'])) {
                                echo $phone_no_Empty;
                            } ?>
                        </h3>
                        <h3><!-- PHONE NUMBER ALREADY EXISTS -->
                            <?php 
                            if ($mobileExist != "") {
                                echo $mobileExist;
                            } 
                            ?>
                        </h3>
                        <h3><!-- PHONE NUMBER ONLY NUMERIC -->
                            <?php if (!preg_match("/^[0-9]*$/", $PHONE_NUMBER)) {
                                echo $phone_LimitInput;
                            } ?>
                        </h3>

                        <!--LANDLINE NUMBER ERRORS -->
                        <h3> <!-- LANDLINE IS EMPTY -->
                            <?php if (empty($_POST['LANDLINE_NUMBER'])) {
                                echo $land_no_Empty;
                            } ?>
                        </h3>
                        <h3><!-- LANDLINE IS ONLY ACCEPTS NUMERIC-->
                            <?php if (!preg_match("/^[0-9]*$/", $LANDLINE_NUMBER)) {
                                echo $land_LimitInput;
                            } ?>
                        </h3>
                        <h3><!-- LANDLINE IS MORE/LESS THAN 10 DIGITS-->
                            <?php if (strlen($_POST['LANDLINE_NUMBER']) != 10) {
                                echo $land_nolenErr;
                            } ?>
                        </h3>
                        <!-- EMAIL -->
                        <h3><!-- EMAIL IS EMPTY-->
                            <?php 
                            if (empty($_POST['EMAIL_ADDRESS'])) {
                                echo $emailErr;
                            }
                             ?>
                        </h3>
                        <h3><!-- EMAIL ALREADY EXISTS-->
                            <?php 
                            if ($emailExist != "") {
                                echo $emailExist;
                            } 
                            ?>
                        </h3>
                        <!-- ADDRESS -->
                        <h3><!-- HOUSE NUMBER IS EMPTY-->
                            <?php if (empty($_POST['HOUSE_NUMBER'])) {
                                echo $housenoErr;
                            } ?>
                        </h3>
                        <h3><!-- STREET/SUBDV IS EMPTY-->
                            <?php if (empty($_POST['STREET'])) {
                                echo $streetErr;
                            } ?>
                        </h3>
                        <h3><!-- BRGY IS EMPTY-->
                            <?php if (empty($_POST['BRGY'])) {
                                echo $brgyErr;
                            } ?>
                        </h3>

                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="history.go(-1)" class="cancelbtn">Go back</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>
<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>