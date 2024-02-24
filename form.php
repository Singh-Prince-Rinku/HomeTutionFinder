<?php
$text= $_POST['text'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error)
{
 die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn ->prepare("insert into registration (text,email,password) values(?,?,?)");
    $stmt ->bind_param("ssi",$text,$email,$password);
    $stmt ->execute();
    header("Location:form.php");
    $stmt->close();
    $conn->close();
}
?>