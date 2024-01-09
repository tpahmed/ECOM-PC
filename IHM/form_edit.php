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
</head>
<body>
    <form action="Gestion_Actions/Change.php?id=<?=$old_product["id"]?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Designation</td>
                <td><input type="text" name="designation" value="<?=$old_product["designation"]?>"></td>
            </tr>
            <tr>
                <td>Type</td>
                <td>
                    <select name="type" value="<?=$old_product["type"]?>">
                        <option value="PCP">PC Portable</option>   
                        <option value="PCB">PC Bureau</option>   
                    </select>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="" cols="30" rows="10"><?=$old_product["description"]?></textarea></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" value="<?=$old_product["price"]?>"></td>
            </tr>
            <tr>
                <td>Qtt</td>
                <td><input type="text" name="qtt" value="<?=$old_product["qtt"]?>"></td>
            </tr>
            <tr>
                <td>Promotion</td>
                <td><input type="text" name="promotion" value="<?=$old_product["promotion"]?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Send"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>