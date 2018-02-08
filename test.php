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
<title></title></head>
<body>
<div class="row">
               <?php
               $servername = "localhost";
	$username = "sannisth";
	$password = "heisenberg9";
	$dbname = "market_new";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
                  $var = "";
                  
                  $sql = "SELECT products.pimg, products.pname, products.pprice, products.pavail, products.pdesc
FROM products, cart
WHERE cart.pid = products.pid";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          ?>
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
               <?php
                  }
                  } else {
                  echo "0 results";
                  }
                  ?>
            </div>
            <div>
            	<button type="submit"> Checkout </button>
            </div>
</body>
</html>