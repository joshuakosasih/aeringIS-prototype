<?php

  require_once 'auth.php';
  require_once 'session.php';
  require_once 'db.php';
  require_once 'utils.php';

  check_login($db);
  
  $type = $_GET['type'];
  
  if ($type==4){
	  
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
				header("Location: dashboardQ.html");
			} else {
				echo $stmt->error;
			}
	}   elseif ($type==7){
	  
		$query = <<<SQL
			insert into quotations (docname, no_quot, publish, tat, deadline, delivery_date, id_project)
				values (?,?,?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ssiiiii',
					$_GET['docname'],
					$_GET['noquot'],
					$_GET['tanggal'],
					$_GET['tab'],
					$_GET['deadline'],
					$_GET['delivery'],
					$_GET['idproj']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardQ.html");
			} else {
				echo $stmt->error;
			}
	}  elseif ($type==8){
	  
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
				header("Location: dashboardQ.html");
			} else {
				echo $stmt->error;
			}
	}  elseif ($type==9){
	  
		$query = <<<SQL
			insert into tax_invoices (docname, no_tax_inv, publish_date, delivery_date, via, description, id_project)
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
				header("Location: dashboardQ.html");
			} else {
				echo $stmt->error;
			}
	}   elseif ($type==6){
	  
		$query = <<<SQL
			insert into payments (docname, duedate, id_project)
				values (?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('sii',
					$_GET['docname'],
					$_GET['tanggal'],
					$_GET['idproj']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardQ.html");
			} else {
				echo $stmt->error;
			}
	}
  
				
?>