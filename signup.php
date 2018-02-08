<?php
session_start();
$uname = $_POST['email'];
$pass = $_POST['password'];

$servername = "localhost";
$username = "sannisth";
$password = "heisenberg9";
$dbname = "market_new";

$pwd = $_POST['password'];
$pwd2 = $_POST['repassword'];
//$GLOBALS["id"] = 7;
//$id = 8;
if (strcmp($pwd,$pwd2)==0)
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Escape user inputs for security
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // attempt insert query execution
    //$sql = "INSERT INTO login (id, username, email, password) VALUES ('$id', '$u_name', '$email','$pwd')";
    $sql = "INSERT INTO users (uemail, upass) VALUES ('$uname','$pass')";
    if( !mysqli_query($conn, $sql))
    {
        die ("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
    }
    else
    {
    	 $_SESSION['access_token'] = $uname;
    	// echo $_SESSION['access_token'];
         $_SESSION['uname']=$uname ;
    	// $_SESSION['access_token'] = true;
        echo "<script>location.href = 'index.php?name=1&uname=$email';</script>";
    }
    $conn->close();
}
else
{
    echo "<script type='text/javascript'>alert('password not match!');window.location.href = 'signup_card.php';</script>";
}
?>