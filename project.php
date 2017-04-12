
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
	$created_date = "";
	$name = "";
	$description = "";
	$id_customer = "";
	$testnama = "";

    if ($edit) {
	$id = $_GET["id"];
    	
	//load ke form
      $query = <<<SQL
		select created_date, name, description, id_customer, docname, last_updated from projects where id_project=$id
SQL;

	$stmt = $db->prepare($query);
	if ($stmt === FALSE) echo $db->error;
	$stmt->execute();
	$stmt->bind_result($created_date, $name, $description, $id_customer, $docname, $last_updated);
	$stmt->fetch();
	//$stmt->close();
	
	
	
	}
	
  ?>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Tanggal mulai</label>
    <input class="col-sm-6" type="date" name="tanggal" value="<?php echo $created_date ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Nama</label>
    <input class="col-sm-6" type="text" name="nama" value="<?php echo $name ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Deskripsi</label>
    <textarea class="col-sm-6" type="text" name="deskripsi" rows="5" value="<?php echo $description ?>"></textarea>
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">ID Customer</label>
    <input class="col-sm-6" type="text" name="idcust" value="<?php echo $id_customer ?>">
  </div>
