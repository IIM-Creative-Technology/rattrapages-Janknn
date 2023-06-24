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
}