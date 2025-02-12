<?php
namespace App\Model;

class Admin extends User {
    public function __construct(int $id, string $nom, string $email, string $password) {
        parent::__construct($id, $nom, $email, $password, new Role(1, 'admin'));
    }
}
