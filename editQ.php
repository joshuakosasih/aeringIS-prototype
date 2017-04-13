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
				header("Location: dashboardQ.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==6) {
		$query = <<<SQL
			update payments set duedate=?, id_project=? where id_payment=?;
SQL;
		$stmt = $db->prepare($query);
		error_reporting(E_ALL);
	ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sii',
					
					$_GET['tanggal'],
					$_GET['idproj'],
					$_GET['id']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardQ.php");
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
				header("Location: dashboardQ.php");
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
				header("Location: dashboardQ.php");
			} else {
				echo $stmt->error;
			}
	}
	else if ($tipe==9) {
		$query = <<<SQL
			update tax_invoices set no_tax_inv=?, publish_date=?, delivery_date=?, via=?, description=?, id_project=? where id_tax=?;
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
				header("Location: dashboardQ.php");
			} else {
				echo $stmt->error;
			}
	}
	
	
    
	
?>

