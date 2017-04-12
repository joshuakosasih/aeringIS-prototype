<?php

  require_once 'auth.php';
  require_once 'session.php';
  require_once 'db.php';
  require_once 'utils.php';

  check_login($db);
 
if (isset($_GET["id"])) { 
  $type = $_GET['type'];
  
  if ($type==3){
	  
		$query = <<<SQL
			insert into communications (docname, date, id_emp, attn, via, id_project)
				values (?,?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('siissi',
					$_GET['docname'],
					$_GET['tanggal'],
					$_GET['idemp'],
					$_GET['attn'],
					$_GET['via'],
					$_GET['idproj']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardS.php");
			} else {
				echo $stmt->error;
			}
	} elseif ($type==2){
	  
		$query = <<<SQL
			insert into customers (docname, name, phone, address, company)
				values (?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sssss',
					$_GET['docname'],
					$_GET['nama'],
					$_GET['phone'],
					$_GET['address'],
					$_GET['company']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardS.php");
			} else {
				echo $stmt->error;
			}
	}
} else{
	
	$query = <<<SQL
			update customers set name=?, phone=?, address=?, company=? where id_cust=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ssssi',
					
					$_GET['nama'],
					$_GET['phone'],
					$_GET['address'],
					$_GET['company'],
					$_GET['id']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardS.php");
			} else {
				echo $stmt->error;
			}
}
  
				
?>