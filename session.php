<?php session_start() ?>

<?php
if (isset($_GET['userid'])) {
  $_SESSION['id_emp'] = $_GET['userid'];
} elseif (isset($_POST['userid'])) {
  $_SESSION['id_emp'] = $_POST['userid'];
}
?>
