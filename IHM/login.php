<?php include_once "IHM/public/header.php" ?>
<?php include_once "IHM/public/navbar.php" ?>
    
<form action="Gestion_Actions/Login.php" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="Username">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>
        
        <tr>
            <th colspan=2><input type="submit" value="Send"></th>
        </tr>
    </table>
</form>
    
<?php include_once "IHM/public/footer.php" ?>