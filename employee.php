<?php

require_once 'auth.php';
require_once 'session.php';
require_once 'db.php';
require_once 'utils.php';

check_login($db);  
    
	if (isset($_GET["id"])) {
      $edit = true;
    }
    else {
      $edit = false;
    }
	$name = "";
	$division = "";
	$username = "";
	$password = "";
	$testnama = "";

    if ($edit) {
	$id = $_GET["id"];
    	
	//load ke form
      $query = <<<SQL
		select name, division, username, password, docname, last_updated from employees where id_emp=$id
SQL;

	$stmt = $db->prepare($query);
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($name, $division, $username, $password, $docname, $last_updated);
	$stmt->fetch();
	//$stmt->close();
	
	
	
	}
	
  ?>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Nama</label>
    <input class="col-sm-6" type="text" name="nama" value="<?php echo $name ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Divisi</label>
    <input class="col-sm-6" type="text" name="divisi" value="<?php echo $division ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Username</label>
    <input class="col-sm-6" type="text" name="username" value="<?php echo $username ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Password</label>
    <input class="col-sm-6" type="text" name="password" value="<?php echo $password ?>">
  </div>
