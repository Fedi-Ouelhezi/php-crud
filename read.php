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
    <!-- Display messages based on operations -->
    <?php
    if (isset($_SESSION['messageListe'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $_SESSION['messageListe'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><br>';
        $_SESSION['messageListe'] = null;
    }


    ?>

    <div class="row">
        <!-- Add New Record Button -->
        <div class="col">
            <a href="liste.php?action=create" class="btn btn-dark mb-3">Ajouter Nouveau</a>
        </div>

        <!-- Display Total Records -->
        <div class="col">
            <a class="btn btn-dark mb-3">
                <?php
                $sql = "SELECT count(*) AS count from `employé`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                if ($row["count"] > 0) {
                    echo "Il existe " . $row["count"] . " ligne(s) dans la base";
                } else {
                    echo "La base est vide";
                }
                ?>
            </a>
        </div>
    </div>

    <!-- Table to Display Records -->
    <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Sexe</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Pagination configuration 
            $records_per_page = 10;
            if (isset($_GET['page'])) {
                // Calculate pagination parameters if page is set
                $page = $_GET['page'];
                $offset = ($page - 1) * $records_per_page;
            } else {
                // Default page and offset if page is not set
                $page = 1;
                $offset = 0;
            }

            // Retrieve total number of records
            $sql_total = "SELECT count(*) AS count FROM `employé`";
            $result_total = mysqli_query($conn, $sql_total);
            $row_total = mysqli_fetch_assoc($result_total);
            $total_records = $row_total['count'];

            // Calculate total pages
            $total_pages = ceil($total_records / $records_per_page);

            // Fetch records with pagination
            $sql = "SELECT * FROM `employé` LIMIT $records_per_page OFFSET $offset";
            $result = mysqli_query($conn, $sql);

            // Display records
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["nom"] ?></td>
                    <td><?php echo $row["prenom"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["sexe"] ?></td>
                    <td>
                        <!-- Update Record Link -->
                        <a href="liste.php?id=<?php echo $row["id"] ?>&action=update" class="link-dark"><i class="fa fa-pen-to-square fs-5 me-3"></i></a>
                        <!-- Delete Record Link -->
                        <a href="" class="link-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash fs-5"></i></a>
                    </td>
                </tr>

                <!-- Delete Record Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Fait Attention</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Etes vous sur de supprimer ce champ ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                <a href="delete.php?id=<?php echo $row["id"] ?>"><button type="button" class="btn btn-success"> Supprimer </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1) { ?>
                <li class="page-item"><a class="page-link" href="liste.php?page=<?php echo $page - 1; ?>">Previous</a></li>
            <?php } ?>
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="liste.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <?php if ($page < $total_pages) { ?>
                <li class="page-item"><a class="page-link" href="liste.php?page=<?php echo $page + 1; ?>">Next</a></li>
            <?php } ?>
        </ul>
    </nav>
</body>

</html>