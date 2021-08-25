
<?php 
	session_start(); 

	if (!isset($_SESSION['admin'])) {
		$_SESSION['msg'] = "Il faut se connecter";
		header('location: ../login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['admin']);
		header("location: ../login.php");
	}
	require_once 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='../css/admin-products.css' type='text/css' media='all' />
</head>
<style>
ul {
    display: inline;
    list-style-type: none;
}
li {
    list-style-type: lower-roman;
    display: inline;
    padding-right: 20px;
}
li form {
    display: inline !important;
}
.filters form {
    display: inline;
}
.filters button {
    background-color: rgb(58, 66, 175);
    color: white;
    font-family: Helvetica;
    border: none;
    font-size: 10px;
    height: 25px;
}
.filters span {
    font-weight: bold;
    font-family: Helvetica;
}
</style>
<body>
<?php include('../includes/admin-header.php') ?>

<div class="container">
        <h3 class="text-center font-weight-bold text-uppercase py-4">Ajouter un nouveau jeu</h3>


        <div class="container">
<?php
if(isset($_POST['addnew'])){
    if( empty($_POST['name']) || empty($_POST['price'])
        || empty($_FILES['image']['name']) || empty($_POST['platform']))
    {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                Veuillez remplir tous les champs
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
              </div>";
    }else{
        $name = $_POST['name'];
        $price = $_POST['price'];
        $platform = $_POST['platform'];

        // Get image name
        $image = $_FILES['image']['name'];
        // image file directory
        $target = "../img/".basename($image);

        
        $sql = "INSERT INTO games(name,price,image,platform)
        VALUES('$name','$price','$target','$platform')";

        if( $con->query($sql) === TRUE){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Produit ajouté à la base de données avec succès
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  </div>";
        }else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Erreur: Une erreur s'est produite lors de l'ajout du produit
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  </div>";
        }
    }
}
?>

        <form action="" method="POST"  enctype="multipart/form-data" class="form-horizontal">

    <div class="table-responsive">     
    <table id="mytable" class="table table-bordered table-responsive-md table-striped text-center">

    <thead>
       <th><label for="name">Nom</label></th>
       <th><label for="price">Prix (MAD)</label></th>
       <th><label for="image">Image</label></th>
       <th><label for="platform">Plate-forme</label></th>
       <th>Ajouter</th>
    </thead>
    <tbody>
    <tr>
        <td><input type="text" id="name" name="name" class="form-control" placeholder="Ex: FIFA 20" /></td>
        <td><input type="number" name="price" id="price" class="form-control" placeholder="Ex: 68" /></td>

        <td>
         <div class="input-group">
          <div class="input-group-prepend">
           <span class="input-group-text" id="inputGroupFileAddon01"><i class="fas fa-paperclip" aria-hidden="true"></i></span>
          </div>
          <div class="custom-file">
           <input type="file" class="custom-file-input" name="image" id="customFileLang" aria-describedby="inputGroupFileAddon01" lang="fr">
           <label class="custom-file-label text-left" for="customFileLang">Choisir l'image</label>
          </div>
         </div>

        </td>

        <td><input type="text" name="platform" id="platform" class="form-control" placeholder="Ex: PlayStation" /></td>
        <td><button class="btn btn-success btn-sm" type="submit" name="addnew"><i class="fas fa-plus"></button></td>
    </tr>
    </tbody>
    </div>
    </table>
    </form>
    </div>

</div>

<?php
//COUNT TOTAL NUMBER OF GAMES IN DATABASE
$sql_total="SELECT COUNT(*) AS total FROM games";
$result_total=mysqli_query($con,$sql_total);
$data=mysqli_fetch_assoc($result_total);
?>


<h3 class="text-center font-weight-bold text-uppercase py-4">Liste de tous les jeux (<?php echo $data['total']; ?>)</h3>

<?php

echo "<div class='container'>";


if( isset($_POST['delete'])){
    $sql = "DELETE FROM games WHERE id=" . $_POST['id'];
    if($con->query($sql) === TRUE){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Le produit a été supprimé avec succès de la base de données
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
              </div>";
    }
}


if(isset($_POST['name_asc'])){
    $sql = "SELECT * FROM games ORDER BY name ASC"; 
}
elseif(isset($_POST['name_desc'])){
    $sql = "SELECT * FROM games ORDER BY name DESC"; 
}


elseif(isset($_POST['price_asc'])){
    $sql = "SELECT * FROM games ORDER BY price ASC"; 
}
elseif(isset($_POST['price_desc'])){
    $sql = "SELECT * FROM games ORDER BY price DESC"; 
}


elseif(isset($_POST['platform_asc'])){
    $sql = "SELECT * FROM games ORDER BY platform ASC"; 
}
elseif(isset($_POST['platform_desc'])){
    $sql = "SELECT * FROM games ORDER BY platform DESC"; 
}

