<?php
include("functions.php");

if(isset($_POST["allWith"])) {
  $catalog = list_all(1);
}

if(isset($_POST["allWithout"])) {
  $catalog = list_all(0);
}

if(isset($_POST["nameSearch"])) {
  $catalog = search_by();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Louisville Restaurants With Changing Tables</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./CSS/override.css">
  </head>
  
  <body>
    <div class="wrapper">
    <div class="header">
      <h1>Louisville Restaurants With Changing Tables</h1>
    </div>
    </div>
    <div class="content">
      <div class="container">
        <form method="POST">
          <button type="submit" class="btn btn-success" name="allWith">Restaurants WITH Changing Tables</button>  
          <button type="submit" class="btn btn-danger" name="allWithout">Restaurants WITHOUT Changing Tables</button>
        </form>
      </div>
      <div class="container">
        <h2>Search!</h2>
          <p>Search by Restaurant Name</p>
          <form method="POST" class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" name="nameSearch" class="form-control" placeholder="Restaurant Name">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
      </div>
    </div>
    <div class="container results">
      
      <h2>Results:</h2>
      
      <ul>
        <?php 
          if(isset($catalog)) {
            foreach ($catalog as $item) { ?>
            <li><?php echo $item["name"]."<br />". $item["address"]; ?></li>
            <?php } 
          } ?>
      
      </ul>
    </div>
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>