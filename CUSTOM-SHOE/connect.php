<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "solecraft";

$con = mysqli_connect($server, $username, $password, $dbname);

if(!$con)
{
    echo "not connected";
}

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$UserName = $_POST['UserName'];
$Phone_No = $_POST['Phone_No'];
$Password = $_POST['Password'];

$sql = "INSERT INTO `registration`(`Name`,`UserName`, `Email`, `Phone_No`, `Password`) VALUES ('$Name', '$UserName', '$Email', '$Phone_No', '$Password')";

try {
    $result = mysqli_query($con, $sql);
    if($result){
        // Data submitted successfully, redirect to login.html using JavaScript
        echo "<script>window.location.href = 'index.html';</script>";
    } else {
        echo "Failed";
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        // Duplicate entry error
        echo "Email address already exists. Please use a different email.";
    } else {
        // Other SQL error
        echo "An error occurred: " . $e->getMessage();
    }
}
?>               