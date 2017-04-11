<?php
require_once 'auth.php';
require_once 'session.php';
require_once 'db.php';
require_once 'utils.php';

check_login($db);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Quality Dashboard</title>    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<style type="text/css">
  table, th, td {
    border: 1px solid black;
  }
  th, td {
    padding: 15px;
  }
</style>

<body>

<div name="topbanner" style="background-color: #76D7C4;height: 140px;padding: 5px;padding-left: 100px;padding-right: 100px;border-bottom-width: 3px;border-bottom-style: solid;border-color: black">
  <h2 style="float: left;">Aering</h2>
  <a href="index.html" style="float: right;margin-top: 30px;"><button>Logout</button></a>
  <h1 style="clear: both;">Quality Dashboard</h1>
</div>

<div name="content" style="padding: 100px">
<a href="add.php?acl=Q&type=0" style="float: right;margin-bottom: 20px"><button>Add new document</button></a>
<br style="clear: both" />
<table>
  <tr style="background-color: lightgray">
    <th style="width: 200px">Document Type</th>
    <th style="width: 250px">Document Number</th>
    <th style="width: 300px">Document Name</th>
    <th style="width: 200px">Date Modified</th>
    <th style="width: 220px">Action</th>
  </tr>
  
  <?php
	$query = <<<SQL
		select id_project, docname, last_updated from projects
SQL;
	
	$stmt = $db->prepare($query);
	
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($id, $name, $last);
	while ($stmt->fetch()){
		echo "<tr>";
		echo "<td>Project</td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=4&acl=Q\">Edit</a><br><a href=\"delete.php?id=".$id."&type=4&acl=Q\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
  <?php
	$query = <<<SQL
		select id_payment, docname, last_updated from payments
SQL;
	
	$stmt = $db->prepare($query);
	
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($id, $name, $last);
	while ($stmt->fetch()){
		echo "<tr>";
		echo "<td>Payment</td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=6&acl=Q\">Edit</a><br><a href=\"delete.php?id=".$id."&type=6&acl=Q\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
  <?php
	$query = <<<SQL
		select id_quotation, docname, last_updated from quotations
SQL;
	
	$stmt = $db->prepare($query);
	
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($id, $name, $last);
	while ($stmt->fetch()){
		echo "<tr>";
		echo "<td>Quotation</td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=7&acl=Q\">Edit</a><br><a href=\"delete.php?id=".$id."&type=7&acl=Q\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
  <?php
	$query = <<<SQL
		select id_inv, docname, last_updated from invoices
SQL;
	
	$stmt = $db->prepare($query);
	
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($id, $name, $last);
	while ($stmt->fetch()){
		echo "<tr>";
		echo "<td>Invoice</td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=8&acl=Q\">Edit</a><br><a href=\"delete.php?id=".$id."&type=8&acl=Q\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
  <?php
	$query = <<<SQL
		select id_tax, docname, last_updated from tax_invoices
SQL;
	
	$stmt = $db->prepare($query);
	
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($id, $name, $last);
	while ($stmt->fetch()){
		echo "<tr>";
		echo "<td>Tax Invoice</td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=9&acl=Q\">Edit</a><br><a href=\"delete.php?id=".$id."&type=9&acl=Q\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
</table>
</div>
</body>
</html>
