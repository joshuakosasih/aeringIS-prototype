  <?php 
    if (isset($_GET["id"])) {
      $edit = true;
    }
    else {
      $edit = false;
    }

    $testnama = "";

    if ($edit) {
      //get data from DB
      $testnama = "haha";
    }
  ?>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Nama</label>
    <input class="col-sm-6" type="text" name="nama" value="<?php echo $testnama ?>">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Company</label>
    <input class="col-sm-6" type="text" name="company">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Phone</label>
    <input class="col-sm-6" type="text" name="phone">
  </div>
  <div class="row" style="margin: 10px">
    <label class="col-sm-3">Address</label>
    <input class="col-sm-6" type="text" name="address">
  </div>
