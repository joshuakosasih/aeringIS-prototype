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
				header("Location: dashboardP.php");
			} else {
				echo $stmt->error;
			}
	} elseif ($type==5){
	  
		$query = <<<SQL
			insert into jobs (docname, name, id_project)
				values (?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ssi',
					$_GET['docname'],
					$_GET['nama'],
					$_GET['idproj']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardP.php");
			} else {
				echo $stmt->error;
			}
	}  elseif ($type==7){
	  
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
				header("Location: dashboardP.php");
			} else {
				echo $stmt->error;
			}
	}
  
				
?>