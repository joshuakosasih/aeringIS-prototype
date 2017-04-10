<?php
	require_once 'db.php';
	require_once 'utils.php';
	require_once 'session.php';

	$valid = validate_post("username", "password");

	if ($valid) {
		$query = <<<SQL
select id_emp, password, division from employees where username=?
SQL;
    $stmt = $db->prepare($query);
	error_reporting(E_ALL);
	ini_set('display_errors',1);
		$stmt->bind_param('s', $_POST['username']);
		$stmt->execute();
		$stmt->bind_result($id_emp, $password, $division);

		if ($stmt->fetch()) {
			if ($_POST['password'] == $password) {
				$_SESSION['id_emp'] = $id_emp;
				if ($division == 'GA'){
					header("Location: dashboardG.html");
				} elseif ($division == 'S'){
					header("Location: dashboardS.html");
				} elseif ($division == 'P'){
					header("Location: dashboardP.html");
				} elseif ($division == 'Q'){
					header("Location: dashboardQ.html");
				}
			}
		}
	}
?>