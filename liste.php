<?php
// Include the database connection file
include "db_conn.php";

// Start the session
session_start();

// Check if the user is not signed in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <title>PHP CRUD Application</title>
</head>

<body>
  <?php
  include("header.php");
  ?>
  <div class="container">
    <?php
    if (isset($_GET['action'])) {
      $action = $_GET['action'];
      if ($action == "create") {
        include("create.php");
      } elseif ($action == "update") {
        include("update.php");
      } else {
        header("location:liste.php");
        include("read.php");
      }
    } else {
      include("read.php");
    }
    ?>

  </div>

  <!-- Bootstrap JS -->
  <script src="js/bootstrap.js"></script>
</body>

</html>