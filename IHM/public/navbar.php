<?php
    $relative_path =  str_ireplace('opt/lampp/htdocs/','',dirname(__FILE__));
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <!-- Added a container to center the navbar elements -->
        <a class="navbar-brand" href="#">PC-Buy Tanger</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav"> <!-- Added justify-content-center class here -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="IHM/affichage.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/login.php";?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$relative_path . "../../../Gestion_Actions/Signup.php";?>">Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
