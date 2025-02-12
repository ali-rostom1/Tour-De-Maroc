<?php
namespace Model;

class User {
    protected int $id;
    protected string $nom;
    protected string $email;
    protected string $password;
    protected string $role;

    public function __construct($id, $nom, $email, $password, $role) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRole(): string {
        return $this->role;
    }
}
