<!DOCTYPE html>
<html lang="en">
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
</head>

<?php
include 'connection.php';

$pname = $_POST['searchbar'];
//$pname = "Product1";

$sql = "SELECT * FROM products WHERE pname = '$pname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
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
													<p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="<?php echo "card/product.php?name=" .$row["pid"] ?>" class="btn btn-primary" role="button">See Details</a></p>
												</div>
											</div>
									</div>
									<?php
    }
} else {
		echo "no results";
}

?>
</html>




