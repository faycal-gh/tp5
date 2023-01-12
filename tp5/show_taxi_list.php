<html>
  <head>
    <title>Taxi Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="tableStyle.css">
    <link rel="stylesheet" href="searchStyle.css">
    <style>
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
    <form id="survey-form"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
       <div>
        <input type="number" id="myInput" name="taxiID" placeholder="Taxi Matricule ...">
        <i class="fa fa-search" name="search" value="search"></i>
       </div>       
        <table id="myTable">
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Longeur estimative(en Km)</th>
                <th>Coast(in DZD)</th>
                <th>Date</th>
                <th>Heure départe</th>
                <th>Heure arrivee</th>
            </tr>
        </thead>
            <?php
                require "connect.php";
                $db = connect();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {    
                    $t = mysqli_real_escape_string($db, $_POST['taxiID']);
                    $sql = "SELECT * FROM course WHERE taxi_matricule = '$t'";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {                  
                            echo "<tr>";
                            echo "<td>" . $row["client_id_number"] . "</td>";
                            echo "<td>" . $row["longeur_estimative"] . "</td>";
                            echo "<td>" . $row["coast"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["heure_departe"] . "</td>";                    
                            echo "<td>" . $row["heure_departe"] . "</td>";                    
                            echo "</tr>";
                        }
                }else {
                    echo "<tr style='text-align:center'><td colspan='6'>No Taxi found :'(</td></tr>";
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
</script>    
