<?php
    session_start();
    $relative_path =  preg_replace('/.*\/htdocs/i', '', dirname(__FILE__));
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?=$relative_path . "../../../"?>">PC-Buy Tanger</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/produits.php?action=lister";?>">Products</a>
                </li>
                <?php if(isset($_SESSION['user'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/commandes.php?action=lister";?>">Commands</a>
                    </li>
                    <?php if($_SESSION['user']['type']) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/produits.php?action=ajouter";?>">Add Product</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/clients.php?action=profile";?>">Profile</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/utilisateur.php?action=logout";?>">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/clients.php?action=login";?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/clients.php?action=signup";?>">Signup</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
