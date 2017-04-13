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
	$tipe = $_GET["type"];
    	
	//load ke form
      $query = <<<SQL
		select no_quot, publish, tat, deadline, delivery_date, id_project, docname, last_updated from quotations where id_quotation=$id
SQL;

	$stmt = $db->prepare($query);
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($no_quot, $publish, $tat, $deadline, $delivery_date, $id_project, $docname, $last_updated);
	$stmt->fetch();
	//$stmt->close();
	
	
	
	}
	
  ?>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <div class="row" style="margin: 10px">
    <label class="col-sm-3">No quotation</label>
    <input class="col-sm-6" type="text" name="noquot" value="<?php echo $no_quot ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Tanggal dibuat</label>
    <input class="col-sm-6" type="text" name="tanggal" value="<?php echo $publish ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Tab</label>
    <input class="col-sm-6" type="text" name="tab" value="<?php echo $tat ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Deadline</label>
    <input class="col-sm-6" type="text" name="deadline" value="<?php echo $deadline ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Tanggal pengiriman</label>
    <input class="col-sm-6" type="text" name="delivery" value="<?php echo $delivery_date ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">ID Project</label>
    <input class="col-sm-6" type="text" name="idproj" value="<?php echo $id_project ?>">
  </div>
  <div class="row" style="margin: 10px">
    <input class="col-sm-6" type="hidden" name="id" value="<?php echo $id ?>">
  </div>
  <div class="row" style="margin: 10px">
    <input class="col-sm-6" type="hidden" name="tipe" value="<?php echo $tipe ?>">
  </div>
