<?php
require "connect.php";
$db = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['main'])) {
    header('Location: go_to.php');
    exit;
  }elseif(isset($_POST['edit'])){
    header('Location: edit_course.php');
    exit;
  }else{
    $distance = $_POST['distance'];
    $price = $_POST['price'];
    $wilaya = $_POST['wilaya'];
    $date = $_POST['date'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $client_id = $_POST['client_id'];
    $car_id = $_POST['car_id'];

    $query = "INSERT INTO course (longeur_estimative, coast, wilaya, date, heure_departe, heure_arrivee, client_id_number, taxi_matricule) VALUES ('$distance', '$price', '$wilaya', '$date', '$departure_time', '$arrival_time', '$client_id', '$car_id')";
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
          <label id="name-label" for="name">Numéro du client</label>
          <input type="number" name="client_id" id="name" class="form-control" placeholder="Enter client ID" required />
        </div>     
        <div class="form-group">
          <label id="name-label" for="name">Matricule de vecule</label>
          <input type="number" name="car_id" id="name" class="form-control" placeholder="Enter car number" required />
        </div>     
        <div class="form-group">
          <label>Longueur estimative du trajet (en Km)</label>
          <input type="number" name="distance" class="form-control" placeholder="Enter the distnace" required />
        </div>
        <div class="form-group">
          <label id="name-label" for="name">Le coût (en DA)</label>
          <input type="number" name="price" id="name" class="form-control" placeholder="Enter the price" required />
        </div>        
        <div class="form-group">
          <label id="name-label" for="name">La wilaya</label>
          <input type="text" name="wilaya" id="wilaya" class="form-control" placeholder="Enter the wilaya" required />
        </div>        
        <div class="form-group">
          <label>La date</label>
          <input type="date" name="date" class="form-control" required/>
        </div>
        <div class="form-group">
          <label>L'heure de départ</label>
          <input type="time" name="departure_time" class="form-control" required/>
        </div>
        <div class="form-group">
          <label>L'heure d'arrivée</label>
          <input type="time" name="arrival_time" class="form-control" required/>
        </div>        
        <div class="form-group">
          <button type="submit" id="submit" class="submit-button">Soumettre</button>  
        </div>
        <div class="form-group">
          <button name="edit" class="submit-button" formnovalidate>Edit course</button>  
        </div>
        <div class="form-group">
          <button type="submit" name="main" class="submit-button" formnovalidate>Back to the main page</button>  
        </div>
      </form>      
    </div>
  </body>
</html>
