<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-com Add Product</title>
</head>
<body>
    <form action="Gestion_Actions/Insert.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Image</td>
                <td><input type="file" alt="" name="image"></td>
            </tr>
            <tr>
                <td>Designation</td>
                <td><input type="text" name="designation"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="category">
                        <option value="PCP">PC Portable</option>   
                        <option value="PCB">PC Bureau</option>   
                    </select>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td>Qtt</td>
                <td><input type="text" name="qtt"></td>
            </tr>
            <tr>
                <td>Promotion</td>
                <td><input type="text" name="promotion"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Send"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>