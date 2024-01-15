<?php
    session_start();
    $products_list = isset($_SESSION["products"]) ? $_SESSION["products"] : array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-com Products</title>

    <link rel="stylesheet" href="../public/style/bootstrap.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, nav, main, footer {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        header, footer {
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        nav a {
            margin: 0 10px;
        }

        .table-container {
            margin-top: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        img {
            width: 50px;
        }

        .btn-edit, .btn-delete, .btn-show, .btn-buy {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <?php include_once "../public/header.php" ?>
    <?php include_once "../public/navbar.php" ?>

    <div class="container mt-4">
        <div class="table-container">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products_list as $product){ ?>
                        <tr>
                            <td><?=$product["id"]?></td>
                            <td><img src="<?="../public/images/".$product["images"][0]['chemin']?>" alt="<?=$product["designation"]?>" class="img-fluid"></td>
                            <td><?=$product["designation"]?></td>
                            <td><?=$product["type"]?></td>
                            <td><?=$product["prix_unitaire"]?></td>
                            <td>
                                <?php if(isset($_SESSION['user'])) { ?>
                                    <?php if($_SESSION['user']['type']) { ?>
                                        <a href="../../Gestion_Actions/produits.php?action=modifier&id=<?=$product["id"]?>" class="btn btn-success btn-edit">Edit</a>
                                        <a href="../../Gestion_Actions/produits.php?action=delete&id=<?=$product["id"]?>" class="btn btn-danger btn-delete">Delete</a>
                                    <?php } else { ?>
                                        <a href="../../Gestion_Actions/commandes.php?action=ajouter&id=<?=$product["id"]?>" class="btn btn-primary btn-buy">Buy</a>
                                    <?php } ?>
                                <?php } ?>
                                <a href="../../Gestion_Actions/produits.php?action=afficher&id=<?=$product["id"]?>" class="btn btn-info btn-show">Show</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                <button type="button" class="close cancelActionButton" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancelActionButton" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmActionButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../public/footer.php" ?>

    <script src="../public/jquery-3.3.1.slim.min.js"></script>
    <script src="../public/popper.min.js"></script>
    <script src="../public/style/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-buy, .btn-delete").click(function(event) {
                event.preventDefault();
                $("#confirmModalLabel").text($(this).text() + " Confirmation");
                $("#confirmMessage").text("Are you sure you want to " + $(this).text().toLowerCase() + " this product?");
                $("#confirmActionButton").attr("href", $(this).attr("href"));
                $("#confirmModal").modal("show");
            });
            
            $("#confirmActionButton").click(function() {
                window.location.href = $(this).attr("href");
            });
            $(".cancelActionButton").click(function() {
                $("#confirmModal").modal("hide");
            });
        });
    </script>

</body>
</html>
