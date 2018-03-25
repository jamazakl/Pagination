<?php
$user = "root";
$pass = "";
try {
  $dbh = new PDO('mysql:host=localhost;dbname=client', $user, $pass);
} catch (\PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
$limit = ( isset( $_GET['limit']))? $_GET['limit'] : 20;
$page = ( isset( $_GET['page']))? $_GET['page'] : 1;
$links = ( isset( $_GET['links']))? $_GET['links'] : 20;
$query = "SELECT * FROM tablepaginate";

require_once 'paginator.class.php';
$paginator = new Paginator($dbh, $query);
$results   = $paginator->getData($limit, $page);
 ?>
