<?php

include("functions.php");

if(isset($_POST["allWith"])) {
  include("connection.php");
  $catalog = list_all($db, TRUE);
}

if(isset($_POST["allWithout"])) {
  include("connection.php");
  $catalog = list_all($db, FALSE);
}

if(isset($_POST["nameSearch"])) {
  include("connection.php");
  $catalog = search_by($db);
}

include("header.php");

?>

<div class="container content">
  <div class="container col-md-5">
    <form method="POST">
      <button type="submit" class="btn btn-success" name="allWith">&nbsp;&nbsp;Restaurants WITH Changing Tables&nbsp;&nbsp;</button>  
      <button type="submit" class="btn btn-danger" name="allWithout">Restaurants With NO Changing Tables</button>
    </form>
  </div>
  <div class="img-responsive">
    <img src="img/changingTable.jpeg" class="img-rounded col-md-7" alt="Responsive image">
  </div>
</div>

<div class="container">
  <h2>Search!</h2>
    <p>Search by Restaurant Name</p>
    <form method="POST" class="navbar-form" role="search">
        <div class="form-group">
          <input type="text" name="nameSearch" class="form-control" placeholder="Restaurant Name">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </form>
</div>

<div class="container results">
  <h2>Results:</h2>
  <ul style="list-style: none">
    <?php 
      if(isset($catalog)) {
        foreach ($catalog as $item) { ?>
          <?php if($item["changing_table"] == TRUE) { ?>
            <li>
              <span class="glyphicon glyphicon-ok"></span>
              <?php echo $item["name"]."<br />"
              . $item["address"]. 
              "<br /><br />"; 
          } ?>
            </li>
          <?php if($item["changing_table"] == FALSE) { ?>
            <li>
              <span class="glyphicon glyphicon-remove"></span>
              <?php echo $item["name"]."<br />"
              . $item["address"]. 
              "<br /><br />"; 
          } ?>
            </li>
        <?php }
      } ?>
  </ul>
</div>


    
<?php 
include("footer.php");
?>
