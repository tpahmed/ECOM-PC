<?php include_once "IHM/public/header.php" ?>
<?php include_once "IHM/public/navbar.php" ?>
    
<form action="../Gestion_Actions/Signup.php" method="post">
    <table>
        <tr>
            <td>First Name</td>
            <td>
                <input type="text" name="FName">
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>
                <input type="text" name="LName">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <td>GSM</td>
            <td>
                <input type="text" name="GSM">
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
                <input type="text" name="city">
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username">
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