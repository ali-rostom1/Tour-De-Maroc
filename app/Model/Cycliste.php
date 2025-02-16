<?php
namespace App\Model;

class Cycliste extends User {
    private string $dateNaissance;
    private string $nationalite;
    private ?int $equipeId;
    private ?float $poids;
    private ?string $biographie;
    private Equipe $equipe;
    private ?float $totalPoints = 0; // Add total points property

    public function __construct(
        int $id = null,
        string $nom = '',
        string $email = '',
        string $password = '',
        Role $role = null,
        string $dateNaissance = '',
        string $nationalite = '',
        ?float $poids = null,
        ?string $biographie = null,
        ?Equipe $equipe = null
    ) {
        parent::__construct($id, $nom, $email, $password, $role);
        $this->dateNaissance = $dateNaissance;
        $this->nationalite = $nationalite;
        $this->poids = $poids;
        $this->biographie = $biographie;
        $this->equipe = $equipe ?? new Equipe();
    }

    // Getters
    public function getDateNaissance(): string {
        return $this->dateNaissance;
    }

    public function getUserId(): string {
        return $this->id;
    }

    public function getNationalite(): string {
        return $this->nationalite;
    }

    public function getEquipe() {
        return $this->equipe;
    }

    public function getPoids(): ?float {
        return $this->poids;
    }

    public function getBiographie(): ?string {
        return $this->biographie;
    }

    public function getTotalPoints(): ?float {
        return $this->totalPoints;
    }

    // Setters
    public function setDateNaissance(string $dateNaissance): void {
        $this->dateNaissance = $dateNaissance;
    }

    public function setNationalite(string $nationalite): void {
        $this->nationalite = $nationalite;
    }

    public function setEquipeId(?int $equipeId): void {
        $this->equipeId = $equipeId;
    }

    public function setPoids(?float $poids): void {
        $this->poids = $poids;
    }

    public function setBiographie(?string $biographie): void {
        $this->biographie = $biographie;
    }

    public function setEquipe(Equipe $equipe): void {
        $this->equipe = $equipe;
    }

    public function setTotalPoints(?float $points): void {
        $this->totalPoints = $points;
    }
}
