
<?php
$localhost = "localhost"; //your host name
$username = "root"; 
$password = ""; // your database password
$dbname = "registration";// your database name

$con = new mysqli($localhost, $username, $password, $dbname);


if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
}


/* end of file */
?>