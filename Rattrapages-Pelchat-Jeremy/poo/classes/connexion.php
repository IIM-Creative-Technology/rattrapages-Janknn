<?php

class Connexion
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=rattrapage-poo;host=127.0.0.1','root','');
    }

    public function command(Command $command) 
    {
        $command->randomPrice();
        $command->state = "Commande prise en compte";
        $query = 'INSERT INTO commandes (first_name, last_name, address, price, state) VALUES (:first_name, :last_name, :address, :price, :state)';
        $statement = $this->pdo->prepare($query);
        return $statement->execute([
            'first_name' => $command->first_name,
            'last_name' => $command->last_name,
            'address' => $command->address,
            'price' => $command->price,
            'state' => $command->state
        ]);
    }

    public function getCommand(){
        $query = 'SELECT * FROM commandes';
        $request = $this->pdo->query($query);
        return $request->fetchAll(); 
    }

    public function updateCommandState($commandId, $newState) {
        $query = 'UPDATE commandes SET state = :new_state WHERE id = :command_id';
        $statement = $this->pdo->prepare($query);
        return $statement->execute([
            'new_state' => $newState,
            'command_id' => $commandId
        ]);
    }
}