<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <form method='POST'>
        <h1>Gestion de commande</h1>
        <label for="first_name">Prémon</label>
        <input type="text" name="first_name">
        <label for="last_name">Nom</label>
        <input type="text" name="last_name">
        <label for="address">Adresse</label>
        <input type="text" name="address">
        <input type="submit" name="send" value="commander">
    </form>
    <?php 
        require_once 'classes/command.php';
        require_once 'classes/connexion.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $command = new command(
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['address'],
                0,
                ''
            );
            $connexion = new Connexion();
            $request = $connexion->command($command);
            if ($request){
                echo "commande envoyée";
            } else {
                echo 'erreur commande';
            }
        }
    ?>
</body>
</html>