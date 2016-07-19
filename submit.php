<?php
include("functions.php");



if(isset($_POST["addTo"])) {
	$name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
	$address = filter_input(INPUT_POST,"address",FILTER_SANITIZE_STRING);
	$changing_table = (isset($_POST['selectVal'])) ? (int)$_POST['selectVal'] : 0;
	include("connection.php");
  	$catalog = add_new($db, $name, $address, $changing_table);
}

include("header.php");

?>
<div class="container">
<form method="POST">
  <div class="form-group">
    <label for="name">Restaurant Name:</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="name">Address:</label>
    <input type="text" name="address" class="form-control">
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="selectVal" value="1">Click if restaurant has a changing table.</label>
  </div>
  <button type="submit" class="btn btn-default" name="addTo">Submit</button>
</form>
</div>