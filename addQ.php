<?php

  require_once 'auth.php';
  require_once 'session.php';
  require_once 'db.php';
  require_once 'utils.php';

  check_login($db);
  
  $type = $_GET['type'];
  
  if ($type==4){
	  
		$query = <<<SQL
			insert into projects (created_date, name, description, id_customer)
				values (?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('issi',
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
			insert into quotations (no_quot, publish, tat, deadline, delivery_date, id_project)
				values (?,?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('siiiii',
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
			insert into invoices (no_inv, publish_date, delivery_date, via, description, id_project)
				values (?,?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('siissi',
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
			insert into tax_invoices (no_tax_inv, publish_date, delivery_date, via, description, id_project)
				values (?,?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('siissi',
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
			insert into payments (due_date, id_project)
				values (?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ii',
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