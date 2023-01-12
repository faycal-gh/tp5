<?php
require "connect.php";
$db = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if(isset($_POST['main'])){
    header("Location: go_to.php");
    exit;
  }else{
    $client_id = mysqli_real_escape_string($db, $_POST['id']);
    $new_client_id = mysqli_real_escape_string($db, $_POST['new_id']);
    $new_name = mysqli_real_escape_string($db, $_POST['name']);
    $new_phone = mysqli_real_escape_string($db, $_POST['phone']);
    $query = "SELECT COUNT(*) as count FROM client WHERE id_number = '$client_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row['count'] == 0) {
        echo "<script> alert('Invalid client ID') </script>";
    } else {
        $query = "UPDATE client SET id_number = '$new_client_id', name = '$new_name', phone_number = '$new_phone' WHERE id_number = '$client_id'";
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
                url(https://img.freepik.com/free-photo/smiling-company-manager-welcoming-client-office_1163-5290.jpg?w=1060&t=st=1672502443~exp=1672503043~hmac=2342c86cf6679a5c0271ac152d0b9df49b70f61ba248724fc307dee1358fce79);
        }              
        form {
            background:  rgb(60 55 102 / 80%);
        }
        .submit-button{
            background: rgb(58 123 158);
        }
    </style>
</head>
<body>
    <div class="container"> 
      <header class="header">
        <h1 id="title" class="text-center">EDIT CLIENT INFORMATION</h1>
      </header>
      <form id="survey-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label>Numéro carte d'identité </label>
          <input type="number" name="id" class="form-control" placeholder="enter your card id number" required />
        </div>
        <div class="form-group">
          <label>New Numéro carte d'identité </label>
          <input type="number" name="new_id" class="form-control" placeholder="enter your card id number" required />
        </div>
        <div class="form-group">
          <label id="name-label" for="name">New Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="enter your name" required />
        </div>        
        <div class="form-group">
          <label>New Phone number</label>
          <input type="number" name="phone" id="phone" class="form-control" placeholder="enter your phone number" required/>
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
