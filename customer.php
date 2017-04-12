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
	$phone = "";
	$company = "";
	$address = "";

	$testnama = "";

    if ($edit) {
	$id = $_GET["id"];
    	
	//load ke form
      $query = <<<SQL
		select name, phone, company, address, docname, last_updated from customers where id_cust=$id
SQL;

	$stmt = $db->prepare($query);
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($name, $phone, $company, $address, $docname, $last_updated);
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
    <label class="col-sm-3">Company</label>
    <input class="col-sm-6" type="text" name="company" value="<?php echo $company ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Phone</label>
    <input class="col-sm-6" type="text" name="phone" value="<?php echo $phone ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Address</label>
    <input class="col-sm-6" type="text" name="address" value="<?php echo $address ?>">
  </div>
