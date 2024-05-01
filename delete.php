<?php
include "db_conn.php";

session_start();

$id = $_GET["id"];
$sql = "DELETE FROM `employé` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  $_SESSION['messageListe'] = "Deleted successfully";
  header("Location: liste.php");
} else {
  echo "Failed: " . mysqli_error($conn);
}
