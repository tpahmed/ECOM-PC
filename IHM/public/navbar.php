<?php
    $relative_path =  str_ireplace('opt/lampp/htdocs/','',dirname(__FILE__));
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">PC-Buy Tanger</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/produits.php?action=lister";?>">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/clients.php?action=login";?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/clients.php?action=signup";?>">Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
