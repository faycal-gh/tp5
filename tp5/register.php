<?php
// Connect to the database
require "connect.php";
$db = connect();

// Check if the form was submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
  $result = mysqli_query($db, $query);
  if (!$result) {
    echo "Error inserting data: " . mysqli_error($db);
  }else{
    echo "<script> alert('You have been successfully registered') </script>";
    echo "<script>window.location.replace('http://localhost/tp5/login.php');</script>";
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
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: -1;
            background: var(--color-darkgreen);
            background-image: linear-gradient(115deg,
                    rgba(58, 58, 158, 0.8),
                    rgba(6, 164, 69, 0.7)),
                url(https://img.freepik.com/free-photo/smiling-family-paying-with-credit-card_171337-2415.jpg?w=1060&t=st=1672266738~exp=1672267338~hmac=da587ebe2d3155e11b4bdb2f02b04ed57fc5ecaba3d4edcb4abe80a0829b2127);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        form {
            background: #5d889f;
            padding: 2.5rem 0.625rem;
            border-radius: 0.25rem;
        }
        .submit-button{
            background: rgb(31 63 114);
        }  
    </style>
</head>
<body>
    <div class="container"> 
      <header class="header">
        <h1 id="title" class="text-center">REGESTRATION PAGE</h1>
      </header>
      <form id="survey-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label id="name-label" for="name">Nom d'utilisateur</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Saisissez votre nom d'utilisateur" required />
        </div>
        <div class="form-group">
          <label id="password-label" for="wilaya">Mot de passe</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Entrer le mot de passe" required />
        </div>       
        <div class="form-group">
          <button type="submit" id="submit" class="submit-button">Créer un compte</button>  
        </div>
      </form>      
    </div>
  </body>
</html>