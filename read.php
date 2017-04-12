<?php
	require_once 'auth.php';
	require_once 'session.php';
	require_once 'db.php';
	require_once 'utils.php';

	check_login($db);

	$tipe = $_GET["type"];
	$id = $_GET["id"];

	if ($tipe == 2) {
		$query = <<<SQL
		select name, phone, company, address, docname, last_updated from customers where id_cust=$id
SQL;

		$stmt = $db->prepare($query);
		if ($stmt === FALSE) echo $db->error;
		$stmt->execute();
		$stmt->bind_result($name, $phone, $company, $address, $docname, $last_updated);
		$stmt->fetch();
	}
	else if ($tipe == 3) {
		$query = <<<SQL
		select date, id_emp, attn, via, id_project, docname, last_updated from communications where id_comm=$id
SQL;

		$stmt = $db->prepare($query);
		if ($stmt === FALSE) echo $db->error;
		$stmt->execute();
		$stmt->bind_result($date, $id_emp, $attn, $via, $id_project, $docname, $last_updated);
		$stmt->fetch();
	}
	else if ($tipe==1) {
		$query = <<<SQL
		select name, division, username, password, docname, last_updated from employees where id_emp=$id
SQL;

		$stmt = $db->prepare($query);
		if ($stmt === FALSE) echo $db->error;
		$stmt->execute();
		$stmt->bind_result($name, $division, $username, $password, $docname, $last_updated);
		$stmt->fetch();
	}
	else if ($tipe==4) {
		$query = <<<SQL
		select created_date, name, description, id_customer, docname, last_updated from projects where id_project=$id
SQL;

		$stmt = $db->prepare($query);
		if ($stmt === FALSE) echo $db->error;
		$stmt->execute();
		$stmt->bind_result($created_date, $name, $description, $id_customer, $docname, $last_updated);
		$stmt->fetch();
	}
	else if ($tipe==8) {
		$query = <<<SQL
		select no_inv, publish_date, delivery_date, via, description, id_project, docname, last_updated from projects where id_project=$id
SQL;

		$stmt = $db->prepare($query);
		if ($stmt === FALSE) echo $db->error;
		$stmt->execute();
		$stmt->bind_result($no_inv, $publish_date, $delivery_date, $via, $description, $id_project, $docname, $last_updated);
		$stmt->fetch();
	}
	


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
  if ($tipe==2) {
	  echo "Customer "; echo $docname;
  }
  
  ?>
  </h2>
  <div style="margin-left: 20px">
    <?php 
      // PRINT DATA DARI DB
      if ($tipe==2) {
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
	  }
	  else if ($tipe==3) {
		  echo "<table>";
		
			echo "<tr>";
				echo "<td>Tanggal</td>";
				echo "<td>:".$date."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>ID Employee</td>";
				echo "<td>:".$id_emp."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Attn</td>";
				echo "<td>:".$attn."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Via</td>";
				echo "<td>:".$via."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>ID Project</td>";
				echo "<td>:".$id_project."</td>";
			echo "</tr>";
			
		  echo "</table>";
	  }
	  else if ($tipe==1) {
		  echo "<table>";
		
			echo "<tr>";
				echo "<td>Name</td>";
				echo "<td>:".$name."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Divisi</td>";
				echo "<td>:".$division."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Username</td>";
				echo "<td>:".$username."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Via</td>";
				echo "<td>:".$password."</td>";
			echo "</tr>";
			
		  echo "</table>";
	  }
	  else if ($tipe==4) {
		  echo "<table>";
		
			echo "<tr>";
				echo "<td>Tanggal mulai</td>";
				echo "<td>:".$created_date."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Nama</td>";
				echo "<td>:".$name."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Deskripsi</td>";
				echo "<td>:".$description."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>ID Customer</td>";
				echo "<td>:".$id_customer."</td>";
			echo "</tr>";
			
		  echo "</table>";
	  }
	  else if ($tipe==8) {
		echo "<table>";
		
			echo "<tr>";
				echo "<td>No invoice</td>";
				echo "<td>:".$no_inv."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Tanggal terbit</td>";
				echo "<td>:".$publish_date."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Tanggal pengiriman</td>";
				echo "<td>:".$delivery_date."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Via</td>";
				echo "<td>:".$via."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Deskripsi</td>";
				echo "<td>:".$description."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>ID Project</td>";
				echo "<td>:".$id_project."</td>";
			echo "</tr>";
			
		  echo "</table>";
	}
	  
      
		
    ?>
  </div>
</div>

</body>
</html>
