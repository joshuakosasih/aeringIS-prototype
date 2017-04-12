<?php
	require_once 'auth.php';
	require_once 'session.php';
	require_once 'db.php';
	require_once 'utils.php';

	check_login($db);

	$tipe = $_GET["type"];
	$id = $_GET["id"];


	$query = <<<SQL
		select name, phone, company, address, docname, last_updated from customers where id_cust=$id
SQL;

	$stmt = $db->prepare($query);
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($name, $phone, $company, $address, $docname, $last_updated);
	$stmt->fetch();


?>

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
	
?>

<div name="content" style="padding-left: 140px;padding-right: 140px;padding-top: 40px">
  <h2 name="docname">
  <?php
  echo "Customer "; echo $docname;
  ?>
  </h2>
  <div style="margin-left: 20px">
    <?php 
      // PRINT DATA DARI DB
      echo "<table>";
		
		echo "<tr>";
		    echo "<td>Nama</td>";
			echo "<td>:".$name."</td>";
		echo "</tr>";
		echo "<tr>";
		    echo "<td>No Telepon</td>";
			echo "<td>:".$phone."</td>";
		echo "</tr>";
		echo "<tr>";
		    echo "<td>Perusahaan</td>";
			echo "<td>:".$company."</td>";
		echo "</tr>";
		echo "<tr>";
		    echo "<td>Alamat</td>";
			echo "<td>:".$address."</td>";
		echo "</tr>";
		
	  echo "</table>";
		
    ?>
  </div>
</div>

</body>
</html>
