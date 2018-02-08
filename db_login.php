 <?php
session_start();
$uname = $_POST['email'];
$pass = $_POST['password'];
$servername = "localhost";
$username = "sannisth";
$password = "heisenberg9";
$dbname = "market_new";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE uemail='$uname' AND upass='$pass'";

if( !mysqli_query($conn, $sql))
{
    die ("ERROR: Could not able to execute $sql. " . mysqli_error($conn));
}
else
{
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if(strcmp($uname, $row[1])==0 && strcmp($pass, $row[2])==0)
    {
    	 //echo "hello";
    	 $_SESSION['access_token'] = $uname;
    	// echo $_SESSION['access_token'];
         $_SESSION['uname']=$uname ;
         //echo $_SESSION['uname'];
        header('location: index.php?name=1');
        //echo "<script type='text/javascript'>alert('Log in Successfully');window.location.href = 'index.php';</script>";
    }
    else
    {
    	 echo "<script type='text/javascript'>alert('Please Enter Correct Credential');window.location.href = 'login_card.php';</script>";
        
    }
       
}
$conn->close();  

?> 