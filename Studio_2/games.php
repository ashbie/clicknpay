<?php 
    session_start(); 
    
	include('admin/connect.php');

	if (!isset($_SESSION['cin']) && !isset($_SESSION['name'])) {
		$_SESSION['msg'] = "ACCESS NON AUTORISÉ";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['cin']);
		header("location: login.php");
    }
    
$status="";
if (isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];
$result = mysqli_query($con,"SELECT * FROM `games` WHERE `id`='$id'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$id = $row['id'];
$price = $row['price'];
$image = $row['image'];
$platform = $row['platform'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'id'=>$id,
    'price'=>$price,
    'platform'=>$platform,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

    }
}

?>
<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Films: Click n Pay</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-- custom styles -->
        <link rel="stylesheet" href="css/index-header.css">
        <link rel="stylesheet" href="css/user-products.css">

        <style>
            .content {
              margin-top: 80px;
            }

        </style>

        <script type="text/javascript">
	$(document).ready(function(){
		$(".wish-icon i").click(function(){
			$(this).toggleClass("fa-heart fa-heart-o");
		});
	});	
</script>
</head>
<body>

<?php include('index-header.php') ?>

	<div class="content">
 
    
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>



<?php
}


 echo "<div class='container pt-5'>
	<div class='row'>
			<div id='myCarousel' class='carousel slide' data-ride='carousel' data-interval='0'>
			 
			";

			

echo "<!-- Wrapper for carousel items -->
<div class='carousel-inner'>
	<div class='item carousel-item active'>
		<div class='row'>";


$result = mysqli_query($con,"SELECT * FROM `games`");

while($row = mysqli_fetch_assoc($result)){

	     echo "<div class='col-lg-3 mt-4'>
              <div class='card' style='height:auto;'> 
			  <form method='post' action=''>
			  <input type='hidden' name='id' value=".$row['id']." />
			  <span class='wish-icon'><i class='far fa-heart'></i></span>
              <img src='img/".$row['image']."' style='width:100%;'>
              <div class='card-block'>
                <span class='pr-4'>Nom:</span> <h4 class='card-title pl-2'>".$row['name']."</h4><br/><br/>
			    <span class='pr-3'>Plate-forme:</span> <div class='meta text-muted pl-1' style='display: inline;'><b>".$row['platform']."</b></div><br/><br/>
              </div>
              <div class='card-footer'>
                <span><strong>".$row['price']." MAD</strong></span>
                <span class='float-right'><button type='submit' class='btn'>AJOUTER</button></span>
              </div>
			  </form>
			  </div>
			  </div>";
		
		}


		echo "
</div>
</div>
</div>

</div>
</div>
</div>";



	mysqli_close($con);
?>


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<br /><br />
     

<?php include('footer.php') ?>
</div>
		
</body>
</html>