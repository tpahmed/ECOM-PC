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

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        /* Apply custom styles if needed */
        body {
            padding: 20px;
        }

        table {
            width: 100%;
            max-width: 600px; /* Adjust the maximum width as needed */
            margin: 0 auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6; /* Bootstrap table border color */
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
                    <img src="<?="public/images/".$product["image"]?>" alt="" class="img-fluid rounded">
                </td>
            </tr>
            <tr>
                <th scope="row">Return</th>
                <td>
                    <a href="Gestion_Actions/List.php" class="btn btn-secondary btn-sm">Return</a>
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



    <!-- Add Bootstrap JS and Popper.js if needed -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
