<?php
require "connect.php";
$db = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['main'])) {
    header('Location: go_to.php');
  }elseif(isset($_POST['edit'])) {
    header('Location: edit_taxi.php');
  }elseif(isset($_POST['show_list'])) {
    header('Location: show_taxi_list.php');
  } else {
    $name = $_POST['name'];
    $wilaya = $_POST['wilaya'];
    $age = $_POST['age'];
    $matricule = $_POST['matricule'];
    $query = "INSERT INTO taxi (chauffeur_name, wilaya, vehicle_age, matricule) VALUES ('$name', '$wilaya', '$age', '$matricule')";
    $result = mysqli_query($db, $query);
    if ($result) {
      echo "<script> alert('Data inserted successfully') </script>";
    } else {
        echo "Error inserting data: " . mysqli_error($db);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <div class="container"> 
      <header class="header">
        <h1 id="title" class="text-center">TAXI PAGE</h1>
      </header>
      <form id="survey-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label id="number-label" for="matricule">Matricule</label>
            <input type="number" name="matricule" id="matricule" class="form-control" placeholder="entrez votre matricule" required/>
        </div>        
        <div class="form-group">
          <label id="name-label" for="name">Nom</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="entrez votre nom" required />
        </div>
        <div class="form-group">
          <label id="wilaya-label" for="wilaya">Wilaya</label>
          <input type="text" name="wilaya" id="wilaya" class="form-control" placeholder="entrez votre wilaya" required />
        </div>
        <div class="form-group">
          <label id="number-label" for="age">Age</label>
          <input type="number" name="age" id="age" class="form-control" placeholder="entrez votre age" required/>
        </div>
        
        <div class="form-group">
          <button type="submit" class="submit-button" style="background-color: #286a5f; display:flex; place-content: center">Soumettre</button>  
        </div>
        <div class="form-group">
          <button name="edit" class="submit-button" style="background-color: #286a5f; display:flex; place-content: center" formnovalidate>Edit taxi</button>  
        </div>
        <div class="form-group">
          <button name="show_list" class="submit-button" style="background-color: #286a5f; display:flex; place-content: center" formnovalidate>Show Taxi list</button>  
        </div>        
        <div class="form-group">
          <button name="main" class="submit-button" style="background-color: #286a5f; display:flex; place-content: center" formnovalidate>Back to the main page</button>  
        </div>
      </form>      
    </div>
  </body>
</html>
