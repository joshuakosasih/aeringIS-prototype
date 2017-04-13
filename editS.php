<?php

require_once 'auth.php';
require_once 'session.php';
require_once 'db.php';
require_once 'utils.php';

check_login($db);  

	//add ke db
	$tipe = $_GET["tipe"];
	
	if ($tipe==2) {
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
					$_GET["id"]
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardS.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==3) {
		$query = <<<SQL
			update communications set date=?, id_emp=?, attn=?, via=?, id_project=? where id_comm=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sissii',
					
					$_GET['tanggal'],
					$_GET['idemp'],
					$_GET['attn'],
					$_GET['via'],
					$_GET['idproj'],
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
