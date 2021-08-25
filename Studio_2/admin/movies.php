
<?php

require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sign In: M & G STORE</title>

    <!-- Font Awesome -->
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../css/mdb.min.css">
    <!-- custom styles -->
    <link rel="stylesheet" href="../css/admin-header.css">
	

	</head>
<body>

<?php

echo "<div class='container'>";


if( isset($_POST['delete'])){
    $sql = "DELETE FROM movies WHERE id=" . $_POST['id'];
    if($con->query($sql) === TRUE){
        echo "<div class='alert alert-success'>Successfully delete user</div>";
    }
}


$sql = "SELECT * FROM movies";
$result = $con->query($sql);


if( $result->num_rows > 0)
{
?>
<h2>List of all Users</h2>
<div class="table-responsive">
             
<table id="mytable" class="table  table-bordred table-striped">
     
     <thead>
     <th>Nom</th>
      <th>Prix (MAD)</th>
       <th>Image</th>
       <th>Genre</th>
       <th>Langue</th>
        <th>Éditer</th>
        
         <th>Supprimer</th>
     </thead>
<tbody>
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<form action='' method='POST' enctype='multipart/form-data'>"; //added
        echo "<input type='hidden' value='". $row['id']."' name='id' />"; //added
        echo "<tr>";
        echo "<td>".$row['name'] . "</td>";
        echo "<td>".$row['price'] . "</td>";
        echo "<td><img src='images/".$row['image']."' ></td>";
        echo "<td>".$row['genre'] . "</td>";
        echo "<td>".$row['language'] . "</td>";
        echo "<td><p data-placement='top'><a href='edit.php?id=".$row['id']."' class='btn btn-info btn-sm'><i class='fas fa-edit'></i></a></p></td>";
        echo "<td><p data-placement='top'><button class='btn btn-danger btn-sm' type='submit' name='delete' data-title='Delete' data-toggle='modal' data-target='#delete' ><i class='fas fa-trash-alt'></i></button></p></td>";
        echo "</tr>";
        echo "</form>"; //added
    }
?>
</body>
</table>
<?php
}
else
{
    echo "<br><br>No Record Found";
}
?>
</div>


</body>
</html>