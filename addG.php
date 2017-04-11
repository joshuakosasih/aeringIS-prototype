<?php

  require_once 'auth.php';
  require_once 'session.php';
  require_once 'db.php';
  require_once 'utils.php';

  check_login($db);
  
  $type = $_GET['type'];
  
  if ($type==1){
	//if (validate_post('nama', 'divisi')) {
		$query = <<<SQL
			insert into employees (docname, name, division, username, password)
				values (?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			error_reporting(E_ALL);
			ini_set('display_errors',1);
	
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sssss',
				$_GET['docname'],
				$_GET['nama'],
				$_GET['divisi'],
				$_GET['username'],
				$_GET['password']
				);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardG.html");
			} else {
				echo $stmt->error;
			}
	//}
  } elseif ($type==2){
	  
		$query = <<<SQL
			insert into customers (docname, name, phone)
				values (?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sss',
					$_GET['docname'],
					$_GET['nama'],
					$_GET['phone']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardG.html");
			} else {
				echo $stmt->error;
			}
	} elseif ($type==4){
	  
		$query = <<<SQL
			insert into projects (docname, created_date, name, description, id_customer)
				values (?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sissi',
					$_GET['docname'],
					$_GET['tanggal'],
					$_GET['nama'],
					$_GET['deskripsi'],
					$_GET['idcust']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardG.html");
			} else {
				echo $stmt->error;
			}
	} elseif ($type==8){
	  
		$query = <<<SQL
			insert into invoices (docname, no_inv, publish_date, delivery_date, via, description, id_project)
				values (?,?,?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ssiissi',
					$_GET['docname'],
					$_GET['noinvo'],
					$_GET['tanggal'],
					$_GET['delivery'],
					$_GET['via'],
					$_GET['deskripsi'],
					$_GET['idproj']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardG.html");
			} else {
				echo $stmt->error;
			}
	}
  
				
?>