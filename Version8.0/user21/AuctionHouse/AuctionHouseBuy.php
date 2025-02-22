<html>
<head>
    <title>View Sales</title>
    <link rel='stylesheet' href='Auction.css'>
    </head>
<body>
<center>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "auction";

//create connection
$connection = mysqli_connect($host, $user, $pass, $database);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

//get results from database
$result = mysqli_query($connection,"SELECT * FROM sales");
$all_property = array();  //declare an array for saving property

//showing property
echo '<table border=1>
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        echo '<td >' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table>";
?>
</center>
</body>
</html>