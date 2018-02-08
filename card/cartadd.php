<html>
<head>
	<title>
	</title>
</head>

<body>
	<form action="cartadd.php" method="post">
		<input type="text" id="pid" placeholder="pid"><br>
		<input type="submit" id="bid" >click me</input>
	</form>
	
	<?php
	if(isset($_POST['$pid'])){
	$pid = $_POST["pid"];
	$servername = "localhost";
	$username = "sannisth";
	$password = "heisenberg9";
	$dbname = "market_new";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$query = "insert into cart (count,id,pid) values ('1','3','$pid')";
	
	if ($conn->query($sql) === TRUE) 
	{
	    echo "New record created successfully";
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	}
	else
	{ echo "nai thatu aa"; }
	?>
	
</body>
</html>