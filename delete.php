<?php
require_once 'auth.php';
require_once 'session.php';
require_once 'db.php';
require_once 'utils.php';

check_login($db);

$acl = $_GET['acl'];
$tipe = $_GET['type'];

if ($tipe == 1) {
    $tip = 'employees';
	  $query = <<<SQL
    delete from $tip where id_emp=?
SQL;

}
else if ($tipe == 2) {
    $tip = 'customers';
	  $query = <<<SQL
    delete from $tip where id_cust=?
SQL;

}
else if ($tipe == 3) {
    $tip = 'communications';
	  $query = <<<SQL
    delete from $tip where id_comm=?
SQL;

}
else if ($tipe == 4) {
    $tip = 'projects';
	  $query = <<<SQL
    delete from $tip where id_project=?
SQL;

}
else if ($tipe == 5) {
    $tip = 'jobs';
	  $query = <<<SQL
    delete from $tip where id_job=?
SQL;

}
else if ($tipe == 6) {
    $tip = 'payments';
	  $query = <<<SQL
    delete from $tip where id_cust=?
SQL;

}
else if ($tipe == 7) {
    $tip = 'quotations';
	  $query = <<<SQL
    delete from $tip where id_payment=?
SQL;

}
else if ($tipe == 8) {
    $tip = 'invoices';
	  $query = <<<SQL
    delete from $tip where id_inv=?
SQL;

}
else if ($tipe == 9) {
	$tip = 'tax_invoices';
	  $query = <<<SQL
    delete from $tip where id_tax=?
SQL;

}


  $stmt = $db->prepare($query);
	if ($stmt === FALSE) echo $db->error;
	  $stmt->bind_param('i', $_GET['id']);
	  $success = $stmt->execute();
	  $stmt->fetch();
	  $stmt->close();

		if ($success) {
			header("Location: dashboard$acl.php");
		} else {
			echo $stmt->error;
		}
?>
