<?php
include "db_conn.php";


// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
  header("Location: index.php");
  exit;
}
if (isset($_GET['id'])) {
  $id = $_GET["id"];

  if (isset($_POST["submit"])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sexe = $_POST['sexe'];

    $sql = "UPDATE `employé` SET `nom`='$nom',`prenom`='$prenom',`email`='$email',`sexe`='$sexe' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      $_SESSION['messageListe'] = "Updated successfully";
      header("Location: liste.php");
    } else {
      echo "Failed: " . mysqli_error($conn);
    }
  }
} else {
  header("Location: liste.php");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/bootstrap.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>


  <div class="container">
    <div class="text-center mb-4">
      <h3>Changer les information</h3>
      <p class="text-muted">Clickez sur update apres le changement</p>
    </div>

    <?php
    $sql = "SELECT * FROM `employé` WHERE id = $id ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Votre nom:</label>
            <input type="text" class="form-control" name="nom" value="<?php echo $row['nom'] ?>" pattern="[A-Za-z]+" title="Seulement les lettres alphabetiques" required>
          </div>

          <div class="col">
            <label class="form-label">Votre prenom:</label>
            <input type="text" class="form-control" name="prenom" value="<?php echo $row['prenom'] ?>" pattern="[A-Za-z]+" title="Seulement les lettres alphabetiques" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Entrer une adresse email valide" required>
        </div>

        <div class="form-group mb-3">
          <label>Sexe:</label>

          <?php if ($row['sexe'] == 'male') {
            echo '<input type="radio" class="form-check-input" name="sexe" id="male" value="male" checked >
          <label for="male" class="form-input-label">Male</label>';
          } else {
            echo '<input type="radio" class="form-check-input" name="sexe" id="male" value="male" >
          <label for="male" class="form-input-label">Male</label>';
          } ?>
          <?php if ($row['sexe'] == 'female') {
            echo '<input type="radio" class="form-check-input" name="sexe" id="female" value="female" checked >
          <label for="female" class="form-input-label">Female</label>';
          } else {
            echo '<input type="radio" class="form-check-input" name="sexe" id="female" value="female" >
          <label for="female" class="form-input-label">Female</label>';
          } ?>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="liste.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

</body>

</html>