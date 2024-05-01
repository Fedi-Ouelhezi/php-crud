<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar mb-5 justify-content: space-around" style="background-color: #00ff5573;">
        <a href="liste.php" class="fs-4">
            <i class="fa fa-home me-2 ms-2" aria-hidden="true">
            </i>HOME</a>
        <h2 style="margin-left: 200px;"> PHP CRUD Application </h2>
        <div class="fs-4" style="margin-right: -250px;"><strong> BONJOUR <?php echo $_SESSION['username']; ?> </strong></div>
        <a href="logout.php" class="fs-4 me-2"><i class="fa fa-sign-out me-2" aria-hidden="true"></i>Logout</a>
    </nav>

</body>

</html>