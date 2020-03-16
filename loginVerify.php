<?
session_start();

?>
<?php


$name=$_POST["email"];
$password=$_POST["psw"];






$servername = "localhost";
$username = "root";

$dbname = "xcompany";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email, password,gender,dob,name FROM reg where email='$name' and password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
$_SESSION["name"]= $row["name"];
$_SESSION["email"]= $row["email"];
$_SESSION["gender"]= $row["gender"];
$_SESSION["dob"]= $row["dob"];


        echo "log in successful";

    }
} else {
    echo "0 results";
}
$conn->close();
?>
<html>
<li><a href="ViewProfile.php"><u>View Profile</u></a></li>
<html>