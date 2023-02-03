<?php
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
$EMPLOYEE_ID = $_SESSION['EMPLOYEE_ID'];
$sql = "SELECT EMPLOYEE_ID FROM THESIS_EMPLOYEE_LOGIN_DATA 
    WHERE EMPLOYEE_ID='$EMPLOYEE_ID'";
$results = sqlsrv_query($conn, $sql);
$userid = sqlsrv_fetch_array($results);
?>

<DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link rel="stylesheet" href="./style.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:ital,wght@0,200;0,400;0,500;1,400&family=Rubik:wght@300;400;500&display=swap"
            rel="stylesheet">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Successful</title>
    </head>

    <body class=" bg-image m-0">
        <div class="block-weighted h-92">
            <div class="weight-60 p-2 h-100 content-center">
                <div class="bg-white border p-2 h-80 form-box w-70">
                    <div class="opacity-100">

                        <form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <h2>Sign Up!</h2>
                            <h3>Complete your login credentials.</h3>
                            <br>
                            <label for="userid">Employee ID: </label> <br>
                            <input class="half-half-field" id="userid" name="first-name" type="text"
                                value="<?php echo $userid['EMPLOYEE_ID'] ?>"><br>
                            <br>
                            <label for="password">Password: </label> <br>
                            <input class="half-half-field" id="password" name="password" type="password" value=""><br>
                            <br>
                            <label for="password2">Re-type Password: </label> <br>
                            <input class="half-half-field" id="password2" name="password2" type="password" value=""><br>
                            <input type="submit" name="submit" value="submit" class="button-dark no-border mt-1" >
                            <!-- onclick="return alert('Login Created')" -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="weight-40 content-center">
                <br>
                <h1 align="center" style="line-height: 2.5rem">Registration Successful!</h1>
                <h2 align="center">Your Employee ID is <?php echo $userid['EMPLOYEE_ID']; ?> </h2><br><br>
                <a class="button-dark button-length " href="./THESIS_SUBMIT_REG_LOGIN.php">
                    Main Page</a>
            </div>
        </div>
        <?php

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $password = "";
        }
        if (isset($_POST['password2'])) {
            $password2 = $_POST['password2'];
        } else {
            $password2 = "";
        }

        if (isset($_POST['submit'])) {
            if ($password == $password2) {

                $serverName = "HUMPS";
                $connectionOptions = [
                    "Database" => "DLSU",
                    "Uid" => "",
                    "PWD" => ""
                ];

                $conn = sqlsrv_connect($serverName, $connectionOptions);
                if ($conn == false) {
                    echo 'error';
                    die(print_r(sqlsrv_errors(), true));
                }
                    
                $useridstr = $userid['EMPLOYEE_ID'];
                $passwordhash=md5($password);

                $sql = "INSERT INTO THESIS_LOGINPASS_DATA(EMPLOYEE_ID, EMPLOYEE_PASSWORD) 
                VALUES ('$useridstr','$passwordhash')";
                 $results=sqlsrv_query($conn,$sql);

                if ($results) {
                    echo '<script>alert("Login created")</script>';
                    echo "<script> window.location.href='THESIS_SUBMIT_REG_LOGIN.php';</script>";

                } else {
                    echo 'Error Occured! Kindly repeat.';
                }
            }else{
                echo '<script>alert("password did not match")</script>';
            }
        }
        ?>
    </body>

    </html>