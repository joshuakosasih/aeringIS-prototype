<?php
  require_once 'auth.php';
  require_once 'session.php';
  require_once 'db.php';
  require_once 'utils.php';

  check_login($db);
  
  
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Edit Document</title>    
    <link href="css/bootstrap.min.css" rel="stylesheet">    
</head>

<body>

<div name="topbanner" style="background-color: #76D7C4;height: 140px;padding: 5px;padding-left: 100px;padding-right: 100px;border-bottom-width: 3px;border-bottom-style: solid;border-color: black">
  <h2 style="float: left;">Aering</h2>
  <a href="index.html" style="float: right;margin-top: 30px;"><button>Logout</button></a>
  <h1 style="clear: both;">Edit Document</h1>
</div>

<?php 
	$acl = $_GET["acl"];
	$tipe = $_GET["type"];
	$id = $_GET["id"];
	
?>

<div name="content" style="padding-left: 140px;padding-right: 140px;padding-top: 40px">
  <form action="add<?php echo $acl?>.php">
    <div name="top">
      <div class="row">
        <label class="col-sm-2">Document Name</label>
        <input class="col-sm-4" type="text" name="docname">
      </div>
      <br />
      <div class="row">
        <label class="col-sm-2">Document Type</label>
        <select id="type" name="type" disabled>
          <?php if ($acl == 'G') echo "<option " ?>
          value="1" <?php if ($tipe == 1) echo "selected";?> >Employee</option>
          <?php if ($acl == 'S'||$acl == 'G') echo "<option " ?>
          value="2" <?php if ($tipe == 2) echo "selected";?> >Customer</option>
          <?php if ($acl == 'S') echo "<option " ?>
          value="3" <?php if ($tipe == 3) echo "selected";?> >Communication</option>
          <?php if ($acl == 'P'||$acl == 'G'||$acl == 'Q') echo "<option " ?>
          value="4" <?php if ($tipe == 4) echo "selected";?> >Project</option>
          <?php if ($acl == 'P') echo "<option " ?>
          value="5" <?php if ($tipe == 5) echo "selected";?> >Job</option>
          <?php if ($acl == 'Q') echo "<option " ?>
          value="6" <?php if ($tipe == 6) echo "selected";?> >Payment</option>
          <?php if ($acl == 'Q'||$acl == 'P') echo "<option " ?>
          value="7" <?php if ($tipe == 7) echo "selected";?> >Quotation</option>
          <?php if ($acl == 'Q'||$acl == 'G') echo "<option " ?>
          value="8" <?php if ($tipe == 8) echo "selected";?> >Invoice</option>
          <?php if ($acl == 'Q') echo "<option " ?>
          value="9" <?php if ($tipe == 9) echo "selected";?> >Tax invoice</option>
        </select>
        <script type="text/javascript">
        	document.getElementById('type').onchange = function() {
			    window.location = "add.php?acl=<?php echo $acl ?>&type=" + this.value;
			};
        </script>
      </div>
      <br />
    </div>
    <div name="bottom" class="row" style="border-style: solid;border-width: 1px;min-height: 300px">

      <div id="left" name="left" class="col-sm-8" style="padding: 5px">              
        <?php         	
        	if ($tipe == 1) {
        		include 'employee.php';
        	}
        	else if ($tipe == 2) {
		        include 'customer.php';
  		    }
  		    else if ($tipe == 3) {
  		        include 'communication.php';
  		    }
  		    else if ($tipe == 4) {
  		        include 'project.php';
  		    }
  		    else if ($tipe == 5) {
  		        include 'job.php';
  		    }
  		    else if ($tipe == 6) {
  		        include 'payment.php';
  		    }
  		    else if ($tipe == 7) {
  		        include 'quotation.php';
  		    }
  		    else if ($tipe == 8) {
  		        include 'invoice.php';
  		    }
			else if ($tipe == 9) {
		        include 'tax_invoice.php';
		    }
  		?>      

      </div>

      <div name="right" class="col-sm-4" style="padding: 5px">
        <button type="submit" style="margin: 10px">Save</button>
        <br />
        <a href="dashboard<?php echo $acl?>.php"><input type="button" style="margin: 10px" value="Cancel"></a>
        <br />
      </div>

    </div>
  </form>
</div>

</body>
</html>
