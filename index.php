
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>PrintShastra</title>
</head>
<body>
<div class="container mt-3">
    <h1>Please enter the amount</h1>
    <form action="/PrintShastra/index.php" method="post">
    <div class="form-group">
        <label for="Amount">Amount</label>
        <input type="Amount" name="Amount" class="form-control" id="Amount" aria-describedby="emailHelp">       
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
<?php
    // Connecting to the Database
    $servername = "localhost";
    $username = "id18132410_user";
    $password = "(8PPJ}u+K@}J{u|A";
    $database = "id18132410_printshastra";
    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

     if ($_SERVER['REQUEST_METHOD'] == 'POST'){     
      $amount = $_POST['Amount']; 
      if($amount<=999){
        $sgst= $amount* 0.0025;
        $cgst= $amount* 0.0025;
      }
      else{
        $sgst= $amount* 0.06;
        $cgst= $amount* 0.06;
      }       
      $total= $cgst+ $sgst+ $amount;
         
      $sql="INSERT INTO `users` (`Amount`, `SGST`, `CGST`, `Total`) VALUES ('$amount', '$sgst', '$cgst','$total')";
                        
      $result=mysqli_query($conn,$sql);
      if($result){
        echo "Amount " .$amount. "<br>";
        echo "SGST " .$sgst. "<br>";
        echo "CGST " .$cgst. "<br>";
        echo "Total " .$total. "<br>";
      }
    
    }   
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>