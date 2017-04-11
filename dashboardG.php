<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>General Affair Dashboard</title>    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<style type="text/css">
  table, th, td {
    border: 1px solid black;
  }
  th, td {
    padding: 15px;
  }
</style>

<body>

<div name="topbanner" style="background-color: #76D7C4;height: 140px;padding: 5px;padding-left: 100px;padding-right: 100px;border-bottom-width: 3px;border-bottom-style: solid;border-color: black">
  <h2 style="float: left;">Aering</h2>
  <a href="index.html" style="float: right;margin-top: 30px;"><button>Logout</button></a>
  <h1 style="clear: both;">General Affair Dashboard</h1>
</div>

<div name="content" style="padding: 100px">
<a href="add.php?acl=G&type=0" style="float: right;margin-bottom: 20px"><button>Add new document</button></a>
<br style="clear: both" />
<table>
  <tr style="background-color: lightgray">
    <th style="width: 200px">Document Type</th>
    <th style="width: 250px">Document Number</th>
    <th style="width: 300px">Document Name</th>
    <th style="width: 200px">Date Modified</th>
    <th style="width: 220px">Action</th>
  </tr>
  
</table>
</div>
</body>
</html>
