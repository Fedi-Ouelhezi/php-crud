<?php
// Include the database connection file
include "db_conn.php";
session_start();

// Traitement du formulaire de signup
if (isset($_POST["submit_signup"])) {

    // Récupération des données du formulaire
    $login = $_POST['login_signup'];
    $pass1 = $_POST['pass_signup1'];
    $pass2 = $_POST['pass_signup2'];

    // Requête SQL pour vérifier si le login est déjà utilisé
    $sql = "SELECT count(*) as count FROM `user` where login ='$login'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Si le login est déjà utilisé, afficher un message d'erreur et rediriger vers la page de signup
    if ($row["count"] > 0) {
        $_SESSION['messageSignup'] = "Login déjà utilisé";
        header("Location: signup.php");
        exit;
    } else {
        // Si les mots de passe correspondent
        if ($pass1 == $pass2) {
            // Hasher le mot de passe
            $pass1 = md5($pass2);

            // Requête SQL pour insérer le nouveau compte utilisateur dans la base de données
            $sql = "INSERT INTO `user`(`id`, `login`, `pass`) VALUES (NULL, '$login','$pass1') ";
            $result = mysqli_query($conn, $sql);

            // Si l'insertion réussit, afficher un message de succès et rediriger vers la page d'accueil
            if ($result) {
                $_SESSION['messageLogin'] = "Compte créé avec succès";
                header("Location: index.php");
                exit;
            } else {
                // Si l'insertion échoue, afficher un message d'erreur
                echo "Failed: " . mysqli_error($conn);
            }
        } else {
            // Si les mots de passe ne correspondent pas, afficher un message d'erreur et rediriger vers la page de signup
            $_SESSION['messageSignup'] = "Mots de passe différents";
            header("Location: signup.php");
            exit;
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        /* Custom CSS for the form */
        .custom-form {
            background-color: #e8e8e8;
            /* Background color */
            padding: 20px;
            /* Add padding for spacing */
            border-radius: 10px;
            /* Add border radius for rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Add box shadow for depth */
            height: 400px;
            /* Set the height */
            overflow-y: auto;
            /* Add vertical scroll if content exceeds height */
        }
    </style>
</head>

<body>
    <nav class="navbar mb-5 " style="background-color: #00ff5573; justify-content:center;">
        <h2> PHP CRUD Application </h2>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="text-center mb-3">
                    <h3>Inscrivez Vous!</h3>
                    <p class="text-muted">Complétez le formulaire ci-dessous</p>
                </div>

                <?php

                if (isset($_SESSION['messageSignup'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show"  role="alert">' . $_SESSION['messageSignup'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><br>';
                    $_SESSION['messageSignup'] = null;
                }

                ?>

                <form action="signup.php" method="post" class="custom-form">

                    <div class="mb-3 ">
                        <label class="form-label">Login</label>
                        <input type="text" class="form-control" name="login_signup" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass_signup1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Verify Password</label>
                        <input type="password" class="form-control" name="pass_signup2" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit_signup">Signup</button>
                </form>
                <p class="text-muted">A déja un compte? <a href="index.php"> Connectez vous! </a></p>
            </div>
        </div>
    </div>
</body>

</html>