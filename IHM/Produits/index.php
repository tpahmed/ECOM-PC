<?php
    session_start();
    $products_list = $_SESSION["products"];
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

        nav {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        nav a {
            margin: 0 10px;
        }
    </style>
</head>
<body>

    <?php include_once "../IHM/public/header.php" ?>
    <?php include_once "../IHM/public/navbar.php" ?>

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
                            <td><img src="<?="../public/images/".$product["image"]?>" alt="<?=$product["name"]?>" class="img-fluid"></td>
                            <td><?=$product["name"]?></td>
                            <td><?=$product["category"]?></td>
                            <td><?=$product["price"]?></td>
                            <td>
                                <a href="Gestion_Actions/Edit.php?id=<?=$product["id"]?>" class="btn btn-edit">Edit</a>
                                <a href="Gestion_Actions/Delete.php?id=<?=$product["id"]?>" class="btn btn-delete">Delete</a>
                                <a href="Gestion_Actions/Afficher.php?id=<?=$product["id"]?>" class="btn btn-show">Show</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include_once "../IHM/public/footer.php" ?>

    <script src="../public/jquery-3.3.1.slim.min.js"></script>
    <script src="../public/popper.min.js"></script>
    <script src="../public/style/bootstrap.min.js"></script>
</body>
</html>
