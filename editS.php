<?php

require_once 'auth.php';
require_once 'session.php';
require_once 'db.php';
require_once 'utils.php';

check_login($db);  

	//add ke db
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
	
    
	
?>