elseif(isset($_POST['all'])){
    $sql = "SELECT * FROM games"; 
}
elseif(isset($_POST['search'])){
    $search= $_POST['term'];
    $search1 = filter_var($search, FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM games WHERE name LIKE '%$search1%' || price LIKE '$search1' 
                    || platform LIKE '%$search1%'";
}
else{
    $sql = "SELECT * FROM games";
}

$result = $con->query($sql);


if( $result->num_rows > 0)
{
?>


<div class="filters">
<strong>Filtrer par...</strong><br>
<form method="post">
<ul>
    <li><button class="btn btn-dark btn-sm" name="all" style="height: 30px;">Tous</button></li>
    <li>
        <span>Nom:</span> 
           <?php
              if(isset($_POST['name_asc'])){
                  echo '
                  <button name="name_asc" style="background-color: green;"><i class="fas fa-arrow-up"></i></button>';
              }
              else{
                  echo '
                  <button name="name_asc"><i class="fas fa-arrow-up"></i></button>';
              } 
              ?>
              <?php

              if(isset($_POST['name_desc'])){
                echo '<button name="name_desc" style="background-color: green;"><i class="fas fa-arrow-down"></i></button>';
              }
              else{
                echo '<button name="name_desc"><i class="fas fa-arrow-down"></i></button>';
              }
           ?>
    </li>
    <li>
        <span>Prix:</span>
        <?php
              if(isset($_POST['price_asc'])){
                  echo '
                  <button name="price_asc" style="background-color: green;"><i class="fas fa-arrow-up"></i></button>';
              }
              else{
                  echo '
                  <button name="price_asc"><i class="fas fa-arrow-up"></i></button>';
              } 
              ?>
              <?php

              if(isset($_POST['price_desc'])){
                echo '<button name="price_desc" style="background-color: green;"><i class="fas fa-arrow-down"></i></button>';
              }
              else{
                echo '<button name="price_desc"><i class="fas fa-arrow-down"></i></button>';
              }
           ?>
    </li>
    <li>
    <span>Plate-forme:</span>
        <?php
              if(isset($_POST['platform_asc'])){
                  echo '
                  <button name="platform_asc" style="background-color: green;"><i class="fas fa-arrow-up"></i></button>';
              }
              else{
                  echo '
                  <button name="platform_asc"><i class="fas fa-arrow-up"></i></button>';
              } 
              ?>
              <?php

              if(isset($_POST['platform_desc'])){
                echo '<button name="platform_desc" style="background-color: green;"><i class="fas fa-arrow-down"></i></button>';
              }
              else{
                echo '<button name="platform_desc"><i class="fas fa-arrow-down"></i></button>';
              }
           ?>
    </li>
    <li>
         <!-- Search form -->
        <div class="form-inline mr-0" style="float: right;">
            <input class="form-control form-control-sm mr-3 w-10" name="term" type="text" Style="border: 1px solid #555;"
             placeholder="Nom, Prix, Plate-forme" aria-label="Nom, Prix, Plate-forme">
            <button class="btn btn-sm btn-success ml-0" name="search" style="height: 30px;">
                <i class="fas fa-search" aria-hidden="true" style="font-weight: bold; font-size: 15px;"></i>
            </button>
        </div>
    </li>
</ul>
</form>
</div>


<div class="table-responsive mt-3">
             
<table id="mytable" class="table table-bordered table-responsive-md table-striped text-center">
     
     <thead class="black white-text">
     <th>Nom</th>
      <th>Prix (MAD)</th>
       <th>Image</th>
       <th>Plate-forme</th>
        <th>Éditer</th>
        
         <th>Supprimer</th>
     </thead>
<tbody>
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<form action='' method='POST' enctype='multipart/form-data'>"; //added
        echo "<input type='hidden' value='". $row['id']."' name='id' />"; //added
        echo "<tr>";
        echo "<td class='word'>".$row['name'] . "</td>";
        echo "<td class='word'>".$row['price'] . "</td>";
        echo "<td style='width:200px;'><div class='img-box'><img src='../img/".$row['image']."' ></div></td>";
        echo "<td class='word'>".$row['platform'] . "</td>";
        echo "<td class='icon'><p data-placement='top'><button href='edit.php?id=".$row['id']."' class='btn btn-info btn-sm'><i class='fas fa-edit'></i></button></p></td>";
        echo "<td class='icon'><p data-placement='top'><button class='btn btn-danger btn-sm' type='submit' name='delete' data-title='Delete' data-toggle='modal' data-target='#delete' ><i class='fas fa-trash-alt'></i></button></p></td>";
        echo "</tr>";
        echo "</form>"; //added
    }
?>
</tbody>
</table>
<?php
}
else
{
    echo "<br/>
    <ul><li><a href='alter-games.php' type='button' class='btn btn-dark btn-sm' name='all' style='height: 30px;'>
    Tous</a></li></ul>
    <br/>
    <br/>
    <div class='alert alert-dark' role='alert'><strong>Aucun produit trouvé</strong></div>
    ";
}

?>
</div>

 <!-- Include JS files here -->

        <!-- jQuery -->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript"></script>
		
</body>
</html>

</body>
</html>