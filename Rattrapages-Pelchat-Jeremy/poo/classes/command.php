<?php

class Command {
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $address,
        public int $price,
        public string $state
    ) {
    } 
    public function randomPrice() {
        $this->price = rand(10,100);
    }
}