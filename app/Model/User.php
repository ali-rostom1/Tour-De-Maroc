<?php
namespace App\Model;


class User {
    protected ?int $id;
    protected ?string $nom;
    protected ?string $email;
    protected ?string $password;
    protected ?Role $role;

<<<<<<< HEAD
    public function __construct(int $id, string $nom, string $email, ?string $password, Role $role) {
=======
    public function __construct(int $id =null, string $nom = null, string $email =null, string $password = null, Role $role = null) {
>>>>>>> 9da0640aa6309e5b13fe75d909d4642a352d9647
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
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

