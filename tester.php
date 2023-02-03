<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>
    <!-- CHART SRCS -->
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
</head>
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


// eto yung sa database na babaguhin
$sql = "SELECT Count(REGISTRATION_ID) as nn FROM REGISTRATIONFORM WHERE FIRST_NAME = 'test'"; //type1
$results = sqlsrv_query($conn, $sql);
$data = sqlsrv_fetch_array($results);
// eto yung hahanapin sa java script
$id = $data['nn'];

$sql2 = "SELECT Count(REGISTRATION_ID) as nn FROM REGISTRATIONFORM WHERE  FIRST_NAME = 'null'"; //type2
$results2 = sqlsrv_query($conn, $sql2);
$data2 = sqlsrv_fetch_array($results2);
$id2 = $data2['nn'];


?>

<body>

        
        <div id="container" style="width: 100%; height: 100%"></div>
      
  
    <!-- JavaScript -->
    <script>
    let a = <?php echo $id ?>;
    let b = <?php echo $id2?>;
     anychart.onDocumentReady(function() {

    
var data = [
    
// name of data in shown chart
    {x: "type 1", value: a},
    {x: "type 2", value: b},

];

var chart = anychart.pie();
//title ng chart
chart.title("check");

chart.data(data);

chart.container('container');
chart.draw();
chart.radius("100%")

});
    </script>
</body>

</html>