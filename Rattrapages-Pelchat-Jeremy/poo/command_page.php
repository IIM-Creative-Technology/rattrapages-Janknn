<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="command_page.css">
    <title>Document</title>
</head>

<?php 
    require_once 'classes/command.php';
    require_once 'classes/connexion.php';
    $connexion = new Connexion();
    $commands = $connexion->getCommand();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $commandId = $_POST['command_id'];
        $newState = $_POST['new_state'];

        $updated = $connexion->updateCommandState($commandId, $newState);

        if ($updated) {
            echo "Statut de la commande mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du statut de la commande.";
        }
    }
?>

<?php
$statusClass = '';

switch ($command['state']) {
    case 'En cours':
        $statusClass = 'blue';
        break;
    case 'Réalisée':
        $statusClass = 'green';
        break;
    case 'Annulée':
        $statusClass = 'red';
        break;
}
?>

<body>
    <?php foreach ($commands as $command): ?>
        <h1><?php echo $command['first_name']; ?></h1>
        <h1><?php echo $command['last_name']; ?></h1>
        <h1><?php echo $command['address']; ?></h1>
        <h1><?php echo $command['price']; ?></h1>

        <?php
        $statusClass = '';

        switch ($command['state']) {
            case 'En cours':
                $statusClass = 'blue';
                break;
            case 'Réalisée':
                $statusClass = 'green';
                break;
            case 'Annulée':
                $statusClass = 'red';
                break;
        }
        ?>

        <h1 style="color: <?php echo $statusClass; ?>"><?php echo $command['state']; ?></h1>

        <form method="post" action="">
            <input type="hidden" name="command_id" value="<?php echo $command['id']; ?>">
            <select name="new_state">
                <option value="En cours">En cours</option>
                <option value="Réalisée">Réalisée</option>
                <option value="Annulée">Annulée</option>
            </select>
            <button type="submit">Mettre à jour le statut</button>
        </form>
    <?php endforeach; ?>
</body>
</html>