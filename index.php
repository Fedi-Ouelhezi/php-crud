<?php
// Include the database connection file
include "db_conn.php";

// Démarre la session
session_start();

// Vérifie si l'utilisateur est déjà connecté, s'il l'est, redirige vers la page index
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: liste.php");
    exit;
}

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `user` WHERE `login` = '$login'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Vérifie si les identifiants fournis sont corrects
        if ($row['pass'] == md5($pass)) {
            // Authentification réussie, initialise la session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $login;
            // Redirige vers la page sécurisée
            header("Location: liste.php");
            exit;
        } else {
            // Redirige vers la page de connexion avec un message d'erreur
            $_SESSION['messageLogin'] = "Login ou mot de passe incorrect";
            header("Location: index.php");
            exit;
        }
    } else {
        // Redirige vers la page de connexion avec un message d'erreur
        $_SESSION['messageLogin'] = "Login ou mot de passe incorrect";
        header("Location: index.php");
        exit;
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
            height: 250px;
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
                    <h3>Connecter Vous!</h3>
                    <p class="text-muted">Complétez le formulaire ci-dessous</p>
                </div>
                <?php
                if (isset($_SESSION['messageLogin'])) {
                    if ($_SESSION['messageLogin'] == "Compte créer avec succes") {
                        echo '<div class="alert alert-success alert-dismissible fade show"  role="alert">' . $_SESSION['messageLogin'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><br>';
                        $_SESSION['messageLogin'] = null;
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show"  role="alert">' . $_SESSION['messageLogin'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><br>';
                        $_SESSION['messageLogin'] = null;
                    }
                }
                ?>
                <form action="" method="post" class="custom-form mt-5">
                    <div class="mb-3 ">
                        <label class="form-label">Login</label>
                        <input type="text" class="form-control" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                </form>
                <p class="text-muted">Nouveau? <a href="signup.php"> Inscrivez vous! </a></p>
            </div>
        </div>
    </div>
</body>

</html>