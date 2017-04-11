<?php

  require_once 'auth.php';
  require_once 'session.php';
  require_once 'db.php';
  require_once 'utils.php';

  check_login($db);
  
  $type = $_GET['type'];
  
  if ($type==3){
	  
		$query = <<<SQL
			insert into communication (date, id_emp, attn, via, id_project)
				values (?,?,?,?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('iissi',
					$_GET['tanggal'],
					$_GET['idemp'],
					$_GET['attn'],
					$_GET['via'],
					$_GET['idproj']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardS.html");
			} else {
				echo $stmt->error;
			}
	} elseif ($type==2){
	  
		$query = <<<SQL
			insert into customers (name, phone)
				values (?,?);
SQL;
		$stmt = $db->prepare($query);
			if ($stmt === FALSE) echo $db->error;
				$stmt->bind_param('ss',
					$_GET['nama'],
					$_GET['phone']
					);
			if($stmt->execute()) {
				$userid = $_SESSION['id_emp'];
				header("Location: dashboardS.html");
			} else {
				echo $stmt->error;
			}
	}
  
				
?>