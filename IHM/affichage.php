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
</head>
<body>
    <table>
        <tr>
            <th rowspan="6">
                <img src="<?="public/images/".$product["image"]?>" alt="">
            </th>
            <td><a href="Gestion_Actions/List.php">Return</a></td>
        </tr>
        <tr>
            <td>
                <?=$product["type"]?>
            </td>
        </tr>
        <tr>
            <td>
                <?=$product["designation"]?>
            </td>
        </tr>
        <tr>
            <td>
                <?=$product["description"]?>
            </td>
        </tr>
        <tr>
            <td>
                <?=$product["price"]?>
            </td>
        </tr>
        <tr>
            <td>
                <?=$product["qtt"]?>
            </td>
        </tr>
        <tr>
            <td>
                <a href="Gestion_Actions/Command?id=<?=$product["id"]?>">
                    buy
                </a>
            </td>
        </tr>

    </table>
</body>
</html>