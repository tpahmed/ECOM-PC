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

    <link rel="stylesheet" href="public/bootstrap/bootstrap.min.css">

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

    <?php include_once "public/header.php" ?>

    <?php include_once "public/navbar.php" ?>
    <div class="center-form">

        <form action="Gestion_Actions/Change.php?id=<?=$old_product["id"]?>" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image" class="form-control"></td>
                </tr>
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
                    <td><input type="text" name="price" value="<?=$old_product["price"]?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td><input type="text" name="qtt" value="<?=$old_product["qtt"]?>" class="form-control"></td>
                </tr>
                <tr>
                    <td>Promotion</td>
                    <td><input type="text" name="promotion" value="<?=$old_product["promotion"]?>" class="form-control"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Send" class="btn btn-primary"></td>
                    <td><input type="reset" value="Reset" class="btn btn-secondary"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php include_once "public/footer.php" ?>
    
    <script src="public/jquery-3.3.1.slim.min.js"></script>
    <script src="public/popper.min.js"></script>
    <script src="public/bootstrap/bootstrap.min.js"></script>
</body>
</html>
