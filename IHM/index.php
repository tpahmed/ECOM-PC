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
</head>
<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Operation</th>
        </tr>
        <?php foreach($products_list as $products){ ?>
            <tr>
                <td>
                    <?=$products["id"]?>
                </td>
                <td>
                    <img src="<?="public/images/".$products["image"]?>" alt="<?=$products["name"]?>">
                </td>
                <td>
                    <?=$products["name"]?>
                </td>
                <td>
                    <?=$products["category"]?>
                </td>
                <td>
                    <?=$products["price"]?>
                </td>
                <td>
                    <a href="Gestion_Actions/Edit.php?id=<?=$products["id"]?>">Edit</a>
                    <a href="Gestion_Actions/Delete.php?id=<?=$products["id"]?>">Delete</a>
                    <a href="Gestion_Actions/Afficher.php?id=<?=$products["id"]?>">Show</a>
                </td>
            </tr>
        <?php } ?>
        
    </table>
</body>
</html>