<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-com</title>
    <link rel="stylesheet" href="IHM/public/bootstrap/bootstrap.min.css">
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

    <?php include_once "IHM/public/header.php" ?>

    <?php include_once "IHM/public/navbar.php" ?>

    <main class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Your existing content goes here -->

                <h1 class="display-4">Welcome to E-com</h1>
                <p class="lead">This is your E-commerce website.</p>
                
                <!-- End of existing content -->

            </div>
        </div>
    </main>

    <?php include_once "IHM/public/footer.php" ?>

    <!-- Add Bootstrap JS and Popper.js if needed -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="IHM/public/bootstrap/bootstrap.min.js"></script>

</body>
</html>
