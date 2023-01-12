<?php
require "connect.php";
$db = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['main'])) {
    header('Location: go_to.php');
    exit;
  }else{
    $client_id = mysqli_real_escape_string($db, $_POST['client_id']);
    $new_car_id =  mysqli_real_escape_string($db, $_POST['car_id']);
    $new_distance =  mysqli_real_escape_string($db, $_POST['distance']);
    $new_price = mysqli_real_escape_string($db, $_POST['price']);
    $new_wilaya = mysqli_real_escape_string($db, $_POST['wilaya']);
    $new_date = mysqli_real_escape_string($db, $_POST['date']);
    $new_departure_time = mysqli_real_escape_string($db, $_POST['departure_time']);
    $new_arrival_time = mysqli_real_escape_string($db, $_POST['arrival_time']);
    $query = "SELECT COUNT(*) as count FROM course WHERE client_id_number = '$client_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row['count'] == 0) {
      echo "<script> alert('Invalid client ID') </script>";
    } else {
      $query = "UPDATE course SET longeur_estimative = '$new_distance', coast = '$new_price', wilaya='$new_wilaya', date = '$new_date', heure_departe = '$new_departure_time', heure_arrivee = '$new_arrival_time', taxi_matricule = '$new_car_id' WHERE client_id_number = '$client_id'";
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
    <style>
        body::before {
            background-image: linear-gradient(
                115deg,
                rgb(15 15 42 / 80%),
                rgb(60 69 111 / 70%)
                ),
                url(https://img.freepik.com/free-photo/elegant-uber-driver-giving-taxi-ride_23-2149241789.jpg?t=st=1672606602~exp=1672607202~hmac=ccc0bf5fd15318aeec150c201c084c8cc99da85109662db2c40c3d455af761f0);
        }              
        form {
            background:  rgb(111 28 28 / 80%);
        }
        .submit-button{
            background: rgb(158 58 58);
        }
    </style>
</head>
<body>
    <div class="container"> 
      <header class="header">
        <h1 id="title" class="text-center">COURSE PAGE</h1>
      </header>
      <form id="survey-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label id="name-label" for="name">The new Numéro du client</label>
          <input type="number" name="client_id" id="name" class="form-control" placeholder="Enter client ID" required />
        </div>     
        <div class="form-group">
          <label id="name-label" for="name">The new Matricule de vecule</label>
          <input type="number" name="car_id" id="name" class="form-control" placeholder="Enter car number" required />
        </div>     
        <div class="form-group">
          <label>The new Longueur estimative du trajet (en Km)</label>
          <input type="number" name="distance" class="form-control" placeholder="Enter the distnace" required />
        </div>
        <div class="form-group">
          <label id="name-label" for="name">The new coût (en DA)</label>
          <input type="number" name="price" id="name" class="form-control" placeholder="Enter the price" required />
        </div>        
        <div class="form-group">
          <label id="name-label" for="name">The new wilaya</label>
          <input type="text" name="wilaya" id="wilaya" class="form-control" placeholder="Enter the wilaya" required />
        </div>        
        <div class="form-group">
          <label>The new date</label>
          <input type="date" name="date" class="form-control" required/>
        </div>
        <div class="form-group">
          <label>The new  L'heure de départ</label>
          <input type="time" name="departure_time" class="form-control" required/>
        </div>
        <div class="form-group">
          <label>The new L'heure d'arrivée</label>
          <input type="time" name="arrival_time" class="form-control" required/>
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
