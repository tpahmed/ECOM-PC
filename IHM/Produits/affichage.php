<?php
    session_start();
    $product = $_SESSION["full_product"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-com Show Product</title>

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

        table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .btn-return {
            margin-top: 15px;
        }

        .btn-buy-now {
            display: block;
            margin: 20px auto;
            width: 100%;
            max-width: 300px;
        }
        .close-button:hover{
            color: black;

        }
        .carousel-inner img {
            margin: auto;
            height: 100px;
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: 20%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #343a40;
            border-radius: 50%;
            color: white;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: #343a40;
        }
    </style>
</head>
<body>

    <?php include_once "../public/header.php" ?>

    <?php include_once "../public/navbar.php" ?>


    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td colspan="2" class="text-center">
                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($product["images"] as $key => $image) { ?>
                                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                                    <img src="<?= "../public/images/" . $image['chemin'] ?>" class="d-block" alt="">
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev" id="prevSlide" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" id="nextSlide" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">Designation</th>
                <td><?=$product["designation"]?></td>
            </tr>
            <tr>
                <th scope="row">Type</th>
                <td><?=$product["type"]?></td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td><?=$product["description"]?></td>
            </tr>
            <tr>
                <th scope="row">Price</th>
                <td><?=$product["prix_unitaire"]?></td>
            </tr>
            <tr>
                <th scope="row">Quantity</th>
                <td><?=$product["qte_stock"]?></td>
            </tr>
            <?php if(isset($_SESSION['user'])) { ?>
                <?php if(!$_SESSION['user']['type']) { ?>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="../../Gestion_Actions/commandes.php?action=ajouter&id=<?=$product["id"]?>" class="btn btn-primary btn-buy">
                                Buy Now
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="../../Gestion_Actions/produits.php?action=lister" class="btn btn-secondary btn-sm btn-return">Return</a>
                </td>
            </tr>
        </tbody>
    </table>

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
            $('.carousel').carousel();
            $("#nextSlide").on("click",(e)=>{
                e.preventDefault();
                $('.carousel').carousel('next');
            })
            $("#prevSlide").on("click",(e)=>{
                e.preventDefault();
                $('.carousel').carousel('prev');
            });
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
