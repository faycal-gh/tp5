<?php
require "connect.php";
$db = connect();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT password FROM login WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      if ($password == $row['password']) {
          echo "<script>alert('Login successful. Welcome, $username!')</script>";
          echo "<script>window.location.replace('http://localhost/tp5/go_to.php');</script>";          
      } else {
          echo "Login failed. Incorrect username or password.";
      }
    } else {
        echo "Login failed. Incorrect username or password.";
    }
  

    mysqli_close($db);
}
if (isset($_POST['create'])) {
  header('Location: register.php');
}
if (isset($_POST['edit_pass'])) {
  header('Location: edit_password.php');
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
            background-image: linear-gradient(115deg,
                    rgba(58, 58, 158, 0.8),
                    rgba(6, 164, 69, 0.7)),
                url(https://img.freepik.com/free-photo/account-verification-with-password-3d-padlock_107791-16181.jpg?w=900&t=st=1672259989~exp=1672260589~hmac=9344f95a470f78082c42d4c47219c7cfedce97a41d6c31ea2728c73e9b2e6f5c);
        }

        form {
            background: var(--color-darkgreen);
            padding: 2.5rem 0.625rem;
            border-radius: 0.25rem;
        }
        .submit-button{
            background: rgb(18, 111, 18);
        }
    </style>
</head>
<body>
    <div class="container"> 
      <header class="header">
        <h1 id="title" class="text-center">LOGIN PAGE</h1>
      </header>
      <form id="survey-form"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label id="name-label" for="name">Nom d'utilisateur</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Saisissez votre nom d'utilisateur" required />
        </div>
        <div class="form-group">
          <label id="password-label" for="wilaya">Mot de passe</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Entrer le mot de passe" required />
        </div>
        <div class="form-group">
          <button name="submit" type="submit" id="submit" class="submit-button">Soumettre</button>  
        </div>
        <div class="form-group">
          <button name="create" class="submit-button" style="background-color: #286a5f; display:flex; place-content: center" formnovalidate>Créer un nouveau compte</button>  
        </div>
        <div class="form-group">
          <button name="edit_pass" class="submit-button" style="background-color: #286a5f; display:flex; place-content: center" formnovalidate>Edit password</button>  
        </div>
        <span style="display: flex;place-content: center; color: #b01515; font-weight:bold" id="message"></span>
      </form>      
    </div>
  </body>
</html>
