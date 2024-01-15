<?php
    session_start();
    $user_info = isset($_SESSION['client']) ? $_SESSION['client'] : array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

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

        .edit-container {
            max-width: 600px;
            margin: auto;
        }

        .edit-form {
            margin-top: 20px;
        }

        input[type="submit"] {
            width: 100%;
            max-width: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <?php include_once "../public/header.php" ?>

    <?php include_once "../public/navbar.php" ?>

    <div class="edit-container">
        <h2>Edit Profile</h2>
        
        <form action="../../Gestion_Actions/clients.php?action=edit" method="post" class="edit-form">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="<?= $user_info['nom'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="text" name="prenom" value="<?= $user_info['prenom'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= $user_info['email'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gsm">GSM:</label>
                <input type="text" name="gsm" value="<?= $user_info['gsm'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" name="ville" value="<?= $user_info['ville'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?= $user_info['username'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password:</label>
                <input type="password" name="cpassword" value="" class="form-control">
            </div>

            <input type="submit" value="Update Profile" class="btn btn-primary">
        </form>
    </div>

    <?php include_once "../public/footer.php" ?>

    <script src="../public/jquery-3.3.1.slim.min.js"></script>
    <script src="../public/popper.min.js"></script>
    <script src="../public/style/bootstrap.min.js"></script>
</body>
</html>