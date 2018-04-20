<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
tr:hover {background-color: #f5f5f5};
</style>
</head>
<body>

<?php
parse_str($_SERVER['QUERY_STRING']); 

$con = mysqli_connect('localhost','root','root','chulaqmock');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"chulaqmock");
$sql="SELECT * FROM mockup WHERE fname = '".$name."' AND department = '".$dep."' AND startTime = '".$startTime."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Appiontment ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Patient ID</th>
<th>Department</th>
<th>Doctor First name</th>
<th>Doctor Last Name</th>
<th>Doctor ID</th>
<th>Date</th>
<th>Start Time</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['appID'] . "</td>";
    echo "<td>" . $row['fName'] . "</td>";
    echo "<td>" . $row['lName'] . "</td>";
    echo "<td>" . $row['pID'] . "</td>";
    echo "<td>" . $row['department'] . "</td>";
    echo "<td>" . $row['dFName'] . "</td>";
    echo "<td>" . $row['dLName'] . "</td>";
    echo "<td>" . $row['docID'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['startTime'] . "</td>";
    echo "</tr>";
}

echo "</table>";
mysqli_close($con);
?>
</body>
</html>