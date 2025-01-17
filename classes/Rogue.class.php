<?php

require_once 'Character.php';

class Rogue extends Character
{
    private int $energy;

    // Constructeur
    public function __construct(string $name, int $energy)
    {
        // Appeler le constructeur de la classe parente
        parent::__construct(
            $name,
            100, // life
            12,  // strength
            15,  // agility
            11,  // intelligence
            rand(8, 14) // charisma
        );

        $this->energy = $energy;
    }

    // Getter pour $energy
    public function getEnergy(): int
    {
        return $this->energy;
    }

    // Setter pour $energy
    public function setEnergy(int $energy): void
    {
        $this->energy = $energy;
    }

    // Méthode stab
    public function stab(): string
    {
        $attackValue = (int)(rand(0, 100) / 100 * $this->agility);

        // Vérifier si la valeur d'attaque atteint l'agilité maximale
        if ($attackValue >= $this->agility) {
            $attackValue *= 2;  // Doubler la valeur de l'attaque
            $_SESSION['characters'][$this->name]['life'] = $this->life;
            return "{$this->name} effectue une attaque spéciale furtive avec son agilité maximale : {$attackValue}!";
        }

        // Vérifier si la valeur d'attaque est la plus basse (échec critique)
        if ($attackValue <= 0) {
            $this->life -= 10;  // Retirer 10 points de vie en cas d'échec critique
            return "{$this->name} est aussi furtive qu'un Kodo ! Échec critique, -10 PV. Vie restante: {$this->life}.";
        }

        return "{$this->name} attaque avec son agilité : {$attackValue}";
    }
}
