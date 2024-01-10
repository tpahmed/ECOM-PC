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
            padding: 20px;
        }

        table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            vertical-align: top;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td colspan="2" class="text-center">
                    <img src="<?="../public/images/".$product["image"]?>" alt="" class="img-fluid rounded">
                </td>
            </tr>
            <tr>
                <th scope="row">Return</th>
                <td>
                    <a href="../../Gestion_Actions/produits.php?action=lister" class="btn btn-secondary btn-sm">Return</a>
                </td>
            </tr>
            <tr>
                <th scope="row">Type</th>
                <td><?=$product["type"]?></td>
            </tr>
            <tr>
                <th scope="row">Designation</th>
                <td><?=$product["designation"]?></td>
            </tr>
            <tr>
                <th scope="row">Description</th>
                <td><?=$product["description"]?></td>
            </tr>
            <tr>
                <th scope="row">Price</th>
                <td><?=$product["price"]?></td>
            </tr>
            <tr>
                <th scope="row">Quantity</th>
                <td><?=$product["qtt"]?></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="Gestion_Actions/Command?id=<?=$product["id"]?>" class="btn btn-primary btn-lg">
                        Buy Now
                    </a>
                </td>
            </tr>
        </tbody>
    </table>



    <script src="../public/jquery-3.3.1.slim.min.js"></script>
    <script src="../public/popper.min.js"></script>
    <script src="../public/style/bootstrap.min.js"></script>
</body>
</html>
