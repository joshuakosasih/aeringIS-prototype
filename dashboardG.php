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
    <title>General Affair Dashboard</title>    
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
  <h1 style="clear: both;">General Affair Dashboard</h1>
</div>

<div name="content" style="padding: 100px">
<a href="add.php?acl=G&type=0" style="float: right;margin-bottom: 20px"><button>Add new document</button></a>
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
		echo "<td><a href=\"read.php?id=".$id."&type=4&acl=G\">Project</a></td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=4&acl=G\">Edit</a><br><a href=\"delete.php?id=".$id."&type=4&acl=G\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
  <?php
	$query = <<<SQL
		select id_cust, docname, last_updated from customers
SQL;
	
	$stmt = $db->prepare($query);
	
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($id, $name, $last);
	while ($stmt->fetch()){
		echo "<tr>";
		echo "<td><a href=\"read.php?id=".$id."&type=2&acl=G\">Customer</a></td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=2&acl=G\">Edit</a><br><a href=\"delete.php?id=".$id."&type=2&acl=G\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
  <?php
	$query = <<<SQL
		select id_emp, docname, last_updated from employees
SQL;
	
	$stmt = $db->prepare($query);
	
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($id, $name, $last);
	while ($stmt->fetch()){
		echo "<tr>";
		echo "<td><a href=\"read.php?id=".$id."&type=1&acl=G\">Employee</a></td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=1&acl=G\">Edit</a><br><a href=\"delete.php?id=".$id."&type=1&acl=G\">Delete</a></td>";
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
		echo "<td><a href=\"read.php?id=".$id."&type=8&acl=G\">Invoice</td>";
		echo "<td>".$id."</td>";
		echo "<td>".$name."</td>";
		echo "<td>".$last."</td>";
		echo "<td><a href=\"edit.php?id=".$id."&type=8&acl=G\">Edit</a><br><a href=\"delete.php?id=".$id."&type=8&acl=G\">Delete</a></td>";
		echo "</tr>";
		
	}

  ?>
  
</table>
</div>
</body>
</html>
