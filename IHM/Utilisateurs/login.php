<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-com Login</title>

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
    </style>
</head>
<body>
    <?php include_once "../public/header.php" ?>
    <?php include_once "../public/navbar.php" ?>

    <div class="container mt-4">
        <form action="Gestion_Actions/clients.php?action=login" method="post">
            <table class="table table-bordered">
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </td>
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
