<?php
require "connect.php";
$db = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['main'])){
    header("Location: go_to.php");
    exit;
  }else{
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $wilaya = mysqli_real_escape_string($db, $_POST['wilaya']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $matricule = mysqli_real_escape_string($db, $_POST['matricule']);
    $new_matricule = mysqli_real_escape_string($db, $_POST['new_matricule']);
    $query = "SELECT COUNT(*) as count FROM taxi WHERE matricule = '$matricule'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row['count'] == 0) {
      echo "<script> alert('Invalid matricule') </script>";
    } else {
      $query = "UPDATE taxi SET matricule = '$new_matricule', chauffeur_name = '$name', wilaya = '$wilaya', vehicle_age = '$age' WHERE matricule = '$matricule'";
      $result = mysqli_query($db, $query);
      if ($result) {
        echo "<script> alert('Data updated successfully') </script>";
      } else {
        echo "Error updating data: " . mysqli_error($db);
      }
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
            <label id="number-label" for="matricule">Nouveau matricule</label>
            <input type="number" name="new_matricule" id="matricule" class="form-control" placeholder="entrez votre matricule" required/>
        </div>
        <div class="form-group">
          <label id="name-label" for="name">New Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="entrez votre nom" required />
        </div>
        <div class="form-group">
          <label id="wilaya-label" for="wilaya">New Wilaya</label>
          <input type="text" name="wilaya" id="wilaya" class="form-control" placeholder="entrez votre wilaya" required />
        </div>
        <div class="form-group">
          <label id="number-label" for="age">New Age</label>
          <input type="number" name="age" id="age" class="form-control" placeholder="entrez votre age" required/>
        </div>
        <div class="form-group">
          <button type="submit" id="submit" class="submit-button">Modifier</button>  
        </div>        
        <div class="form-group">
          <button type="submit" name="main" class="submit-button" formnovalidate>Back to the main page</button>  
        </div>        
      </form>      
    </div>
  </body>
</html>
