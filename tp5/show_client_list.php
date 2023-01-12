<html>
  <head>
    <title>Taxi Data</title>
    <link rel="stylesheet" href="tableStyle.css">
    <style>
        .container{
            padding: 30px;
            position: absolute;
            width: 100%;
            display:flex;
            justify-content: space-between;
        }
        input, button[type='submit']{
            padding: 10px;
            width: 300px;
            font-weight: bold;
            font-size:20px;
            font-family: 'arial';            
            border-radius: 10px;
            position: relative;  
            cursor: pointer;       
            border: none; 
        }
        button[name="main"]{
            background-color: #286a5f;
            display: flex;
            place-content: center;
            color: white;
            padding: 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 15px;
            position: absolute;
            left: 45%;
            top: 90%;
            cursor: pointer;
        }
    </style>
  </head>
  <body>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <form id="survey-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
       <div class="container">
        <input type="date" id="myInput" name="date">   
        <input type="text" name="wilaya" placeholder="Wilaya">
        <button type="submit" name="search-btn"> Search </button>     
       </div>
       <table id="myTable">
            <tr>
                <th>Numero de la carte d'identité </th>
                <th>Nom</th>
                <th>Phone Number</th>                
            </tr>
            <?php
              require "connect.php";
              $db = connect();
              if ($_SERVER["REQUEST_METHOD"] == "POST") {    
                if (isset($_POST['search-btn'])) {
                  $date = mysqli_real_escape_string($db, $_POST['date']);
                  $wilaya = mysqli_real_escape_string($db, $_POST['wilaya']);
                  $query = "SELECT client.* FROM client JOIN course ON client.id_number = course.client_id_number WHERE course.date = '$date' AND course.wilaya = '$wilaya'";
                  $result = $db->query($query);
                  if ($result->num_rows > 0) {                    
                      while($row = $result->fetch_assoc()) {                  
                          echo "<tr>";
                          echo "<td>" . $row["id_number"] . "</td>";
                          echo "<td>" . $row["name"] . "</td>";
                          echo "<td>" . $row["phone_number"] . "</td>";
                          echo "</tr>";
                      }                      
                  } else {
                    echo "<tr><td colspan='3'>No clients found for selected date and wilaya :'(</td></tr>";
                  }    
              } 
            }
            ?>
        </table>
    </form>
    <div>
        <button name="main" class="submit-button" onclick="window.location.href = 'go_to.php';" formnovalidate>Back to the main page</button>  
    </div>      
  </body>
</html>
<script>
  function submitForm() {
    document.getElementById("survey-form").submit();
  }
</script>
