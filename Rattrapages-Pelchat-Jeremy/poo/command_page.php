<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 
    require_once 'classes/command.php';
    require_once 'classes/connexion.php';
    $connexion = new Connexion();
    $commands = $connexion->getCommand();
?>

<body>
    <?php foreach ($commands as $command):?>
        <h1><?php echo $command['first_name'];?></h1>
        <h1><?php echo $command['last_name'];?></h1>
        <h1><?php echo $command['address'];?></h1>
        <h1><?php echo $command['price'];?></h1>
        <h1><?php echo $command['state'];?></h1>
    <?php endforeach; ?>
</body>
</html>