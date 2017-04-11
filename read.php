<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>View Document</title>    
    <link href="css/bootstrap.min.css" rel="stylesheet">    
</head>

<body>

<div name="topbanner" style="background-color: #76D7C4;height: 140px;padding: 5px;padding-left: 100px;padding-right: 100px;border-bottom-width: 3px;border-bottom-style: solid;border-color: black">
  <h2 style="float: left;">Aering</h2>
  <a href="index.html" style="float: right;margin-top: 30px;"><button>Logout</button></a>
  <h1 style="clear: both;">Read Document</h1>
</div>

<?php	
	$tipe = $_GET["type"];
  $id = $_GET["id"];
?>

<div name="content" style="padding-left: 140px;padding-right: 140px;padding-top: 40px">
  <h2 name="docname">
  <?php
  echo "Tes"
  ?>
  </h2>
  <div style="margin-left: 20px">
    <?php 
      // PRINT DATA DARI DB
      echo "<h4>haha</h4>" 
    ?>
  </div>
</div>

</body>
</html>
