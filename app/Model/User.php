<?php
namespace App\Model;

class User {
    protected ?int $id;
    protected ?string $nom;
    protected ?string $email;
    protected ?string $password;
    protected ?Role $role;

    public function __construct(int $id, string $nom, string $email, string $password, Role $role) {
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

    public function getRole(): Role {
        return $this->role;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole( $role)
    {
        $this->role = $role;
    }
}

