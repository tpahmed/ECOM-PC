<?php
    session_start();
    $commands = isset($_SESSION["commands"]) ? $_SESSION["commands"] : array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-com Commands</title>

    <link rel="stylesheet" href="../public/style/bootstrap.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, nav, main, footer {
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

        .table-container {
            margin-top: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        .btn-show, .btn-confirm {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <?php include_once "../public/header.php" ?>
    <?php include_once "../public/navbar.php" ?>

    <div class="container mt-4">
        <div class="table-container">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <?php if($_SESSION['user']['type']){ ?>
                            <th>Command ID</th>
                        <?php } ?>
                        <th>Date</th>
                        <th>Total Price</th>
                        <th>Confirmed</th>
                        <th>Product Designation</th>
                        <?php if($_SESSION['user']['type']){ ?>
                            <th>Actions</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commands as $command){ ?>
                        <tr>
                            <?php if($_SESSION['user']['type']){ ?>
                                <td><?=$command["id"]?></td>
                            <?php } ?>
                            <td><?=$command["date_cmd"]?></td>
                            <td><?=$command["prix"]?></td>
                            <td><?=$command["confirmer"] ? 'Yes' : 'No'?></td>
                            <td><?=$command["designation"]?></td>
                            <?php if($_SESSION['user']['type']){ ?>
                                <td>
                                    <a href="../../Gestion_Actions/commandes.php?action=confirm&id=<?=$command["id"]?>" class="btn btn-primary btn-confirm <?=$command["confirmer"] ? 'disabled' : ''?>">
                                        Confirm
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include_once "../public/footer.php" ?>

    <script src="../public/jquery-3.3.1.slim.min.js"></script>
    <script src="../public/popper.min.js"></script>
    <script src="../public/style/bootstrap.min.js"></script>

</body>
</html>
