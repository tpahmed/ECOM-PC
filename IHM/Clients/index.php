<?php
    session_start();
    $user_info = isset($_SESSION['client']) ? $_SESSION['client'] : array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

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

        .profile-container {
            max-width: 600px;
            margin: auto;
        }

        .profile-info {
            margin-top: 20px;
        }

        .edit-button {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <?php include_once "../public/header.php" ?>

    <?php include_once "../public/navbar.php" ?>

    <div class="profile-container">
        <h2>User Profile</h2>
        <div class="profile-info">
            <p><strong>Nom:</strong> <?= $user_info['nom'] ?></p>
            <p><strong>Prenom:</strong> <?= $user_info['prenom'] ?></p>
            <p><strong>Email:</strong> <?= $user_info['email'] ?></p>
            <p><strong>GSM:</strong> <?= $user_info['gsm'] ?></p>
            <p><strong>Ville:</strong> <?= $user_info['ville'] ?></p>
            <p><strong>Username:</strong> <?= $user_info['username'] ?></p>
        </div>

        <a href="../../Gestion_Actions/clients.php?action=modifier" class="btn btn-primary edit-button">Edit Profile</a>
    </div>

    <?php include_once "../public/footer.php" ?>

    <script src="../public/jquery-3.3.1.slim.min.js"></script>
    <script src="../public/popper.min.js"></script>
    <script src="../public/style/bootstrap.min.js"></script>
</body>
</html>
