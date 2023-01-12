<?php
require "connect.php";
$db = connect();
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $new_pass = mysqli_real_escape_string($db, $_POST['password']);
    $query = "SELECT COUNT(*) as count FROM login WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row['count'] == 0) {
        echo "<script> alert('Invalid username') </script>";
    }
    else {
        $query = "UPDATE login SET password = '$new_pass' WHERE username = '$username'";
        $result = mysqli_query($db, $query);
        if ($result) {
            echo "<script> alert('Password updated successfully') </script>";
        } else {
            echo "Error updating data: " . mysqli_error($db);
        }
    }      
    mysqli_close($db);
}

if (isset($_POST['create'])) {
  echo 'hello';
  header('Location: login.php');
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
                url(https://img.freepik.com/premium-vector/password-security-access-push-notice-laptop-computer_212005-90.jpg);
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
        <h1 id="title" class="text-center">UPDATE PASSWORD</h1>
      </header>
      <form id="survey-form"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label id="name-label" for="name">Username</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Saisissez votre nom d'utilisateur" required />
        </div>
        <div class="form-group">
          <label id="password-label" for="wilaya">New password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Enter the new password" required />
        </div>
        <div class="form-group">
          <button name="submit" type="submit" id="submit" class="submit-button">Update</button>  
        </div>
        <div class="form-group">
          <button name="create" class="submit-button" style="background-color: #286a5f; display:flex; place-content: center" formnovalidate>Back to login page</button>  
        </div>
        <span style="display: flex;place-content: center; color: #b01515; font-weight:bold" id="message"></span>
      </form>      
    </div>
  </body>
</html>
