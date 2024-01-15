<?php
    session_start();
    $old_product = $_SESSION["product"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-com Add Product</title>

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
    </style>
</head>
<body>
    <?php include_once "../public/header.php" ?>
    <?php include_once "../public/navbar.php" ?>
    <div class="center-form">
        <form action="../../Gestion_Actions/produits.php?action=add" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Image</td>
                    <td><input type="file" alt="" name="image" class="form-control"></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td><input type="text" name="designation" class="form-control"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="type" class="form-control">
                            <option value="PCP">PC Portable</option>   
                            <option value="PCB">PC Bureau</option>   
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="prix_unitaire" class="form-control"></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td><input type="text" name="qte_stock" class="form-control"></td>
                </tr>
                <tr>
                    <td>Promotion</td>
                    <td><input type="text" name="promotion" class="form-control"></td>
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
</body>
</html>
