<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Market Place!</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
<title></title>
<style>
.shadowbox {
  align:centre;
  border: 1px solid #333;
  box-shadow: 8px 8px 5px #444;
  padding: 8px 12px;
  background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
}
</style>
</head>
<body>
<div class="row">
               <?php
               $servername = "localhost";
	$username = "sannisth";
	$password = "heisenberg9";
	$dbname = "market_new";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	
	if(isset($_GET['name'])){
		$pid = htmlspecialchars($_GET["name"]);
		//Insert that into Db.cart
		$query = "insert into cart (count,id,pid) values ('1','3','$pid')";
		if($conn->query($query)===TRUE)
		{
			//echo "Record added successfully";
		}
		else
		{
			echo "Error: ".$sql. "<br>". $conn->error;
		}
		

		}
		
                  $var = "";
                  
                  $sql = "SELECT products.pimg, products.pname, products.pprice, products.pavail, products.pdesc
FROM products, cart
WHERE cart.pid = products.pid";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          ?>
                          <div id="row">
               <div class="col-md-4 text-center col-sm-6 col-xs-6">
                  <div class="thumbnail product-box">
                     <img src="assets/img/<?php echo $row["pimg"] ?>" alt="" style="width:166px;height:162px;"/>
                     <div class="caption">
                        <h3><a href="<?php echo "card/product.php?name=" .$row["pid"] ?>"><?php echo $row["pname"] ?></a></h3>
                        <p>Price : <strong>$<?php echo $row["pprice"] ?></strong>  </p>
                        <p>No. of Products remaining: <?php echo $row["pavail"] ?>  </p>
                        <p>Details: <?php echo $row["pdesc"] ?>  </p>
                     </div>
                  </div>
               </div>
               </div>
               <?php
                  }
                  } else {
                  echo "0 results";
                  }
                  ?>
            </div>
            <div class="shadowbox">
            	<form action="checkout.php" method="post"> 
            	<button type="submit"> Checkout </button>
            	</form>
            	<a href="index.php?name=1">Continue Shopping</a>
            </div>
</body>
</html>