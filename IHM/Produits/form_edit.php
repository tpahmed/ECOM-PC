    <?php
        session_start();
        $old_product = $_SESSION["product"];
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-com Edit Product</title>

        <link rel="stylesheet" href="../public/style/bootstrap.min.css">

        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            header,
            nav,
            main,
            footer {
                margin: 20px;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
            }

            header, footer {
                text-align: center;
            }

            input[type="submit"], input[type="reset"] {
                width: 100%;
                max-width: 200px;
                margin-top: 10px;
            }

            td {
                padding: 10px;
            }

            textarea {
                width: 100%;
            }
            .center-form {
                max-width: 600px;
                margin: auto;
            }

            input[type="submit"], input[type="reset"] {
                width: 100%;
                max-width: 200px;
                margin-top: 10px;
            }
            

            .close-button {
                position: absolute;
                display: flex;
                justify-content: center;
                align-items: center;
                top: 10px;
                right: 25%;
                cursor: pointer;
                width: 15px;
                height: 15px;
                border: 1px solid black;
                border-radius: 100%;
                color: black;
                text-decoration: none;
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
        <div class="center-form">
            
            <form action="../../Gestion_Actions/photo.php?action=add&id=<?=$old_product["id"]?>" method="post" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <td colspan='2'>
                            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php foreach ($old_product["images"] as $key => $image) { ?>
                                        <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                                            <img src="<?= "../public/images/" . $image['chemin'] ?>" class="d-block" alt="">
                                            <a href='../../Gestion_Actions/photo.php?action=delete&id=<?=$image["id"]?>&id_prod=<?=$old_product["id"]?>' class="close-button" data-toggle="modal" data-target="#closeModal">&times;</a>
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
                        <td>Image</td>
                        <td><input type="file" name="image" class="form-control"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Add" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
            <form action="../../Gestion_Actions/produits.php?action=edit&id=<?=$old_product["id"]?>" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td>Designation</td>
                        <td><input type="text" name="designation" value="<?=$old_product["designation"]?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <select name="type" class="form-control">
                                <option value="PCP" <?=($old_product["type"] == "PCP") ? "selected" : ""?>>PC Portable</option>   
                                <option value="PCB" <?=($old_product["type"] == "PCB") ? "selected" : ""?>>PC Bureau</option>   
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="description" rows="5" class="form-control"><?=$old_product["description"]?></textarea></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="prix_unitaire" value="<?=$old_product["prix_unitaire"]?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td><input type="text" name="qte_stock" value="<?=$old_product["qte_stock"]?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Promotion</td>
                        <td><input type="text" name="promotion" value="<?=$old_product["promotion"]?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><input type="reset" value="Reset" class="btn btn-secondary"></td>
                        <td><input type="submit" value="Send" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
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
                })
            });
        </script>
    </body>
    </html>
