<?php
include "db_conn.php";

//If not signed redirect

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
   header("Location: index.php");
   exit;
}
if (isset($_POST["submit"])) {
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $email = $_POST['email'];
   $sexe = $_POST['sexe'];

   $sql = "SELECT count(*) as count FROM `employé` where email='$email'";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);

   if ($row["count"] > 0) {
      $_SESSION['messageListe'] = "Email existe déja";
      header("Location: liste.php");
   } else {

      $sql = "INSERT INTO `employé`(`id`, `nom`, `prenom`, `email`, `sexe`) VALUES (NULL,'$nom','$prenom','$email','$sexe')";

      $result = mysqli_query($conn, $sql);

      if ($result) {
         $_SESSION['messageListe'] = "Created successfully";
         header("Location: liste.php");
      } else {
         echo "Failed: " . mysqli_error($conn);
      }
   }
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
         <h3>Ajouter un nouveau utilisateur</h3>
         <p class="text-muted">Completer le formulaire dessous</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nom:</label>
                  <input type="text" class="form-control" name="nom" placeholder="Votre nom" pattern="[A-Za-z]+" title="Seulement les lettres alphabetiques" required>
               </div>

               <div class="col">
                  <label class="form-label">Prenom:</label>
                  <input type="text" class="form-control" name="prenom" placeholder="Votre prenom" pattern="[A-Za-z]+" title="Seulement les lettres alphabetiques" required>
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="nom@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Entrer une adresse email valide" required>
            </div>

            <div class="form-group mb-3">
               <label>Sexe:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="sexe" id="male" value="male" required>
               <label for="male" class="form-input-label">Male</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="sexe" id="female" value="female" required>
               <label for="female" class="form-input-label">Female</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="liste.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>


</body>

</html>