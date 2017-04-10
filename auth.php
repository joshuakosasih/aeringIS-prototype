<?php
  require_once 'session.php';

  function auth_user_name ($db) {
    $stmt = $db->prepare('select username from employees where id_emp=?');
		$stmt->bind_param('i', $_SESSION['id_emp']);
		$stmt->execute();
		$stmt->bind_result($username);
    $success = $stmt->fetch();
    $stmt->close();

		if ($success) return $username;

    return '';
  }

  function check_login ($db) {
    if (!isset($_SESSION['id_emp'])) {
      header('Location: login.php');
    }
  }
?>
