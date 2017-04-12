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
	$no_inv = "";
	$publish_date = "";
	$delivery_date = "";
	$via = "";
	$description = "";
	$id_project = "";
	$testnama = "";

    if ($edit) {
	$id = $_GET["id"];
    	
	//load ke form
      $query = <<<SQL
		select no_inv, publish_date, delivery_date, via, description, id_project, docname, last_updated from invoices where id_inv=$id
SQL;

	$stmt = $db->prepare($query);
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($no_inv, $publish_date, $delivery_date, $via, $description, $id_project, $docname, $last_updated);
	$stmt->fetch();
	//$stmt->close();
	
	
	
	}
	
  ?>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <div class="row" style="margin: 10px">
    <label class="col-sm-3">No invoice</label>
    <input class="col-sm-6" type="text" name="noinvo" value="<?php echo $no_inv ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Tanggal terbit</label>
    <input class="col-sm-6" type="date" name="tanggal" value="<?php echo $publish_date ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Tanggal pengiriman</label>
    <input class="col-sm-6" type="date" name="delivery" value="<?php echo $delivery_date ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Via</label>
    <input class="col-sm-6" type="text" name="via" value="<?php echo $via ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Deskripsi</label>
    <input class="col-sm-6" type="text" name="deskripsi" value="<?php echo $description ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">ID Project</label>
    <input class="col-sm-6" type="text" name="idproj" value="<?php echo $id_project ?>">
  </div>
