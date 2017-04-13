<?php

require_once 'auth.php';
require_once 'session.php';
require_once 'db.php';
require_once 'utils.php';

check_login($db);  

	//add ke db
	$tipe = $_GET["tipe"];
	
	if ($tipe==4) {
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
				header("Location: dashboardP.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==5) {
		$query = <<<SQL
			update jobs set name=?, id_project=? where id_job=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sii',
					
					$_GET['nama'],
					$_GET['idproj'],
					$_GET['id']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardP.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==7) {
		$query = <<<SQL
			update quotations set no_quot=?, publish=?, tat=?, deadline=?, delivery_date=?, id_project=? where id_quotation=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ssissii',
					
					$_GET['noquot'],
					$_GET['tanggal'],
					$_GET['tab'],
					$_GET['deadline'],
					$_GET['delivery'],
					$_GET['idproj'],
					$_GET['id']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardP.php");
			} else {
				echo $stmt->error;
			}
	}
	
    
	
?>
