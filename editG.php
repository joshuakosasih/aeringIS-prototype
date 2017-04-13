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
				header("Location: dashboardG.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==1) {
		$query = <<<SQL
			update employees set name=?, division=?, username=?, password=? where id_emp=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ssssi',
					
					$_GET['nama'],
					$_GET['divisi'],
					$_GET['username'],
					$_GET['password'],
					$_GET['id']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardG.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==8) {
		$query = <<<SQL
			update invoices set no_inv=?, publish_date=?, delivery_date=?, via=?, description=?, id_project=? where id_inv=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sssssii',
					
					$_GET['noinvo'],
					$_GET['tanggal'],
					$_GET['delivery'],
					$_GET['via'],
					$_GET['deskripsi'],
					$_GET['idproj'],
					$_GET['id']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardG.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==4) {
		$query = <<<SQL
			update projects set created_date=?, name=?, description=?, id_customer=? where id_project=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sssii',
					
					$_GET['tanggal'],
					$_GET['nama'],
					$_GET['deskripsi'],
					$_GET['idcust'],
					$_GET['id']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardG.php");
			} else {
				echo $stmt->error;
			}
	}
	
	
    
	
?>
